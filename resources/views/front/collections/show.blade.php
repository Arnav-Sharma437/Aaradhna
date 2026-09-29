@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Aaradhna.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-[#FDFDFC] min-h-screen py-8 lg:py-12">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-xs text-sadhna-muted mb-6 space-x-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-sadhna-primary transition-colors">Home</a>
            <span>/</span>
            <a href="{{ route('collections.show', 'all') }}" class="hover:text-sadhna-primary transition-colors">Collections</a>
            <span>/</span>
            <span class="text-sadhna-primary font-bold">{{ $collection->title }}</span>
        </nav>

        <!-- Collection Hero Header / Banner -->
        <div class="bg-sadhna-warm-bg border border-sadhna-border/80 p-6 sm:p-10 mb-8 rounded-none relative overflow-hidden">
            <div class="max-w-3xl space-y-3 relative z-10">
                <span class="inline-block text-xs font-extrabold uppercase tracking-widest text-sadhna-maroon font-heading">
                    शुद्धं समर्पयामि ✦ Vedic Collection
                </span>
                
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-sadhna-primary font-heading tracking-tight">
                    {{ $collection->title }}
                </h1>
                
                <p class="text-sm sm:text-base text-sadhna-muted font-body leading-relaxed max-w-2xl">
                    {{ $collection->description }}
                </p>
            </div>

            <!-- Background subtle mandala watermark -->
            <div class="absolute -right-8 -bottom-12 opacity-10 text-sadhna-gold pointer-events-none hidden sm:block">
                <svg class="w-64 h-64" viewBox="0 0 24 24" fill="currentColor">
                    <circle cx="12" cy="12" r="10"/>
                </svg>
            </div>
        </div>

        <!-- Toolbar Bar: Active Filters, Mobile Filter Trigger & Sort Dropdown -->
        <div class="bg-white border border-sadhna-border p-4 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- Left: Mobile Filter Button & Total Count -->
            <div class="flex items-center justify-between w-full sm:w-auto space-x-4">
                <button 
                    type="button" 
                    id="filter-drawer-trigger"
                    class="lg:hidden inline-flex items-center px-4 py-2 border border-sadhna-border bg-sadhna-warm-bg text-xs font-bold text-sadhna-primary uppercase tracking-wider hover:bg-gray-100 transition-colors"
                >
                    <svg class="w-4 h-4 mr-2 text-sadhna-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                    </svg>
                    <span>Filters</span>
                </button>

                <span class="text-xs sm:text-sm font-semibold text-sadhna-muted">
                    Showing <strong class="text-sadhna-primary">{{ $products->total() }}</strong> {{ Str::plural('product', $products->total()) }}
                </span>
            </div>

            <!-- Right: Sort Dropdown Form -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                <label for="sort-select" class="text-xs font-bold uppercase tracking-wider text-sadhna-muted whitespace-nowrap">
                    Sort by:
                </label>
                <form method="GET" action="{{ url()->current() }}" id="sort-form" class="m-0">
                    {{-- Preserve existing filter queries --}}
                    @foreach(request()->except(['sort_by', 'page']) as $key => $val)
                        <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endforeach

                    <select 
                        id="sort-select" 
                        name="sort_by" 
                        onchange="this.form.submit()"
                        class="px-3 py-2 bg-white border border-sadhna-border text-xs sm:text-sm font-medium text-sadhna-primary focus:outline-none focus:border-sadhna-gold rounded-none cursor-pointer"
                    >
                        <option value="featured" {{ $sortBy === 'featured' ? 'selected' : '' }}>Featured</option>
                        <option value="best_selling" {{ $sortBy === 'best_selling' ? 'selected' : '' }}>Best Selling</option>
                        <option value="price_low_high" {{ $sortBy === 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high_low" {{ $sortBy === 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="title_asc" {{ $sortBy === 'title_asc' ? 'selected' : '' }}>Alphabetically: A-Z</option>
                        <option value="title_desc" {{ $sortBy === 'title_desc' ? 'selected' : '' }}>Alphabetically: Z-A</option>
                        <option value="newest" {{ $sortBy === 'newest' ? 'selected' : '' }}>Newest</option>
                    </select>
                </form>
            </div>

        </div>

        <!-- Main Layout: Filters Sidebar (Desktop) + Product Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Desktop Filters Sidebar (1 Column) -->
            <aside class="hidden lg:block lg:col-span-1 space-y-6">
                <div class="bg-white border border-sadhna-border p-6 divide-y divide-sadhna-border/70 space-y-6">
                    
                    <!-- Filter Header -->
                    <div class="flex items-center justify-between pb-2">
                        <h3 class="text-sm font-bold uppercase tracking-widest text-sadhna-primary font-heading flex items-center">
                            <svg class="w-4 h-4 mr-2 text-sadhna-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            Refine Products
                        </h3>
                        @if(request()->hasAny(['availability', 'price_min', 'price_max', 'category', 'pack_size']))
                            <a href="{{ url()->current() }}" class="text-xs font-bold text-sadhna-maroon hover:underline">
                                Clear All
                            </a>
                        @endif
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ url()->current() }}" class="space-y-6 pt-6">
                        @if(request()->filled('sort_by'))
                            <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                        @endif

                        <!-- Filter 1: Availability -->
                        <div class="space-y-2.5">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-sadhna-primary">
                                Availability
                            </h4>
                            <div class="space-y-2 text-xs text-sadhna-muted">
                                <label class="flex items-center cursor-pointer hover:text-sadhna-primary">
                                    <input 
                                        type="radio" 
                                        name="availability" 
                                        value="" 
                                        {{ !request()->filled('availability') ? 'checked' : '' }}
                                        onchange="this.form.submit()" 
                                        class="rounded-none text-sadhna-gold focus:ring-0 mr-2"
                                    >
                                    <span>All ({{ $inStockCount + $outOfStockCount }})</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:text-sadhna-primary">
                                    <input 
                                        type="radio" 
                                        name="availability" 
                                        value="in_stock" 
                                        {{ request('availability') === 'in_stock' ? 'checked' : '' }}
                                        onchange="this.form.submit()" 
                                        class="rounded-none text-sadhna-gold focus:ring-0 mr-2"
                                    >
                                    <span>In Stock ({{ $inStockCount }})</span>
                                </label>
                                <label class="flex items-center cursor-pointer hover:text-sadhna-primary">
                                    <input 
                                        type="radio" 
                                        name="availability" 
                                        value="out_of_stock" 
                                        {{ request('availability') === 'out_of_stock' ? 'checked' : '' }}
                                        onchange="this.form.submit()" 
                                        class="rounded-none text-sadhna-gold focus:ring-0 mr-2"
                                    >
                                    <span>Out of Stock ({{ $outOfStockCount }})</span>
                                </label>
                            </div>
                        </div>

                        <!-- Filter 2: Price Range -->
                        <div class="pt-6 space-y-2.5">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-sadhna-primary">
                                Price (₹ INR)
                            </h4>
                            <div class="grid grid-cols-2 gap-2 text-xs">
                                <div>
                                    <label class="text-[10px] text-sadhna-muted">Min ₹</label>
                                    <input 
                                        type="number" 
                                        name="price_min" 
                                        placeholder="0" 
                                        value="{{ request('price_min') }}"
                                        class="w-full p-2 border border-sadhna-border text-xs focus:outline-none focus:border-sadhna-gold"
                                    >
                                </div>
                                <div>
                                    <label class="text-[10px] text-sadhna-muted">Max ₹</label>
                                    <input 
                                        type="number" 
                                        name="price_max" 
                                        placeholder="1000" 
                                        value="{{ request('price_max') }}"
                                        class="w-full p-2 border border-sadhna-border text-xs focus:outline-none focus:border-sadhna-gold"
                                    >
                                </div>
                            </div>
                            <button type="submit" class="w-full mt-2 py-1.5 bg-sadhna-primary hover:bg-sadhna-gold text-white text-[11px] font-bold uppercase tracking-wider transition-colors">
                                Apply Price
                            </button>
                        </div>

                        <!-- Filter 3: Category Selection -->
                        <div class="pt-6 space-y-2.5">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-sadhna-primary">
                                Category
                            </h4>
                            <div class="space-y-1.5 text-xs text-sadhna-muted">
                                @foreach($allCategories as $cat)
                                    <label class="flex items-center justify-between cursor-pointer hover:text-sadhna-primary">
                                        <div class="flex items-center">
                                            <input 
                                                type="radio" 
                                                name="category" 
                                                value="{{ $cat->slug }}"
                                                {{ request('category') === $cat->slug ? 'checked' : '' }}
                                                onchange="this.form.submit()"
                                                class="rounded-none text-sadhna-gold focus:ring-0 mr-2"
                                            >
                                            <span>{{ $cat->name }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Filter 4: Pack Size -->
                        <div class="pt-6 space-y-2.5">
                            <h4 class="text-xs font-bold uppercase tracking-wider text-sadhna-primary">
                                Pack Size
                            </h4>
                            <div class="space-y-1.5 text-xs text-sadhna-muted">
                                @foreach(['40 Sticks', '100 Sticks', '12 Cups', '30 Cones', '100 ml'] as $size)
                                    <label class="flex items-center cursor-pointer hover:text-sadhna-primary">
                                        <input 
                                            type="radio" 
                                            name="pack_size" 
                                            value="{{ $size }}"
                                            {{ request('pack_size') === $size ? 'checked' : '' }}
                                            onchange="this.form.submit()"
                                            class="rounded-none text-sadhna-gold focus:ring-0 mr-2"
                                        >
                                        <span>{{ $size }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                    </form>

                </div>
            </aside>

            <!-- Product Grid (3 Columns on Desktop) -->
            <div class="lg:col-span-3">
                
                @if($products->count() > 0)
                    <div class="grid grid-cols-2 md:grid-cols-2 xl:grid-cols-3 gap-4 sm:gap-6">
                        @foreach($products as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>

                    <!-- Pagination Links -->
                    <div class="mt-12 flex justify-center">
                        {{ $products->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="bg-white border border-sadhna-border p-12 text-center space-y-4 my-8">
                        <div class="w-16 h-16 mx-auto bg-sadhna-warm-bg rounded-[10px] flex items-center justify-center text-sadhna-gold">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold font-heading text-sadhna-primary">No matching products found</h3>
                        <p class="text-xs text-sadhna-muted max-w-sm mx-auto">
                            Try adjusting your price range, availability, or category filters to discover our sacred pooja samagri.
                        </p>
                        <a href="{{ route('collections.show', $slug) }}" class="inline-block px-5 py-2 bg-sadhna-primary hover:bg-sadhna-gold text-white text-xs font-bold uppercase tracking-wider transition-colors">
                            Reset All Filters
                        </a>
                    </div>
                @endif

            </div>

        </div>

    </div>
</div>

<!-- Mobile Filter Drawer Modal -->
<div 
    id="mobile-filter-drawer" 
    class="fixed inset-0 z-50 overflow-hidden opacity-0 pointer-events-none transition-opacity duration-300 lg:hidden"
    aria-hidden="true"
>
    <div id="mobile-filter-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
        <div class="w-screen max-w-xs bg-white shadow-xl flex flex-col justify-between p-6 overflow-y-auto">
            
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-sadhna-border">
                    <h3 class="text-sm font-bold uppercase tracking-widest text-sadhna-primary font-heading">
                        Filters
                    </h3>
                    <button type="button" id="mobile-filter-close" class="p-1 text-sadhna-muted hover:text-sadhna-primary focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <!-- Mobile Filter Form -->
                <form method="GET" action="{{ url()->current() }}" class="space-y-6 pt-4 text-xs">
                    @if(request()->filled('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                    @endif

                    <!-- Availability -->
                    <div class="space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-sadhna-primary">Availability</h4>
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="availability" value="" {{ !request()->filled('availability') ? 'checked' : '' }} class="mr-2 text-sadhna-gold">
                            <span>All</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="availability" value="in_stock" {{ request('availability') === 'in_stock' ? 'checked' : '' }} class="mr-2 text-sadhna-gold">
                            <span>In Stock ({{ $inStockCount }})</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <input type="radio" name="availability" value="out_of_stock" {{ request('availability') === 'out_of_stock' ? 'checked' : '' }} class="mr-2 text-sadhna-gold">
                            <span>Out of Stock ({{ $outOfStockCount }})</span>
                        </label>
                    </div>

                    <!-- Category -->
                    <div class="pt-4 border-t border-sadhna-border space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-sadhna-primary">Category</h4>
                        @foreach($allCategories as $cat)
                            <label class="flex items-center cursor-pointer">
                                <input type="radio" name="category" value="{{ $cat->slug }}" {{ request('category') === $cat->slug ? 'checked' : '' }} class="mr-2 text-sadhna-gold">
                                <span>{{ $cat->name }}</span>
                            </label>
                        @endforeach
                    </div>

                    <!-- Price -->
                    <div class="pt-4 border-t border-sadhna-border space-y-2">
                        <h4 class="font-bold uppercase tracking-wider text-sadhna-primary">Price Range</h4>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="price_min" placeholder="Min ₹" value="{{ request('price_min') }}" class="p-2 border border-sadhna-border">
                            <input type="number" name="price_max" placeholder="Max ₹" value="{{ request('price_max') }}" class="p-2 border border-sadhna-border">
                        </div>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full py-2.5 bg-sadhna-primary text-white font-bold uppercase tracking-wider">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <div class="pt-4 border-t border-sadhna-border text-center">
                <a href="{{ url()->current() }}" class="text-xs text-sadhna-maroon font-bold underline">Clear All Filters</a>
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

        // Quick Add to Cart event dispatch
        const quickAddButtons = document.querySelectorAll('.quick-add-to-cart-btn');
        quickAddButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const title = btn.dataset.productTitle;
                const badge = document.getElementById('header-cart-badge');
                if (badge) {
                    const currentCount = parseInt(badge.textContent || '0') + 1;
                    window.dispatchEvent(new CustomEvent('cart:updated', { detail: { count: currentCount } }));
                }
                
                // Visual feedback on button
                const originalText = btn.innerHTML;
                btn.innerHTML = '<span>Added ✓</span>';
                btn.classList.add('bg-green-700');
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.classList.remove('bg-green-700');
                }, 1200);
            });
        });
    });
</script>
@endpush
