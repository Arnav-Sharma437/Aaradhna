<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Faq;
use App\Models\HomepageBanner;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the Sadhna.co homepage with all authentic sections.
     */
    public function index(): View
    {
        // 0. Active Dynamic Homepage Banners
        $banners = HomepageBanner::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        // 1. Bestsellers of the Month (Featured Collection)
        $bestsellers = Product::where('status', 'active')
            ->where('is_bestseller', true)
            ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
            ->take(8)
            ->get();

        if ($bestsellers->count() < 4) {
            $bestsellers = Product::where('status', 'active')
                ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
                ->take(8)
                ->get();
        }

        // 2. Sacred Fragrance Categories
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->take(4)
            ->get();

        // 3. New Launch & Refill Products
        $newLaunches = Product::where('status', 'active')
            ->where(function ($q) {
                $q->where('slug', 'like', '%refill%')
                  ->orWhere('slug', 'like', '%combo%')
                  ->orWhere('is_featured', true);
            })
            ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
            ->take(4)
            ->get();

        if ($newLaunches->count() < 4) {
            $newLaunches = Product::where('status', 'active')
                ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
                ->inRandomOrder()
                ->take(4)
                ->get();
        }

        // 4. Testimonials (Featured customer reviews)
        $testimonials = [
            [
                'name' => 'Ananya Deshmukh',
                'location' => 'Pune, Maharashtra',
                'rating' => 5,
                'product' => 'Camphor (कपूर) Bambooless Agarbatti',
                'title' => 'Purest aroma with zero eye burning!',
                'comment' => 'We do daily morning Sandhya Aarti. Standard market incense sticks always gave us headaches and black soot. Sadhna agarbatti is 100% pure, natural, and creates a serene temple ambience in our pooja room.'
            ],
            [
                'name' => 'Rajesh K. Sharma',
                'location' => 'Jaipur, Rajasthan',
                'rating' => 5,
                'product' => 'Sandalwood Sambrani Havan Cups',
                'title' => 'Instant miniature havan at home',
                'comment' => 'The havan cups burn completely with pure guggul and chandan resin. The divine fragrance purifies the entire house for hours. Blessed to have discovered Sadhna!'
            ],
            [
                'name' => 'Dr. Meenakshi Sundaram',
                'location' => 'Chennai, Tamil Nadu',
                'rating' => 5,
                'product' => 'Devi Refill Pack (100 Sticks)',
                'title' => 'Vedic authenticity at its best',
                'comment' => 'Knowing that bamboo burning is strictly forbidden in Sanatan scriptures, I was looking for authentic bambooless agarbatti. Sadhna delivers unmatched purity and ethical devotion.'
            ],
            [
                'name' => 'Vikramaditya Rathore',
                'location' => 'Udaipur, Rajasthan',
                'rating' => 5,
                'product' => 'Trial Pack Combo (5 Fragrances)',
                'title' => 'Outstanding quality and sacred feel',
                'comment' => 'Ordered the trial pack first and immediately subscribed for refill packs. Every fragrance—especially Camphor and Sandalwood—is ethereal and authentic.'
            ]
        ];

        // 5. Frequently Asked Questions
        $faqs = [
            [
                'q' => 'Why does Sanatan Dharma forbid burning bamboo (Bans)?',
                'a' => 'According to ancient Vedic scriptures, burning bamboo produces heavy metals and toxic fumes. Bamboo is also associated with lineage (Vansh). Sadhna crafts 100% bambooless agarbatti using sacred herbal binders, flower powders, and natural resins.'
            ],
            [
                'q' => 'What makes Sadhna products 100% charcoal-free?',
                'a' => 'Commercial black incense sticks use cheap coal dust that releases carbon monoxide and irritating black smoke. Sadhna uses pure wood powders, natural botanical extracts, and essential oils that produce pure, non-irritating white ash.'
            ],
            [
                'q' => 'How long does a Sadhna bambooless stick burn?',
                'a' => 'Each stick burns steadily for 45 to 50 minutes in a standard indoor room, leaving a long-lasting sacred aroma that lingers throughout the day.'
            ],
            [
                'q' => 'How does Sadhna support Gau Mata and rural artisans?',
                'a' => 'A portion of every purchase directly supports indigenous Gaushalas and empowers local women artisans in Vrindavan and Haridwar who handcraft each batch with mantra chanting and pure intent.'
            ],
            [
                'q' => 'What is the shipping time and delivery policy?',
                'a' => 'Orders are dispatched within 24–48 business hours from our sacred processing center. Delivery takes 3–5 business days across India with live WhatsApp & SMS tracking.'
            ]
        ];

        return view('front.home', compact(
            'banners',
            'bestsellers',
            'categories',
            'newLaunches',
            'testimonials',
            'faqs'
        ));
    }
}
