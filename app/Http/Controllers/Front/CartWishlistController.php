<?php

namespace AppHttpControllersFront;

use AppHttpControllersController;
use AppModelsProduct;
use IlluminateHttpRequest;
use IlluminateViewView;

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
