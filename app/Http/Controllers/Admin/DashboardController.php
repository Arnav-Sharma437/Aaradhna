<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the Admin Dashboard with live stats and catalog overview.
     */
    public function index(): View
    {
        // 1. Catalog & Product Stats
        $totalProducts = Product::count();
        $activeProducts = Product::where('status', 'active')->count();
        $outOfStockProducts = Product::where('stock_quantity', '<=', 0)->count();
        $lowStockProducts = Product::where('stock_quantity', '>', 0)->where('stock_quantity', '<=', 20)->count();
        $totalCategories = Category::where('is_active', true)->count();
        $totalCollections = Collection::where('is_active', true)->count();

        // 2. Orders & Revenue Stats
        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $processingOrders = Order::where('order_status', 'processing')->count();
        $completedOrders = Order::where('order_status', 'delivered')->count();
        $totalRevenue = (float) Order::where('payment_status', 'paid')->sum('total_amount');

        // 3. Customer Stats
        $totalCustomers = User::where('role', 'customer')->count();
        $totalUsers = User::count();

        // 4. Reviews Stats
        $totalReviews = Review::count();
        $approvedReviews = Review::where('status', 'approved')->count();
        $pendingReviews = Review::where('status', 'pending')->count();
        $averageRating = Review::where('status', 'approved')->avg('rating') ?: 5.0;

        // 5. Recent Data
        $recentProducts = Product::with(['category', 'primaryImage'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentReviews = Review::with(['product'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $recentOrders = Order::with(['user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'activeProducts',
            'outOfStockProducts',
            'lowStockProducts',
            'totalCategories',
            'totalCollections',
            'totalOrders',
            'pendingOrders',
            'processingOrders',
            'completedOrders',
            'totalRevenue',
            'totalCustomers',
            'totalUsers',
            'totalReviews',
            'approvedReviews',
            'pendingReviews',
            'averageRating',
            'recentProducts',
            'recentReviews',
            'recentOrders'
        ));
    }
}
