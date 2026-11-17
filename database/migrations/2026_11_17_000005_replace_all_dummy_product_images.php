<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductImage;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Replace all remaining dummy image references in the database with genuine real product photography.
     */
    public function up(): void
    {
        if (!Schema::hasTable('products') || !Schema::hasTable('product_images')) {
            return;
        }

        try {
            $photoMap = [
                'rose'     => ['primary' => 'uploads/products/prod_1794313158_AWN4KevDUcRa.jpeg', 'secondary' => 'uploads/products/prod_1794308785_rq0RDfCRyHCI.jpeg'],
                'chandan'  => ['primary' => 'uploads/products/prod_1794313421_amkJS4wtc3nl.jpeg', 'secondary' => 'uploads/products/prod_1794307727_i93xqOgtbOKa.jpeg'],
                'jasmine'  => ['primary' => 'uploads/products/prod_1794313272_bFMpxnVli3LU.jpeg', 'secondary' => 'uploads/products/prod_1794313272_pfSvm1eFbPMi.jpeg'],
                'mogra'    => ['primary' => 'uploads/products/prod_1794313272_bFMpxnVli3LU.jpeg', 'secondary' => 'uploads/products/prod_1794313272_pfSvm1eFbPMi.jpeg'],
                'marigold' => ['primary' => 'uploads/products/prod_1794313376_1Dmaqv2A1qeU.jpeg', 'secondary' => 'uploads/products/prod_1794313407_fxxJ8kF21ZNe.jpeg'],
                'tulsi'    => ['primary' => 'uploads/products/prod_1794313496_tfnHcumvI7W9.jpeg', 'secondary' => 'uploads/products/prod_1794313496_z0gliGRrigwQ.jpeg'],
                'combo'    => ['primary' => 'uploads/products/prod_1794314582_BlWthCxnC7E7.jpeg', 'secondary' => 'uploads/products/prod_1794315199_fSBpekR09kj3.jpeg'],
                'havan'    => ['primary' => 'assets/images/single-havan-cup.png', 'secondary' => 'assets/images/single-havan-cup.png'],
                'dhoop'    => ['primary' => 'assets/images/single-dhoop-cone.png', 'secondary' => 'assets/images/single-dhoop-cone.png'],
                'oudh'     => ['primary' => 'uploads/products/prod_1794313187_WMXp0FXgW4ND.jpeg', 'secondary' => 'uploads/products/prod_1793877582_07A5tn8leT3e.jpeg'],
            ];

            $products = Product::with('images')->get();

            foreach ($products as $p) {
                $search = strtolower($p->slug . ' ' . $p->title);
                
                // Determine matching photo
                $matchedPhotos = $photoMap['oudh'];
                foreach ($photoMap as $key => $photos) {
                    if (str_contains($search, $key)) {
                        $matchedPhotos = $photos;
                        break;
                    }
                }

                // If product has no images at all in product_images table, create them
                if ($p->images->isEmpty()) {
                    ProductImage::create([
                        'product_id' => $p->id,
                        'image_path' => $matchedPhotos['primary'],
                        'is_primary' => true,
                        'sort_order' => 0,
                    ]);
                    ProductImage::create([
                        'product_id' => $p->id,
                        'image_path' => $matchedPhotos['secondary'],
                        'is_primary' => false,
                        'sort_order' => 1,
                    ]);
                } else {
                    // Update any existing dummy images for this product
                    foreach ($p->images as $img) {
                        $path = $img->image_path;
                        if (str_contains($path, 'ishanaa-oudh-incense-sticks-100') || str_contains($path, 'ishanaa-incense-sticks-trio') || empty($path)) {
                            $newPath = $img->is_primary ? $matchedPhotos['primary'] : $matchedPhotos['secondary'];
                            $img->update(['image_path' => $newPath]);
                        }
                    }
                }
            }

            // Also clean video_reels thumbnails/posters if they had dummy illustrations
            if (Schema::hasTable('video_reels')) {
                DB::table('video_reels')
                    ->where('thumbnail', 'LIKE', '%ishanaa-incense-sticks-trio%')
                    ->orWhere('thumbnail', 'LIKE', '%ishanaa-oudh-incense-sticks-100%')
                    ->update(['thumbnail' => 'uploads/products/prod_1794314582_BlWthCxnC7E7.jpeg']);

                DB::table('video_reels')
                    ->where('poster', 'LIKE', '%ishanaa-incense-sticks-trio%')
                    ->orWhere('poster', 'LIKE', '%ishanaa-oudh-incense-sticks-100%')
                    ->update(['poster' => 'uploads/products/prod_1794314582_BlWthCxnC7E7.jpeg']);
            }
        } catch (\Throwable $e) {}
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
