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
            'kesar-chandan' => 'swarna-pushpa',
            'marygold' => 'swarna-pushpa',
            'marigold' => 'swarna-pushpa',
            'swarna-pushpa-40' => 'swarna-pushpa',
            'naagchampa' => 'divya-naagchampa',
            'divya-naagchampa-40' => 'divya-naagchampa',
            'devi-refill-pack' => 'divya-naagchampa-100',
            'chandan' => 'chandan-saanjh',
            'chandan-saanjh-40' => 'chandan-saanjh',
            'oudh' => 'royal-oudh',
            'royal-oudh-40' => 'royal-oudh',
            'oudh-classic' => 'royal-oudh',
            'oudh-bambooless-incense-sticks' => 'royal-oudh',
            'mongra' => 'mogra-noor',
            'mogra' => 'mogra-noor',
            'mogra-noor-40' => 'mogra-noor',
            'gulab' => 'gulab-rooh',
            'rose' => 'gulab-rooh',
            'gulab-rooh-40' => 'gulab-rooh',
            'lavender' => 'lavender-veda',
            'lavender-veda-40' => 'lavender-veda',
            'bambooless-2-combo-pack' => 'pack-of-six',
            'bambooless-3-combo-pack' => 'pack-of-six',
            'kesar-chandan-dhoop-cones' => 'chandan-saanjh',
            'chandan-cones' => 'chandan-saanjh',
            'sandalwood-dhoop-cones' => 'chandan-saanjh',
            'google-dhoop' => 'swarna-pushpa',
            'loban' => 'divya-naagchampa',
            'havan-cup' => 'pitambara-havan',
        ];

        $targetSlug = $aliases[$slug] ?? $slug;

        if ($slug === 'pitambara-havan' || $targetSlug === 'pitambara-havan') {
            return $this->showPitambara();
        }

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

        return view('front.products.show', compact(
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
        $product = Product::where('status', 'active')
            ->where(function ($q) {
                $q->where('slug', 'pitambara-havan')
                  ->orWhere('slug', 'LIKE', '%pitambara%');
            })
            ->with(['variants', 'primaryImage', 'images', 'category', 'faqs', 'approvedReviews'])
            ->first();

        $relatedProducts = Product::where('status', 'active')
            ->when($product, fn($q) => $q->where('id', '!=', $product->id))
            ->with(['variants', 'primaryImage', 'images', 'category', 'approvedReviews'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        $defaultVariant = $product ? ($product->variants->firstWhere('is_default', true) ?? $product->variants->first()) : null;
        $reviews = $product ? $product->approvedReviews : collect();
        $totalReviews = $reviews->count();
        $avgRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 5.0;
        $ratingCounts = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];

        return view('front.products.pitambara-havan', compact(
            'product',
            'defaultVariant',
            'relatedProducts',
            'totalReviews',
            'avgRating',
            'ratingCounts'
        ));
    }

    /**
     * Handle VIP Pre-Booking reservation form submission.
     */
    public function storePreBooking(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:25',
            'email' => 'nullable|email|max:255',
            'city' => 'nullable|string|max:255',
            'pack_preference' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
        ]);

        $validated['product_name'] = 'Mangalam Pitambara Havan';
        $validated['status'] = 'confirmed';

        try {
            \App\Models\PreBooking::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::warning('PreBooking create notice: ' . $e->getMessage());
        }

        return back()->with('prebooking_success', 'धन्यवाद! Your VIP Pre-booking for Mangalam Pitambara Havan is confirmed. Our Vedic care team will notify you with priority invitation before the public launch.');
    }
}
