<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Console\Command;

class SyncProductImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ishanaa:sync-product-images {--force-overwrite-all : Destructively overwrite all product images even if custom images were uploaded}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Safely ensure official packaging visuals are available without overwriting admin-uploaded images';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info("=== ISHANAA Product Images Synchronizer ===");

        $primaryFile   = 'ishanaa-oudh-incense-sticks-100.png';
        $secondaryFile = 'ishanaa-incense-sticks-trio.jpg';

        $sourcePrimary   = public_path('assets/images/products/' . $primaryFile);
        $sourceSecondary = public_path('assets/images/products/' . $secondaryFile);

        if (!file_exists($sourcePrimary) || !file_exists($sourceSecondary)) {
            $this->error("Source asset images not found in public/assets/images/products/!");
            return Command::FAILURE;
        }

        // 1. Ensure target directories exist and default files are copied
        $targetDirs = [
            public_path('uploads/products'),
            public_path('storage/products'),
            storage_path('app/public/products'),
        ];

        foreach ($targetDirs as $dir) {
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            if (!file_exists($dir . '/' . $primaryFile)) {
                @copy($sourcePrimary, $dir . '/' . $primaryFile);
            }
            if (!file_exists($dir . '/' . $secondaryFile)) {
                @copy($sourceSecondary, $dir . '/' . $secondaryFile);
            }
        }

        $this->info("✓ Physical default image assets verified.");

        $force = (bool) $this->option('force-overwrite-all');
        $products = Product::all();
        $this->line("Found {$products->count()} products in database. Checking images...");

        $primaryPath   = 'assets/images/products/' . $primaryFile;
        $secondaryPath = 'assets/images/products/' . $secondaryFile;
        $updatedCount  = 0;

        foreach ($products as $product) {
            // If the product already has images and --force-overwrite-all is NOT specified, PRESERVE THEM!
            if ($product->images()->count() > 0 && !$force) {
                continue;
            }

            if ($force) {
                ProductImage::where('product_id', $product->id)->delete();
            }

            // Insert Primary (Front Box)
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $primaryPath,
                'alt_text'   => $product->title . ' - ISHANAA Incense Sticks',
                'sort_order' => 1,
                'is_primary' => true,
            ]);

            // Insert Secondary (3-Box Trio)
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $secondaryPath,
                'alt_text'   => $product->title . ' - ISHANAA Collection Trio',
                'sort_order' => 2,
                'is_primary' => false,
            ]);

            $updatedCount++;
        }

        $this->info("✓ Synchronized images. {$updatedCount} products updated (products with existing admin images were safely preserved).");

        return Command::SUCCESS;
    }
}
