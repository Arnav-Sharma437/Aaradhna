@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Mangalam.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-6 lg:py-10 font-body">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- Top Bar: Total Count & Sort Dropdown -->
        <div class="bg-white rounded-[18px] border border-[#EADBCC] p-4 sm:p-5 mb-8 shadow-xs flex flex-col sm:flex-row items-center justify-between gap-4">
            
            <!-- Left: Total Items Count & Title -->
            <div class="flex items-center space-x-3">
                <h1 class="text-lg sm:text-xl font-black font-heading text-[#121212]">
                    {{ $collection->title }}
                </h1>
                <span class="text-xs font-semibold text-gray-400">
                    ({{ $products->total() }} {{ Str::plural('item', $products->total()) }})
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
                            class="px-4 py-2 pr-8 bg-[#FAF7F2] border border-[#EADBCC] text-xs sm:text-sm font-semibold text-[#121212] focus:outline-none focus:border-[#D38928] rounded-[10px] cursor-pointer shadow-2xs appearance-none"
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
                    <h3 class="text-xl font-bold font-heading text-[#121212]">No Sacred Items in this Category</h3>
                    <p class="text-xs sm:text-sm text-gray-500 max-w-sm mx-auto">
                        Please explore our complete range of pure bambooless incense and havan cups.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('collections.show', 'bambooless') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                            Explore Bambooless
                        </a>
                    </div>
                </div>
            @endif

        </div>

        <!-- ========================================================================= -->
        <!-- BOTTOM COLLECTION STORY & VEDIC RITUAL BRIEF                              -->
        <!-- ========================================================================= -->
        <div class="mt-16 sm:mt-24 pt-12 sm:pt-16 border-t border-[#EADBCC] bg-white rounded-[24px] p-6 sm:p-10 lg:p-12 shadow-xs border border-[#EADBCC] space-y-10">
            
            <!-- Header & Devotional Intro -->
            <div class="max-w-3xl space-y-3">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1 rounded-full bg-[#D38928]/10 border border-[#D38928]/30 text-[#D38928] text-[11px] sm:text-xs font-bold uppercase tracking-widest font-heading">
                    <span>✦</span>
                    <span>SACRED VIDHI &amp; CRAFTSMANSHIP</span>
                    <span>✦</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-serif font-normal text-[#121212] tracking-tight">
                    About Our {{ $collection->title }}
                </h2>
                <p class="text-xs sm:text-sm lg:text-base text-gray-600 leading-relaxed">
                    {{ $collection->description ?? 'Handcrafted according to timeless Ayurvedic traditions in Vrindavan Dham. Every single item is made without burning harmful bamboo or toxic black charcoal, preserving the sacred sanctity of your daily prayers and meditation.' }}
                </p>
            </div>

            <!-- 3 Sacred Heritage Pillars for the Collection -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                
                <div class="p-5 rounded-[16px] bg-[#FAF7F2] border border-[#EADBCC] space-y-2.5">
                    <div class="w-10 h-10 rounded-full bg-white border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-lg shadow-2xs">
                        🌿
                    </div>
                    <h3 class="text-sm sm:text-base font-bold text-[#121212] font-heading">100% Bamboo-Free</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Honoring scriptural prohibitions against burning Vamsha (bamboo). Gentle on the respiratory system and holy for deities.
                    </p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FAF7F2] border border-[#EADBCC] space-y-2.5">
                    <div class="w-10 h-10 rounded-full bg-white border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-lg shadow-2xs">
                        🌸
                    </div>
                    <h3 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Sacred Temple Flowers</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Recycled sacred blossoms from temple deities blended with pure Guggal, Loban, and Desi Cow Ghee.
                    </p>
                </div>

                <div class="p-5 rounded-[16px] bg-[#FAF7F2] border border-[#EADBCC] space-y-2.5">
                    <div class="w-10 h-10 rounded-full bg-white border border-[#D38928]/40 text-[#D38928] flex items-center justify-center text-lg shadow-2xs">
                        ✨
                    </div>
                    <h3 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Non-Toxic White Smoke</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Produces soothing, eye-friendly white smoke that naturally purifies prana and creates a peaceful sanctum.
                    </p>
                </div>

            </div>

            <!-- Devotional Note -->
            <div class="p-4 sm:p-5 rounded-[14px] bg-[#FAF3EA] border border-[#C27E27]/40 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center space-x-3.5">
                    <div class="w-9 h-9 rounded-full bg-[#831F2E] text-white flex items-center justify-center font-bold text-sm shrink-0 shadow-xs">
                        🪔
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#831F2E] font-heading">
                            Certified 100% Shuddh Vedic Vidhi Compliant
                        </h4>
                        <p class="text-[11px] sm:text-xs text-stone-700">
                            Suitable for everyday morning Sandhya, evening aartis, temple rituals, yoga and deep dhyan practice.
                        </p>
                    </div>
                </div>
                <a href="{{ route('bundles.trial-packs') }}" class="shrink-0 px-5 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] transition-colors font-heading shadow-xs whitespace-nowrap">
                    Explore Combos &rarr;
                </a>
            </div>

        </div>

    </div>
</div>
@endsection