<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollectionController extends Controller
{
    /**
     * Display the specified collection or all products with full luxury reactive filters and sorting.
     */
    public function show(Request $request, string $slug = 'all'): View|JsonResponse
    {
        // 1. Fetch or synthesize Collection / Category Meta
        $dbCollection = Collection::where('slug', $slug)->where('is_active', true)->first();
        $category = Category::where('slug', $slug)->where('is_active', true)->first();

        // Cross-match between category and collection if only one found by slug
        if (!$category && $dbCollection) {
            $category = Category::where('slug', $dbCollection->slug)
                ->orWhere('name', 'LIKE', '%' . $dbCollection->title . '%')
                ->first();
        }
        if (!$dbCollection && $category) {
            $dbCollection = Collection::where('slug', $category->slug)
                ->orWhere('title', 'LIKE', '%' . $category->name . '%')
                ->first();
        }

        if ($slug === 'all') {
            $collection = $dbCollection ?? (object) [
                'title' => 'All Sacred Products',
                'slug' => 'all',
                'description' => 'Discover our complete range of 100% natural pooja samagri, bambooless incense sticks, organic havan cups, and sacred attar sprays.',
                'banner_path' => null,
                'meta_title' => 'Shop Pure Pooja Samagri & Bambooless Agarbatti | Mangalam.co',
                'meta_description' => 'Explore 100% pure Vedic pooja essentials crafted without bamboo, toxic charcoal, or synthetic aromas.',
            ];
            $query = Product::where('status', 'active');
        } elseif ($slug === 'best-seller-combo' || $slug === 'best-seller' || $slug === 'best-sellers') {
            $collection = $dbCollection ?? (object) [
                'title' => 'Best Seller Combo',
                'slug' => $slug,
                'description' => 'Explore our top-rated, most celebrated sacred Vedic combos and bestsellers.',
                'banner_path' => null,
                'meta_title' => 'Best Seller Combo — 100% Pure & Vedic | Mangalam.co',
                'meta_description' => 'Explore our top-rated, most celebrated sacred Vedic combos.',
            ];
            $query = Product::where('status', 'active')
                ->where(function ($q) use ($dbCollection, $category) {
                    $q->where('is_bestseller', true)
                      ->orWhere('slug', 'bestseller-combo')
                      ->orWhere('slug', 'pack-of-six')
                      ->orWhere('slug', 'like', '%bestseller%')
                      ->orWhere('title', 'like', '%bestseller%');

                    if ($dbCollection) {
                        $q->orWhereHas('collections', function ($cq) use ($dbCollection) {
                            $cq->where('collections.id', $dbCollection->id);
                        });
                    }
                    if ($category) {
                        $q->orWhere('category_id', $category->id);
                    }
                });
        } elseif ($dbCollection || $category) {
            $collection = $dbCollection ?? (object) [
                'title' => $category->name,
                'slug' => $category->slug,
                'description' => $category->description ?? $category->subtitle,
                'banner_path' => $category->banner_path,
                'meta_title' => $category->meta_title ?? "{$category->name} — 100% Pure & Vedic | Mangalam.co",
                'meta_description' => $category->meta_description ?? $category->description,
            ];

            $query = Product::where('status', 'active')
                ->where(function ($q) use ($dbCollection, $category) {
                    $hasCondition = false;
                    if ($category) {
                        $q->where('category_id', $category->id);
                        $hasCondition = true;
                    }
                    if ($dbCollection) {
                        $method = $hasCondition ? 'orWhereHas' : 'whereHas';
                        $q->$method('collections', function ($cq) use ($dbCollection) {
                            $cq->where('collections.id', $dbCollection->id);
                        });
                    }
                });
        } else {
            $collection = (object) [
                'title' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'description' => 'Explore our pure Vedic pooja essentials.',
                'banner_path' => null,
                'meta_title' => ucwords(str_replace('-', ' ', $slug)) . ' — 100% Pure & Vedic | Mangalam.co',
                'meta_description' => 'Explore pure Vedic pooja essentials crafted without bamboo or synthetic aromas.',
            ];
            // Filter strictly by keyword matching instead of dumping all products
            $keyword = str_replace('-', ' ', $slug);
            $query = Product::where('status', 'active')
                ->where(function ($q) use ($slug, $keyword) {
                    $q->where('slug', 'LIKE', "%{$slug}%")
                      ->orWhere('title', 'LIKE', "%{$keyword}%")
                      ->orWhereHas('category', function ($cq) use ($slug, $keyword) {
                          $cq->where('slug', 'LIKE', "%{$slug}%")
                             ->orWhere('name', 'LIKE', "%{$keyword}%");
                      });
                });
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
            $avail = is_array($request->availability) ? $request->availability : [$request->availability];
            if (in_array('in_stock', $avail) && !in_array('out_of_stock', $avail)) {
                $query->where('stock_quantity', '>', 0);
            } elseif (in_array('out_of_stock', $avail) && !in_array('in_stock', $avail)) {
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
                $query->orderBy('sort_order', 'asc')->orderByDesc('is_featured')->orderByDesc('is_bestseller')->orderBy('id', 'desc');
                break;
        }

        // 4. Paginate Products
        $products = $query->paginate(12)->withQueryString();

        // 4.1 Handle AJAX Infinite Scroll request
        if ($request->ajax() || $request->wantsJson() || $request->filled('ajax')) {
            $cardsHtml = '';
            foreach ($products as $index => $product) {
                $cardsHtml .= '<div class="product-item reveal-from-left" data-index="' . $index . '">' . view('components.product-card', ['product' => $product])->render() . '</div>';
            }
            return response()->json([
                'html' => $cardsHtml,
                'has_more' => $products->hasMorePages(),
                'next_page_url' => $products->nextPageUrl(),
                'current_page' => $products->currentPage(),
                'total' => $products->total(),
            ]);
        }

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
