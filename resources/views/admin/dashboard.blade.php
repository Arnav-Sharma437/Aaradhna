@extends('layouts.admin')

@section('title', 'Shopify Store Overview & Metrics')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Top Bar: Greeting & Quick Time Filter -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Store Dashboard
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Live performance analytics, product inventory &amp; customer metrics for <span class="font-bold text-[#D38928]">Mangalam.co™</span>
            </p>
        </div>

        <div class="flex items-center space-x-2">
            <span class="text-xs font-semibold text-gray-500 bg-white border border-[#E1E3E5] px-3 py-1.5 rounded-[8px] shadow-2xs">
                📅 All Time Metrics
            </span>
            <a 
                href="{{ route('home') }}" 
                target="_blank"
                class="inline-flex items-center space-x-1 px-3 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs transition-colors font-heading"
            >
                <span>Preview Store</span>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>
    </div>

    <!-- Inventory / Operational Alert Banner (Shopify Polaris Action Banner) -->
    @if($outOfStockProducts > 0)
        <div class="p-4 rounded-[12px] bg-amber-50/90 border border-amber-200/80 flex items-center justify-between gap-4 shadow-2xs">
            <div class="flex items-center space-x-3 min-w-0">
                <div class="w-9 h-9 rounded-full bg-amber-500/20 text-amber-800 flex items-center justify-center shrink-0 text-base">
                    ⚠️
                </div>
                <div class="min-w-0">
                    <h4 class="text-xs sm:text-sm font-bold text-amber-900 font-heading">
                        Inventory Action Needed: {{ $outOfStockProducts }} Product Out of Stock
                    </h4>
                    <p class="text-xs text-amber-800/80 truncate">
                        "Trial Pack Combo (5 Fragrances)" is currently showing as Sold Out in the storefront.
                    </p>
                </div>
            </div>
            <span class="text-[11px] font-bold px-3 py-1 bg-amber-200 text-amber-900 rounded-[6px] shrink-0 font-heading">
                Stock Alert
            </span>
        </div>
    @endif

    <!-- Shopify Polaris KPI Metrics Grid (6 Cards) -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
        
        <!-- Metric 1: Total Sales -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Total Sales</span>
            <div class="text-xl font-black font-heading text-[#202223]">₹{{ number_format($totalRevenue, 2) }}</div>
            <span class="text-[10px] text-emerald-600 font-bold block">100% Paid</span>
        </div>

        <!-- Metric 2: Total Orders -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Orders</span>
            <div class="text-xl font-black font-heading text-[#202223]">{{ $totalOrders }}</div>
            <span class="text-[10px] text-gray-400 block">{{ $pendingOrders }} pending</span>
        </div>

        <!-- Metric 3: Active Products -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Products</span>
            <div class="text-xl font-black font-heading text-[#202223]">{{ $totalProducts }}</div>
            <span class="text-[10px] text-emerald-600 font-bold block">{{ $activeProducts }} live in store</span>
        </div>

        <!-- Metric 4: Collections -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Collections</span>
            <div class="text-xl font-black font-heading text-[#202223]">{{ $totalCollections }}</div>
            <span class="text-[10px] text-gray-500 block">{{ $totalCategories }} categories</span>
        </div>

        <!-- Metric 5: Reviews -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Reviews</span>
            <div class="text-xl font-black font-heading text-[#202223]">{{ $totalReviews }}</div>
            <span class="text-[10px] text-amber-600 font-bold block">★ {{ number_format($averageRating, 1) }} avg rating</span>
        </div>

        <!-- Metric 6: Devotees / Customers -->
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider block">Devotees</span>
            <div class="text-xl font-black font-heading text-[#202223]">{{ $totalUsers }}</div>
            <span class="text-[10px] text-gray-500 block">1 active admin</span>
        </div>

    </div>

    <!-- Main Content Split: Catalog Management & Review Moderation -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- Left 8 Columns: Products Inventory Table (Shopify Data Table style) -->
        <div class="lg:col-span-8 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
            
            <!-- Table Header Toolbar -->
            <div class="p-4 sm:p-5 border-b border-[#E1E3E5] flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-[#FCFCFD]">
                <div>
                    <h3 class="text-sm font-bold text-[#202223] font-heading">
                        Product Catalog &amp; Inventory
                    </h3>
                    <p class="text-xs text-gray-500">Live products synced with active categories and stock levels</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-[6px] bg-[#FAF3EA] text-[#965A15] border border-[#EADBCC]">
                        10 Total Products
                    </span>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#F7F8F9] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#E1E3E5]">
                        <tr>
                            <th class="px-4 py-3">Product</th>
                            <th class="px-3 py-3">Category</th>
                            <th class="px-3 py-3">Price</th>
                            <th class="px-3 py-3">Inventory</th>
                            <th class="px-3 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        @foreach($recentProducts as $product)
                            <tr class="hover:bg-[#F9FAFB] transition-colors">
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-9 h-9 rounded-[8px] bg-gray-100 border border-[#E1E3E5] overflow-hidden shrink-0 flex items-center justify-center p-0.5">
                                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="{{ $product->title }}" class="w-full h-full object-cover rounded-[6px]">
                                        </div>
                                        <div class="min-w-0">
                                            <span class="font-bold text-[#202223] truncate block text-xs">{{ $product->title }}</span>
                                            <span class="text-[10px] text-gray-400 font-mono block">{{ $product->sku }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-3 text-gray-500 truncate max-w-[120px]">
                                    {{ $product->category->name ?? 'Sacred Samagri' }}
                                </td>
                                <td class="px-3 py-3 font-bold text-[#202223] font-heading">
                                    ₹{{ number_format($product->active_price, 2) }}
                                </td>
                                <td class="px-3 py-3">
                                    @if($product->stock_quantity > 30)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">
                                            {{ $product->stock_quantity }} in stock
                                        </span>
                                    @elseif($product->stock_quantity > 0)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">
                                            {{ $product->stock_quantity }} low stock
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700">
                                            Sold Out
                                        </span>
                                    @endif
                                </td>
                                <td class="px-3 py-3">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Active
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="p-3 bg-[#FCFCFD] border-t border-[#E1E3E5] text-right">
                <span class="text-xs text-gray-500 font-medium">Showing 6 of 10 products</span>
            </div>

        </div>

        <!-- Right 4 Columns: Devotee Feedback & Storefront Shortcuts -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Quick E-Commerce Shortcuts Card -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                    Quick Navigation
                </h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    <div class="p-3 rounded-[10px] bg-[#FAF8F5] border border-[#EADBCC] text-center hover:bg-[#FAF3EA] transition-colors cursor-pointer">
                        <span class="text-lg block">📦</span>
                        <span class="font-bold text-[#202223] font-heading block mt-1">10 Products</span>
                    </div>
                    <div class="p-3 rounded-[10px] bg-[#FAF8F5] border border-[#EADBCC] text-center hover:bg-[#FAF3EA] transition-colors cursor-pointer">
                        <span class="text-lg block">🗂️</span>
                        <span class="font-bold text-[#202223] font-heading block mt-1">9 Collections</span>
                    </div>
                    <div class="p-3 rounded-[10px] bg-[#FAF8F5] border border-[#EADBCC] text-center hover:bg-[#FAF3EA] transition-colors cursor-pointer">
                        <span class="text-lg block">⭐</span>
                        <span class="font-bold text-[#202223] font-heading block mt-1">10 Reviews</span>
                    </div>
                    <div class="p-3 rounded-[10px] bg-[#FAF8F5] border border-[#EADBCC] text-center hover:bg-[#FAF3EA] transition-colors cursor-pointer">
                        <span class="text-lg block">🏷️</span>
                        <span class="font-bold text-[#202223] font-heading block mt-1">5 Categories</span>
                    </div>
                </div>
            </div>

            <!-- Devotee Reviews Feed Card -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
                <div class="p-4 border-b border-[#E1E3E5] flex items-center justify-between bg-[#FCFCFD]">
                    <div>
                        <h3 class="text-xs font-bold text-[#202223] font-heading">
                            Devotee Reviews
                        </h3>
                        <p class="text-[11px] text-gray-400">10 Approved Ratings</p>
                    </div>
                    <span class="text-xs font-bold text-amber-600">
                        ★ 5.0
                    </span>
                </div>

                <div class="divide-y divide-gray-100 max-h-[380px] overflow-y-auto shopify-scrollbar">
                    @foreach($recentReviews as $review)
                        <div class="p-3.5 space-y-1 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-[#202223]">{{ $review->reviewer_name }}</span>
                                <span class="text-amber-500 font-bold">@for($i = 0; $i < $review->rating; $i++)★@endfor</span>
                            </div>
                            <p class="font-semibold text-gray-800 text-[11px]">{{ $review->title }}</p>
                            <p class="text-gray-500 text-[11px] line-clamp-2">{{ $review->review_text }}</p>
                            <span class="text-[10px] text-gray-400 font-mono block pt-0.5">Product: {{ $review->product->title ?? 'Incense' }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
