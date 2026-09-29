<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CollectionController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartWishlistController;

// Storefront Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Catalog / Collection Routes
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');

// Product Detail Routes
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Cart & Wishlist Routes
Route::get('/cart', [CartWishlistController::class, 'cart'])->name('cart.index');
Route::get('/wishlist', [CartWishlistController::class, 'wishlist'])->name('wishlist.index');

// Placeholder Static & Policy Page Routes
Route::get('/pages/{slug}', function (string $slug) {
    return response("<h1>Aaradhna — " . e($slug) . "</h1>", 200);
})->name('pages.show');

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

