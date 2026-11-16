<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'tagline')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('tagline', 500)->nullable()->after('short_description');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'tagline')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('tagline');
            });
        }
    }
};
