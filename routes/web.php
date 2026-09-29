<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\CollectionController;
use App\Http\Controllers\Front\ProductController;

// Storefront Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Catalog / Collection Routes
Route::get('/collections/{slug}', [CollectionController::class, 'show'])->name('collections.show');

// Product Detail Routes
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// Placeholder Static & Policy Page Routes
Route::get('/pages/{slug}', function (string $slug) {
    return response("<h1>Page: " . e($slug) . "</h1>", 200);
})->name('pages.show');

// Placeholder Blog Route
Route::get('/blogs/{slug}', function (string $slug) {
    return response("<h1>Blog: " . e($slug) . "</h1>", 200);
})->name('blogs.index');

// Placeholder Cart Route
Route::get('/cart', function () {
    return response("<h1>Shopping Cart</h1>", 200);
})->name('cart.index');
