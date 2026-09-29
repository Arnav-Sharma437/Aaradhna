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
        $product = Product::where('slug', $slug)
            ->where('status', 'active')
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

        return view('front.products.show', compact(
            'product',
            'defaultVariant',
            'relatedProducts',
            'totalReviews',
            'avgRating',
            'ratingCounts'
        ));
    }
}
