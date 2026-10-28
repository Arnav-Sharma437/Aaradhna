<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;
use App\Models\ProductImage;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Replaces all existing product images across all products with the 2 official ISHANAA packaging visuals.
     */
    public function up(): void
    {
        if (!Schema::hasTable('products') || !Schema::hasTable('product_images')) {
            return;
        }

        try {
            // Ensure target directories exist and copy files from public assets
            $assetPrimary = public_path('assets/images/products/ishanaa-oudh-incense-sticks-100.png');
            $assetSecondary = public_path('assets/images/products/ishanaa-incense-sticks-trio.jpg');

            $uploadDir = public_path('uploads/products');
            if (!is_dir($uploadDir)) {
                @mkdir($uploadDir, 0755, true);
            }
            if (file_exists($assetPrimary) && !file_exists($uploadDir . '/ishanaa-oudh-incense-sticks-100.png')) {
                @copy($assetPrimary, $uploadDir . '/ishanaa-oudh-incense-sticks-100.png');
            }
            if (file_exists($assetSecondary) && !file_exists($uploadDir . '/ishanaa-incense-sticks-trio.jpg')) {
                @copy($assetSecondary, $uploadDir . '/ishanaa-incense-sticks-trio.jpg');
            }

            $storageDir = storage_path('app/public/products');
            if (!is_dir($storageDir)) {
                @mkdir($storageDir, 0755, true);
            }
            if (file_exists($assetPrimary) && !file_exists($storageDir . '/ishanaa-oudh-incense-sticks-100.png')) {
                @copy($assetPrimary, $storageDir . '/ishanaa-oudh-incense-sticks-100.png');
            }
            if (file_exists($assetSecondary) && !file_exists($storageDir . '/ishanaa-incense-sticks-trio.jpg')) {
                @copy($assetSecondary, $storageDir . '/ishanaa-incense-sticks-trio.jpg');
            }

            $products = Product::all();
            foreach ($products as $product) {
                // Delete existing images for this product
                ProductImage::where('product_id', $product->id)->delete();

                // 1. Primary Image (Front Box Packaging)
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'uploads/products/ishanaa-oudh-incense-sticks-100.png',
                    'alt_text'   => $product->title . ' - ISHANAA Incense Sticks',
                    'sort_order' => 1,
                    'is_primary' => true,
                ]);

                // 2. Secondary / Lifestyle Image (3-Pack Collection)
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'uploads/products/ishanaa-incense-sticks-trio.jpg',
                    'alt_text'   => $product->title . ' - ISHANAA Collection Trio',
                    'sort_order' => 2,
                    'is_primary' => false,
                ]);
            }
        } catch (\Throwable $e) {
            // Fail safely without blocking deployment
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Non-destructive rollback
    }
};
