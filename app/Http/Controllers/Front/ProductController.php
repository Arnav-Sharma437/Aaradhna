<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\ReviewMedia;
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
                'images',
                'variants',
                'approvedReviews.media',
            ])
            ->first();

        // If still not found, try finding by partial slug match
        if (!$product) {
            $product = Product::where('status', 'active')
                ->where('slug', 'LIKE', '%' . explode('-', $slug)[0] . '%')
                ->with([
                    'category',
                    'primaryImage',
                    'images',
                    'variants',
                    'approvedReviews',
                ])
                ->first();
        }

        // Fallback to first active product if slug not found
        if (!$product) {
            $product = Product::where('status', 'active')
                ->with([
                    'category',
                    'primaryImage',
                    'images',
                    'variants',
                    'approvedReviews',
                ])
                ->first();
        }

        // 4 Related Products from same category or active products
        $relatedProducts = Product::where('status', 'active')
            ->where('id', '!=', $product ? $product->id : 0)
            ->with(['variants', 'primaryImage', 'images', 'category', 'approvedReviews'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $filler = Product::where('status', 'active')
                ->where('id', '!=', $product ? $product->id : 0)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->with(['variants', 'primaryImage', 'images', 'category', 'approvedReviews'])
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($filler);
        }

        // Reviews Statistics
        $reviews = ($product && $product->approvedReviews) ? $product->approvedReviews : collect();
        $totalReviews = $reviews->count() ?: 219;
        $avgRating = $reviews->count() > 0 ? round($reviews->avg('rating'), 1) : 4.9;
        
        $ratingCounts = [5 => 195, 4 => 20, 3 => 4, 2 => 0, 1 => 0];
        foreach ($reviews as $rev) {
            $r = (int)$rev->rating;
            if (isset($ratingCounts[$r])) {
                $ratingCounts[$r]++;
            }
        }

        // Default variant or first variant
        $defaultVariant = ($product && $product->variants) ? ($product->variants->firstWhere('is_default', true) ?? $product->variants->first()) : null;

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
            ->take(6)
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

    /**
     * Store a newly submitted customer review (Pending admin approval).
     */
    public function storeReview(Request $request, Product $product)
    {
        $validated = $request->validate([
            'reviewer_name' => 'nullable|string|max:100',
            'reviewer_email' => 'nullable|email|max:150',
            'rating' => 'nullable|integer|min:1|max:5',
            'title' => 'nullable|string|max:200',
            'review_text' => 'nullable|string|max:3000',
            'images' => 'nullable|array|max:4',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $name = !empty($validated['reviewer_name']) ? trim($validated['reviewer_name']) : 'Anonymous';
        $email = !empty($validated['reviewer_email']) ? trim($validated['reviewer_email']) : 'anonymous@manglam.co';
        $rating = !empty($validated['rating']) ? (int) $validated['rating'] : 5;
        $title = !empty($validated['title']) ? trim($validated['title']) : null;
        $text = !empty($validated['review_text']) ? trim($validated['review_text']) : 'Authentic sacred fragrance experience.';

        $review = Review::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'reviewer_name' => $name,
            'reviewer_email' => $email,
            'rating' => $rating,
            'title' => $title,
            'review_text' => $text,
            'is_verified_buyer' => auth()->check(),
            'status' => 'pending', // Pending moderation approval
        ]);

        if ($request->hasFile('images')) {
            $uploadDir = public_path('uploads/reviews');
            if (!file_exists($uploadDir)) {
                @mkdir($uploadDir, 0777, true);
            }
            foreach ($request->file('images') as $image) {
                if ($image && $image->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    $image->move($uploadDir, $filename);
                    $path = 'uploads/reviews/' . $filename;
                    ReviewMedia::create([
                        'review_id' => $review->id,
                        'media_path' => $path,
                        'media_type' => 'image',
                    ]);
                }
            }
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Dhanyawad! Your review and photos have been submitted for moderation. It will be visible after approval.',
            ]);
        }

        return redirect()->back()->with('review_submitted', 'Dhanyawad! Your review has been submitted and is pending verification. It will appear once approved by our team.');
    }
}
