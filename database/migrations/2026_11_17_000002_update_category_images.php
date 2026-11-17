<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Update category images to the new authentic visuals and remove old 3-pack box placeholder from database.
     */
    public function up(): void
    {
        if (!Schema::hasTable('categories')) {
            return;
        }

        try {
            // 1. Incense Sticks (Bambooless)
            DB::table('categories')
                ->where('slug', 'bambooless')
                ->orWhere('name', 'LIKE', '%bambooless%')
                ->orWhere('name', 'LIKE', '%incense%')
                ->update([
                    'image_path' => 'assets/images/single-bambooless-stick.png',
                ]);

            // 2. Dhoop Cones
            DB::table('categories')
                ->where('slug', 'dhoop-cones')
                ->orWhere('name', 'LIKE', '%dhoop%')
                ->update([
                    'image_path' => 'assets/images/single-dhoop-cone.png',
                ]);

            // 3. Havan Cups
            DB::table('categories')
                ->where('slug', 'havan-cups')
                ->orWhere('name', 'LIKE', '%havan%')
                ->update([
                    'image_path' => 'assets/images/single-havan-cup.png',
                ]);

            // 4. Delete/Clean any old legacy category image references across all categories
            DB::table('categories')
                ->where('image_path', 'LIKE', '%ishanaa-incense-sticks-trio%')
                ->orWhere('image_path', 'LIKE', '%ishanaa-oudh-incense-sticks%')
                ->update([
                    'image_path' => DB::raw("CASE 
                        WHEN slug LIKE '%dhoop%' THEN 'assets/images/single-dhoop-cone.png'
                        WHEN slug LIKE '%havan%' THEN 'assets/images/single-havan-cup.png'
                        ELSE 'assets/images/single-bambooless-stick.png'
                    END")
                ]);
        } catch (\Throwable $e) {}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe non-destructive down migration
    }
};
