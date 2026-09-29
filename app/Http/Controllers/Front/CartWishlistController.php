<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartWishlistController extends Controller
{
    /**
     * Shopping Cart Full Page View
     */
    public function cart(): View
    {
        $featuredProducts = Product::where('status', 'active')
            ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
            ->take(4)
            ->get();

        return view('front.cart.index', compact('featuredProducts'));
    }

    /**
     * Sacred Wishlist Full Page View
     */
    public function wishlist(): View
    {
        $featuredProducts = Product::where('status', 'active')
            ->with(['category', 'primaryImage', 'images', 'variants', 'approvedReviews'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('front.wishlist.index', compact('featuredProducts'));
    }
}
