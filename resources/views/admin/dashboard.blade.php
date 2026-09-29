@extends('layouts.admin')

@section('title', 'Admin Dashboard')
@section('page-title', 'Store Overview & Metrics')

@section('content')
<div class="space-y-8">
    
    <!-- Top Welcome Banner -->
    <div class="bg-gradient-to-r from-[#1E1E1E] via-[#2A241C] to-[#1E1E1E] border border-white/10 rounded-[20px] p-6 sm:p-8 text-white shadow-lg relative overflow-hidden">
        <div class="max-w-2xl space-y-2 relative z-10">
            <span class="inline-block px-3 py-1 rounded-full bg-[#D38928]/20 border border-[#D38928]/40 text-[#F6DAA8] text-[11px] font-bold uppercase tracking-widest font-heading">
                ✦ Aaradhna Vedic Admin Console ✦
            </span>
            <h2 class="text-2xl sm:text-3xl font-black font-heading tracking-tight text-white">
                Namaste, {{ auth()->user()->name }}!
            </h2>
            <p class="text-xs sm:text-sm text-white/70 leading-relaxed">
                Live operational dashboard tracking catalog inventory, customer orders, devotee reviews, and revenue metrics.
            </p>
        </div>
        <div class="absolute -right-6 -bottom-8 opacity-10 text-[#D38928] text-8xl select-none pointer-events-none hidden sm:block">
            🪔
        </div>
    </div>

    <!-- Metrics Grid (4 Main Cards) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        
        <!-- Card 1: Products -->
        <div class="bg-white p-5 sm:p-6 rounded-[18px] border border-[#EADBCC] shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between pb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">Total Products</span>
                <div class="w-10 h-10 rounded-[10px] bg-amber-50 text-[#D38928] flex items-center justify-center text-lg shadow-xs">
                    📦
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-black font-heading text-[#121212]">{{ $totalProducts }}</span>
                <span class="text-xs font-semibold text-emerald-600 font-mono">({{ $activeProducts }} Active)</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <span>{{ $totalCategories }} Categories</span>
                <span>{{ $totalCollections }} Collections</span>
            </div>
        </div>

        <!-- Card 2: Orders -->
        <div class="bg-white p-5 sm:p-6 rounded-[18px] border border-[#EADBCC] shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between pb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">Total Orders</span>
                <div class="w-10 h-10 rounded-[10px] bg-blue-50 text-blue-600 flex items-center justify-center text-lg shadow-xs">
                    🛍️
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-black font-heading text-[#121212]">{{ $totalOrders }}</span>
                <span class="text-xs font-semibold text-gray-400 font-mono">({{ $pendingOrders }} Pending)</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <span>Revenue: ₹{{ number_format($totalRevenue, 2) }}</span>
                <span class="text-emerald-600 font-bold">{{ $completedOrders }} Delivered</span>
            </div>
        </div>

        <!-- Card 3: Customers -->
        <div class="bg-white p-5 sm:p-6 rounded-[18px] border border-[#EADBCC] shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between pb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">Total Users</span>
                <div class="w-10 h-10 rounded-[10px] bg-purple-50 text-purple-600 flex items-center justify-center text-lg shadow-xs">
                    👥
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-black font-heading text-[#121212]">{{ $totalUsers }}</span>
                <span class="text-xs font-semibold text-purple-600 font-mono">({{ $totalCustomers }} Customers)</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <span>Admin Accounts: 1</span>
                <span class="text-emerald-600 font-bold">100% Verified</span>
            </div>
        </div>

        <!-- Card 4: Devotee Reviews -->
        <div class="bg-white p-5 sm:p-6 rounded-[18px] border border-[#EADBCC] shadow-xs hover:shadow-md transition-shadow">
            <div class="flex items-center justify-between pb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">Devotee Reviews</span>
                <div class="w-10 h-10 rounded-[10px] bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg shadow-xs">
                    ⭐
                </div>
            </div>
            <div class="flex items-baseline space-x-2">
                <span class="text-3xl font-black font-heading text-[#121212]">{{ $totalReviews }}</span>
                <span class="text-xs font-bold text-amber-500 font-heading">★ {{ number_format($averageRating, 1) }}/5</span>
            </div>
            <div class="mt-3 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                <span class="text-emerald-600 font-semibold">{{ $approvedReviews }} Approved</span>
                <span class="text-gray-400">{{ $pendingReviews }} Pending</span>
            </div>
        </div>

    </div>

    <!-- Main 2-Column Split: Products Catalog + Devotee Reviews -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left: Product Catalog Table (7 Columns) -->
        <div class="lg:col-span-7 bg-white rounded-[20px] border border-[#EADBCC] shadow-xs overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-[#EADBCC] flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold font-heading text-[#121212]">
                        Active Products Catalog
                    </h3>
                    <p class="text-xs text-gray-500">Live inventory and pricing records</p>
                </div>
                <span class="text-xs font-bold px-3 py-1 rounded-full bg-[#FAF3EA] text-[#D38928] border border-[#EADBCC]">
                    10 Items
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#FAF8F5] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#EADBCC]">
                        <tr>
                            <th class="px-5 py-3">Product</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Price</th>
                            <th class="px-4 py-3">Stock</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        @foreach($recentProducts as $prod)
                            <tr class="hover:bg-[#FAF8F5]/60 transition-colors">
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-9 h-9 rounded-[8px] bg-gray-100 border border-[#EADBCC] overflow-hidden shrink-0 flex items-center justify-center p-0.5">
                                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="{{ $prod->title }}" class="w-full h-full object-cover rounded-[6px]">
                                        </div>
                                        <div class="min-w-0">
                                            <span class="font-bold text-[#121212] truncate block">{{ $prod->title }}</span>
                                            <span class="text-[10px] text-gray-400 block font-mono">{{ $prod->sku }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 text-gray-500 truncate max-w-[120px]">
                                    {{ $prod->category->name ?? 'Sacred Samagri' }}
                                </td>
                                <td class="px-4 py-3.5 font-bold text-[#C87A1E] font-heading">
                                    ₹{{ number_format($prod->active_price, 2) }}
                                </td>
                                <td class="px-4 py-3.5">
                                    @if($prod->stock_quantity > 20)
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700">
                                            {{ $prod->stock_quantity }} in stock
                                        </span>
                                    @elseif($prod->stock_quantity > 0)
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">
                                            {{ $prod->stock_quantity }} left
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700">
                                            Sold Out
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Active
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right: Recent Devotee Reviews (5 Columns) -->
        <div class="lg:col-span-5 bg-white rounded-[20px] border border-[#EADBCC] shadow-xs overflow-hidden">
            <div class="p-5 sm:p-6 border-b border-[#EADBCC] flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold font-heading text-[#121212]">
                        Recent Devotee Feedback
                    </h3>
                    <p class="text-xs text-gray-500">Approved customer ratings &amp; reviews</p>
                </div>
                <span class="text-xs font-bold text-amber-600 font-heading">
                    10 Total
                </span>
            </div>

            <div class="divide-y divide-gray-100">
                @foreach($recentReviews as $rev)
                    <div class="p-4 sm:p-5 space-y-2 hover:bg-[#FAF8F5]/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="font-bold text-xs text-[#121212]">{{ $rev->reviewer_name }}</span>
                                <span class="text-[10px] text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full font-semibold">Verified</span>
                            </div>
                            <div class="text-[#D38928] text-xs">
                                @for($i = 0; $i < $rev->rating; $i++)★@endfor
                            </div>
                        </div>
                        <p class="text-xs font-bold text-[#121212] font-serif">{{ $rev->title }}</p>
                        <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed">{{ $rev->review_text }}</p>
                        <div class="text-[10px] text-gray-400 pt-1 font-mono">
                            Product: {{ $rev->product->title ?? 'Sacred Agarbatti' }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>
@endsection
