@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Mangalam.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-8 lg:py-12 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-xs text-gray-500 mb-6 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('collections.show', 'all') }}" class="hover:text-[#D38928] transition-colors">Collections</a>
            <span>/</span>
            <span class="text-[#121212] font-bold">{{ $collection->title }}</span>
        </nav>

        <!-- Collection Header / Sacred Banner -->
        <div class="bg-gradient-to-r from-[#FFFDF9] via-[#FAF3EA] to-[#FFFDF9] border border-[#EADBCC] rounded-[24px] p-6 sm:p-10 mb-8 shadow-xs relative overflow-hidden">
            <div class="max-w-3xl space-y-2.5 relative z-10">
                <span class="inline-block text-[11px] font-extrabold uppercase tracking-[0.2em] text-[#965A15] font-heading">
                    ✦ शुद्धं समर्पयामि • VEDIC COLLECTION ✦
                </span>
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                    {{ $collection->title }}
                </h1>
                
                <p class="text-xs sm:text-sm text-gray-600 font-light leading-relaxed max-w-2xl">
                    {{ $collection->description }}
                </p>
            </div>

            <!-- Background subtle spiritual watermark -->
            <div class="absolute -right-6 -bottom-10 opacity-10 text-[#D38928] pointer-events-none hidden sm:block select-none text-9xl">
                🪔
            </div>
        </div>

        <!-- Toolbar Bar: Active Filters, Mobile Filter Trigger & Sort Dropdown -->
        <div class="bg-white rounded-[18px] border border-[#EADBCC] p-4 sm:p-5 mb-8 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- Left: Mobile Filter Button & Total Count -->
            <div class="flex items-center justify-between w-full sm:w-auto space-x-4">
                <button 
                    type="button" 
                    id="filter-drawer-trigger"
                    class="lg:hidden inline-flex items-center px-4 py-2.5 rounded-[10px] border border-[#D38928] bg-[#FAF7F2] hover:bg-[#D38928] hover:text-white text-xs font-bold text-[#121212] uppercase tracking-wider transition-all font-heading cursor-pointer shadow-xs"
                >
                    <svg class="w-4 h-4 mr-2 text-[#D38928]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <span>Refine Filters</span>
                </button>

                <span class="text-xs sm:text-sm font-semibold text-gray-500">
                    Showing <strong class="text-[#121212]">{{ $products->total() }}</strong> sacred {{ Str::plural('item', $products->total()) }}
                </span>
            </div>

            <!-- Right: Sort Dropdown Form -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                <label for="sort-select" class="text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap font-heading">
                    Sort by:
                </label>
                <form method="GET" action="{{ url()->current() }}" id="sort-form" class="m-0">
                    {{-- Preserve existing filter queries --}}
                    @foreach(request()->except(['sort_by', 'page']) as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endforeach

                    <div class="relative">
                        <select 
                            id="sort-select" 
                            name="sort_by" 
                            onchange="this.form.submit()"
                            class="px-4 py-2.5 pr-8 bg-[#FAF7F2] border border-[#EADBCC] text-xs sm:text-sm font-semibold text-[#121212] focus:outline-none focus:border-[#D38928] rounded-[10px] cursor-pointer shadow-2xs appearance-none"
                        >
                            <option value="featured" {{ $sortBy === 'featured' ? 'selected' : '' }}>Featured</option>
                            <option value="best_selling" {{ $sortBy === 'best_selling' ? 'selected' : '' }}>Best Selling</option>
                            <option value="price_low_high" {{ $sortBy === 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_high_low" {{ $sortBy === 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="title_asc" {{ $sortBy === 'title_asc' ? 'selected' : '' }}>Alphabetically: A-Z</option>
                            <option value="title_desc" {{ $sortBy === 'title_desc' ? 'selected' : '' }}>Alphabetically: Z-A</option>
                            <option value="newest" {{ $sortBy === 'newest' ? 'selected' : '' }}>Newest</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-500">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!-- Main Layout: Filters Sidebar (Desktop) + Product Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Desktop Filters Sidebar (3.5 Columns) -->
            <aside class="hidden lg:block lg:col-span-3 sticky top-28 space-y-6">
                
                <div class="bg-white rounded-[22px] border border-[#EADBCC] p-6 shadow-xs divide-y divide-[#EADBCC] space-y-6">
                    
                    <!-- Filter Header -->
                    <div class="flex items-center justify-between pb-1">
                        <div class="flex items-center space-x-2">
                            <span class="text-base text-[#D38928]">🎛️</span>
                            <h3 class="text-sm font-bold uppercase tracking-wider text-[#121212] font-heading">
                                Refine Products
                            </h3>
                        </div>
                        @if(request()->hasAny(['availability', 'price_min', 'price_max', 'category', 'pack_size']))
                            <a href="{{ url()->current() }}" class="text-[11px] font-bold text-[#9B1C31] hover:underline font-heading">
                                Clear All
                            </a>
                        @endif
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ url()->current() }}" class="space-y-6 pt-5" id="desktop-filter-form">
                        @if(request()->filled('sort_by'))
                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                        @endif

                        <!-- Filter 1: Availability (Custom Radio Pills) -->
                        <div class="space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-[#121212] font-heading flex items-center justify-between">
                                <span>Availability</span>
                            </h4>
                            <div class="space-y-2 text-xs">
                                <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group">
                                    <div class="flex items-center space-x-2.5">
                                        <input 
                                            type="radio" 
                                            name="availability" 
                                            value="" 
                                            {{ !request()->filled('availability') ? 'checked' : '' }}
                                            onchange="this.form.submit()" 
                                            class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                        >
                                        <span class="font-medium text-gray-700 group-hover:text-[#121212]">All Items</span>
                                    </div>
                                    <span class="text-[11px] font-bold text-gray-400 font-mono">({{ $totalActiveCount ?? ($inStockCount + $outOfStockCount) }})</span>
                                </label>

                                <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group">
                                    <div class="flex items-center space-x-2.5">
                                        <input 
                                            type="radio" 
                                            name="availability" 
                                            value="in_stock" 
                                            {{ request('availability') === 'in_stock' ? 'checked' : '' }}
                                            onchange="this.form.submit()" 
                                            class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                        >
                                        <span class="font-medium text-gray-700 group-hover:text-[#121212]">In Stock</span>
                                    </div>
                                    <span class="text-[11px] font-bold text-emerald-700 font-mono">({{ $inStockCount }})</span>
                                </label>

                                <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group">
                                    <div class="flex items-center space-x-2.5">
                                        <input 
                                            type="radio" 
                                            name="availability" 
                                            value="out_of_stock" 
                                            {{ request('availability') === 'out_of_stock' ? 'checked' : '' }}
                                            onchange="this.form.submit()" 
                                            class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                        >
                                        <span class="font-medium text-gray-700 group-hover:text-[#121212]">Out of Stock</span>
                                    </div>
                                    <span class="text-[11px] font-bold text-gray-400 font-mono">({{ $outOfStockCount }})</span>
                                </label>
                            </div>
                        </div>

                        <!-- Filter 2: Price Range Slider & Inputs -->
                        <div class="pt-6 space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-[#121212] font-heading flex items-center justify-between">
                                <span>Price (₹ INR)</span>
                                @if(request()->filled('price_min') || request()->filled('price_max'))
                                    <span class="text-[10px] text-[#D38928] font-mono">Filtered</span>
                                @endif
                            </h4>
                            
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <div>
                                    <label class="text-[10px] text-gray-400 font-bold uppercase block mb-1">Min (₹)</label>
                                    <input 
                                        type="number" 
                                        name="price_min" 
                                        placeholder="0" 
                                        min="0"
                                        value="{{ request('price_min') }}"
                                        class="w-full p-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs font-bold text-[#121212] focus:outline-none focus:border-[#D38928]"
                                    >
                                </div>
                                <div>
                                    <label class="text-[10px] text-gray-400 font-bold uppercase block mb-1">Max (₹)</label>
                                    <input 
                                        type="number" 
                                        name="price_max" 
                                        placeholder="1999" 
                                        min="0"
                                        value="{{ request('price_max') }}"
                                        class="w-full p-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs font-bold text-[#121212] focus:outline-none focus:border-[#D38928]"
                                    >
                                </div>
                            </div>
                            <button type="submit" class="w-full py-2.5 bg-[#121212] hover:bg-[#D38928] active:bg-[#965A15] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] transition-all shadow-xs font-heading cursor-pointer">
                                Apply Price
                            </button>
                        </div>

                        <!-- Filter 3: Category Selection (with dynamic active highlights) -->
                        <div class="pt-6 space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-[#121212] font-heading flex items-center justify-between">
                                <span>Category</span>
                            </h4>
                            <div class="space-y-1 text-xs">
                                <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group">
                                    <div class="flex items-center space-x-2.5">
                                        <input 
                                            type="radio" 
                                            name="category" 
                                            value=""
                                            {{ !request()->filled('category') ? 'checked' : '' }}
                                            onchange="this.form.submit()"
                                            class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                        >
                                        <span class="font-medium text-gray-700 group-hover:text-[#121212]">All Categories</span>
                                    </div>
                                </label>

                                @foreach($allCategories as $cat)
                                    <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group {{ request('category') === $cat->slug ? 'bg-[#FAF3EA]' : '' }}">
                                        <div class="flex items-center space-x-2.5 truncate">
                                            <input 
                                                type="radio" 
                                                name="category" 
                                                value="{{ $cat->slug }}"
                                                {{ request('category') === $cat->slug ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                                class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300 shrink-0"
                                            >
                                            <span class="font-medium text-gray-700 group-hover:text-[#121212] truncate">{{ $cat->name }}</span>
                                        </div>
                                        @if(isset($cat->products_count))
                                            <span class="text-[10px] font-bold text-gray-400 font-mono">({{ $cat->products_count }})</span>
                                        @endif
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filter 4: Pack Size Filter -->
                        <div class="pt-6 space-y-3">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-[#121212] font-heading flex items-center justify-between">
                                <span>Pack Size</span>
                            </h4>
                            <div class="space-y-1 text-xs">
                                <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group">
                                    <div class="flex items-center space-x-2.5">
                                        <input 
                                            type="radio" 
                                            name="pack_size" 
                                            value=""
                                            {{ !request()->filled('pack_size') ? 'checked' : '' }}
                                            onchange="this.form.submit()"
                                            class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                        >
                                        <span class="font-medium text-gray-700 group-hover:text-[#121212]">All Pack Sizes</span>
                                    </div>
                                </label>

                                @foreach(['40', '100', '12', '30', '100 ml'] as $size)
                                    @php
                                        $label = $size === '100 ml' ? '100 ml Bottle' : (in_array($size, ['40', '100']) ? "Pack of {$size} Sticks" : ($size === '12' ? 'Pack of 12 Cups' : "Pack of {$size} Cones"));
                                    @endphp
                                    <label class="flex items-center justify-between p-2 rounded-[8px] hover:bg-[#FAF7F2] cursor-pointer transition-colors group {{ request('pack_size') === $size ? 'bg-[#FAF3EA]' : '' }}">
                                        <div class="flex items-center space-x-2.5">
                                            <input 
                                                type="radio" 
                                                name="pack_size" 
                                                value="{{ $size }}"
                                                {{ request('pack_size') === $size ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                                class="w-4 h-4 text-[#D38928] focus:ring-[#D38928] border-gray-300"
                                            >
                                            <span class="font-medium text-gray-700 group-hover:text-[#121212]">{{ $label }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                    </form>

                </div>
            </aside>

            <!-- Product Grid (9 Columns on Desktop) -->
            <div class="lg:col-span-9">
                
                @if($products->count() > 0)
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-7">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-14 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="bg-white rounded-[24px] border border-[#EADBCC] p-12 sm:p-16 text-center space-y-4 shadow-xs">
                        <div class="w-16 h-16 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-[#D38928] text-3xl">
                            🪔
                        </div>
                        <h3 class="text-xl sm:text-2xl font-bold font-heading text-[#121212]">No matching sacred items found</h3>
                        <p class="text-xs sm:text-sm text-gray-500 max-w-md mx-auto">
                            Try adjusting your price range, availability, or category filters to discover our pure Vedic pooja samagri.
                        </p>
                        <div class="pt-2">
                            <a href="{{ route('collections.show', $slug) }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                                Reset All Filters
                            </a>
                        </div>
                    </div>
                @endif

            </div>

        </div>

    </div>
</div>

<!-- Mobile Filter Drawer Modal -->
<div 
    id="mobile-filter-drawer" 
    class="fixed inset-0 z-50 overflow-hidden opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden font-body"
    aria-hidden="true"
>
    <div id="mobile-filter-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-xs"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div class="w-screen max-w-xs sm:max-w-sm bg-white shadow-2xl flex flex-col justify-between p-6 overflow-y-auto">
            
            <div class="space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-[#EADBCC]">
                    <div class="flex items-center space-x-2">
                        <span class="text-base text-[#D38928]">🎛️</span>
                        <h3 class="text-base font-bold uppercase tracking-wider text-[#121212] font-heading">
                            Refine Filters
                        </h3>
                    </div>
                    <button type="button" id="mobile-filter-close" class="p-1.5 text-gray-400 hover:text-[#121212] rounded-full hover:bg-gray-100 transition-colors focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Mobile Filter Form -->
                <form method="GET" action="{{ url()->current() }}" class="space-y-6 text-xs">
                    @if(request()->filled('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif

                    <!-- Availability -->
                    <div class="space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-[#121212] font-heading">Availability</h4>
                        <div class="space-y-2">
                            <label class="flex items-center justify-between p-2 rounded-[8px] bg-[#FAF7F2]">
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="availability" value="" {{ !request()->filled('availability') ? 'checked' : '' }} class="text-[#D38928]">
                                    <span>All</span>
                                </div>
                                <span class="font-bold text-gray-400">({{ $totalActiveCount ?? ($inStockCount + $outOfStockCount) }})</span>
                            </label>
                            <label class="flex items-center justify-between p-2 rounded-[8px] bg-[#FAF7F2]">
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="availability" value="in_stock" {{ request('availability') === 'in_stock' ? 'checked' : '' }} class="text-[#D38928]">
                                    <span>In Stock</span>
                                </div>
                                <span class="font-bold text-emerald-700">({{ $inStockCount }})</span>
                            </label>
                            <label class="flex items-center justify-between p-2 rounded-[8px] bg-[#FAF7F2]">
                                <div class="flex items-center space-x-2">
                                    <input type="radio" name="availability" value="out_of_stock" {{ request('availability') === 'out_of_stock' ? 'checked' : '' }} class="text-[#D38928]">
                                    <span>Out of Stock</span>
                                </div>
                                <span class="font-bold text-gray-400">({{ $outOfStockCount }})</span>
                            </label>
                        </div>
                    </div>

                    <!-- Category -->
                    <div class="pt-4 border-t border-[#EADBCC] space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-[#121212] font-heading">Category</h4>
                        <div class="space-y-1.5 max-h-48 overflow-y-auto">
                            <label class="flex items-center p-2 rounded-[8px] hover:bg-[#FAF7F2]">
                                <input type="radio" name="category" value="" {{ !request()->filled('category') ? 'checked' : '' }} class="mr-2 text-[#D38928]">
                                <span>All Categories</span>
                            </label>
                            @foreach($allCategories as $cat)
                                <label class="flex items-center p-2 rounded-[8px] hover:bg-[#FAF7F2]">
                                    <input type="radio" name="category" value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'checked' : '' }} class="mr-2 text-[#D38928]">
                                    <span>{{ $cat->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="pt-4 border-t border-[#EADBCC] space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-[#121212] font-heading">Price Range (₹)</h4>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="price_min" placeholder="Min ₹" value="{{ request('price_min') }}" class="p-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs font-bold">
                            <input type="number" name="price_max" placeholder="Max ₹" value="{{ request('price_max') }}" class="p-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs font-bold">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-3 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold uppercase tracking-wider rounded-[10px] shadow-md font-heading">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <div class="pt-6 border-t border-[#EADBCC] text-center">
                <a href="{{ url()->current() }}" class="text-xs text-[#9B1C31] font-bold underline font-heading">Reset All Filters</a>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile Filter Drawer
        const filterTrigger = document.getElementById('filter-drawer-trigger');
        const filterDrawer = document.getElementById('mobile-filter-drawer');
        const filterBackdrop = document.getElementById('mobile-filter-backdrop');
        const filterClose = document.getElementById('mobile-filter-close');

        if (filterTrigger && filterDrawer) {
            filterTrigger.addEventListener('click', () => {
                filterDrawer.classList.remove('opacity-0', 'pointer-events-none');
                filterDrawer.classList.add('opacity-100');
                document.body.classList.add('overflow-hidden');
            });

            const closeFilter = () => {
                filterDrawer.classList.add('opacity-0', 'pointer-events-none');
                filterDrawer.classList.remove('opacity-100');
                document.body.classList.remove('overflow-hidden');
            };

            if (filterClose) filterClose.addEventListener('click', closeFilter);
            if (filterBackdrop) filterBackdrop.addEventListener('click', closeFilter);
        }
    });
</script>
@endpush
