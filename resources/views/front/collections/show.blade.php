@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Manglam.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-white min-h-screen py-6 lg:py-10 pb-24 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- ========================================================================= -->
        <!-- TOP FILTER & SORT BAR (Inline Active Tags & Sort By Dropdown)              -->
        <!-- ========================================================================= -->
        @php
            $activeAvail = (array) request('availability', []);
            $availSelectedCount = count($activeAvail);
            $hasPriceFilter = request()->filled('price_min') || request()->filled('price_max');
            $hasActiveFilters = $availSelectedCount > 0 || $hasPriceFilter;
            $currentSort = request('sort_by', 'featured');
        @endphp

        <form id="collection-filter-form" method="GET" action="{{ url()->current() }}" class="w-full mb-8">
            @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 py-2 border-b border-[#EADBCC]/60 pb-4">
                
                <!-- Left: Filter Buttons + Inline Selected Badges -->
                <div class="flex items-center space-x-2.5 sm:space-x-3 text-sm flex-wrap gap-y-2.5">
                    <span class="text-[#121212] font-normal text-sm sm:text-base mr-1">Filter:</span>

                    <!-- 1. Availability Dropdown -->
                    <div class="relative inline-block text-left" id="availability-dropdown-wrapper">
                        <button 
                            type="button" 
                            id="availability-toggle-btn"
                            class="px-4 py-2 {{ $availSelectedCount > 0 ? 'bg-[#EEDBC5] border-[#D38928]/60 text-[#2B1810]' : 'bg-[#FAF5EE] hover:bg-[#F3ECE0] border-[#EADBCC]/50 text-[#1F1F1F]' }} rounded-[10px] text-xs sm:text-sm font-medium flex items-center gap-1.5 transition-colors cursor-pointer border"
                        >
                            <span class="{{ $availSelectedCount > 0 ? 'underline underline-offset-4 decoration-2 decoration-[#121212] font-semibold' : '' }}">Availability</span>
                            <svg class="w-3.5 h-3.5 text-gray-500 transition-transform duration-200" id="availability-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Popover Card (Availability) -->
                        <div 
                            id="availability-popover" 
                            class="hidden absolute top-full left-0 mt-2 w-64 bg-white rounded-[12px] shadow-[0_10px_30px_rgba(0,0,0,0.12)] border border-[#EADBCC] z-50 p-4 font-body"
                        >
                            <div class="flex items-center justify-between pb-3 border-b border-gray-200 text-xs sm:text-sm">
                                <span class="text-gray-600">{{ $availSelectedCount }} selected</span>
                                <a 
                                    href="{{ request()->fullUrlWithQuery(['availability' => null, 'page' => null]) }}" 
                                    class="text-gray-700 underline hover:text-[#D38928] cursor-pointer"
                                >
                                    Reset
                                </a>
                            </div>
                            <div class="space-y-3 pt-3">
                                <label class="flex items-center space-x-3 cursor-pointer text-xs sm:text-sm text-gray-800 hover:text-black select-none">
                                    <input 
                                        type="checkbox" 
                                        name="availability[]" 
                                        value="in_stock" 
                                        onchange="document.getElementById('collection-filter-form').submit()"
                                        {{ in_array('in_stock', $activeAvail) ? 'checked' : '' }}
                                        class="w-4 h-4 rounded border-gray-300 text-[#D38928] focus:ring-[#D38928] cursor-pointer"
                                    >
                                    <span>In stock ({{ $inStockCount }})</span>
                                </label>
                                <label class="flex items-center space-x-3 cursor-pointer text-xs sm:text-sm text-gray-800 hover:text-black select-none">
                                    <input 
                                        type="checkbox" 
                                        name="availability[]" 
                                        value="out_of_stock" 
                                        onchange="document.getElementById('collection-filter-form').submit()"
                                        {{ in_array('out_of_stock', $activeAvail) ? 'checked' : '' }}
                                        class="w-4 h-4 rounded border-gray-300 text-[#D38928] focus:ring-[#D38928] cursor-pointer"
                                    >
                                    <span>Out of stock ({{ $outOfStockCount }})</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Price Dropdown -->
                    <div class="relative inline-block text-left" id="price-dropdown-wrapper">
                        <button 
                            type="button" 
                            id="price-toggle-btn"
                            class="px-4 py-2 {{ $hasPriceFilter ? 'bg-[#EEDBC5] border-[#D38928]/60 text-[#2B1810]' : 'bg-[#FAF5EE] hover:bg-[#F3ECE0] border-[#EADBCC]/50 text-[#1F1F1F]' }} rounded-[10px] text-xs sm:text-sm font-medium flex items-center gap-1.5 transition-colors cursor-pointer border"
                        >
                            <span class="{{ $hasPriceFilter ? 'underline underline-offset-4 decoration-2 decoration-[#121212] font-semibold' : '' }}">Price</span>
                            <svg class="w-3.5 h-3.5 text-gray-500 transition-transform duration-200" id="price-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>

                        <!-- Popover Card (Price) -->
                        <div 
                            id="price-popover" 
                            class="hidden absolute top-full left-0 mt-2 w-72 bg-white rounded-[12px] shadow-[0_10px_30px_rgba(0,0,0,0.12)] border border-[#EADBCC] z-50 p-4 font-body"
                        >
                            <div class="flex items-center justify-between pb-3 border-b border-gray-200 text-xs sm:text-sm">
                                <span class="text-gray-600">The highest price is ₹{{ number_format($maxProductPrice, 2) }}</span>
                                <a 
                                    href="{{ request()->fullUrlWithQuery(['price_min' => null, 'price_max' => null, 'page' => null]) }}" 
                                    class="text-gray-700 underline hover:text-[#D38928] cursor-pointer"
                                >
                                    Reset
                                </a>
                            </div>
                            <div class="grid grid-cols-2 gap-3 pt-3">
                                <div class="flex items-center border border-gray-300 rounded-[6px] px-2.5 py-1.5 focus-within:border-black focus-within:ring-1 focus-within:ring-black">
                                    <span class="text-xs text-gray-500 mr-1.5 font-medium">₹</span>
                                    <input 
                                        type="number" 
                                        name="price_min" 
                                        placeholder="From" 
                                        value="{{ request('price_min') }}" 
                                        onkeydown="if(event.key === 'Enter'){ event.preventDefault(); document.getElementById('collection-filter-form').submit(); }"
                                        onchange="document.getElementById('collection-filter-form').submit();"
                                        class="w-full text-xs outline-none bg-transparent" 
                                    />
                                </div>
                                <div class="flex items-center border border-gray-300 rounded-[6px] px-2.5 py-1.5 focus-within:border-black focus-within:ring-1 focus-within:ring-black">
                                    <span class="text-xs text-gray-500 mr-1.5 font-medium">₹</span>
                                    <input 
                                        type="number" 
                                        name="price_max" 
                                        placeholder="To" 
                                        value="{{ request('price_max') }}" 
                                        onkeydown="if(event.key === 'Enter'){ event.preventDefault(); document.getElementById('collection-filter-form').submit(); }"
                                        onchange="document.getElementById('collection-filter-form').submit();"
                                        class="w-full text-xs outline-none bg-transparent" 
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Active Filter Badges Inline (In the exact same row) -->
                    @if(in_array('in_stock', $activeAvail))
                        @php
                            $newAvail = array_values(array_diff($activeAvail, ['in_stock']));
                        @endphp
                        <a 
                            href="{{ request()->fullUrlWithQuery(['availability' => count($newAvail) > 0 ? $newAvail : null, 'page' => null]) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#F0E4D4] hover:bg-[#E5D5C1] text-[#2B1810] rounded-full text-xs font-semibold border border-[#D5BEA6] shadow-2xs transition-colors group cursor-pointer"
                            title="Remove In stock filter"
                        >
                            <span>Availability: In stock</span>
                            <span class="text-gray-500 group-hover:text-black font-bold text-[11px] leading-none">✕</span>
                        </a>
                    @endif

                    @if(in_array('out_of_stock', $activeAvail))
                        @php
                            $newAvail = array_values(array_diff($activeAvail, ['out_of_stock']));
                        @endphp
                        <a 
                            href="{{ request()->fullUrlWithQuery(['availability' => count($newAvail) > 0 ? $newAvail : null, 'page' => null]) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#F0E4D4] hover:bg-[#E5D5C1] text-[#2B1810] rounded-full text-xs font-semibold border border-[#D5BEA6] shadow-2xs transition-colors group cursor-pointer"
                            title="Remove Out of stock filter"
                        >
                            <span>Availability: Out of stock</span>
                            <span class="text-gray-500 group-hover:text-black font-bold text-[11px] leading-none">✕</span>
                        </a>
                    @endif

                    @if($hasPriceFilter)
                        <a 
                            href="{{ request()->fullUrlWithQuery(['price_min' => null, 'price_max' => null, 'page' => null]) }}"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-[#F0E4D4] hover:bg-[#E5D5C1] text-[#2B1810] rounded-full text-xs font-semibold border border-[#D5BEA6] shadow-2xs transition-colors group cursor-pointer"
                            title="Remove Price filter"
                        >
                            <span>Price: ₹{{ request('price_min', 0) }} - ₹{{ request('price_max', $maxProductPrice) }}</span>
                            <span class="text-gray-500 group-hover:text-black font-bold text-[11px] leading-none">✕</span>
                        </a>
                    @endif

                    @if($hasActiveFilters)
                        <a 
                            href="{{ request()->fullUrlWithQuery(['availability' => null, 'price_min' => null, 'price_max' => null, 'page' => null]) }}" 
                            class="text-xs sm:text-sm text-[#1F1F1F] hover:text-[#D38928] underline underline-offset-3 font-medium ml-1 transition-colors cursor-pointer"
                        >
                            Remove all
                        </a>
                    @endif

                </div>

                <!-- Right: Sort by Dropdown & Product Count -->
                <div class="flex items-center justify-between sm:justify-end gap-4 text-xs sm:text-sm shrink-0 w-full lg:w-auto mt-2 lg:mt-0">
                    <div class="flex items-center gap-2">
                        <label for="sort_by" class="text-gray-600 font-medium whitespace-nowrap">Sort by:</label>
                        <div class="relative inline-block">
                            <select 
                                id="sort_by" 
                                name="sort_by" 
                                onchange="document.getElementById('collection-filter-form').submit()"
                                class="appearance-none bg-[#FAF5EE] hover:bg-[#F3ECE0] border border-[#EADBCC]/70 rounded-[10px] pl-3 pr-8 py-2 text-xs sm:text-sm font-medium text-[#1F1F1F] focus:outline-none focus:border-[#D38928] cursor-pointer transition-colors"
                            >
                                <option value="featured" {{ $currentSort === 'featured' ? 'selected' : '' }}>Featured</option>
                                <option value="best_selling" {{ $currentSort === 'best_selling' ? 'selected' : '' }}>Best selling</option>
                                <option value="title_asc" {{ $currentSort === 'title_asc' ? 'selected' : '' }}>Alphabetically, A-Z</option>
                                <option value="title_desc" {{ $currentSort === 'title_desc' ? 'selected' : '' }}>Alphabetically, Z-A</option>
                                <option value="price_low_high" {{ $currentSort === 'price_low_high' ? 'selected' : '' }}>Price, low to high</option>
                                <option value="price_high_low" {{ $currentSort === 'price_high_low' ? 'selected' : '' }}>Price, high to low</option>
                                <option value="newest" {{ $currentSort === 'newest' ? 'selected' : '' }}>Date, new to old</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2.5 text-gray-500">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </div>
                        </div>
                    </div>

                    <span class="text-gray-500 font-medium whitespace-nowrap">
                        {{ $products->total() }} {{ Str::plural('product', $products->total()) }}
                    </span>
                </div>

            </div>
        </form>

        <!-- Full-Width Clean Product Grid (4 Columns on Desktop, 2 Columns on Mobile) -->
        <div class="w-full">
            
            @if($products->count() > 0)
                <div id="products-grid" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-[10px]">
                    @foreach($products as $index => $product)
                        <div class="product-item {{ $index >= 4 ? 'reveal-from-left' : '' }}" data-index="{{ $index }}">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>

                <!-- Infinite Scroll Sentinel & Loading Indicator (Automatic Load on Scroll) -->
                <div id="infinite-scroll-container" class="mt-12 {{ $products->hasMorePages() ? '' : 'hidden' }}">
                    <div id="infinite-scroll-sentinel" class="py-6 flex flex-col items-center justify-center space-y-3" data-next-url="{{ $products->nextPageUrl() }}">
                        <div class="flex items-center space-x-2.5 px-5 py-2.5 bg-[#FAF5EE] rounded-full border border-[#EADBCC] text-xs font-semibold text-[#8C6239] shadow-2xs">
                            <svg class="animate-spin h-4 w-4 text-[#D38928]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Loading more sacred products...</span>
                        </div>
                    </div>
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
        <!-- BOTTOM EDITORIAL BRAND & COLLECTION NARRATIVE (Competitor-Inspired Pure Luxury) -->
        <!-- ========================================================================= -->
        <div class="mt-20 sm:mt-28 pt-12 sm:pt-16 border-t border-[#EADBCC] max-w-5xl">
            
            <!-- 1. Top Sacred Blessing Tag (Matching Reference Screenshot) -->
            <div class="mb-4">
                <span class="text-sm sm:text-base font-serif font-medium text-gray-700 inline-flex items-center gap-1.5">
                    <span>All Blessed</span>
                    <span class="text-base">🙏</span>
                </span>
            </div>

            <!-- 2. Main Golden Serif Headline -->
            <h2 class="text-2xl sm:text-3xl lg:text-[34px] font-serif font-normal text-[#C87A1E] leading-snug mb-8 sm:mb-10">
                Buy Natural {{ $collection->title }} for Pooja &amp; Meditation – Long-Lasting &amp; Low Smoke
            </h2>

            <!-- 3. Editorial Article Content -->
            <div class="space-y-8 sm:space-y-10 font-body text-gray-700">

                @if($collection->slug === 'dhoop-cones')
                    <!-- Section 1 -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Pure &amp; Fragrant Dhoop Cones for Daily Spiritual Practice
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Our dhoop cones are crafted for purity, calm, and long-lasting aroma. With a clean burn time of 30–35 minutes, they’re ideal for pooja, meditation, or simply bringing peace to your home. These bamboo-less and charcoal-free incense cones produce low smoke, making them safe and soothing—even in enclosed spaces.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Unlike chemical-based incense, our natural dhoop cones are made using essential oils, cow dung, temple flowers, and sacred herbs. The fragrance lingers for up to 3–4 hours in a closed room, offering a serene environment for your spiritual rituals.
                        </p>
                    </div>

                    <!-- Section 2 -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Available in Sacred Scents for Every Mood
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Choose from a variety of natural fragrances, each curated for specific occasions: 
                            <a href="{{ route('products.show', 'chandan-saanjh') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Chandan (Sandalwood) dhoop cones</a>, 
                            <a href="{{ route('products.show', 'divya-naagchampa') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Nagchampa dhoop cones</a>, 
                            <a href="{{ route('products.show', 'swarna-pushpa') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Mogra dhoop cones</a>, 
                            <a href="{{ route('products.show', 'rooh-rose') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Rose dhoop cones</a>, 
                            <a href="{{ route('products.show', 'google-dhoop') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Guggal dhoop cones</a>, and 
                            <a href="{{ route('products.show', 'lavender-veda') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Lavender dhoop cones</a>.
                        </p>
                    </div>

                    <!-- Section 3 -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Eco-Friendly, Chemical-Free &amp; Safe to Use
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Each dhoop incense cone is free from charcoal and synthetic binders, ensuring a smokeless dhoop experience that doesn’t irritate the lungs or overpower the senses. Use them with a dhoop stand or holder for a clean burn, indoors or outdoors.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Our cones are not only suitable for daily pooja rituals but also perfect for yoga, relaxation, and evening devotionals—making them the best dhoop for home.
                        </p>
                    </div>

                @elseif($collection->slug === 'bambooless')
                    <!-- Section 1: Bambooless -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Sacred Bambooless Incense Sticks for Pure Puja
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            According to traditional Vedic Shastras, burning bamboo wood is considered inauspicious. Our 100% Bamboo-less Incense Sticks are crafted strictly adhering to ancient rituals, preserving absolute spiritual purity and sanctity for your home temple.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Handcrafted with sacred temple flowers and enriched with pure botanical extracts like 
                            <a href="{{ route('products.show', 'chandan-saanjh') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Chandan (Sandalwood)</a>, 
                            <a href="{{ route('products.show', 'royal-oudh') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Royal Oudh</a>, 
                            <a href="{{ route('products.show', 'divya-naagchampa') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Divya Nagchampa</a>, and 
                            <a href="{{ route('products.show', 'swarna-pushpa') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Swarna Pushpa (Marygold)</a> for a rich, long-lasting aroma.
                        </p>
                    </div>

                    <!-- Section 2: Bambooless -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            100% Charcoal-Free with Zero Harmful Chemicals
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Unlike conventional black incense sticks that release heavy soot, sulfur, and harmful toxic fumes, our bambooless sticks emit clean, calming white smoke that is safe for children, elders, and pets in enclosed spaces.
                        </p>
                    </div>

                    <!-- Section 3: Bambooless -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Elevate Daily Devotion, Morning Sandhya &amp; Meditation
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Ideal for morning prayers, evening aarti, deep meditation, yoga, and creating an aura of serenity in your home or workspace throughout the day. The divine fragrance lingers gently for up to 4–6 hours.
                        </p>
                    </div>

                @elseif($collection->slug === 'havan-cups')
                    <!-- Section 1: Havan Cups -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Pure Sambrani Cup for Everyday Sacred Rituals
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            A Sambrani havan cup is a traditional incense made with sandalwood, cow dung, therapeutic herbs, and pure natural resins. When lit, it emits a soothing aura that purifies your space, dispels negative energy, and uplifts your mood instantly.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Our low-smoke Sambrani cups are made with 100% natural ingredients available in three sacred fragrances: 
                            <a href="{{ route('products.show', 'havan-cup') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Sandalwood Havan Cup</a>, 
                            <a href="{{ route('products.show', 'google-dhoop') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Guggal Havan Cup</a>, and 
                            <a href="{{ route('products.show', 'loban') }}" class="underline underline-offset-3 hover:text-[#D38928] text-gray-900 font-medium">Loban Havan Cup</a>—safe for indoor use and perfect for daily rituals, meditation, and yoga.
                        </p>
                    </div>

                    <!-- Section 2: Havan Cups -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Easy-to-Use Dhoop Cup for Clean Burning
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            A dhoop cup is a mess-free incense solution. Pre-filled and easy to light, it offers consistent aroma and is ideal for homes and temples. Made with herbal blends, our dhoop cups provide a pleasant scent without overwhelming smoke.
                        </p>
                    </div>

                    <!-- Section 3: Havan Cups -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Dhoop Sambrani – Uplift Your Spiritual Routine
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Dhoop sambrani and sambrani dhoop are powerful purifiers, often used in pujas and spiritual ceremonies. They cleanse the environment and bring positive energy. Each cup is handmade to ensure a rich, lasting fragrance—free from chemicals or synthetic scents.
                        </p>
                    </div>

                @else
                    <!-- General / All Collections -->
                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Pure Ayurvedic Formulations for Everyday Rituals
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            {{ $collection->description ?? 'Handcrafted with reverence in Vrindavan Dham using traditional Ayurvedic methods. Created exclusively for spiritual clarity, positive energy, and peace of mind.' }}
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Made with 100% natural herbs, sacred temple flowers, and pure therapeutic resins, completely free from bamboo sticks, charcoal, and toxic synthetic additives.
                        </p>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Clean &amp; Soot-Free Burning for Safe Living
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Experience gentle, purifying white smoke that carries the natural essence of Vedic botanicals without causing eye irritation or respiratory discomfort.
                        </p>
                    </div>

                    <div class="space-y-3 sm:space-y-4">
                        <h3 class="text-lg sm:text-xl font-serif font-medium text-[#1F1F1F]">
                            Handcrafted for Daily Puja, Yoga &amp; Meditation
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Perfect for creating a sanctified, tranquil atmosphere during your morning and evening rituals.
                        </p>
                    </div>
                @endif

            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- FREQUENTLY ASKED QUESTIONS (Pure White Background, Centered Layout)       -->
        <!-- ========================================================================= -->
        <div class="mt-20 sm:mt-24 pt-12 border-t border-[#EADBCC] select-none">
            <div class="max-w-5xl lg:max-w-[1100px] mx-auto space-y-6 sm:space-y-8">
            
                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-10 space-y-1.5">
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                        Frequently Asked Questions
                    </h2>
                </div>

                <!-- Seamless Accordion Container (8px Border Radius & 10px Inner Padding, Centered) -->
                <div class="bg-white rounded-[8px] border border-[#EADBCC] shadow-xs divide-y divide-[#EADBCC] overflow-hidden">
                    
                    <!-- FAQ 1 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                What makes Manglam bambooless incense sticks and havan cups unique?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                Our incense is <strong>100% bamboo-free</strong> (compliant with Vedic and Vastu scriptures) and <strong>0% toxic charcoal</strong>. Handcrafted using upcycled temple flower powders, pure Bhimseni camphor, natural Loban, and Guggal resins, it produces a soothing herbal aroma that leaves behind clean, auspicious white ash without causing any eye irritation or coughing.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                How long do they burn, and does the temple fragrance linger in the room?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                Each 9-inch Bambooless Stick burns continuously for <strong>45 to 50 minutes</strong>, while our organic Sambrani Havan Cups burn intensely for <strong>25 to 30 minutes</strong>. Due to our rich botanical essential oil concentration, the uplifting sacred fragrance lingers throughout your home for <strong>4 to 6 hours</strong> after burning.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                Are Manglam products safe to use around babies, elders, and pets?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                Yes, 100% safe. Because we never use toxic black charcoal, synthetic dipping chemicals, or artificial scent binders, our incense emits gentle herbal aroma rather than suffocating carbon monoxide, making it completely safe for daily pooja in closed or air-conditioned rooms with elders and toddlers.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                What is the spiritual significance of burning 100% Bamboo-Free Agarbatti?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                In Sanatana Dharma and ancient Vedic scriptures, bamboo (Vamsha) is revered as a sacred symbol of family lineage and ancestral continuity. Burning bamboo is strictly forbidden in sacred yagnas and daily poojas because it creates negative energies and emits toxic heavy-metal vapors. Manglam adheres strictly to traditional Vidhi by crafting pure bambooless incense.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                How do I properly ignite and use organic Sambrani Havan Cups &amp; Dhoop Cones?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                Hold the top rim of the Sambrani Havan Cup or the pointed tip of the Dhoop Cone over a diya flame or lighter for 10–15 seconds until it glows with an active ember. Gently blow out the active flame and place the cup/cone onto the complimentary heat-resistant ceramic coaster included in your package. Let the sacred herbal sambrani purify your home and altar.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                What sacred ingredients and temple flowers are used in handcrafting?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                Every batch of Manglam incense is lovingly handcrafted by Vedic artisans using dried consecrated flowers collected from sacred shrines, combined with pure Desi cow dung powder, organic Guggal, natural Sambrani Loban resin, Jatamansi, and natural therapeutic-grade essential oils.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ 7 -->
                    <div class="faq-item">
                        <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                            <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                                Do you offer nationwide shipping, COD, and complimentary ceramic holders?
                            </span>
                            <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                                <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </button>
                        <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                            <p>
                                We deliver across 19,000+ pin codes across Bharat within 2–4 business days. <strong>Free shipping</strong> is provided on orders above ₹499. We support <strong>Cash on Delivery (COD)</strong>, 1-Click GoKwik UPI checkout, and include an artisan ceramic holder FREE inside every pack.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const availBtn = document.getElementById('availability-toggle-btn');
        const availPopover = document.getElementById('availability-popover');
        const availChevron = document.getElementById('availability-chevron');

        const priceBtn = document.getElementById('price-toggle-btn');
        const pricePopover = document.getElementById('price-popover');
        const priceChevron = document.getElementById('price-chevron');

        const togglePopover = (btn, popover, chevron, otherPopover, otherChevron) => {
            if (popover.classList.contains('hidden')) {
                popover.classList.remove('hidden');
                chevron.classList.add('rotate-180');
                if (otherPopover) {
                    otherPopover.classList.add('hidden');
                    otherChevron.classList.remove('rotate-180');
                }
            } else {
                popover.classList.add('hidden');
                chevron.classList.remove('rotate-180');
            }
        };

        if (availBtn && availPopover) {
            availBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                togglePopover(availBtn, availPopover, availChevron, pricePopover, priceChevron);
            });
            availPopover.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        if (priceBtn && pricePopover) {
            priceBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                togglePopover(priceBtn, pricePopover, priceChevron, availPopover, availChevron);
            });
            pricePopover.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        document.addEventListener('click', () => {
            if (availPopover && !availPopover.classList.contains('hidden')) {
                availPopover.classList.add('hidden');
                availChevron.classList.remove('rotate-180');
            }
            if (pricePopover && !pricePopover.classList.contains('hidden')) {
                pricePopover.classList.add('hidden');
                priceChevron.classList.remove('rotate-180');
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                if (availPopover) {
                    availPopover.classList.add('hidden');
                    availChevron.classList.remove('rotate-180');
                }
                if (pricePopover) {
                    pricePopover.classList.add('hidden');
                    priceChevron.classList.remove('rotate-180');
                }
            }
        });

        // =====================================================================
        // STAGGERED LEFT-TO-RIGHT PRODUCT SCROLL REVEAL OBSERVER
        // =====================================================================
        const initScrollReveal = () => {
            const unrevealedItems = document.querySelectorAll('.product-item.reveal-from-left:not(.is-revealed)');
            
            if ('IntersectionObserver' in window) {
                const revealObserver = new IntersectionObserver((entries, obs) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const el = entry.target;
                            const idx = parseInt(el.dataset.index || '0', 10);
                            const delay = (idx % 4) * 150;
                            setTimeout(() => {
                                el.classList.add('is-revealed');
                            }, delay);
                            obs.unobserve(el);
                        }
                    });
                }, {
                    rootMargin: '60px 0px',
                    threshold: 0.08
                });

                unrevealedItems.forEach(item => revealObserver.observe(item));
            } else {
                unrevealedItems.forEach(item => item.classList.add('is-revealed'));
            }
        };

        initScrollReveal();

        // =====================================================================
        // FAQ ACCORDION HANDLER
        // =====================================================================
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('.faq-icon');
                const isHidden = content.classList.contains('hidden');
                
                if (isHidden) {
                    content.classList.remove('hidden');
                    if (icon) icon.classList.add('rotate-180');
                } else {
                    content.classList.add('hidden');
                    if (icon) icon.classList.remove('rotate-180');
                }
            });
        });

        // =====================================================================
        // INFINITE SCROLL (Automatically loads more products as you scroll down)
        // =====================================================================
        const sentinel = document.getElementById('infinite-scroll-sentinel');
        const grid = document.getElementById('products-grid');
        const infiniteContainer = document.getElementById('infinite-scroll-container');
        let isLoading = false;

        if (sentinel && grid) {
            const loadMoreProducts = async () => {
                const nextUrl = sentinel.dataset.nextUrl;
                if (!nextUrl || isLoading) return;

                isLoading = true;
                const fetchUrl = nextUrl + (nextUrl.includes('?') ? '&' : '?') + 'ajax=1';

                try {
                    const response = await fetch(fetchUrl, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    if (response.ok) {
                        const data = await response.json();
                        if (data.html && data.html.trim().length > 0) {
                            grid.insertAdjacentHTML('beforeend', data.html);
                            initScrollReveal();
                        }

                        if (data.has_more && data.next_page_url) {
                            sentinel.dataset.nextUrl = data.next_page_url;
                            isLoading = false;
                        } else {
                            sentinel.dataset.nextUrl = '';
                            if (infiniteContainer) {
                                infiniteContainer.classList.add('hidden');
                            }
                            observer.disconnect();
                        }
                    } else {
                        isLoading = false;
                    }
                } catch (err) {
                    console.error('Infinite scroll error:', err);
                    isLoading = false;
                }
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !isLoading && sentinel.dataset.nextUrl) {
                        loadMoreProducts();
                    }
                });
            }, {
                rootMargin: '400px 0px',
                threshold: 0.05
            });

            observer.observe(sentinel);
        }
    });
</script>
@endpush