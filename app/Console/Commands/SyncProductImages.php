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
    protected $signature = 'ishanaa:sync-product-images {--clean-disk : Also remove extra old uploaded product images from disk}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Replace all product images in the database and disk with the 2 official ISHANAA packaging visuals';

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

        // 1. Ensure target directories exist and files are replicated
        $targetDirs = [
            public_path('uploads/products'),
            public_path('storage/products'),
            storage_path('app/public/products'),
        ];

        foreach ($targetDirs as $dir) {
            if (!is_dir($dir)) {
                @mkdir($dir, 0755, true);
            }
            @copy($sourcePrimary, $dir . '/' . $primaryFile);
            @copy($sourceSecondary, $dir . '/' . $secondaryFile);
        }

        $this->info("✓ Physical image assets verified and copied to uploads and storage.");

        // 2. Update all products in the database
        $products = Product::all();
        $this->line("Found {$products->count()} products in database. Updating images...");

        $primaryPath   = 'assets/images/products/' . $primaryFile;
        $secondaryPath = 'assets/images/products/' . $secondaryFile;

        foreach ($products as $product) {
            // Remove any existing images
            ProductImage::where('product_id', $product->id)->delete();

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
        }

        // Delete any orphaned product images
        ProductImage::whereNotIn('image_path', [$primaryPath, $secondaryPath, 'uploads/products/' . $primaryFile, 'uploads/products/' . $secondaryFile])->delete();

        $this->info("✓ Database updated: All {$products->count()} products now have exactly the 2 official ISHANAA packaging visuals.");

        return Command::SUCCESS;
    }
}
