@extends('layouts.admin')

@section('title', 'Inventory & Stock Management')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header with Breadcrumbs & Action CTAs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Inventory
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Track stock levels, configure low-stock alerts, adjust variant quantities and review audit trails.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.inventory.history') }}" 
                class="inline-flex items-center space-x-1.5 px-3.5 py-2 bg-white border border-[#D2D5D8] hover:bg-gray-50 text-gray-700 text-xs font-bold rounded-[8px] transition-all shadow-2xs font-heading"
            >
                <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>Activity Log</span>
            </a>
            <a 
                href="{{ route('admin.products.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading"
            >
                <span>+ Add Product</span>
            </a>
        </div>
    </div>

    <!-- 1. Inventory Summary Metrics Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-5 gap-3.5 sm:gap-4">
        <!-- Total Units in Stock -->
        <div class="bg-white p-4 rounded-[14px] border border-[#E1E3E5] shadow-2xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-gray-400 font-mono">Total Units</span>
                <span class="p-1.5 bg-[#FAF3EA] text-[#965A15] rounded-[6px] text-xs">📦</span>
            </div>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A]">{{ number_format($totalUnits) }}</span>
                <span class="text-[11px] text-gray-500 font-medium">{{ $totalProducts }} items</span>
            </div>
        </div>

        <!-- In Stock Products -->
        <div class="bg-white p-4 rounded-[14px] border border-[#E1E3E5] shadow-2xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600 font-mono">In Stock</span>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span>
            </div>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl sm:text-2xl font-black font-heading text-emerald-700">{{ $inStockCount }}</span>
                <span class="text-[11px] text-emerald-600 font-semibold">> 30 units</span>
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="bg-white p-4 rounded-[14px] border border-amber-200 bg-amber-50/20 shadow-2xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-amber-700 font-mono">Low Stock</span>
                <span class="px-1.5 py-0.5 bg-amber-100 text-amber-800 rounded font-bold text-[10px]">Alert</span>
            </div>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl sm:text-2xl font-black font-heading text-amber-800">{{ $lowStockCount }}</span>
                <span class="text-[11px] text-amber-600 font-semibold">≤ 30 units</span>
            </div>
        </div>

        <!-- Out of Stock Alerts -->
        <div class="bg-white p-4 rounded-[14px] border border-rose-200 bg-rose-50/20 shadow-2xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-rose-700 font-mono">Out of Stock</span>
                <span class="px-1.5 py-0.5 bg-rose-100 text-rose-800 rounded font-bold text-[10px]">Sold Out</span>
            </div>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl sm:text-2xl font-black font-heading text-rose-800">{{ $outOfStockCount }}</span>
                <span class="text-[11px] text-rose-600 font-semibold">0 units</span>
            </div>
        </div>

        <!-- Total Inventory Valuation -->
        <div class="col-span-2 lg:col-span-1 bg-white p-4 rounded-[14px] border border-[#E1E3E5] shadow-2xs">
            <div class="flex items-center justify-between">
                <span class="text-[11px] font-bold uppercase tracking-wider text-gray-400 font-mono">Stock Value</span>
                <span class="p-1.5 bg-gray-100 text-gray-600 rounded-[6px] text-xs">₹</span>
            </div>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A]">₹{{ number_format($totalInventoryValue, 0) }}</span>
                <span class="text-[11px] text-gray-400 font-medium">Est. cost</span>
            </div>
        </div>
    </div>

    <!-- 2. Critical Low-Stock / Out-of-Stock Alert Bar (if any alerts) -->
    @if($criticalAlerts->count() > 0)
        <div class="p-4 rounded-[14px] bg-gradient-to-r from-amber-50 to-orange-50 border border-amber-200/80 shadow-2xs">
            <div class="flex items-start sm:items-center justify-between gap-3 mb-3">
                <div class="flex items-center space-x-2">
                    <span class="text-base">⚠️</span>
                    <h3 class="text-xs font-black uppercase tracking-wider text-amber-900 font-heading">
                        Attention Required — Critical Stock Alert ({{ $criticalAlerts->count() }} items)
                    </h3>
                </div>
                <span class="text-[11px] text-amber-700 font-medium">Low stock threshold: ≤ 30 units</span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-2.5">
                @foreach($criticalAlerts as $alert)
                    <div class="bg-white/80 backdrop-blur-xs p-2.5 rounded-[10px] border border-amber-200/60 flex items-center space-x-2">
                        <div class="w-8 h-8 rounded bg-gray-100 border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                            @if($alert->primaryImage)
                                <img src="{{ str_starts_with($alert->primaryImage->image_path, 'http') ? $alert->primaryImage->image_path : asset($alert->primaryImage->image_path) }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-xs">🪔</span>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <span class="text-[11px] font-bold text-gray-800 truncate block">{{ $alert->title }}</span>
                            <span class="text-[10px] font-black {{ $alert->stock_quantity <= 0 ? 'text-rose-600' : 'text-amber-700' }}">
                                {{ $alert->stock_quantity <= 0 ? '0 (Sold Out)' : $alert->stock_quantity . ' left' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- 3. Status Tabs -->
    <div class="flex items-center space-x-2 border-b border-[#E1E3E5] pb-3 overflow-x-auto shopify-scrollbar">
        <a 
            href="{{ route('admin.inventory.index') }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold whitespace-nowrap transition-colors {{ !request('stock_status') ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            All Products <span class="ml-1 opacity-70">({{ $totalProducts }})</span>
        </a>
        <a 
            href="{{ route('admin.inventory.index', ['stock_status' => 'in_stock']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold whitespace-nowrap transition-colors {{ request('stock_status') === 'in_stock' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            In Stock <span class="ml-1 opacity-70">({{ $inStockCount }})</span>
        </a>
        <a 
            href="{{ route('admin.inventory.index', ['stock_status' => 'low_stock']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold whitespace-nowrap transition-colors {{ request('stock_status') === 'low_stock' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Low Stock <span class="ml-1 opacity-70">({{ $lowStockCount }})</span>
        </a>
        <a 
            href="{{ route('admin.inventory.index', ['stock_status' => 'out_of_stock']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold whitespace-nowrap transition-colors {{ request('stock_status') === 'out_of_stock' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Out of Stock <span class="ml-1 opacity-70">({{ $outOfStockCount }})</span>
        </a>
    </div>

    <!-- 4. Main Inventory Table & Filter Container -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <!-- Search & Filter Controls -->
        <form method="GET" action="{{ route('admin.inventory.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-3">
                
                <!-- Search Box -->
                <div class="relative flex-1 max-w-md">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by product, variant or SKU..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <!-- Select Filters -->
                <div class="flex flex-wrap items-center gap-2">
                    
                    <!-- Category Filter -->
                    <select 
                        name="category_id" 
                        onchange="this.form.submit()"
                        class="px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Tracking Filter -->
                    <select 
                        name="track_inventory" 
                        onchange="this.form.submit()"
                        class="px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="">All Tracking</option>
                        <option value="1" {{ request('track_inventory') === '1' ? 'selected' : '' }}>Tracked</option>
                        <option value="0" {{ request('track_inventory') === '0' ? 'selected' : '' }}>Untracked</option>
                    </select>

                    <!-- Sorting -->
                    <select 
                        name="sort" 
                        onchange="this.form.submit()"
                        class="px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="stock_asc" {{ request('sort') === 'stock_asc' ? 'selected' : '' }}>Lowest Stock First</option>
                        <option value="stock_desc" {{ request('sort') === 'stock_desc' ? 'selected' : '' }}>Highest Stock First</option>
                        <option value="title_asc" {{ request('sort') === 'title_asc' ? 'selected' : '' }}>Product Title A-Z</option>
                        <option value="sku_asc" {{ request('sort') === 'sku_asc' ? 'selected' : '' }}>SKU A-Z</option>
                    </select>

                    @if(request()->hasAny(['search', 'category_id', 'track_inventory', 'stock_status', 'sort']))
                        <a href="{{ route('admin.inventory.index') }}" class="p-2 text-gray-500 hover:text-red-600 hover:bg-gray-100 rounded-[8px]" title="Reset Filters">
                            ✕
                        </a>
                    @endif
                </div>

            </div>
        </form>

        <!-- Bulk Action Floating Bar (shown when rows are selected) -->
        <form id="bulk-inventory-form" method="POST" action="{{ route('admin.inventory.bulk-update') }}">
            @csrf
            <div id="bulk-action-bar" class="hidden p-3 bg-[#1A1A1A] text-white flex flex-wrap items-center justify-between gap-3 border-b border-[#2C2C2C] animate-fade-in">
                <div class="flex items-center space-x-2 text-xs">
                    <span class="font-bold text-[#F6DAA8]" id="selected-items-count">0</span>
                    <span class="text-gray-300">products selected</span>
                </div>

                <div class="flex items-center space-x-2">
                    <select 
                        name="bulk_action" 
                        id="bulk_action_select" 
                        class="px-2.5 py-1.5 bg-[#2B2B2B] text-white border border-[#444] rounded-[6px] text-xs focus:outline-none focus:border-[#D38928]"
                        onchange="toggleBulkQtyInput(this.value)"
                    >
                        <option value="set_stock">Set Stock Quantity To</option>
                        <option value="add_stock">Add Stock (+ Units)</option>
                        <option value="reduce_stock">Reduce Stock (- Units)</option>
                        <option value="enable_tracking">Enable Tracking</option>
                        <option value="disable_tracking">Disable Tracking</option>
                    </select>

                    <input 
                        type="number" 
                        name="bulk_quantity" 
                        id="bulk_quantity_input" 
                        placeholder="Qty" 
                        min="0" 
                        value="50"
                        class="w-20 px-2 py-1.5 bg-[#2B2B2B] text-white border border-[#444] rounded-[6px] text-xs focus:outline-none focus:border-[#D38928]"
                    >

                    <input 
                        type="text" 
                        name="bulk_reason" 
                        placeholder="Reason (e.g. Bulk Restock)" 
                        class="hidden sm:inline-block w-44 px-2.5 py-1.5 bg-[#2B2B2B] text-white border border-[#444] rounded-[6px] text-xs focus:outline-none focus:border-[#D38928]"
                    >

                    <button 
                        type="submit" 
                        class="px-3 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[6px] transition-colors"
                    >
                        Apply to Selected
                    </button>
                </div>
            </div>

            <!-- Inventory Items Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-[#F7F8F9] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#E1E3E5]">
                        <tr>
                            <th class="w-10 px-4 py-3 text-center">
                                <input type="checkbox" id="select-all-checkbox" class="w-4 h-4 rounded border-gray-300 text-[#D38928] focus:ring-[#D38928]" onchange="toggleSelectAll(this)">
                            </th>
                            <th class="px-4 py-3">Product / Variants</th>
                            <th class="px-4 py-3">SKU</th>
                            <th class="px-4 py-3">Tracking</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Current Stock</th>
                            <th class="px-4 py-3 text-right">Quick Adjust</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                        @forelse($products as $product)
                            @php
                                $isOutOfStock = $product->stock_quantity <= 0;
                                $isLowStock = $product->stock_quantity > 0 && $product->stock_quantity <= 30;
                                $hasVariants = $product->variants->count() > 1;
                            @endphp
                            <!-- Parent Product Row -->
                            <tr class="hover:bg-[#F9FAFB] transition-colors group {{ $isOutOfStock ? 'bg-rose-50/15' : ($isLowStock ? 'bg-amber-50/15' : '') }}" id="product-row-{{ $product->id }}">
                                
                                <!-- Checkbox -->
                                <td class="px-4 py-3.5 text-center">
                                    <input 
                                        type="checkbox" 
                                        name="selected_products[]" 
                                        value="{{ $product->id }}" 
                                        class="product-row-checkbox w-4 h-4 rounded border-gray-300 text-[#D38928] focus:ring-[#D38928]"
                                        onchange="updateBulkBarState()"
                                    >
                                </td>

                                <!-- Product Info -->
                                <td class="px-4 py-3.5">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-[8px] bg-white border border-[#E1E3E5] overflow-hidden flex items-center justify-center shrink-0 shadow-2xs">
                                            @if($product->primaryImage)
                                                <img 
                                                    src="{{ str_starts_with($product->primaryImage->image_path, 'http') ? $product->primaryImage->image_path : asset($product->primaryImage->image_path) }}" 
                                                    alt="{{ $product->title }}" 
                                                    class="w-full h-full object-cover"
                                                    onerror="this.src='https://placehold.co/80x80?text=IMG'"
                                                >
                                            @else
                                                <span class="text-sm">🪔</span>
                                            @endif
                                        </div>
                                        <div class="min-w-0">
                                            <a href="{{ route('admin.products.edit', $product) }}" class="font-bold text-[#202223] hover:text-[#D38928] truncate block text-xs">
                                                {{ $product->title }}
                                            </a>
                                            <div class="flex items-center space-x-2 text-[11px] text-gray-400">
                                                <span>{{ $product->category->name ?? 'Uncategorized' }}</span>
                                                @if($hasVariants)
                                                    <span>•</span>
                                                    <span class="text-[#D38928] font-semibold">{{ $product->variants->count() }} pack sizes</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- SKU -->
                                <td class="px-4 py-3.5 font-mono text-gray-500 text-[11px]">
                                    {{ $product->sku ?: '—' }}
                                </td>

                                <!-- Inventory Tracking Toggle -->
                                <td class="px-4 py-3.5">
                                    <button 
                                        type="button" 
                                        onclick="toggleTracking({{ $product->id }})"
                                        id="track-badge-{{ $product->id }}"
                                        class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold transition-all {{ $product->track_inventory ? 'bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100' : 'bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200' }}"
                                        title="Click to toggle inventory tracking"
                                    >
                                        {{ $product->track_inventory ? 'Tracked' : 'Untracked' }}
                                    </button>
                                </td>

                                <!-- Status Badge -->
                                <td class="px-4 py-3.5">
                                    @if($isOutOfStock)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800">
                                            Out of Stock
                                        </span>
                                    @elseif($isLowStock)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-100 text-amber-800">
                                            Low Stock
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                            In Stock
                                        </span>
                                    @endif
                                </td>

                                <!-- Current Stock Input -->
                                <td class="px-4 py-3.5 text-center">
                                    <div class="inline-flex items-center space-x-1.5">
                                        <input 
                                            type="number" 
                                            value="{{ $product->stock_quantity }}" 
                                            min="0"
                                            id="stock-input-{{ $product->id }}"
                                            class="w-20 px-2 py-1 text-center font-bold text-xs bg-white border border-[#D2D5D8] rounded-[6px] text-[#202223] focus:outline-none focus:border-[#D38928]"
                                            onchange="setStockDirect({{ $product->id }}, this.value)"
                                        >
                                        <span class="text-[11px] text-gray-400">units</span>
                                    </div>
                                </td>

                                <!-- Quick Adjust Buttons (+ / -) -->
                                <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                    <div class="inline-flex items-center space-x-1">
                                        <button 
                                            type="button" 
                                            onclick="adjustStockDelta({{ $product->id }}, -10)"
                                            class="px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-[11px] font-bold rounded-[6px] transition-colors"
                                            title="Deduct 10"
                                        >
                                            -10
                                        </button>
                                        <button 
                                            type="button" 
                                            onclick="adjustStockDelta({{ $product->id }}, -1)"
                                            class="px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-[11px] font-bold rounded-[6px] transition-colors"
                                            title="Deduct 1"
                                        >
                                            -1
                                        </button>
                                        <button 
                                            type="button" 
                                            onclick="adjustStockDelta({{ $product->id }}, 1)"
                                            class="px-2 py-1 bg-[#FAF3EA] hover:bg-[#F3E5D4] text-[#965A15] text-[11px] font-bold rounded-[6px] transition-colors"
                                            title="Add 1"
                                        >
                                            +1
                                        </button>
                                        <button 
                                            type="button" 
                                            onclick="adjustStockDelta({{ $product->id }}, 10)"
                                            class="px-2 py-1 bg-[#FAF3EA] hover:bg-[#F3E5D4] text-[#965A15] text-[11px] font-bold rounded-[6px] transition-colors"
                                            title="Add 10"
                                        >
                                            +10
                                        </button>
                                        
                                        @if($hasVariants)
                                            <button 
                                                type="button" 
                                                onclick="toggleVariantDetails({{ $product->id }})" 
                                                class="ml-1 p-1 text-gray-400 hover:text-[#D38928] rounded"
                                                title="Expand / Collapse Variant Stocks"
                                            >
                                                <svg class="w-4 h-4 transform transition-transform" id="caret-{{ $product->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <!-- Nested Variant Rows (if product has multiple variants) -->
                            @if($hasVariants)
                                <tr id="variant-subrow-{{ $product->id }}" class="hidden bg-[#FBFBFC]">
                                    <td colspan="7" class="px-8 py-3 border-t border-dashed border-gray-200">
                                        <div class="space-y-2">
                                            <div class="text-[10px] uppercase font-mono font-bold text-gray-400">Variant Breakdown for {{ $product->title }}</div>
                                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                                @foreach($product->variants as $variant)
                                                    <div class="p-3 bg-white rounded-[8px] border border-[#E1E3E5] flex items-center justify-between shadow-2xs">
                                                        <div>
                                                            <span class="text-xs font-bold text-gray-800 block">{{ $variant->title }}</span>
                                                            <span class="text-[10px] font-mono text-gray-400">{{ $variant->sku }} • ₹{{ number_format($variant->price, 2) }}</span>
                                                        </div>
                                                        <div class="flex items-center space-x-1.5">
                                                            <input 
                                                                type="number" 
                                                                value="{{ $variant->stock_quantity }}" 
                                                                min="0"
                                                                id="variant-stock-input-{{ $variant->id }}"
                                                                class="w-16 px-1.5 py-1 text-center font-bold text-xs bg-gray-50 border border-gray-300 rounded focus:outline-none focus:border-[#D38928]"
                                                                onchange="setVariantStockDirect({{ $product->id }}, {{ $variant->id }}, this.value)"
                                                            >
                                                            <button 
                                                                type="button" 
                                                                onclick="adjustVariantStockDelta({{ $product->id }}, {{ $variant->id }}, 10)" 
                                                                class="px-1.5 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 text-[10px] font-bold rounded"
                                                            >
                                                                +10
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                    <div class="max-w-xs mx-auto space-y-3">
                                        <div class="text-3xl">📦</div>
                                        <h4 class="text-sm font-bold text-[#202223] font-heading">No items match your filter</h4>
                                        <p class="text-xs text-gray-400">Try searching with a different keyword or resetting your filter criteria.</p>
                                        <a href="{{ route('admin.inventory.index') }}" class="inline-block px-4 py-2 bg-[#D38928] text-white text-xs font-bold rounded-[8px]">
                                            Clear Filters
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($products->hasPages())
                <div class="p-4 border-t border-[#E1E3E5] flex items-center justify-between bg-[#FCFCFD]">
                    <div class="text-xs text-gray-500">
                        Showing <strong class="text-[#202223]">{{ $products->firstItem() }}</strong> to <strong class="text-[#202223]">{{ $products->lastItem() }}</strong> of <strong class="text-[#202223]">{{ $products->total() }}</strong> products
                    </div>
                    <div>{{ $products->links() }}</div>
                </div>
            @endif

        </form>

    </div>

    <!-- 5. Recent Inventory Activity Log Snapshot -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <span class="text-base">📋</span>
                <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-600">Recent Inventory Changes</h3>
            </div>
            <a href="{{ route('admin.inventory.history') }}" class="text-xs font-bold text-[#D38928] hover:underline">
                View Full Audit History →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-gray-50 text-gray-400 uppercase text-[9px] font-mono border-b border-gray-200">
                    <tr>
                        <th class="px-3 py-2">Timestamp</th>
                        <th class="px-3 py-2">Item / SKU</th>
                        <th class="px-3 py-2">Change</th>
                        <th class="px-3 py-2">Previous → New</th>
                        <th class="px-3 py-2">Reason</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-600">
                    @forelse($recentLogs as $log)
                        <tr>
                            <td class="px-3 py-2 text-gray-400 font-mono text-[11px]">{{ $log->created_at->format('M d, H:i') }}</td>
                            <td class="px-3 py-2 font-medium text-gray-800">
                                {{ $log->product->title ?? 'Product #' . $log->product_id }}
                                @if($log->variant)
                                    <span class="text-gray-400 text-[10px]">({{ $log->variant->title }})</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <span class="px-1.5 py-0.5 rounded font-mono font-bold text-[10px] {{ $log->quantity_change >= 0 ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                                    {{ $log->quantity_change > 0 ? '+' : '' }}{{ $log->quantity_change }}
                                </span>
                            </td>
                            <td class="px-3 py-2 font-mono text-[11px] text-gray-500">
                                {{ $log->previous_quantity }} → <strong class="text-gray-900">{{ $log->new_quantity }}</strong>
                            </td>
                            <td class="px-3 py-2 text-gray-500 text-[11px]">{{ $log->reason }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-4 text-center text-gray-400 text-xs">No inventory activity logged yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@push('scripts')
<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Toggle Select All Checkboxes
    function toggleSelectAll(master) {
        document.querySelectorAll('.product-row-checkbox').forEach(cb => {
            cb.checked = master.checked;
        });
        updateBulkBarState();
    }

    // Update Bulk Action Bar visibility
    function updateBulkBarState() {
        const checked = document.querySelectorAll('.product-row-checkbox:checked');
        const count = checked.length;
        const bar = document.getElementById('bulk-action-bar');
        const countLabel = document.getElementById('selected-items-count');

        if (count > 0) {
            bar.classList.remove('hidden');
            countLabel.innerText = count;
        } else {
            bar.classList.add('hidden');
        }
    }

    function toggleBulkQtyInput(action) {
        const input = document.getElementById('bulk_quantity_input');
        if (action === 'enable_tracking' || action === 'disable_tracking') {
            input.style.display = 'none';
        } else {
            input.style.display = 'inline-block';
        }
    }

    // Expand / collapse variant row
    function toggleVariantDetails(productId) {
        const row = document.getElementById(`variant-subrow-${productId}`);
        const caret = document.getElementById(`caret-${productId}`);
        if (row.classList.contains('hidden')) {
            row.classList.remove('hidden');
            caret.classList.add('rotate-180');
        } else {
            row.classList.add('hidden');
            caret.classList.remove('rotate-180');
        }
    }

    // Ajax Direct Stock Set
    async function setStockDirect(productId, newQty) {
        try {
            const response = await fetch(`/admin/inventory/products/${productId}/adjust`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    adjustment_type: 'set',
                    quantity: parseInt(newQty) || 0,
                    reason: 'Direct Stock Update'
                })
            });
            const data = await response.json();
            if (data.success) {
                showAdminToast(data.message, 'success');
            }
        } catch (e) {
            console.error(e);
            showAdminToast('Failed to update stock.', 'error');
        }
    }

    // Ajax Delta Adjust (+ / -)
    async function adjustStockDelta(productId, delta) {
        const input = document.getElementById(`stock-input-${productId}`);
        const current = parseInt(input.value) || 0;
        const target = Math.max(0, current + delta);
        input.value = target;

        try {
            const response = await fetch(`/admin/inventory/products/${productId}/adjust`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    adjustment_type: 'delta',
                    quantity: delta,
                    reason: delta > 0 ? `Restock (+${delta})` : `Adjustment (${delta})`
                })
            });
            const data = await response.json();
            if (data.success) {
                input.value = data.new_product_stock;
                showAdminToast(data.message, 'success');
            }
        } catch (e) {
            console.error(e);
            showAdminToast('Failed to adjust stock.', 'error');
        }
    }

    // Ajax Direct Variant Stock Set
    async function setVariantStockDirect(productId, variantId, newQty) {
        try {
            const response = await fetch(`/admin/inventory/products/${productId}/adjust`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    variant_id: variantId,
                    adjustment_type: 'set',
                    quantity: parseInt(newQty) || 0,
                    reason: 'Direct Variant Stock Update'
                })
            });
            const data = await response.json();
            if (data.success) {
                document.getElementById(`stock-input-${productId}`).value = data.new_product_stock;
                showAdminToast(data.message, 'success');
            }
        } catch (e) {
            console.error(e);
            showAdminToast('Failed to update variant stock.', 'error');
        }
    }

    // Ajax Delta Variant Stock Adjust
    async function adjustVariantStockDelta(productId, variantId, delta) {
        const input = document.getElementById(`variant-stock-input-${variantId}`);
        const current = parseInt(input.value) || 0;
        const target = Math.max(0, current + delta);
        input.value = target;

        try {
            const response = await fetch(`/admin/inventory/products/${productId}/adjust`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    variant_id: variantId,
                    adjustment_type: 'delta',
                    quantity: delta,
                    reason: `Variant Restock (+${delta})`
                })
            });
            const data = await response.json();
            if (data.success) {
                input.value = data.new_variant_stock;
                document.getElementById(`stock-input-${productId}`).value = data.new_product_stock;
                showAdminToast(data.message, 'success');
            }
        } catch (e) {
            console.error(e);
            showAdminToast('Failed to adjust variant stock.', 'error');
        }
    }

    // Ajax Toggle Tracking
    async function toggleTracking(productId) {
        try {
            const response = await fetch(`/admin/inventory/products/${productId}/toggle-tracking`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            const data = await response.json();
            if (data.success) {
                const badge = document.getElementById(`track-badge-${productId}`);
                if (data.track_inventory) {
                    badge.className = 'inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-200 hover:bg-blue-100 transition-all';
                    badge.innerText = 'Tracked';
                } else {
                    badge.className = 'inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-gray-100 text-gray-500 border border-gray-200 hover:bg-gray-200 transition-all';
                    badge.innerText = 'Untracked';
                }
                showAdminToast(data.message, 'success');
            }
        } catch (e) {
            console.error(e);
            showAdminToast('Failed to toggle tracking.', 'error');
        }
    }

    // Helper Toast Notification
    function showAdminToast(message, type = 'success') {
        const container = document.getElementById('admin-toast-container');
        if (!container) return;

        const toast = document.createElement('div');
        toast.className = `p-3.5 rounded-[10px] text-xs font-semibold flex items-center space-x-2 shadow-lg transition-all duration-300 transform translate-y-2 pointer-events-auto ${type === 'success' ? 'bg-[#1A1A1A] text-white border border-[#333]' : 'bg-rose-900 text-white'}`;
        toast.innerHTML = `<span>${type === 'success' ? '✅' : '⚠️'}</span><span>${message}</span>`;

        container.appendChild(toast);
        setTimeout(() => toast.classList.remove('translate-y-2'), 10);
        setTimeout(() => {
            toast.classList.add('opacity-0', 'translate-y-2');
            setTimeout(() => toast.remove(), 300);
        }, 3500);
    }
</script>
@endpush
@endsection
