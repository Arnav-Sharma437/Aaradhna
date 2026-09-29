@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header with Breadcrumbs & Action CTA -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Products
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Manage your catalog, stock levels, variants, pricing and storefront visibility.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.products.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading"
            >
                <span>+ Add Product</span>
            </a>
        </div>
    </div>

    <!-- Status Tabs (Shopify Style Filter Pills) -->
    <div class="flex items-center space-x-2 border-b border-[#E1E3E5] pb-3 overflow-x-auto shopify-scrollbar">
        <a 
            href="{{ route('admin.products.index') }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ !request('status') && !request('stock') ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            All Products <span class="ml-1 opacity-70">({{ $totalCount }})</span>
        </a>
        <a 
            href="{{ route('admin.products.index', ['status' => 'active']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'active' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Active <span class="ml-1 opacity-70">({{ $activeCount }})</span>
        </a>
        <a 
            href="{{ route('admin.products.index', ['status' => 'draft']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'draft' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Drafts <span class="ml-1 opacity-70">({{ $draftCount }})</span>
        </a>
        <a 
            href="{{ route('admin.products.index', ['stock' => 'low_stock']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('stock') === 'low_stock' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-amber-800 hover:bg-amber-50' }}"
        >
            Low Stock <span class="ml-1 opacity-70">({{ $lowStockCount }})</span>
        </a>
        <a 
            href="{{ route('admin.products.index', ['stock' => 'out_of_stock']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('stock') === 'out_of_stock' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-rose-800 hover:bg-rose-50' }}"
        >
            Out of Stock <span class="ml-1 opacity-70">({{ $outOfStockCount }})</span>
        </a>
    </div>

    <!-- Search & Filter Card (Shopify Polaris Table Controls) -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.products.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3 items-center">
                
                <!-- Search Input -->
                <div class="lg:col-span-5 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by title, SKU, or keyword..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <!-- Category Filter -->
                <div class="lg:col-span-3">
                    <select 
                        name="category_id" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Stock Filter -->
                <div class="lg:col-span-2">
                    <select 
                        name="stock" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="">All Stock</option>
                        <option value="in_stock" {{ request('stock') === 'in_stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="low_stock" {{ request('stock') === 'low_stock' ? 'selected' : '' }}>Low Stock (&le;30)</option>
                        <option value="out_of_stock" {{ request('stock') === 'out_of_stock' ? 'selected' : '' }}>Out of Stock (0)</option>
                    </select>
                </div>

                <!-- Sort Filter & Reset Button -->
                <div class="lg:col-span-2 flex items-center space-x-2">
                    <select 
                        name="sort" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="title_asc" {{ request('sort') === 'title_asc' ? 'selected' : '' }}>Title A-Z</option>
                        <option value="price_high_low" {{ request('sort') === 'price_high_low' ? 'selected' : '' }}>Price High-Low</option>
                        <option value="price_low_high" {{ request('sort') === 'price_low_high' ? 'selected' : '' }}>Price Low-High</option>
                        <option value="stock_asc" {{ request('sort') === 'stock_asc' ? 'selected' : '' }}>Stock Low-High</option>
                    </select>

                    @if(request()->hasAny(['search', 'category_id', 'stock', 'status', 'sort']))
                        <a href="{{ route('admin.products.index') }}" class="p-2 text-gray-500 hover:text-red-600 hover:bg-gray-100 rounded-[8px]" title="Reset Filters">
                            ✕
                        </a>
                    @endif
                </div>

            </div>
        </form>

        <!-- Products Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F7F8F9] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#E1E3E5]">
                    <tr>
                        <th class="px-5 py-3">Product</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Inventory</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Price</th>
                        <th class="px-4 py-3">Variants</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($products as $product)
                        @php
                            $img = $product->primaryImage->image_path ?? ($product->images->first()->image_path ?? 'assets/images/devi-refill-pack-card.jpg');
                        @endphp
                        <tr class="hover:bg-[#F9FAFB] transition-colors group">
                            <!-- Product Title & SKU -->
                            <td class="px-5 py-3.5">
                                <div class="flex items-center space-x-3.5">
                                    <div class="w-10 h-10 rounded-[8px] bg-[#FAF8F5] border border-[#E1E3E5] overflow-hidden shrink-0 flex items-center justify-center p-0.5">
                                        <img src="{{ asset($img) }}" alt="{{ $product->title }}" class="w-full h-full object-cover rounded-[6px]">
                                    </div>
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="font-bold text-[#202223] hover:text-[#D38928] truncate block text-xs">
                                            {{ $product->title }}
                                        </a>
                                        <div class="flex items-center space-x-2 text-[10px] text-gray-400 font-mono">
                                            <span>SKU: {{ $product->sku }}</span>
                                            @if($product->is_bestseller)
                                                <span class="text-amber-700 font-bold bg-amber-50 px-1.5 py-0.2 rounded font-sans">★ Bestseller</span>
                                            @endif
                                            @if($product->is_featured)
                                                <span class="text-blue-700 font-bold bg-blue-50 px-1.5 py-0.2 rounded font-sans">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Status Badge -->
                            <td class="px-4 py-3.5">
                                @if($product->status === 'active')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Active
                                    </span>
                                @elseif($product->status === 'draft')
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-700">
                                        Draft
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-100 text-rose-800">
                                        Archived
                                    </span>
                                @endif
                            </td>

                            <!-- Stock -->
                            <td class="px-4 py-3.5">
                                @if($product->stock_quantity > 30)
                                    <span class="text-emerald-700 font-semibold text-xs">
                                        {{ $product->stock_quantity }} in stock
                                    </span>
                                @elseif($product->stock_quantity > 0)
                                    <span class="text-amber-700 font-bold text-xs">
                                        {{ $product->stock_quantity }} low stock
                                    </span>
                                @else
                                    <span class="text-rose-700 font-bold text-xs">
                                        0 in stock (Sold Out)
                                    </span>
                                @endif
                            </td>

                            <!-- Category -->
                            <td class="px-4 py-3.5 text-gray-600 truncate max-w-[130px]">
                                {{ $product->category->name ?? 'None' }}
                            </td>

                            <!-- Price -->
                            <td class="px-4 py-3.5">
                                <div class="font-bold text-[#202223] font-heading">
                                    ₹{{ number_format($product->active_price, 2) }}
                                </div>
                                @if($product->sale_price && $product->base_price > $product->sale_price)
                                    <span class="text-[10px] text-gray-400 line-through">
                                        ₹{{ number_format($product->base_price, 2) }}
                                    </span>
                                @endif
                            </td>

                            <!-- Variants Count -->
                            <td class="px-4 py-3.5 text-gray-500 font-mono text-[11px]">
                                {{ $product->variants->count() }} {{ Str::plural('variant', $product->variants->count()) }}
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center space-x-1.5">
                                    
                                    <!-- Storefront preview link -->
                                    <a 
                                        href="{{ route('products.show', $product->slug) }}" 
                                        target="_blank"
                                        class="p-1.5 text-gray-400 hover:text-[#D38928] hover:bg-gray-100 rounded-md transition-colors"
                                        title="View on Storefront"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <!-- Edit Link -->
                                    <a 
                                        href="{{ route('admin.products.edit', $product) }}" 
                                        class="p-1.5 text-gray-600 hover:text-[#202223] hover:bg-gray-100 rounded-md transition-colors"
                                        title="Edit Product"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <!-- Quick Toggle Status Form -->
                                    <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="m-0 inline">
                                        @csrf
                                        @method('PATCH')
                                        <button 
                                            type="submit" 
                                            class="p-1.5 {{ $product->status === 'active' ? 'text-amber-600 hover:text-amber-700' : 'text-emerald-600 hover:text-emerald-700' }} hover:bg-gray-100 rounded-md transition-colors"
                                            title="{{ $product->status === 'active' ? 'Move to Draft' : 'Publish Product' }}"
                                        >
                                            @if($product->status === 'active')
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <!-- Delete Button Form -->
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="m-0 inline" onsubmit="return confirm('Are you sure you want to permanently delete \'{{ addslashes($product->title) }}\'?');">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="p-1.5 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"
                                            title="Delete Product"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="text-3xl">📦</div>
                                    <h4 class="text-sm font-bold text-[#202223] font-heading">No products found</h4>
                                    <p class="text-xs text-gray-400">Try changing your search terms or filters to find products.</p>
                                    <a href="{{ route('admin.products.create') }}" class="inline-block px-4 py-2 bg-[#D38928] text-white text-xs font-bold rounded-[8px]">
                                        Create Product
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] flex items-center justify-between bg-[#FCFCFD]">
                <div class="text-xs text-gray-500">
                    Showing <strong class="text-[#202223]">{{ $products->firstItem() }}</strong> to <strong class="text-[#202223]">{{ $products->lastItem() }}</strong> of <strong class="text-[#202223]">{{ $products->total() }}</strong> products
                </div>
                <div>
                    {{ $products->links() }}
                </div>
            </div>
        @endif

    </div>

</div>
@endsection
