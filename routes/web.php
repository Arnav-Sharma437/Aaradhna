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

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index']);
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});

