<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pre_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->default('Mangalam Pitambara Havan');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('pack_preference')->default('Pack of 12 Sacred Cups');
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // pending, confirmed, notified
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pre_bookings');
    }
};
