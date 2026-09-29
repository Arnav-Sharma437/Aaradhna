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

        <!-- Top Bar: Total Count & Sort Dropdown -->
        <div class="bg-white rounded-[18px] border border-[#EADBCC] p-4 sm:p-5 mb-8 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- Left: Total Items Count -->
            <div class="flex items-center space-x-2">
                <span class="text-xs sm:text-sm font-semibold text-gray-500">
                    Showing <strong class="text-[#121212]">{{ $products->total() }}</strong> sacred {{ Str::plural('product', $products->total()) }}
                </span>
            </div>

            <!-- Right: Sort Dropdown -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-end">
                <label for="sort-select" class="text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap font-heading">
                    Sort by:
                </label>
                <form method="GET" action="{{ url()->current() }}" id="sort-form" class="m-0">
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

        <!-- Full-Width Clean Product Grid (4 Columns on Desktop, 2 Columns on Mobile) -->
        <div class="w-full">
            
            @if($products->count() > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-7">
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
                    <h3 class="text-xl sm:text-2xl font-bold font-heading text-[#121212]">No products found</h3>
                    <p class="text-xs sm:text-sm text-gray-500 max-w-md mx-auto">
                        Explore our complete collection of pure Vedic incense sticks, dhoop cones and havan cups.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('collections.show', 'all') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                            View All Products
                        </a>
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>
@endsection
