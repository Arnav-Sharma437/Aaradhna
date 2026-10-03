<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CollectionController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartWishlistController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\DiscountSignupController;

// Storefront Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search Routes (Full Search & Predictive AJAX Suggestions)
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/api/search/predictive', [SearchController::class, 'predictive'])->name('search.predictive');

// Catalog / Collection Routes
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');

// Product Detail Routes
Route::get('/pitambara-havan', [ProductController::class, 'showPitambara'])->name('products.pitambara');
Route::post('/pitambara-havan/pre-book', [ProductController::class, 'storePreBooking'])->name('pitambara.prebook');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::post('/products/{product}/reviews', [ProductController::class, 'storeReview'])->name('products.reviews.store');

// Bundle Builder Offers (Super Save Offers)
use App\Http\Controllers\Front\BundleController;
Route::get('/bundles/buy-any-5-trial-packs', [BundleController::class, 'trialPacks'])->name('bundles.trial-packs');
Route::get('/bundles/buy-2-get-1-free', [BundleController::class, 'buy2Get1Free'])->name('bundles.buy2get1');

// Cart & Wishlist Routes
Route::get('/cart', [CartWishlistController::class, 'cart'])->name('cart.index');
Route::get('/wishlist', [CartWishlistController::class, 'wishlist'])->name('wishlist.index');

// Static, About, Contact & Policy Routes
use App\Http\Controllers\Front\PageController;
Route::get('/about', [PageController::class, 'about'])->name('pages.about');
Route::get('/about-us', [PageController::class, 'about'])->name('pages.about-us');
Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');
Route::get('/contact-us', [PageController::class, 'contact'])->name('pages.contact-us');
Route::post('/contact/submit', [PageController::class, 'submitContact'])->name('pages.contact.submit');
Route::get('/pages/{slug}', [PageController::class, 'policy'])->name('pages.show');

// Storage & Uploads Direct File Fallback Route (Guarantees image delivery even without symlink)
Route::get('/storage/{path}', function (string $path) {
    $storageFile = storage_path('app/public/' . $path);
    if (file_exists($storageFile)) {
        return response()->file($storageFile);
    }
    $uploadFile = public_path('uploads/' . $path);
    if (file_exists($uploadFile)) {
        return response()->file($uploadFile);
    }
    abort(404);
})->where('path', '.*');

Route::get('/uploads/{path}', function (string $path) {
    $uploadFile = public_path('uploads/' . $path);
    if (file_exists($uploadFile)) {
        return response()->file($uploadFile);
    }
    $storageFile = storage_path('app/public/' . $path);
    if (file_exists($storageFile)) {
        return response()->file($storageFile);
    }
    abort(404);
})->where('path', '.*');

// Placeholder Blog Route
Route::get('/blogs/{slug}', function (string $slug) {
    return response("<h1>Aaradhna Blog — " . e($slug) . "</h1>", 200);
})->name('blogs.index');

// =========================================================================
// CUSTOMER AUTHENTICATION & ACCOUNT PORTAL ROUTES
// =========================================================================
use App\Http\Controllers\Front\AccountAuthController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\CheckoutController;

// Public Auth Routes
Route::get('/login', [AccountAuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AccountAuthController::class, 'showRegister'])->name('register');
Route::get('/account/login', [AccountAuthController::class, 'showLogin'])->name('account.login');
Route::post('/account/login', [AccountAuthController::class, 'login'])->name('account.login.submit');
Route::post('/account/demo-login', [AccountAuthController::class, 'demoLogin'])->name('account.demo-login');
Route::get('/account/register', [AccountAuthController::class, 'showRegister'])->name('account.register');
Route::post('/account/register', [AccountAuthController::class, 'register'])->name('account.register.submit');
Route::post('/account/logout', [AccountAuthController::class, 'logout'])->name('account.logout');

// Order Placement & Payment Verification API (Razorpay & Checkout)
Route::post('/api/checkout/create-order', [CheckoutController::class, 'createOrder'])->name('checkout.create-order');
Route::post('/api/checkout/verify-payment', [CheckoutController::class, 'verifyPayment'])->name('checkout.verify-payment');

// Discount Signup Survey & Coupon Validation API
Route::post('/discount-signup/submit', [DiscountSignupController::class, 'store'])->name('discount-signup.store');
Route::post('/api/coupons/validate', [DiscountSignupController::class, 'validateCoupon'])->name('coupons.validate');

