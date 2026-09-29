<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('reviewer_name');
            $table->string('reviewer_email');
            $table->tinyInteger('rating')->unsigned(); // 1 to 5
            $table->string('title')->nullable();
            $table->text('review_text');
            $table->boolean('is_verified_buyer')->default(false);
            $table->string('status')->default('pending')->index(); // pending, approved, rejected
            $table->text('admin_reply')->nullable();
            $table->timestamps();

            $table->index(['product_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};