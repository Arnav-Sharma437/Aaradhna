<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Auto-heal products table schema if badge_text or badge_color columns do not exist.
     */
    private function ensureBadgeColumnExists(): void
    {
        try {
            if (!Schema::hasColumn('products', 'badge_text')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('badge_text', 100)->nullable()->after('is_bestseller');
                });
            }
            if (!Schema::hasColumn('products', 'badge_color')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->string('badge_color', 50)->nullable()->default('#8B1E1E')->after('badge_text');
                });
            }
            if (!Schema::hasColumn('products', 'sort_order')) {
                Schema::table('products', function (Blueprint $table) {
                    $table->integer('sort_order')->default(0)->after('status')->index();
                });
            }
        } catch (\Throwable $e) {
            // Silently continue if cannot alter
        }
    }

    /**
     * Mirror any images stored in storage/app/public/products to public/uploads/products and public/storage/products.
     */
    public static function syncStorageToPublic(): void
    {
        try {
            $sourceDir = storage_path('app/public/products');
            $targetUploads = public_path('uploads/products');
            $targetStorage = public_path('storage/products');

            foreach ([$targetUploads, $targetStorage] as $tDir) {
                if (!file_exists($tDir)) {
                    @mkdir($tDir, 0775, true);
                }
            }

            if (is_dir($sourceDir)) {
                $files = scandir($sourceDir);
                foreach ($files as $file) {
                    if ($file === '.' || $file === '..') continue;
                    $src = $sourceDir . '/' . $file;
                    if (is_file($src)) {
                        $upDest = $targetUploads . '/' . $file;
                        if (!file_exists($upDest)) {
                            @copy($src, $upDest);
                        }
                        $stDest = $targetStorage . '/' . $file;
                        if (!file_exists($stDest)) {
                            @copy($src, $stDest);
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            // Silently continue
        }
    }

    /**
     * Save an uploaded file directly into public/uploads/products, public/storage/products, and storage/app/public/products.
     */
    private function saveProductImage($file, Product $product, string $altText, bool $isPrimary = false, int $sortOrder = 0): void
    {
        try {
            $extension = $file->getClientOriginalExtension() ?: 'jpg';
            $fileName = 'prod_' . time() . '_' . Str::random(12) . '.' . $extension;
            $relativePath = 'uploads/products/' . $fileName;

            $publicUploadDir = public_path('uploads/products');
            $publicStorageDir = public_path('storage/products');
            $appStorageDir = storage_path('app/public/products');

            foreach ([$publicUploadDir, $publicStorageDir, $appStorageDir] as $dir) {
                if (!file_exists($dir)) {
                    @mkdir($dir, 0775, true);
                }
            }

            // Move file directly into public/uploads/products
            $file->move($publicUploadDir, $fileName);
            $sourceFile = $publicUploadDir . '/' . $fileName;

            // Mirror to public/storage/products and storage/app/public/products
            if (file_exists($sourceFile)) {
                @copy($sourceFile, $publicStorageDir . '/' . $fileName);
                @copy($sourceFile, $appStorageDir . '/' . $fileName);
            }

            $product->images()->create([
                'image_path' => $relativePath,
                'alt_text' => $altText,
                'sort_order' => $sortOrder,
                'is_primary' => $isPrimary,
            ]);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Image upload failed: ' . $e->getMessage());
        }
    }

    /**
     * Display a listing of products with search, filters, and pagination.
     */
    public function index(Request $request): View
    {
        self::syncStorageToPublic();
        $query = Product::with(['category', 'primaryImage', 'images', 'variants', 'collections']);

        // 1. Search Query
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('hindi_title', 'LIKE', "%{$search}%")
                  ->orWhere('sku', 'LIKE', "%{$search}%")
                  ->orWhere('short_description', 'LIKE', "%{$search}%");
            });
        }

        // 2. Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 3. Category Filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // 4. Stock Filter
        if ($request->filled('stock')) {
            if ($request->stock === 'in_stock') {
                $query->where('stock_quantity', '>', 0);
            } elseif ($request->stock === 'low_stock') {
                $query->where('stock_quantity', '>', 0)->where('stock_quantity', '<=', 30);
            } elseif ($request->stock === 'out_of_stock') {
                $query->where('stock_quantity', '<=', 0);
            }
        }

        // 5. Sorting
        $sortBy = $request->get('sort', 'order_asc');
        switch ($sortBy) {
            case 'order_asc':
                $query->orderBy('sort_order', 'asc')->orderBy('id', 'desc');
                break;
            case 'newest':
                $query->orderBy('id', 'desc');
                break;
            case 'oldest':
                $query->orderBy('id', 'asc');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price_high_low':
                $query->orderByRaw('COALESCE(sale_price, base_price) DESC');
                break;
            case 'price_low_high':
                $query->orderByRaw('COALESCE(sale_price, base_price) ASC');
                break;
            case 'stock_asc':
                $query->orderBy('stock_quantity', 'asc');
                break;
            case 'stock_desc':
                $query->orderBy('stock_quantity', 'desc');
                break;
            default:
                $query->orderBy('sort_order', 'asc')->orderBy('id', 'desc');
                break;
        }

        $products = $query->paginate(15)->withQueryString();

        // Facet Counts
        $totalCount = Product::count();
        $activeCount = Product::where('status', 'active')->count();
        $draftCount = Product::where('status', 'draft')->count();
        $outOfStockCount = Product::where('stock_quantity', '<=', 0)->count();
        $lowStockCount = Product::where('stock_quantity', '>', 0)->where('stock_quantity', '<=', 30)->count();

        $categories = Category::orderBy('name')->get();
        $collections = Collection::orderBy('title')->get();

        return view('admin.products.index', compact(
            'products',
            'categories',
            'collections',
            'totalCount',
            'activeCount',
            'draftCount',
            'outOfStockCount',
            'lowStockCount'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $this->ensureBadgeColumnExists();
        self::syncStorageToPublic();

        $categories = Category::orderBy('name')->get();
        $collections = Collection::orderBy('title')->get();

        return view('admin.products.create', compact('categories', 'collections'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->ensureBadgeColumnExists();
        self::syncStorageToPublic();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'hindi_title' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug'],
            'sku' => ['required', 'string', 'max:100', 'unique:products,sku'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'base_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:base_price'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'burn_time' => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'ingredients' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'how_to_use' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'is_bestseller' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'badge_color' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:active,draft,archived'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'collections' => ['nullable', 'array'],
            'collections.*' => ['exists:collections,id'],
            'primary_image_file' => ['nullable', 'image', 'max:4096'],
            'image_files.*' => ['nullable', 'image', 'max:4096'],
            'image_url' => ['nullable', 'string', 'max:500'],
            'variants' => ['nullable', 'array'],
            'variants.*.title' => ['nullable', 'string', 'max:255'],
            'variants.*.sku' => ['nullable', 'string', 'max:100'],
            'variants.*.price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.stock' => ['nullable', 'integer', 'min:0'],
        ]);

        DB::beginTransaction();
        try {
            // Slug generation
            $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
            // Ensure unique slug
            $originalSlug = $slug;
            $counter = 1;
            while (Product::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$counter}";
                $counter++;
            }

            $productData = [
                'category_id' => $validated['category_id'] ?? null,
                'title' => $validated['title'],
                'hindi_title' => $validated['hindi_title'] ?? null,
                'slug' => $slug,
                'sku' => $validated['sku'],
                'short_description' => $validated['short_description'] ?? null,
                'description' => $validated['description'] ?? null,
                'ingredients' => $validated['ingredients'] ?? null,
                'benefits' => $validated['benefits'] ?? null,
                'how_to_use' => $validated['how_to_use'] ?? null,
                'burn_time' => $validated['burn_time'] ?? null,
                'base_price' => $validated['base_price'],
                'sale_price' => $validated['sale_price'] ?? null,
                'stock_quantity' => $validated['stock_quantity'],
                'track_inventory' => true,
                'is_featured' => $request->boolean('is_featured'),
                'is_bestseller' => $request->boolean('is_bestseller'),
                'status' => $validated['status'],
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
            ];

            if (Schema::hasColumn('products', 'badge_text')) {
                $productData['badge_text'] = $request->filled('badge_text') ? trim($request->badge_text) : null;
            }
            if (Schema::hasColumn('products', 'badge_color')) {
                $productData['badge_color'] = $request->filled('badge_color') ? trim($request->badge_color) : null;
            }
            if (Schema::hasColumn('products', 'sort_order')) {
                $productData['sort_order'] = $request->filled('sort_order') ? (int)$request->sort_order : 0;
            }

            $product = Product::create($productData);

            // Sync Collections
            if (!empty($validated['collections'])) {
                $product->collections()->sync($validated['collections']);
            }

            // Image Upload Handling
            $hasPrimary = false;
            if ($request->hasFile('primary_image_file')) {
                $this->saveProductImage($request->file('primary_image_file'), $product, $product->title . ' Primary Image', true, 0);
                $hasPrimary = true;
            } elseif (!empty($validated['image_url'])) {
                $product->images()->create([
                    'image_path' => $validated['image_url'],
                    'alt_text' => $product->title . ' Primary Image',
                    'sort_order' => 0,
                    'is_primary' => true,
                ]);
                $hasPrimary = true;
            }

            if ($request->hasFile('image_files')) {
                foreach ($request->file('image_files') as $idx => $imgFile) {
                    $this->saveProductImage($imgFile, $product, $product->title . ' Gallery Image ' . ($idx + 1), !$hasPrimary && $idx === 0, $idx + 1);
                    if (!$hasPrimary && $idx === 0) $hasPrimary = true;
                }
            }

            // Fallback default image if none provided
            if (!$hasPrimary && $product->images()->count() === 0) {
                $product->images()->create([
                    'image_path' => 'assets/images/devi-refill-pack-card.jpg',
                    'alt_text' => $product->title,
                    'sort_order' => 0,
                    'is_primary' => true,
                ]);
            }

            // Create Variants
            if (!empty($validated['variants'])) {
                foreach ($validated['variants'] as $idx => $vData) {
                    if (!empty($vData['title'])) {
                        $product->variants()->create([
                            'title' => $vData['title'],
                            'sku' => !empty($vData['sku']) ? $vData['sku'] : $product->sku . '-V' . ($idx + 1),
                            'price' => !empty($vData['price']) ? $vData['price'] : ($product->sale_price ?? $product->base_price),
                            'compare_at_price' => !empty($vData['compare_at_price']) ? $vData['compare_at_price'] : $product->base_price,
                            'stock_quantity' => isset($vData['stock']) ? (int)$vData['stock'] : $product->stock_quantity,
                            'sort_order' => $idx,
                            'is_default' => $idx === 0,
                        ]);
                    }
                }
            } else {
                // Create single default variant
                $product->variants()->create([
                    'title' => 'Standard Pack',
                    'sku' => $product->sku,
                    'price' => $product->sale_price ?? $product->base_price,
                    'compare_at_price' => $product->base_price,
                    'stock_quantity' => $product->stock_quantity,
                    'sort_order' => 0,
                    'is_default' => true,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', "Product '{$product->title}' created successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified product (redirects to edit).
     */
    public function show(Product $product): RedirectResponse
    {
        return redirect()->route('admin.products.edit', $product);
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product): View
    {
        $this->ensureBadgeColumnExists();
        self::syncStorageToPublic();

        $product->load(['category', 'collections', 'variants', 'images']);
        $categories = Category::orderBy('name')->get();
        $collections = Collection::orderBy('title')->get();

        return view('admin.products.edit', compact('product', 'categories', 'collections'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $this->ensureBadgeColumnExists();
        self::syncStorageToPublic();

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'hindi_title' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:products,slug,' . $product->id],
            'sku' => ['required', 'string', 'max:100', 'unique:products,sku,' . $product->id],
            'category_id' => ['nullable', 'exists:categories,id'],
            'base_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:base_price'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'burn_time' => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'ingredients' => ['nullable', 'string'],
            'benefits' => ['nullable', 'string'],
            'how_to_use' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'is_bestseller' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'badge_text' => ['nullable', 'string', 'max:100'],
            'badge_color' => ['nullable', 'string', 'max:50'],
            'status' => ['required', 'in:active,draft,archived'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'collections' => ['nullable', 'array'],
            'collections.*' => ['exists:collections,id'],
            'primary_image_id' => ['nullable', 'exists:product_images,id'],
            'new_primary_file' => ['nullable', 'image', 'max:4096'],
            'new_gallery_files.*' => ['nullable', 'image', 'max:4096'],
            'new_image_url' => ['nullable', 'string', 'max:500'],
            'delete_images' => ['nullable', 'array'],
            'delete_images.*' => ['exists:product_images,id'],
            'variants' => ['nullable', 'array'],
            'variants.*.id' => ['nullable', 'exists:product_variants,id'],
            'variants.*.title' => ['nullable', 'string', 'max:255'],
            'variants.*.sku' => ['nullable', 'string', 'max:100'],
            'variants.*.price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.compare_at_price' => ['nullable', 'numeric', 'min:0'],
            'variants.*.stock' => ['nullable', 'integer', 'min:0'],
            'variants.*.is_default' => ['nullable', 'boolean'],
            'delete_variants' => ['nullable', 'array'],
            'delete_variants.*' => ['exists:product_variants,id'],
        ]);

        DB::beginTransaction();
        try {
            $productData = [
                'category_id' => $validated['category_id'] ?? null,
                'title' => $validated['title'],
                'hindi_title' => $validated['hindi_title'] ?? null,
                'slug' => Str::slug($validated['slug']),
                'sku' => $validated['sku'],
                'short_description' => $validated['short_description'] ?? null,
                'description' => $validated['description'] ?? null,
                'ingredients' => $validated['ingredients'] ?? null,
                'benefits' => $validated['benefits'] ?? null,
                'how_to_use' => $validated['how_to_use'] ?? null,
                'burn_time' => $validated['burn_time'] ?? null,
                'base_price' => $validated['base_price'],
                'sale_price' => $validated['sale_price'] ?? null,
                'stock_quantity' => $validated['stock_quantity'],
                'is_featured' => $request->boolean('is_featured'),
                'is_bestseller' => $request->boolean('is_bestseller'),
                'status' => $validated['status'],
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
            ];

            if (Schema::hasColumn('products', 'badge_text')) {
                $productData['badge_text'] = $request->filled('badge_text') ? trim($request->badge_text) : null;
            }
            if (Schema::hasColumn('products', 'badge_color')) {
                $productData['badge_color'] = $request->filled('badge_color') ? trim($request->badge_color) : null;
            }
            if (Schema::hasColumn('products', 'sort_order')) {
                $productData['sort_order'] = $request->filled('sort_order') ? (int)$request->sort_order : 0;
            }

            $product->update($productData);

            // Sync Collections
            $product->collections()->sync($validated['collections'] ?? []);

            // Delete selected images
            if (!empty($validated['delete_images'])) {
                ProductImage::whereIn('id', $validated['delete_images'])->where('product_id', $product->id)->delete();
            }

            // Upload new primary image
            if ($request->hasFile('new_primary_file')) {
                $product->images()->update(['is_primary' => false]);
                $this->saveProductImage($request->file('new_primary_file'), $product, $product->title . ' Primary Image', true, 0);
            } elseif (!empty($validated['new_image_url'])) {
                $product->images()->update(['is_primary' => false]);
                $product->images()->create([
                    'image_path' => $validated['new_image_url'],
                    'alt_text' => $product->title . ' Primary Image',
                    'sort_order' => 0,
                    'is_primary' => true,
                ]);
            } elseif (!empty($validated['primary_image_id'])) {
                $product->images()->update(['is_primary' => false]);
                $product->images()->where('id', $validated['primary_image_id'])->update(['is_primary' => true]);
            }

            // Upload new gallery images
            if ($request->hasFile('new_gallery_files')) {
                foreach ($request->file('new_gallery_files') as $idx => $imgFile) {
                    $this->saveProductImage($imgFile, $product, $product->title . ' Gallery Image', false, $product->images()->count() + $idx);
                }
            }

            // Update existing image sort orders
            if ($request->has('image_sort_orders')) {
                foreach ($request->input('image_sort_orders', []) as $imgId => $order) {
                    ProductImage::where('id', $imgId)->where('product_id', $product->id)->update([
                        'sort_order' => (int) $order,
                    ]);
                }
            }

            // Ensure at least one primary image exists
            if (!$product->images()->where('is_primary', true)->exists() && $product->images()->count() > 0) {
                $product->images()->first()->update(['is_primary' => true]);
            }

            // Delete removed variants
            if (!empty($validated['delete_variants'])) {
                ProductVariant::whereIn('id', $validated['delete_variants'])->where('product_id', $product->id)->delete();
            }

            // Update or Create Variants
            if (!empty($validated['variants'])) {
                foreach ($validated['variants'] as $idx => $vData) {
                    if (!empty($vData['title'])) {
                        if (!empty($vData['id'])) {
                            ProductVariant::where('id', $vData['id'])->where('product_id', $product->id)->update([
                                'title' => $vData['title'],
                                'sku' => !empty($vData['sku']) ? $vData['sku'] : $product->sku . '-V' . ($idx + 1),
                                'price' => !empty($vData['price']) ? $vData['price'] : ($product->sale_price ?? $product->base_price),
                                'compare_at_price' => !empty($vData['compare_at_price']) ? $vData['compare_at_price'] : $product->base_price,
                                'stock_quantity' => isset($vData['stock']) ? (int)$vData['stock'] : $product->stock_quantity,
                                'sort_order' => $idx,
                                'is_default' => $request->input('default_variant_index') == $idx,
                            ]);
                        } else {
                            $product->variants()->create([
                                'title' => $vData['title'],
                                'sku' => !empty($vData['sku']) ? $vData['sku'] : $product->sku . '-V' . ($idx + 1),
                                'price' => !empty($vData['price']) ? $vData['price'] : ($product->sale_price ?? $product->base_price),
                                'compare_at_price' => !empty($vData['compare_at_price']) ? $vData['compare_at_price'] : $product->base_price,
                                'stock_quantity' => isset($vData['stock']) ? (int)$vData['stock'] : $product->stock_quantity,
                                'sort_order' => $idx,
                                'is_default' => $idx === 0,
                            ]);
                        }
                    }
                }
            }

            // Ensure product has at least one default variant
            if ($product->variants()->count() === 0) {
                $product->variants()->create([
                    'title' => 'Standard Pack',
                    'sku' => $product->sku,
                    'price' => $product->sale_price ?? $product->base_price,
                    'compare_at_price' => $product->base_price,
                    'stock_quantity' => $product->stock_quantity,
                    'sort_order' => 0,
                    'is_default' => true,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', "Product '{$product->title}' updated successfully!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $title = $product->title;
        DB::beginTransaction();
        try {
            $product->collections()->detach();
            $product->variants()->delete();
            $product->images()->delete();
            $product->delete();

            DB::commit();
            return redirect()->route('admin.products.index')->with('success', "Product '{$title}' was deleted permanently.");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.products.index')->with('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active/draft status of a product quickly.
     */
    public function toggleStatus(Product $product): RedirectResponse
    {
        $newStatus = $product->status === 'active' ? 'draft' : 'active';
        $product->update(['status' => $newStatus]);

        $label = $newStatus === 'active' ? 'activated' : 'moved to draft';
        return back()->with('success', "Product '{$product->title}' is now {$label}.");
    }

    /**
     * Delete an image directly via AJAX without requiring form submission.
     */
    public function deleteImage(ProductImage $image)
    {
        try {
            $product = $image->product;
            $wasPrimary = (bool) $image->is_primary;

            // Remove file if exists and not default shared asset
            if (!empty($image->image_path)) {
                $cleanPath = ltrim($image->image_path, '/');
                $fullPath = public_path($cleanPath);
                if (file_exists($fullPath) && !str_contains($cleanPath, 'ishanaa-') && !str_contains($cleanPath, 'devi-refill')) {
                    @unlink($fullPath);
                }
            }

            $image->delete();

            $newPrimaryId = null;
            if ($wasPrimary && $product) {
                $firstRemaining = $product->images()->first();
                if ($firstRemaining) {
                    $firstRemaining->update(['is_primary' => true]);
                    $newPrimaryId = $firstRemaining->id;
                }
            }

            if (request()->expectsJson() || request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Image deleted successfully!',
                    'new_primary_id' => $newPrimaryId,
                ]);
            }

            return back()->with('success', 'Image deleted successfully!');
        } catch (\Throwable $e) {
            if (request()->expectsJson() || request()->ajax()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
            return back()->with('error', 'Failed to delete image: ' . $e->getMessage());
        }
    }

    /**
     * Reorder an image directly.
     */
    public function reorderImage(Request $request, ProductImage $image)
    {
        try {
            $newOrder = (int) $request->input('sort_order', 0);
            $image->update(['sort_order' => $newOrder]);

            return response()->json([
                'success' => true,
                'message' => 'Image order updated!',
            ]);
        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Update product sort order quickly from index table or edit page.
     */
    public function updateSortOrder(Request $request, Product $product)
    {
        try {
            $this->ensureBadgeColumnExists();
            $order = (int) $request->input('sort_order', 0);
            $product->update(['sort_order' => $order]);

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Order for '{$product->title}' updated to {$order}!",
                ]);
            }

            return back()->with('success', "Order for '{$product->title}' updated!");
        } catch (\Throwable $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
            }
            return back()->with('error', 'Failed to update order: ' . $e->getMessage());
        }
    }
}
