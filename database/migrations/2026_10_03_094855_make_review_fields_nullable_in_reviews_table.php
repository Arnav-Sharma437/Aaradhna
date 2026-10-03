<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('reviewer_name')->nullable()->default('Anonymous')->change();
            $table->string('reviewer_email')->nullable()->change();
            $table->text('review_text')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('reviewer_name')->nullable(false)->change();
            $table->string('reviewer_email')->nullable(false)->change();
            $table->text('review_text')->nullable(false)->change();
        });
    }
};
