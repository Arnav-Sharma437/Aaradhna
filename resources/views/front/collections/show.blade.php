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
        <!-- BOTTOM EDITORIAL BRAND & COLLECTION NARRATIVE (Luxury Vedic Presentation) -->
        <!-- ========================================================================= -->
        <div class="mt-20 sm:mt-28 pt-12 sm:pt-16 border-t border-[#EADBCC]">
            
            <!-- Section Header Banner -->
            <div class="max-w-3xl mb-10 sm:mb-14 space-y-3">
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-[#FAF5EE] border border-[#D38928]/40 text-[#D38928] text-xs font-bold uppercase tracking-[0.2em] font-heading">
                    <span>✦ SACRED VEDIC CRAFT &amp; PURITY ✦</span>
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-[34px] font-serif font-bold text-[#1F1F1F] leading-tight">
                    Buy {{ $collection->title }} – 100% Natural, Charcoal-Free &amp; Low Smoke
                </h2>
                <p class="text-sm sm:text-base text-gray-600 font-normal leading-relaxed">
                    Crafted strictly following ancient Ayurvedic traditions and Vedic Shastras for daily pooja, dhyan, and divine living.
                </p>
            </div>

            <!-- 4 Quick Vedic Value Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 mb-12 sm:mb-16">
                <!-- Card 1 -->
                <div class="bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] p-5 sm:p-6 space-y-3 shadow-xs hover:border-[#D38928] transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-[#FAF5EE] border border-[#EADBCC] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        🌿
                    </div>
                    <h3 class="text-base sm:text-lg font-bold font-heading text-[#1F1F1F]">
                        100% Bamboo-Free
                    </h3>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-normal">
                        According to sacred Vedic Shastras, burning bamboo is inauspicious. Our incense preserves spiritual sanctity without any bamboo core.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] p-5 sm:p-6 space-y-3 shadow-xs hover:border-[#D38928] transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-[#FAF5EE] border border-[#EADBCC] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        🌸
                    </div>
                    <h3 class="text-base sm:text-lg font-bold font-heading text-[#1F1F1F]">
                        Sacred Temple Flowers
                    </h3>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-normal">
                        Made by collecting holy floral offerings from Vrindavan temples, blended with essential oils, pure Chandan, and natural resins.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] p-5 sm:p-6 space-y-3 shadow-xs hover:border-[#D38928] transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-[#FAF5EE] border border-[#EADBCC] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        💨
                    </div>
                    <h3 class="text-base sm:text-lg font-bold font-heading text-[#1F1F1F]">
                        Zero Charcoal Smoke
                    </h3>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-normal">
                        No toxic black smoke, eye irritation, or carbon residue. Emits pure, therapeutic white aromatic smoke completely safe for indoor spaces.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] p-5 sm:p-6 space-y-3 shadow-xs hover:border-[#D38928] transition-all duration-300 group">
                    <div class="w-12 h-12 rounded-xl bg-[#FAF5EE] border border-[#EADBCC] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        🪔
                    </div>
                    <h3 class="text-base sm:text-lg font-bold font-heading text-[#1F1F1F]">
                        Long-Lasting Peace
                    </h3>
                    <p class="text-xs sm:text-[13.5px] text-gray-600 leading-relaxed font-normal">
                        Each stick and cup burns slowly and evenly, leaving a lingering divine aroma that cleanses negative energies throughout your home.
                    </p>
                </div>
            </div>

            <!-- Deep Narrative Articles Container -->
            <div class="bg-gradient-to-br from-[#FFFDF9] to-[#FAF5EE] rounded-[24px] border border-[#EADBCC] p-6 sm:p-10 lg:p-12 shadow-xs space-y-8 max-w-5xl">
                
                @if($collection->slug === 'havan-cups')
                    <!-- 1. Pure Sambrani Cup -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ VEDIC PURIFICATION</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Pure Sambrani &amp; Guggal Havan Cup for Daily Rituals
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            A traditional Sambrani Havan Cup is a sacred blend of dried cow dung, pure sandalwood extracts, natural resins, and holy Ayurvedic herbs. When lit, it acts as a mini havan in your living room, releasing powerful natural antimicrobials that purify the air, remove heavy vastu doshas, and fill the space with positive spiritual energy.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Our low-smoke Sambrani cups are made with 100% natural ingredients available in three divine fragrances: <strong class="text-gray-900 font-bold">Sandalwood Havan Cup</strong>, <strong class="text-gray-900 font-bold">Guggal Havan Cup</strong>, and <strong class="text-gray-900 font-bold">Loban Havan Cup</strong>—completely safe for indoor use, pooja altars, meditation, and yoga practice.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <!-- 2. Easy-to-Use Dhoop Cup -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ MESS-FREE CONVENIENCE</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Easy-to-Use Dhoop Cups for Clean &amp; Safe Burning
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Unlike traditional raw charcoal burning which requires manual ghee, samagri, and coal management, our pre-filled ready-to-light havan cups offer a mess-free, instant solution. Simply place the cup on the free burner plate included in every box, light the outer rim for 15 seconds, and let it diffuse its soothing fragrant warmth.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Made exclusively with therapeutic resin blends, Manglam havan cups provide an authentic temple-like experience without overwhelming smoke or toxic residue.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <!-- 3. Dhoop Sambrani -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ SPIRITUAL WELLNESS</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Dhoop Sambrani – Elevate Your Daily Spiritual Routine
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Dhoop sambrani has been revered since Vedic times for cleansing the aura, dispelling negativity, and inviting peace, wealth, and prosperity into homes and business premises. Each cup is lovingly crafted to burn steadily for 25–35 minutes, leaving a comforting fragrance that lingers for hours.
                        </p>
                    </div>

                @elseif($collection->slug === 'bambooless')
                    <!-- Bambooless sticks narrative -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ SHASTRA-APPROVED SANCTITY</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Sacred Bambooless Incense for Pure &amp; Auspicious Puja
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            According to traditional Vedic Shastras and Hindu scriptures, burning bamboo wood during religious rituals is strictly prohibited as it is considered inauspicious. Our 100% Bamboo-less Incense Sticks are crafted without any wood core, ensuring your daily worship adheres strictly to authentic sacred principles.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Each stick is handcrafted using dried temple flower petals, aromatic wood powders, pure essential oils, and botanical extracts like <strong class="text-gray-900 font-bold">Chandan (Sandalwood)</strong>, <strong class="text-gray-900 font-bold">Royal Oudh</strong>, <strong class="text-gray-900 font-bold">Divya Naagchampa</strong>, and <strong class="text-gray-900 font-bold">Swarna Pushpa</strong> for an enchanting, long-lasting aroma.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ HEALTH &amp; PURITY</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            100% Charcoal-Free with Zero Harmful Chemicals &amp; Toxins
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Conventional black incense sticks contain cheap coal powders, sulfur, and synthetic chemical binders that release toxic fumes and black soot upon burning. Manglam bambooless sticks are 100% charcoal-free, emitting clean, aromatic white smoke that is gentle on the respiratory system, safe for elders, children, and pets.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ DAILY PRACTICE</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Elevate Daily Devotion, Morning Sandhya &amp; Deep Meditation
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Whether you are performing your morning aarti, lighting an incense during evening sandhya, practicing yoga, or working in your study, our bambooless sticks create a serene environment that enhances focus, tranquility, and mental peace throughout the day.
                        </p>
                    </div>

                @elseif($collection->slug === 'dhoop-cones')
                    <!-- Dhoop Cones narrative -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ AYURVEDIC FORMULATION</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Natural Temple Flower Dhoop Cones
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Our Dhoop Cones are created by lovingly upcycling sacred temple blossoms offered in holy shrines. These petals are sun-dried, powdered, and blended with natural herbs, cold-pressed essential oils, and therapeutic resins to form solid cones that release deep aromatic richness.
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Engineered with an optimized cone profile, each piece burns steadily for 30–40 minutes, creating a soothing cascading fragrance that purifies your home and removes stagnant indoor odors.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ PURE &amp; CLEAN</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Charcoal-Free, Dip-Free &amp; Zero Synthetic Perfumes
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Unlike commercial cones dipped in chemical fragrance oils (phthalates and DEP), Manglam cones contain only pure natural aromatics. They burn with low, gentle smoke that nurtures mental relaxation and emotional calm.
                        </p>
                    </div>

                @else
                    <!-- Default / All Collections narrative -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ SACRED HERITAGE</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Pure Ayurvedic Formulations for Everyday Rituals
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            {{ $collection->description ?? 'Handcrafted with reverence in Vrindavan Dham using traditional Ayurvedic methods. Created exclusively for spiritual clarity, positive energy, and peace of mind.' }}
                        </p>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Made with 100% natural herbs, sacred temple flowers, and pure therapeutic resins, completely free from bamboo sticks, charcoal, and toxic synthetic additives.
                        </p>
                    </div>

                    <div class="w-full h-[1px] bg-[#EADBCC]"></div>

                    <div class="space-y-3">
                        <div class="flex items-center space-x-2 text-[#D38928] text-xs font-bold uppercase tracking-wider font-heading">
                            <span>✦ DAILY DEVOTION</span>
                        </div>
                        <h3 class="text-lg sm:text-2xl font-serif font-bold text-[#1F1F1F]">
                            Handcrafted for Daily Puja, Yoga, Dhyan &amp; Meditation
                        </h3>
                        <p class="text-xs sm:text-[14.5px] text-gray-700 leading-relaxed font-normal">
                            Experience clean, soothing aromas that uplift your sanctuary and bring divine harmony to your daily life.
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