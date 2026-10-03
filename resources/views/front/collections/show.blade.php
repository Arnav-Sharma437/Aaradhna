@extends('layouts.app')

@section('title', $collection->meta_title ?? "{$collection->title} — Manglam.co™")
@section('meta_description', $collection->meta_description ?? $collection->description)

@section('content')
<div class="bg-white min-h-screen py-6 lg:py-10 pb-24 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- ========================================================================= -->
        <!-- TOP FILTER & SORT BAR (Exact Replica of Reference Screenshots)            -->
        <!-- ========================================================================= -->
        @php
            $activeAvail = (array) request('availability', []);
            $availSelectedCount = count($activeAvail);
            $hasPriceFilter = request()->filled('price_min') || request()->filled('price_max');
        @endphp

        <form id="collection-filter-form" method="GET" action="{{ url()->current() }}" class="w-full mb-8">
            @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
            @endif

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-2">
                
                <!-- Left: Filter Buttons (Availability & Price) -->
                <div class="flex items-center space-x-3 text-sm flex-wrap gap-y-2">
                    <span class="text-[#121212] font-normal text-sm sm:text-base mr-1">Filter:</span>

                    <!-- 1. Availability Dropdown -->
                    <div class="relative inline-block text-left" id="availability-dropdown-wrapper">
                        <button 
                            type="button" 
                            id="availability-toggle-btn"
                            class="px-4 py-2 bg-[#FAF5EE] hover:bg-[#F3ECE0] rounded-[10px] text-xs sm:text-sm text-[#1F1F1F] font-medium flex items-center gap-1.5 transition-colors cursor-pointer border border-[#EADBCC]/50"
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
                            class="px-4 py-2 bg-[#FAF5EE] hover:bg-[#F3ECE0] rounded-[10px] text-xs sm:text-sm text-[#1F1F1F] font-medium flex items-center gap-1.5 transition-colors cursor-pointer border border-[#EADBCC]/50"
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

                </div>

                <!-- Right: Product Count -->
                <div class="flex items-center space-x-4 w-full md:w-auto justify-between md:justify-end text-xs sm:text-sm">
                    <span class="text-gray-600 font-medium whitespace-nowrap">
                        {{ $products->total() }} {{ Str::plural('product', $products->total()) }}
                    </span>
                </div>

            </div>
        </form>

        <!-- Full-Width Clean Product Grid (4 Columns on Desktop, 2 Columns on Mobile) -->
        <div class="w-full">
            
            @if($products->count() > 0)
                <div id="products-grid" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-[10px]">
                    @foreach($products as $product)
                        <x-product-card :product="$product" />
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