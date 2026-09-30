<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CollectionController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartWishlistController;
use App\Http\Controllers\Front\SearchController;

// Storefront Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search Routes (Full Search & Predictive AJAX Suggestions)
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/api/search/predictive', [SearchController::class, 'predictive'])->name('search.predictive');

// Catalog / Collection Routes
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');

// Product Detail Routes
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

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

// Placeholder Blog Route
Route::get('/blogs/{slug}', function (string $slug) {
    return response("<h1>Aaradhna Blog — " . e($slug) . "</h1>", 200);
})->name('blogs.index');

// =========================================================================
// ADMIN AUTHENTICATION & DASHBOARD ROUTES
// =========================================================================
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CollectionController as AdminCollectionController;
use App\Http\Controllers\Admin\InventoryController as AdminInventoryController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Products Module
        Route::patch('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::resource('products', AdminProductController::class);

        // Categories Module
        Route::patch('/categories/{category}/toggle-status', [AdminCategoryController::class, 'toggleStatus'])->name('categories.toggle-status');
        Route::resource('categories', AdminCategoryController::class);

        // Collections Module
        Route::patch('/collections/{collection}/toggle-status', [AdminCollectionController::class, 'toggleStatus'])->name('collections.toggle-status');
        Route::resource('collections', AdminCollectionController::class);

        // Inventory Management Module
        Route::get('/inventory', [AdminInventoryController::class, 'index'])->name('inventory.index');
        Route::post('/inventory/products/{product}/adjust', [AdminInventoryController::class, 'adjust'])->name('inventory.adjust');
        Route::patch('/inventory/products/{product}/toggle-tracking', [AdminInventoryController::class, 'toggleTracking'])->name('inventory.toggle-tracking');
        Route::post('/inventory/bulk-update', [AdminInventoryController::class, 'bulkUpdate'])->name('inventory.bulk-update');
        Route::get('/inventory/history', [AdminInventoryController::class, 'history'])->name('inventory.history');
    });
});

