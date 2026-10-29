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
        if (Schema::hasTable('products') && !Schema::hasColumn('products', 'badge_color')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('badge_color', 50)->nullable()->default('#8B1E1E')->after('badge_text');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products') && Schema::hasColumn('products', 'badge_color')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('badge_color');
            });
        }
    }
};
