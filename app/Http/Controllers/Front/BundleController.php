<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class BundleController extends Controller
{
    /**
     * Buy Any 5 Trial Packs @ 799
     */
    public function trialPacks(): View
    {
        $dbProducts = Product::where('status', 'active')
            ->where(function ($q) {
                if (Schema::hasColumn('products', 'show_in_trial_bundle')) {
                    $q->where('show_in_trial_bundle', true);
                }
                $q->orWhereHas('collections', function ($cq) {
                    $cq->whereIn('slug', ['trial-packs', 'buy-5-trial-packs']);
                });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->with(['primaryImage', 'images', 'approvedReviews'])
            ->get();

        if ($dbProducts->isNotEmpty()) {
            $products = $dbProducts->map(function ($p) {
                $rating = 4.8;
                $reviews = 75;
                if ($p->approvedReviews && $p->approvedReviews->count() > 0) {
                    $rating = round($p->approvedReviews->avg('rating'), 1);
                    $reviews = $p->approvedReviews->count();
                } else {
                    $reviews = 50 + (abs(crc32($p->slug)) % 80);
                }

                $activePrice = $p->active_price ?? $p->sale_price ?? $p->base_price ?? 229;
                $basePrice = $p->base_price ?? 275;
                $mrp = $basePrice > $activePrice ? $basePrice : round($activePrice * 1.25);

                return [
                    'id' => $p->slug,
                    'title' => $p->title,
                    'price' => (float) $activePrice,
                    'mrp' => (float) $mrp,
                    'rating' => $rating,
                    'reviews' => $reviews,
                    'pack' => $p->pack_tag ?? '24 sticks',
                    'image' => $p->primary_image_url,
                ];
            })->toArray();
        } else {
            $products = [
            [
                'id' => 'trial-kesar-chandan',
                'title' => 'Kesar Chandan Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.72,
                'reviews' => 67,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-chandan',
                'title' => 'Chandan Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.70,
                'reviews' => 114,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-oudh',
                'title' => 'Oudh Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.76,
                'reviews' => 121,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-rose',
                'title' => 'Rose Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.83,
                'reviews' => 71,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-havan',
                'title' => 'Havan Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.81,
                'reviews' => 82,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-nagchampa',
                'title' => 'Nagchampa Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.72,
                'reviews' => 72,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-mogra',
                'title' => 'Mogra Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.70,
                'reviews' => 70,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-camphor',
                'title' => 'Camphor Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.81,
                'reviews' => 63,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-devi',
                'title' => 'Devi Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.74,
                'reviews' => 91,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-bhairav',
                'title' => 'Bhairav Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.77,
                'reviews' => 60,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-tulsi',
                'title' => 'Tulsi Rani Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.76,
                'reviews' => 66,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
            [
                'id' => 'trial-sandalwood',
                'title' => 'Sandalwood Trial Pack',
                'price' => 229,
                'mrp' => 275,
                'rating' => 4.70,
                'reviews' => 114,
                'pack' => '24 sticks',
                'image' => 'assets/images/incense-pack.jpg',
            ],
        ];
        }

        return view('front.bundles.trial-packs', compact('products'));
    }

    /**
     * Buy 2, Get 1 FREE + Chandan Trial Pack FREE @ 999
     */
    public function buy2Get1Free(): View
    {
        $dbProducts = Product::where('status', 'active')
            ->where(function ($q) {
                if (Schema::hasColumn('products', 'show_in_buy2get1_bundle')) {
                    $q->where('show_in_buy2get1_bundle', true);
                }
                $q->orWhereHas('collections', function ($cq) {
                    $cq->whereIn('slug', ['buy2get1', 'buy-2-get-1', 'buy-2-get-1-free']);
                });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->with(['primaryImage', 'images', 'approvedReviews'])
            ->get();

        if ($dbProducts->isNotEmpty()) {
            $products = $dbProducts->map(function ($p) {
                $rating = 4.8;
                $reviews = 220;
                if ($p->approvedReviews && $p->approvedReviews->count() > 0) {
                    $rating = round($p->approvedReviews->avg('rating'), 1);
                    $reviews = $p->approvedReviews->count();
                } else {
                    $reviews = 150 + (abs(crc32($p->slug)) % 250);
                }

                $activePrice = $p->active_price ?? $p->sale_price ?? $p->base_price ?? 489;
                $basePrice = $p->base_price ?? 700;
                $mrp = $basePrice > $activePrice ? $basePrice : round($activePrice * 1.45);

                return [
                    'id' => $p->slug,
                    'title' => $p->title,
                    'price' => (float) $activePrice,
                    'mrp' => (float) $mrp,
                    'rating' => $rating,
                    'reviews' => $reviews,
                    'pack' => $p->pack_tag ?? '100 sticks',
                    'image' => $p->primary_image_url,
                ];
            })->toArray();
        } else {
            $products = [
            [
                'id' => 'refill-sandalwood',
                'title' => 'Sandalwood Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.72,
                'reviews' => 1330,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-mogra',
                'title' => 'Mogra Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.69,
                'reviews' => 378,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-rose',
                'title' => 'Rose Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.72,
                'reviews' => 405,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-kesar-chandan',
                'title' => 'Kesar Chandan Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.68,
                'reviews' => 344,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-oudh',
                'title' => 'Oudh Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.70,
                'reviews' => 204,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-devi',
                'title' => 'Devi Refill Pack',
                'price' => 489,
                'mrp' => 999,
                'rating' => 4.74,
                'reviews' => 270,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-nagchampa',
                'title' => 'Nagchampa Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.75,
                'reviews' => 206,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-bhairav',
                'title' => 'Bhairav Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.70,
                'reviews' => 227,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-kasturi',
                'title' => 'Kasturi Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.79,
                'reviews' => 210,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-camphor',
                'title' => 'Camphor Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.75,
                'reviews' => 212,
                'pack' => '100 sticks',
                'image' => 'assets/images/camphor-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-havan',
                'title' => 'Havan Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.75,
                'reviews' => 208,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
            [
                'id' => 'refill-tulsi',
                'title' => 'Tulsi Refill Pack',
                'price' => 489,
                'mrp' => 700,
                'rating' => 4.83,
                'reviews' => 215,
                'pack' => '100 sticks',
                'image' => 'assets/images/devi-refill-pack-card.jpg',
            ],
        ];
        }

        return view('front.bundles.buy2-get1', compact('products'));
    }
}