// Protected Customer Account Routes
Route::middleware(['auth'])->prefix('account')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/dashboard', [AccountController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AccountController::class, 'index'])->name('profile');
    Route::put('/profile', [AccountController::class, 'updateProfile'])->name('profile.update');
    Route::put('/password', [AccountController::class, 'updatePassword'])->name('password.update');
    Route::get('/orders', [AccountController::class, 'index'])->name('orders');
    Route::get('/orders/{orderNumber}', [AccountController::class, 'orderDetail'])->name('orders.show');
    Route::get('/addresses', [AccountController::class, 'index'])->name('addresses');
    Route::post('/addresses', [AccountController::class, 'storeAddress'])->name('addresses.store');
    Route::put('/addresses/{id}', [AccountController::class, 'updateAddress'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AccountController::class, 'deleteAddress'])->name('addresses.destroy');
    Route::patch('/addresses/{id}/default', [AccountController::class, 'setDefaultAddress'])->name('addresses.default');
    Route::get('/wishlist', function () {
        return redirect()->route('wishlist.index');
    })->name('wishlist');
});

// =========================================================================
// ADMIN AUTHENTICATION & BACKEND STORE MANAGEMENT ROUTES
// =========================================================================
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\InventoryController as AdminInventoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\DiscountSignupController as AdminDiscountSignupController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\BannerController as AdminBannerController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // 1. Orders Management Module
        Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
        Route::patch('/orders/{order}/tracking', [AdminOrderController::class, 'updateTracking'])->name('orders.update-tracking');
        Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'update', 'destroy']);

        // 2. Products Module
        Route::patch('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::resource('products', AdminProductController::class);

        // 3. Inventory Tracking Module
        Route::get('/inventory', [AdminInventoryController::class, 'index'])->name('inventory.index');
        Route::post('/inventory/products/{product}/adjust', [AdminInventoryController::class, 'adjust'])->name('inventory.adjust');
        Route::patch('/inventory/products/{product}/toggle-tracking', [AdminInventoryController::class, 'toggleTracking'])->name('inventory.toggle-tracking');
        Route::post('/inventory/bulk-update', [AdminInventoryController::class, 'bulkUpdate'])->name('inventory.bulk-update');
        Route::get('/inventory/history', [AdminInventoryController::class, 'history'])->name('inventory.history');

        // 4. Categories Module
        Route::patch('/categories/{category}/toggle-status', [AdminCategoryController::class, 'toggleStatus'])->name('categories.toggle-status');
        Route::resource('categories', AdminCategoryController::class);

        // 5. Collections Module
        Route::patch('/collections/{collection}/toggle-status', [AdminCollectionController::class, 'toggleStatus'])->name('collections.toggle-status');
        Route::resource('collections', AdminCollectionController::class);

        // 6. Customers 360 Module
        Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{customer}', [AdminCustomerController::class, 'show'])->name('customers.show');
        Route::patch('/customers/{customer}/toggle-status', [AdminCustomerController::class, 'toggleStatus'])->name('customers.toggle-status');

        // 7. Discounts & Promo Codes Module
        Route::patch('/coupons/{coupon}/toggle-status', [AdminCouponController::class, 'toggleStatus'])->name('coupons.toggle-status');
        Route::resource('coupons', AdminCouponController::class);

        // 7b. Discount Signups & Lead Survey Responses
        Route::resource('discount-signups', AdminDiscountSignupController::class)->only(['index', 'destroy']);

        // 8. Product Reviews Moderation Module
        Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
        Route::patch('/reviews/{review}/status', [AdminReviewController::class, 'updateStatus'])->name('reviews.update-status');
        Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

        // 9. Banners & Sliders Module
        Route::patch('/banners/{banner}/toggle-status', [AdminBannerController::class, 'toggleStatus'])->name('banners.toggle-status');
        Route::resource('banners', AdminBannerController::class);

        // 10. Blog Posts Module
        Route::patch('/blogs/{blog}/toggle-status', [AdminBlogController::class, 'toggleStatus'])->name('blogs.toggle-status');
        Route::resource('blogs', AdminBlogController::class);

        // 11. FAQs Module
        Route::get('/faqs', [AdminFaqController::class, 'index'])->name('faqs.index');
        Route::post('/faqs', [AdminFaqController::class, 'store'])->name('faqs.store');
        Route::put('/faqs/{faq}', [AdminFaqController::class, 'update'])->name('faqs.update');
        Route::delete('/faqs/{faq}', [AdminFaqController::class, 'destroy'])->name('faqs.destroy');
        Route::patch('/faqs/{faq}/toggle-status', [AdminFaqController::class, 'toggleStatus'])->name('faqs.toggle-status');

        // 12. Devotee Testimonials Module
        Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
        Route::post('/testimonials', [AdminTestimonialController::class, 'store'])->name('testimonials.store');
        Route::put('/testimonials/{testimonial}', [AdminTestimonialController::class, 'update'])->name('testimonials.update');
        Route::delete('/testimonials/{testimonial}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');
        Route::patch('/testimonials/{testimonial}/toggle-status', [AdminTestimonialController::class, 'toggleStatus'])->name('testimonials.toggle-status');

        // 13. Store Settings & Config Module
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
