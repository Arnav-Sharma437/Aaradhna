<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollectionController extends Controller
{
    /**
     * Display the specified collection or all products with full luxury reactive filters and sorting.
     */
    public function show(Request $request, string $slug = 'all'): View
    {
        // 1. Fetch or synthesize Collection Meta
        $dbCollection = Collection::where('slug', $slug)->where('is_active', true)->first();

        if ($slug === 'all') {
            $collection = $dbCollection ?? (object) [
                'title' => 'All Sacred Products',
                'slug' => 'all',
                'description' => 'Discover our complete range of 100% natural pooja samagri, bambooless incense sticks, organic havan cups, and sacred attar sprays.',
                'banner_path' => null,
                'meta_title' => 'Shop Pure Pooja Samagri & Bambooless Agarbatti | Aaradhna.co',
                'meta_description' => 'Explore 100% pure Vedic pooja essentials crafted without bamboo, toxic charcoal, or synthetic aromas.',
            ];
            $query = Product::where('status', 'active');
        } elseif ($dbCollection) {
            $collection = $dbCollection;
            $query = $collection->products()->where('status', 'active');
        } else {
            // If slug matches a category directly
            $category = Category::where('slug', $slug)->where('is_active', true)->firstOrFail();
            $collection = (object) [
                'title' => $category->name,
                'slug' => $category->slug,
                'description' => $category->description ?? $category->subtitle,
                'banner_path' => $category->banner_path,
                'meta_title' => $category->meta_title ?? "{$category->name} — 100% Pure & Vedic | Aaradhna.co",
                'meta_description' => $category->meta_description ?? $category->description,
            ];
            $query = Product::where('category_id', $category->id)->where('status', 'active');
        }

        // Eager load necessary relationships
        $query->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews']);

        // 2. Filters
        // Search Keyword Filter
        if ($request->filled('search') || $request->filled('q')) {
            $searchTerm = trim($request->get('search', $request->get('q')));
            $query->where(function ($sq) use ($searchTerm) {
                $sq->where('title', 'LIKE', "%{$searchTerm}%")
                   ->orWhere('hindi_title', 'LIKE', "%{$searchTerm}%")
                   ->orWhere('sku', 'LIKE', "%{$searchTerm}%")
                   ->orWhere('short_description', 'LIKE', "%{$searchTerm}%")
                   ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                   ->orWhere('ingredients', 'LIKE', "%{$searchTerm}%")
                   ->orWhereHas('category', function ($cq) use ($searchTerm) {
                       $cq->where('name', 'LIKE', "%{$searchTerm}%");
                   });
            });
        }

        // Availability Filter
        if ($request->filled('availability')) {
            if ($request->availability === 'in_stock') {
                $query->where('stock_quantity', '>', 0);
            } elseif ($request->availability === 'out_of_stock') {
                $query->where('stock_quantity', '<=', 0);
            }
        }

        // Price Min/Max Filter
        if ($request->filled('price_min')) {
            $query->where(function ($q) use ($request) {
                $q->where(function ($sq) use ($request) {
                    $sq->whereNotNull('sale_price')->where('sale_price', '>=', (float) $request->price_min);
                })->orWhere(function ($sq) use ($request) {
                    $sq->whereNull('sale_price')->where('base_price', '>=', (float) $request->price_min);
                });
            });
        }
        if ($request->filled('price_max')) {
            $query->where(function ($q) use ($request) {
                $q->where(function ($sq) use ($request) {
                    $sq->whereNotNull('sale_price')->where('sale_price', '<=', (float) $request->price_max);
                })->orWhere(function ($sq) use ($request) {
                    $sq->whereNull('sale_price')->where('base_price', '<=', (float) $request->price_max);
                });
            });
        }

        // Category Filter
        if ($request->filled('category')) {
            $cat = Category::where('slug', $request->category)->first();
            if ($cat) {
                $query->where('category_id', $cat->id);
            }
        }

        // Pack Size Filter (Searches in variants, title, or description)
        if ($request->filled('pack_size')) {
            $packSize = $request->pack_size;
            $query->where(function ($pq) use ($packSize) {
                $pq->where('title', 'LIKE', "%{$packSize}%")
                   ->orWhere('description', 'LIKE', "%{$packSize}%")
                   ->orWhereHas('variants', function ($vq) use ($packSize) {
                       $vq->where('title', 'LIKE', "%{$packSize}%");
                   });
            });
        }

        // 3. Sorting
        $sortBy = $request->get('sort_by', 'featured');

        switch ($sortBy) {
            case 'best_selling':
                $query->orderByDesc('is_bestseller')->orderByDesc('stock_quantity');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'price_low_high':
                $query->orderByRaw('COALESCE(sale_price, base_price) ASC');
                break;
            case 'price_high_low':
                $query->orderByRaw('COALESCE(sale_price, base_price) DESC');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'featured':
            default:
                $query->orderByDesc('is_featured')->orderByDesc('is_bestseller')->orderBy('id', 'asc');
                break;
        }

        // 4. Paginate Products
        $products = $query->paginate(12)->withQueryString();

        // 5. Facet Counts
        $allCategories = Category::where('is_active', true)->withCount(['products' => function ($pq) {
            $pq->where('status', 'active');
        }])->orderBy('sort_order')->get();

        $totalActiveCount = Product::where('status', 'active')->count();
        $inStockCount = Product::where('status', 'active')->where('stock_quantity', '>', 0)->count();
        $outOfStockCount = Product::where('status', 'active')->where('stock_quantity', '<=', 0)->count();

        // Calculate dynamic min and max prices for range slider
        $minProductPrice = (int) floor(Product::where('status', 'active')->min('sale_price') ?: 100);
        $maxProductPrice = (int) ceil(Product::where('status', 'active')->max('base_price') ?: 1999);

        return view('front.collections.show', compact(
            'collection',
            'products',
            'slug',
            'sortBy',
            'allCategories',
            'totalActiveCount',
            'inStockCount',
            'outOfStockCount',
            'minProductPrice',
            'maxProductPrice'
        ));
    }
}
