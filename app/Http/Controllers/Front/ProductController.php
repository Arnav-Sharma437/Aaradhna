<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display the specified product detail page.
     */
    public function show(string $slug): View
    {
        // Aliases mapping for promotional, card, and legacy URLs
        $aliases = [
            'devi-refill-pack' => 'naagchampa',
            'camphor-bambooless-incense-sticks' => 'havan-bambooless',
            'camphor-refill-pack' => 'havan-bambooless',
            'camphor' => 'havan-bambooless',
            'oudh-bambooless-incense-sticks' => 'oudh',
            'oudh-classic' => 'oudh',
            'kesar-chandan-dhoop-cones' => 'sandalwood-dhoop-cones',
            'chandan-cones' => 'sandalwood-dhoop-cones',
            'chandan' => 'chandan',
        ];

        $targetSlug = $aliases[$slug] ?? $slug;

        $product = Product::where('status', 'active')
            ->where(function ($q) use ($slug, $targetSlug) {
                $q->where('slug', $slug)
                  ->orWhere('slug', $targetSlug);
            })
            ->with([
                'category',
                'primaryImage',
                'images' => function ($q) {
                    $q->orderBy('is_primary', 'desc')->orderBy('sort_order', 'asc');
                },
                'variants' => function ($q) {
                    $q->orderBy('sort_order', 'asc');
                },
                'faqs' => function ($q) {
                    $q->where('is_active', true)->orderBy('sort_order', 'asc');
                },
                'approvedReviews',
            ])
            ->first();

        // If still not found, try finding by partial slug match before 404
        if (!$product) {
            $product = Product::where('status', 'active')
                ->where('slug', 'LIKE', '%' . explode('-', $slug)[0] . '%')
                ->with([
                    'category',
                    'primaryImage',
                    'images' => function ($q) {
                        $q->orderBy('is_primary', 'desc')->orderBy('sort_order', 'asc');
                    },
                    'variants' => function ($q) {
                        $q->orderBy('sort_order', 'asc');
                    },
                    'faqs' => function ($q) {
                        $q->where('is_active', true)->orderBy('sort_order', 'asc');
                    },
                    'approvedReviews',
                ])
                ->firstOrFail();
        }

        // 4 Related Products from same category or active products
        $relatedProducts = Product::where('status', 'active')
            ->where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                if ($product->category_id) {
                    $q->where('category_id', $product->category_id);
                }
            })
            ->with(['variants', 'primaryImage', 'images', 'category', 'approvedReviews'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $filler = Product::where('status', 'active')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->with(['variants', 'primaryImage', 'images', 'category', 'approvedReviews'])
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($filler);
        }

        // Reviews Statistics
        $reviews = $product->approvedReviews;
        $totalReviews = $reviews->count();
        $avgRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 5.0;
        
        $ratingCounts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];
        foreach ($reviews as $rev) {
            $r = (int)$rev->rating;
            if (isset($ratingCounts[$r])) {
                $ratingCounts[$r]++;
            }
        }

        // Default variant or first variant
        $defaultVariant = $product->variants->firstWhere('is_default', true) ?? $product->variants->first();

        $viewName = ($product->slug === 'pitambara-havan' || $slug === 'pitambara-havan') ? 'front.products.pitambara-havan' : 'front.products.show';

        return view($viewName, compact(
            'product',
            'defaultVariant',
            'relatedProducts',
            'totalReviews',
            'avgRating',
            'ratingCounts'
        ));
    }

    /**
     * Dedicated direct route for Pitambara Havan landing page.
     */
    public function showPitambara(): View
    {
        return $this->show('pitambara-havan');
    }
}
