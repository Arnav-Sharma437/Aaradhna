@extends('layouts.app')

@section('title', 'Mangalam.co™ — 100% Pure Bambooless Agarbatti & Vedic Pooja Samagri')
@section('meta_description', 'Shri Ram Uphaar, Bambooless Incense Sticks, Havan Cups, Dhoop Cones, and Natural Attar Sprays crafted as per Vedic Vidhi.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. FULL-WIDTH CLEAN LUXURY HERO BANNER                                     -->
<!-- ========================================================================= -->
<section class="relative w-full bg-[#FAF5EE] overflow-hidden select-none border-b border-[#EAE3D9]" id="hero-banner-carousel">
    
    <!-- Slides Wrapper -->
    <div class="relative w-full min-h-[460px] sm:min-h-[520px] lg:min-h-[580px] xl:min-h-[620px] overflow-hidden">
        
        <!-- SLIDE 1: SACRED INCENSE CONE COLLECTION (SEAMLESS FULL-BLEED PANORAMIC) -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-10 flex items-center bg-[#FAF4EB]" data-slide="0">
            <!-- Full Panoramic Image Background -->
            <img 
                src="{{ asset('assets/images/hero-sacred-cones.jpg') }}" 
                alt="Mangalam Sacred Incense Cone Collection" 
                class="absolute inset-0 w-full h-full object-cover object-[25%_center] sm:object-left lg:object-center"
            >
            <!-- Mobile/Tablet readability overlay (transparent on desktop right-side) -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#FAF4EB]/95 via-[#FAF4EB]/60 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:via-[#FAF4EB]/30 lg:to-[#FAF4EB]/70"></div>

            <div class="relative w-full max-w-[1440px] mx-auto px-5 sm:px-10 lg:px-16 py-12 sm:py-16 grid grid-cols-1 lg:grid-cols-12 items-center z-10">
                
                <!-- Spacer for left photo subject on desktop -->
                <div class="hidden lg:block lg:col-span-5 xl:col-span-6"></div>

                <!-- Right: Editorial Headlines & 3 Badges (Exact Replica of Reference Screenshot) -->
                <div class="lg:col-span-7 xl:col-span-6 text-center lg:text-left space-y-4 sm:space-y-5 pt-20 sm:pt-14 lg:pt-0">
                    
                    <!-- Main Hero Headlines -->
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#D38928]/10 border border-[#D38928]/30 text-[#D38928] text-xs font-semibold tracking-wider uppercase">
                            <span>✦</span>
                            <span>100% Pure &amp; Organic</span>
                            <span>✦</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl lg:text-[38px] xl:text-[42px] font-normal text-[#2B1810] tracking-tight leading-snug lg:leading-[1.25]">
                            Discover <span class="italic font-normal text-[#8B4513]">Mangalam’s</span><br class="hidden sm:inline">
                            Incense Cone Collection
                        </h1>
                        <p class="text-sm sm:text-base lg:text-lg font-medium text-[#0F5B4E] tracking-normal">
                            Made From Sacred Temple Flowers &amp; Pure Vedic Herbs
                        </p>
                    </div>

                    <!-- 3 Feature Badges in Circular Outlines -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-1">
                        
                        <!-- Badge 1: 100% Charcoal Free -->
                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/>
                                    <path d="M12 2v20"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                100%<br>Charcoal Free
                            </span>
                        </div>

                        <!-- Badge 2: Crafted By Hand -->
                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-6 h-6 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    <path d="M12 15c-3.3 0-6-2.7-6-6V7a6 6 0 0 1 12 0v2c0 3.3-2.7 6-6 6z"/>
                                    <path d="M12 19a7 7 0 0 0 7-7"/>
                                    <path d="M5 12a7 7 0 0 0 7 7"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                Crafted By<br>Hand
                            </span>
                        </div>

                        <!-- Badge 3: No Chemicals -->
                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-6 h-6 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M10 2v7.31L4.69 18.5a2 2 0 0 0 1.73 3h11.16a2 2 0 0 0 1.73-3L14 9.31V2"/>
                                    <path d="M8.5 2h7"/>
                                    <path d="M7 16h10"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                Zero<br>Chemicals
                            </span>
                        </div>

                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3.5 pt-1">
                        <a 
                            href="{{ route('collections.show', 'dhoop-cones') }}" 
                            class="inline-flex items-center justify-center px-7 py-3 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-semibold uppercase tracking-wider rounded-[8px] sm:rounded-[10px] shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <span>Shop Dhoop Cones</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a 
                            href="{{ route('collections.show', 'super-save-offers') }}" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-white hover:bg-stone-50 text-[#1F1F1F] hover:text-[#D38928] text-xs sm:text-sm font-semibold uppercase tracking-wider rounded-[8px] sm:rounded-[10px] border border-[#D38928]/60 shadow-xs hover:shadow-md transition-all duration-200"
                        >
                            Super Save Offers
                        </a>
                    </div>

                </div>

            </div>
        </div>

        <!-- SLIDE 2: BAMBOOLEES INCENSE STICKS (SEAMLESS FULL-BLEED PANORAMIC) -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center bg-[#FAF4EB]" data-slide="1">
            <img 
                src="{{ asset('assets/images/hero-sacred-bambooless.jpg') }}" 
                alt="Mangalam Bambooless Incense Sticks" 
                class="absolute inset-0 w-full h-full object-cover object-[25%_center] sm:object-left lg:object-center"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#FAF4EB]/95 via-[#FAF4EB]/60 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:via-[#FAF4EB]/30 lg:to-[#FAF4EB]/70"></div>

            <div class="relative w-full max-w-[1440px] mx-auto px-5 sm:px-10 lg:px-16 py-12 sm:py-16 grid grid-cols-1 lg:grid-cols-12 items-center z-10">
                
                <div class="hidden lg:block lg:col-span-5 xl:col-span-6"></div>

                <div class="lg:col-span-7 xl:col-span-6 text-center lg:text-left space-y-4 sm:space-y-5 pt-20 sm:pt-14 lg:pt-0">
                    
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#D38928]/10 border border-[#D38928]/30 text-[#D38928] text-xs font-semibold tracking-wider uppercase">
                            <span>✦</span>
                            <span>100% Pure &amp; Organic</span>
                            <span>✦</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-[38px] xl:text-[42px] font-normal text-[#2B1810] tracking-tight leading-snug lg:leading-[1.25]">
                            Discover <span class="italic font-normal text-[#8B4513]">Mangalam’s</span><br class="hidden sm:inline">
                            Bambooless Incense Sticks
                        </h2>
                        <p class="text-sm sm:text-base lg:text-lg font-medium text-[#0F5B4E] tracking-normal">
                            100% Zero Bamboo • Pure Vedic Herbs
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 sm:gap-6 pt-1">
                        
                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/>
                                    <path d="M12 2v20"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                100%<br>Charcoal Free
                            </span>
                        </div>

                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                Clean &amp;<br>Soot-Free
                            </span>
                        </div>

                        <div class="flex flex-col items-center text-center space-y-1.5">
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full border border-[#0F5B4E] flex items-center justify-center text-[#0F5B4E] bg-white/90 shadow-xs">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M10 2v7.31L4.69 18.5a2 2 0 0 0 1.73 3h11.16a2 2 0 0 0 1.73-3L14 9.31V2"/>
                                    <path d="M8.5 2h7"/>
                                    <path d="M7 16h10"/>
                                </svg>
                            </div>
                            <span class="text-[11px] sm:text-xs font-semibold text-[#1F1F1F] leading-tight">
                                Zero<br>Chemicals
                            </span>
                        </div>

                    </div>

                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-3.5 pt-1">
                        <a 
                            href="{{ route('collections.show', 'bambooless') }}" 
                            class="inline-flex items-center justify-center px-7 py-3 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-semibold uppercase tracking-wider rounded-[8px] sm:rounded-[10px] shadow-md hover:shadow-lg transition-all duration-200 transform hover:-translate-y-0.5"
                        >
                            <span>Shop Bambooless</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a 
                            href="{{ route('collections.show', 'best-seller-combo') }}" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-white hover:bg-stone-50 text-[#1F1F1F] hover:text-[#D38928] text-xs sm:text-sm font-semibold uppercase tracking-wider rounded-[8px] sm:rounded-[10px] border border-[#D38928]/60 shadow-xs hover:shadow-md transition-all duration-200"
                        >
                            Best Seller Combo
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Luxury Premium Carousel Arrow Controls -->
    <button 
        type="button" 
        id="hero-slider-prev"
        class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/80 hover:bg-[#D38928] text-[#1F1F1F] hover:text-white flex items-center justify-center backdrop-blur-md border border-[#D38928]/40 hover:border-[#F6DAA8] shadow-lg transition-all duration-300 transform hover:scale-105 active:scale-95 focus:outline-none cursor-pointer group"
        aria-label="Previous Slide"
    >
        <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button 
        type="button" 
        id="hero-slider-next"
        class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-white/80 hover:bg-[#D38928] text-[#1F1F1F] hover:text-white flex items-center justify-center backdrop-blur-md border border-[#D38928]/40 hover:border-[#F6DAA8] shadow-lg transition-all duration-300 transform hover:scale-105 active:scale-95 focus:outline-none cursor-pointer group"
        aria-label="Next Slide"
    >
        <svg class="w-5 h-5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Carousel Pagination Dots -->
    <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2.5" id="hero-slider-dots">
        <button type="button" class="w-8 h-2 rounded-[10px] bg-[#D38928] transition-all duration-300" data-index="0" aria-label="Slide 1"></button>
        <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#1F1F1F]/30 hover:bg-[#1F1F1F]/60 transition-all duration-300" data-index="1" aria-label="Slide 2"></button>
    </div>

</section>



<!-- ========================================================================= -->
<!-- 2. BESTSELLER OF THE MONTH (Exact Match to User Screenshot)       -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-[#FAF7F2] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header with Subtitle -->
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ PURE VEDIC BLESSINGS ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-normal text-[#121212] font-heading tracking-tight">
                Bestseller of the Month
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Most cherished sacred samagri, handcrafted for your daily morning and evening pooja.
            </p>
        </div>

        <!-- 4-Card Luxury Grid (2x2 Mobile Grid) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
            
            <!-- Card 1: Kesar Chandan (TOP PICKS) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        ✨ TOP PICKS ✨
                    </span>
                </div>
                <!-- Image -->
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'kesar-chandan') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Kesar Chandan Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Kesar Chandan (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Kesar Chandan" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'kesar-chandan') }}">Kesar Chandan <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">Sticks</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(277)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹375</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹289.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Kesar Chandan" data-product-price="289.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Chandan (TOP PICKS) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TOP PICKS
                    </span>
                </div>
                <!-- Image -->
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'chandan') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Chandan Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Chandan (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Chandan" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'chandan') }}">Chandan <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(218)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹375</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹289.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Chandan" data-product-price="289.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Oudh (FAVORITE) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        FAVORITE
                    </span>
                </div>
                <!-- Image -->
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'oudh') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Oudh Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Oudh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Oudh (ऊद)" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'oudh') }}">Oudh <span class="text-xs font-normal text-gray-500 ml-0.5">(ऊद)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(234)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹425</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹349.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Oudh (ऊद)" data-product-price="349.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Google Dhoop Havan Cup (TOP PICKS) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TOP PICKS
                    </span>
                </div>
                <!-- Image -->
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'google-dhoop') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/havan-cup.jpg') }}" alt="Google Dhoop Havan Cup" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-havan-cup.jpg') }}" alt="Google Dhoop (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">box of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#965A15] block my-0.5">12</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">cups</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Google Dhoop" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'google-dhoop') }}">Google Dhoop <span class="text-xs font-normal text-gray-500 ml-0.5">Havan Cup</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(210)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹450</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹349.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Google Dhoop" data-product-price="349.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- View All Button -->
        <div class="mt-14 text-center">
            <a 
                href="{{ route('collections.show', 'all') }}" 
                class="inline-flex items-center justify-center px-12 py-3.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
            >
                <span>View All Products</span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. PRODUCTS CATEGORY (Clean Large Single-Item Circles on Pure Soft Cream) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-[#FFFDF9] border-b border-[#EAE3D9] font-body select-none">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-14 sm:mb-18 space-y-2">
            <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.3em] text-[#5C6F2A] font-heading">
                ✦ 100% NATURAL • CHARCOAL FREE ✦
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-serif font-normal text-[#5C6F2A] tracking-wider uppercase">
                Products Category
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 max-w-md mx-auto">
                Handcrafted from sacred temple flowers &amp; pure living resins for divine daily rituals.
            </p>
        </div>

        <!-- 3 Big Single-Product Category Circles -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 sm:gap-12 lg:gap-14 max-w-5xl mx-auto">
            
            <!-- Category 1: Single Bamboo-less Dhoop Stick -->
            <div class="group flex flex-col items-center text-center space-y-6">
                <!-- Large Rounded Circle with Single Stick Focus -->
                <a href="{{ route('collections.show', 'bambooless') }}" class="block relative w-56 h-56 sm:w-64 sm:h-64 lg:w-72 lg:h-72 xl:w-76 xl:h-76 rounded-full p-2.5 bg-white shadow-xl hover:shadow-2xl border-2 border-[#EADBCC] hover:border-[#D38928] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-[#FAF7F2] flex items-center justify-center p-3">
                        <img 
                            src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" 
                            alt="Bamboo-less Dhoop Stick" 
                            class="w-full h-full object-contain rounded-full group-hover:scale-110 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Details & Box Tag -->
                <div class="space-y-3 max-w-xs">
                    <div>
                        <a href="{{ route('collections.show', 'bambooless') }}" class="inline-block px-5 py-1.5 border border-[#121212] hover:border-[#5C6F2A] bg-white text-[11px] sm:text-xs font-bold uppercase tracking-widest text-[#121212] hover:text-[#5C6F2A] transition-colors font-heading shadow-2xs">
                            Dhoop Stick
                        </a>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'bambooless') }}" class="hover:text-[#D38928] transition-colors">Bamboo-less Dhoop Stick</a>
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-600 leading-relaxed font-normal">
                        Dhoop Sticks fill your space with soothing fragrance, creating an aura of peace, positivity, and divine calm.
                    </p>
                </div>
            </div>

            <!-- Category 2: Single Dhoop Cone -->
            <div class="group flex flex-col items-center text-center space-y-6">
                <!-- Large Rounded Circle with Single Cone Focus -->
                <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block relative w-56 h-56 sm:w-64 sm:h-64 lg:w-72 lg:h-72 xl:w-76 xl:h-76 rounded-full p-2.5 bg-white shadow-xl hover:shadow-2xl border-2 border-[#EADBCC] hover:border-[#D38928] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-[#FAF7F2] flex items-center justify-center p-3">
                        <img 
                            src="{{ asset('assets/images/single-dhoop-cone.jpg') }}" 
                            alt="Easy to Use Dhoop Cone" 
                            class="w-full h-full object-contain rounded-full group-hover:scale-110 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Details & Box Tag -->
                <div class="space-y-3 max-w-xs">
                    <div>
                        <a href="{{ route('collections.show', 'dhoop-cones') }}" class="inline-block px-5 py-1.5 border border-[#121212] hover:border-[#5C6F2A] bg-white text-[11px] sm:text-xs font-bold uppercase tracking-widest text-[#121212] hover:text-[#5C6F2A] transition-colors font-heading shadow-2xs">
                            Dhoop Cones
                        </a>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'dhoop-cones') }}" class="hover:text-[#D38928] transition-colors">Easy to Use Dhoop Cone</a>
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-600 leading-relaxed font-normal">
                        Dhoop Cones release a rich, long-lasting aroma that purifies the air and uplifts the spirit with every burn.
                    </p>
                </div>
            </div>

            <!-- Category 3: Single 100% Organic Havan Cup -->
            <div class="group flex flex-col items-center text-center space-y-6">
                <!-- Large Rounded Circle with Single Cup Focus -->
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block relative w-56 h-56 sm:w-64 sm:h-64 lg:w-72 lg:h-72 xl:w-76 xl:h-76 rounded-full p-2.5 bg-white shadow-xl hover:shadow-2xl border-2 border-[#EADBCC] hover:border-[#D38928] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-[#FAF7F2] flex items-center justify-center p-3">
                        <img 
                            src="{{ asset('assets/images/single-havan-cup.jpg') }}" 
                            alt="100% Organic Havan Cups" 
                            class="w-full h-full object-contain rounded-full group-hover:scale-110 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Details & Box Tag -->
                <div class="space-y-3 max-w-xs">
                    <div>
                        <a href="{{ route('collections.show', 'havan-cups') }}" class="inline-block px-5 py-1.5 border border-[#121212] hover:border-[#5C6F2A] bg-white text-[11px] sm:text-xs font-bold uppercase tracking-widest text-[#121212] hover:text-[#5C6F2A] transition-colors font-heading shadow-2xs">
                            Havan Cup
                        </a>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'havan-cups') }}" class="hover:text-[#D38928] transition-colors">100% Organic Havan Cups</a>
                    </h3>
                    <p class="text-xs sm:text-[13px] text-gray-600 leading-relaxed font-normal">
                        Organic Havan Cups made with natural ingredients, free from chemicals and artificial fragrance, for a pure experience.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 5. DAILY DEVOTIONAL RITUALS (Exact Match to User Screenshot Standard) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DAILY RITUAL GUIDES ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-normal text-[#121212] font-heading tracking-tight">
                Devotional Moments of Peace
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Tailored sacred blends for every auspicious hour of your day.
            </p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
            
            <!-- Card 1: Devi Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        MORNING SANDHYA
                    </span>
                </div>
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'devi-refill-pack') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Devi Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Devi Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">100</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[4px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider">
                            FREE STAND <span class="text-[#F6DAA8] font-normal hidden sm:inline">Worth ₹150</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Devi Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'devi-refill-pack') }}">Devi <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">Refill Pack</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(277)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Devi Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Camphor Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TEMPLE AARTI
                    </span>
                </div>
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Camphor Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Camphor Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Camphor Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}">Camphor <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">Refill</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(219)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Camphor Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Oudh Bambooless Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        EVENING DHYAN
                    </span>
                </div>
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Oudh Bambooless Sticks" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Oudh Bambooless Sticks (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Oudh Bambooless Sticks" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}">Oudh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">Sticks</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(184)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹279.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Oudh Bambooless Sticks" data-product-price="279.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Chandan Cones -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        DAILY HAVAN
                    </span>
                </div>
                <div class="p-2 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'kesar-chandan-dhoop-cones') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Chandan Cones" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-dhoop-cone.jpg') }}" alt="Chandan Cones (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">cones</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Chandan Cones" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'kesar-chandan-dhoop-cones') }}">Chandan <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(162)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹449</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹249.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Chandan Cones" data-product-price="249.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 5. DEVOTEE TESTIMONIALS (3D Interactive Coverflow Slider)                 -->
<!-- ========================================================================= -->
<section class="py-18 sm:py-24 bg-[#FDFBF7] border-b border-[#EAE3D9] overflow-hidden select-none" id="testimonial-3d-section">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ 50,000+ BLESSED HOMES ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-normal text-[#121212] font-heading tracking-tight">
                Devotee Experiences
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Verified reviews from families, yoga practitioners &amp; temple priests across sacred India.
            </p>
        </div>

        <!-- 3D Perspective Stage Container -->
        <div class="relative w-full max-w-4xl mx-auto h-[380px] sm:h-[400px] flex items-center justify-center" id="testimonial-3d-stage" style="perspective: 1200px;">
            
            <!-- Card 0: Pandit Radhe Shyam -->
            <div 
                class="testimonial-card absolute w-[310px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-6 sm:p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="0"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Temple Priest
                        </span>
                    </div>
                    <p class="text-sm sm:text-base text-[#121212] leading-relaxed italic font-medium pt-1">
                        "I am a regular devotee of Mangalam products since 2 years. Very pure havan cups and sambrani. In temples, we strictly avoid toxic bamboo, and Mangalam is 100% compliant with sacred Agamas."
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#D38928]/30 mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#D38928] text-white flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        PR
                    </div>
                    <div>
                        <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Pandit Radhe Shyam</h4>
                        <p class="text-xs text-[#D38928] font-semibold">Vrindavan Dham</p>
                    </div>
                </div>
            </div>

            <!-- Card 1: Ramesh Joshi -->
            <div 
                class="testimonial-card absolute w-[310px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-6 sm:p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="1"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-sm sm:text-base text-[#333] leading-relaxed italic pt-1">
                        "Thank you so much for this pure product. Everyone in my family loves the sacred fragrance of the camphor sticks. Zero smoke irritation in eyes during morning aarti!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        RJ
                    </div>
                    <div>
                        <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Ramesh Joshi</h4>
                        <p class="text-xs text-gray-500">Varanasi, UP</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pooja Mishra -->
            <div 
                class="testimonial-card absolute w-[310px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-6 sm:p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="2"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-sm sm:text-base text-[#333] leading-relaxed italic pt-1">
                        "Excellent aroma. I didn't feel like burning any other regular chemical stick after experiencing this. The luxury gift boxes are also perfect for festive gifting!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        PM
                    </div>
                    <div>
                        <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Pooja Mishra</h4>
                        <p class="text-xs text-gray-500">Ayodhya, UP</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Virendra Sharma -->
            <div 
                class="testimonial-card absolute w-[310px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-6 sm:p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="3"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Dhyan Devotee
                        </span>
                    </div>
                    <p class="text-sm sm:text-base text-[#333] leading-relaxed italic pt-1">
                        "The Bambooless Oudh and Chandan agarbatti create an instant meditative vibration in my morning meditation. Pure natural resins without any burning charcoal smell."
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        VS
                    </div>
                    <div>
                        <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Virendra Sharma</h4>
                        <p class="text-xs text-gray-500">Haridwar, Uttarakhand</p>
                    </div>
                </div>
            </div>

            <!-- Card 4: Geeta Agarwal -->
            <div 
                class="testimonial-card absolute w-[310px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-6 sm:p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="4"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-sm sm:text-base text-[#333] leading-relaxed italic pt-1">
                        "Very easy to place order with pure natural aroma. The Havan cups are so convenient for our daily evening aarti. Highly recommend to every Hindu home!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        GA
                    </div>
                    <div>
                        <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">Geeta Agarwal</h4>
                        <p class="text-xs text-gray-500">Jaipur, Rajasthan</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- 3D Slider Controls & Dots -->
        <div class="mt-8 flex items-center justify-center space-x-6">
            <button 
                type="button" 
                id="testimonial-prev-btn"
                class="w-11 h-11 rounded-[10px] bg-white hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EAE3D9] flex items-center justify-center shadow-md transition-all duration-200 transform hover:scale-105 focus:outline-none"
                aria-label="Previous Testimonial"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Dots -->
            <div class="flex space-x-2" id="testimonial-dots">
                <button type="button" class="w-8 h-2 rounded-[10px] bg-[#D38928] transition-all duration-300" data-index="0" aria-label="Slide 1"></button>
                <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#D38928]/30 hover:bg-[#D38928]/60 transition-all duration-300" data-index="1" aria-label="Slide 2"></button>
                <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#D38928]/30 hover:bg-[#D38928]/60 transition-all duration-300" data-index="2" aria-label="Slide 3"></button>
                <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#D38928]/30 hover:bg-[#D38928]/60 transition-all duration-300" data-index="3" aria-label="Slide 4"></button>
                <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#D38928]/30 hover:bg-[#D38928]/60 transition-all duration-300" data-index="4" aria-label="Slide 5"></button>
            </div>

            <button 
                type="button" 
                id="testimonial-next-btn"
                class="w-11 h-11 rounded-[10px] bg-white hover:bg-[#D38928] text-[#121212] hover:text-white border border-[#EAE3D9] flex items-center justify-center shadow-md transition-all duration-200 transform hover:scale-105 focus:outline-none"
                aria-label="Next Testimonial"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 6. GIFTS THAT FEEL LIKE BLESSINGS (Panoramic Luxury Combo Offer Banner)   -->
<!-- ========================================================================= -->
<section class="py-12 sm:py-16 bg-[#FAF7F2] border-b border-[#EAE3D9]">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="relative rounded-[22px] sm:rounded-[28px] overflow-hidden shadow-2xl border border-[#D38928]/40 bg-[#0F1B16] min-h-[380px] sm:min-h-[460px] lg:min-h-[500px] flex items-center">
            
            <!-- Full Panoramic Image Background -->
            <img 
                src="{{ asset('assets/images/gifts-blessings-banner.jpg') }}" 
                alt="Mangalam Gifts That Feel Like Blessings - Sacred Combo Offers" 
                class="absolute inset-0 w-full h-full object-cover object-[75%_center] sm:object-right lg:object-center transform hover:scale-[1.02] transition-transform duration-1000 ease-out"
            >

            <!-- Dark / Emerald Devotional Gradient Overlay for 100% Crisp Left Typography -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/80 to-transparent sm:bg-gradient-to-r sm:from-[#0B1510]/95 sm:via-[#0B1510]/80 sm:to-transparent lg:w-[62%]"></div>

            <!-- Content on the Left -->
            <div class="relative z-10 p-6 sm:p-12 lg:p-16 max-w-xl text-left space-y-4 sm:space-y-6">
                
                <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full bg-[#D38928]/30 border border-[#F6DAA8]/40 text-[#F6DAA8] text-[11px] sm:text-xs font-semibold tracking-widest uppercase backdrop-blur-xs">
                    <span>🪔</span>
                    <span>SACRED RITUAL HAMPERS &amp; COMBOS</span>
                </div>

                <div class="space-y-2.5">
                    <h2 class="text-3xl sm:text-5xl lg:text-[50px] font-normal font-serif text-[#F6DAA8] tracking-tight leading-[1.14] drop-shadow-md">
                        Gifts That <br>
                        <span class="italic font-normal text-white drop-shadow-lg">Feel Like Blessings</span>
                    </h2>
                    
                    <p class="text-xs sm:text-sm lg:text-base text-stone-200 max-w-md leading-relaxed pt-1">
                        Thoughtfully crafted ritual boxes for pooja, celebrations, housewarmings and meaningful gifting.
                    </p>
                </div>

                <div class="pt-2 flex flex-wrap items-center gap-3.5">
                    <a 
                        href="{{ route('collections.show', 'best-seller-combo') }}" 
                        class="inline-flex items-center justify-center px-8 sm:px-10 py-3.5 sm:py-4 bg-gradient-to-r from-[#D38928] via-[#E29B3B] to-[#C07B20] hover:from-[#B8741E] hover:to-[#965A15] text-[#1A1005] font-bold text-xs sm:text-sm uppercase tracking-widest rounded-[10px] shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-0.5 font-heading cursor-pointer"
                    >
                        <span>SHOP NOW</span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a 
                        href="{{ route('collections.show', 'super-save-offers') }}" 
                        class="inline-flex items-center justify-center px-6 sm:px-7 py-3.5 bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-semibold uppercase tracking-wider rounded-[10px] backdrop-blur-md border border-white/30 transition-all duration-200"
                    >
                        Super Save Offers
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 7. ROOTED IN PURITY (4 Pillars of Vedic Dharma)                           -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#FDFBF7] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SACRED PROMISES ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-normal text-[#121212] font-heading tracking-tight">
                Rooted in Purity
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Crafted the way incense was made for centuries — with zero compromises on holy vidhi.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🌿
                </div>
                <h3 class="text-base sm:text-lg font-bold font-heading text-[#121212]">100% Bamboo-Free</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    According to Hindu scriptures, burning bamboo (Vamsha) is prohibited. We use only pure herb cores.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🪵
                </div>
                <h3 class="text-base sm:text-lg font-bold font-heading text-[#121212]">Zero Charcoal or Coal</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    No toxic black coal smoke or eye-burning chemicals. Only dried sacred temple flowers and pure natural resins.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🛕
                </div>
                <h3 class="text-base sm:text-lg font-bold font-heading text-[#121212]">Vedic Agamas Compliant</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Hand-rolled and blended strictly following the formulations described in traditional Ayurveda texts.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    ✨
                </div>
                <h3 class="text-base sm:text-lg font-bold font-heading text-[#121212]">Desi Cow Ghee &amp; Camphor</h3>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Infused with organic cow dung, pure Desi ghee, and authentic Bhimseni camphor for positive spiritual energy.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 8. FREQUENTLY ASKED QUESTIONS (Luxury Accordions)                         -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-white border-b border-[#EAE3D9]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CLARITY &amp; VIDHI ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-normal text-[#121212] font-heading tracking-tight">
                Frequently Asked Questions
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Everything you need to know about our sacred ingredients, burning times, and delivery.
            </p>
        </div>

        <div class="space-y-4">
            
            <!-- FAQ 1 -->
            <div class="bg-[#FDFBF9] hover:bg-white rounded-[12px] border border-[#EAE3D9] p-5 shadow-xs transition-all duration-200">
                <button type="button" class="faq-toggle w-full flex items-center justify-between text-left focus:outline-none">
                    <span class="text-sm sm:text-base font-bold text-[#121212] font-heading flex items-center space-x-3">
                        <span class="text-[#D38928] font-black text-sm">01.</span>
                        <span>What is bambooless incense sticks / havan cups and how long do they burn?</span>
                    </span>
                    <span class="faq-icon text-[#D38928] font-bold text-lg ml-3">⌄</span>
                </button>
                <div class="faq-content hidden mt-3 pt-3 border-t border-[#EAE3D9]/60 text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Our Bambooless Incense Sticks are crafted without any wood core, ensuring 100% pure fragrant resin burn with no eye irritation. They typically burn continuously for 40 to 45 minutes, while our Sambrani Havan Cups burn intensely for 20 to 25 minutes purifying the room.
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="bg-[#FDFBF9] hover:bg-white rounded-[12px] border border-[#EAE3D9] p-5 shadow-xs transition-all duration-200">
                <button type="button" class="faq-toggle w-full flex items-center justify-between text-left focus:outline-none">
                    <span class="text-sm sm:text-base font-bold text-[#121212] font-heading flex items-center space-x-3">
                        <span class="text-[#D38928] font-black text-sm">02.</span>
                        <span>What makes Mangalam products eco-friendly and low-smoke?</span>
                    </span>
                    <span class="faq-icon text-[#D38928] font-bold text-lg ml-3">⌄</span>
                </button>
                <div class="faq-content hidden mt-3 pt-3 border-t border-[#EAE3D9]/60 text-xs sm:text-sm text-gray-600 leading-relaxed">
                    We completely avoid black charcoal powders and synthetic binders that produce choking black smoke. We upcycle sacred temple flowers and blend them with natural frankincense, guggal, and botanical oils.
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="bg-[#FDFBF9] hover:bg-white rounded-[12px] border border-[#EAE3D9] p-5 shadow-xs transition-all duration-200">
                <button type="button" class="faq-toggle w-full flex items-center justify-between text-left focus:outline-none">
                    <span class="text-sm sm:text-base font-bold text-[#121212] font-heading flex items-center space-x-3">
                        <span class="text-[#D38928] font-black text-sm">03.</span>
                        <span>Are Mangalam products safe to use around babies, elders, and pets?</span>
                    </span>
                    <span class="faq-icon text-[#D38928] font-bold text-lg ml-3">⌄</span>
                </button>
                <div class="faq-content hidden mt-3 pt-3 border-t border-[#EAE3D9]/60 text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Yes, absolutely. Because our products are 100% natural, chemical-free, and charcoal-free, they emit gentle herbal vapor rather than carbon monoxide, making them safe for daily home use around babies and sensitive elders.
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="bg-[#FDFBF9] hover:bg-white rounded-[12px] border border-[#EAE3D9] p-5 shadow-xs transition-all duration-200">
                <button type="button" class="faq-toggle w-full flex items-center justify-between text-left focus:outline-none">
                    <span class="text-sm sm:text-base font-bold text-[#121212] font-heading flex items-center space-x-3">
                        <span class="text-[#D38928] font-black text-sm">04.</span>
                        <span>Do you offer nationwide shipping and COD?</span>
                    </span>
                    <span class="faq-icon text-[#D38928] font-bold text-lg ml-3">⌄</span>
                </button>
                <div class="faq-content hidden mt-3 pt-3 border-t border-[#EAE3D9]/60 text-xs sm:text-sm text-gray-600 leading-relaxed">
                    We deliver across 19,000+ pin codes in India. Free shipping is provided on all orders above ₹499. Cash on Delivery (COD) is available at checkout.
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 9. CERTIFIED TRUST & PURITY RECOGNITION (Luxury Seals)                    -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-16 bg-[#FDFBF7] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center mb-8">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CERTIFIED VEDIC STANDARDS ✦</span>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            
            <div class="bg-white rounded-[12px] border border-[#EAE3D9] p-5 flex items-center space-x-4 shadow-xs hover:border-[#D38928]/40 transition-colors">
                <div class="w-11 h-11 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 flex items-center justify-center text-xl shrink-0">
                    🇮🇳
                </div>
                <div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Make in India</h4>
                    <p class="text-[10px] text-gray-500">100% Indigenous Craft</p>
                </div>
            </div>

            <div class="bg-white rounded-[12px] border border-[#EAE3D9] p-5 flex items-center space-x-4 shadow-xs hover:border-[#D38928]/40 transition-colors">
                <div class="w-11 h-11 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 flex items-center justify-center text-xl shrink-0">
                    🏛️
                </div>
                <div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">MSME Certified</h4>
                    <p class="text-[10px] text-gray-500">Pure Organic Unit</p>
                </div>
            </div>

            <div class="bg-white rounded-[12px] border border-[#EAE3D9] p-5 flex items-center space-x-4 shadow-xs hover:border-[#D38928]/40 transition-colors">
                <div class="w-11 h-11 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 flex items-center justify-center text-xl shrink-0">
                    ⚡
                </div>
                <div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Razorpay Secure</h4>
                    <p class="text-[10px] text-gray-500">256-Bit Encrypted Payments</p>
                </div>
            </div>

            <div class="bg-white rounded-[12px] border border-[#EAE3D9] p-5 flex items-center space-x-4 shadow-xs hover:border-[#D38928]/40 transition-colors">
                <div class="w-11 h-11 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 flex items-center justify-center text-xl shrink-0">
                    📦
                </div>
                <div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Fast Shipping</h4>
                    <p class="text-[10px] text-gray-500">19,000+ Pin Codes</p>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // -------------------------------------------------------------
        // 1. HERO BANNER SLIDER LOGIC
        // -------------------------------------------------------------
        const carousel = document.getElementById('hero-banner-carousel');
        if (carousel) {
            const slides = carousel.querySelectorAll('.hero-slide');
            const dots = carousel.querySelectorAll('#hero-slider-dots button');
            const prevBtn = document.getElementById('hero-slider-prev');
            const nextBtn = document.getElementById('hero-slider-next');
            let currentSlide = 0;
            let timer = null;

            function showSlide(index) {
                if (!slides.length) return;
                currentSlide = (index + slides.length) % slides.length;

                slides.forEach((slide, idx) => {
                    if (idx === currentSlide) {
                        slide.classList.remove('opacity-0', 'pointer-events-none', 'z-0');
                        slide.classList.add('opacity-100', 'pointer-events-auto', 'z-10');
                    } else {
                        slide.classList.remove('opacity-100', 'pointer-events-auto', 'z-10');
                        slide.classList.add('opacity-0', 'pointer-events-none', 'z-0');
                    }
                });

                dots.forEach((dot, idx) => {
                    if (idx === currentSlide) {
                        dot.className = 'w-8 h-2 rounded-[10px] bg-[#D38928] transition-all duration-300';
                    } else {
                        dot.className = 'w-2.5 h-2 rounded-[10px] bg-white/40 hover:bg-white/70 transition-all duration-300';
                    }
                });
            }

            function startTimer() {
                clearInterval(timer);
                timer = setInterval(() => {
                    showSlide(currentSlide + 1);
                }, 4500);
            }

            function stopTimer() {
                clearInterval(timer);
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showSlide(currentSlide + 1);
                    startTimer();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    showSlide(currentSlide - 1);
                    startTimer();
                });
            }

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', (e) => {
                    e.preventDefault();
                    showSlide(idx);
                    startTimer();
                });
            });

            carousel.addEventListener('mouseenter', stopTimer);
            carousel.addEventListener('mouseleave', startTimer);

            // Touch support
            let touchStartX = 0;
            carousel.addEventListener('touchstart', (e) => {
                touchStartX = e.touches[0].clientX;
                stopTimer();
            }, { passive: true });

            carousel.addEventListener('touchend', (e) => {
                const touchEndX = e.changedTouches[0].clientX;
                const diff = touchStartX - touchEndX;
                if (Math.abs(diff) > 40) {
                    if (diff > 0) showSlide(currentSlide + 1);
                    else showSlide(currentSlide - 1);
                }
                startTimer();
            }, { passive: true });

            showSlide(0);
            startTimer();
        }

        // -------------------------------------------------------------
        // 2. 3D COVERFLOW TESTIMONIAL SLIDER LOGIC
        // -------------------------------------------------------------
        const testSection = document.getElementById('testimonial-3d-section');
        if (testSection) {
            const cards = testSection.querySelectorAll('.testimonial-card');
            const dots = testSection.querySelectorAll('#testimonial-dots button');
            const prevBtn = document.getElementById('testimonial-prev-btn');
            const nextBtn = document.getElementById('testimonial-next-btn');
            let activeIndex = 0;
            let testTimer = null;
            const total = cards.length;

            function update3DPositions() {
                cards.forEach((card, i) => {
                    let offset = (i - activeIndex + total) % total;
                    if (offset > total / 2) offset -= total;

                    card.style.transition = 'all 0.5s cubic-bezier(0.25, 1, 0.5, 1)';

                    if (offset === 0) {
                        card.style.transform = 'translateX(0px) scale(1.05) translateZ(80px) rotateY(0deg)';
                        card.style.opacity = '1';
                        card.style.zIndex = '30';
                        card.style.border = '2px solid #D38928';
                        card.style.pointerEvents = 'auto';
                        card.style.cursor = 'default';
                        card.style.boxShadow = '0 25px 50px -12px rgba(211, 137, 40, 0.25)';
                    } else if (offset === -1 || (offset === total - 1 && total === 2)) {
                        const isMobile = window.innerWidth < 640;
                        const dist = isMobile ? -140 : -260;
                        card.style.transform = `translateX(${dist}px) scale(0.88) translateZ(0px) rotateY(18deg)`;
                        card.style.opacity = '0.65';
                        card.style.zIndex = '20';
                        card.style.border = '1px solid #EAE3D9';
                        card.style.pointerEvents = 'auto';
                        card.style.cursor = 'pointer';
                        card.style.boxShadow = '0 10px 25px -5px rgba(0,0,0,0.08)';
                    } else if (offset === 1) {
                        const isMobile = window.innerWidth < 640;
                        const dist = isMobile ? 140 : 260;
                        card.style.transform = `translateX(${dist}px) scale(0.88) translateZ(0px) rotateY(-18deg)`;
                        card.style.opacity = '0.65';
                        card.style.zIndex = '20';
                        card.style.border = '1px solid #EAE3D9';
                        card.style.pointerEvents = 'auto';
                        card.style.cursor = 'pointer';
                        card.style.boxShadow = '0 10px 25px -5px rgba(0,0,0,0.08)';
                    } else {
                        card.style.transform = offset < 0 ? 'translateX(-400px) scale(0.7) translateZ(-100px)' : 'translateX(400px) scale(0.7) translateZ(-100px)';
                        card.style.opacity = '0';
                        card.style.zIndex = '0';
                        card.style.pointerEvents = 'none';
                    }
                });

                dots.forEach((dot, idx) => {
                    if (idx === activeIndex) {
                        dot.className = 'w-8 h-2 rounded-[10px] bg-[#D38928] transition-all duration-300';
                    } else {
                        dot.className = 'w-2.5 h-2 rounded-[10px] bg-[#D38928]/30 hover:bg-[#D38928]/60 transition-all duration-300';
                    }
                });
            }

            function setTestimonial(index) {
                activeIndex = (index + total) % total;
                update3DPositions();
            }

            function startTestTimer() {
                clearInterval(testTimer);
                testTimer = setInterval(() => {
                    setTestimonial(activeIndex + 1);
                }, 4500);
            }

            function stopTestTimer() {
                clearInterval(testTimer);
            }

            cards.forEach((card, i) => {
                card.addEventListener('click', () => {
                    if (i !== activeIndex) {
                        setTestimonial(i);
                        startTestTimer();
                    }
                });
            });

            if (nextBtn) {
                nextBtn.addEventListener('click', () => {
                    setTestimonial(activeIndex + 1);
                    startTestTimer();
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', () => {
                    setTestimonial(activeIndex - 1);
                    startTestTimer();
                });
            }

            dots.forEach((dot, idx) => {
                dot.addEventListener('click', () => {
                    setTestimonial(idx);
                    startTestTimer();
                });
            });

            testSection.addEventListener('mouseenter', stopTestTimer);
            testSection.addEventListener('mouseleave', startTestTimer);

            update3DPositions();
            startTestTimer();
        }

        // -------------------------------------------------------------
        // 3. TOAST NOTIFICATION UTILITY
        // -------------------------------------------------------------
        function showNotification(title, message, iconType = 'cart') {
            let toast = document.getElementById('mangalam-live-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'mangalam-live-toast';
                toast.className = 'fixed bottom-6 right-6 z-50 bg-[#121212] text-white px-5 py-3.5 rounded-[12px] shadow-2xl border border-[#D38928]/50 flex items-center space-x-3 transition-all duration-300 transform translate-y-20 opacity-0 font-body';
                document.body.appendChild(toast);
            }

            const iconHtml = iconType === 'wishlist' 
                ? '<span class="text-rose-400 text-lg">♥</span>' 
                : '<span class="text-[#D38928] text-lg">✓</span>';

            toast.innerHTML = `
                ${iconHtml}
                <div>
                    <div class="text-xs font-bold text-white font-heading">${title}</div>
                    <div class="text-[11px] text-gray-300">${message}</div>
                </div>
            `;

            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');

            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        // -------------------------------------------------------------
        // 4. FAQ ACCORDION LOGIC
        // -------------------------------------------------------------
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('.faq-icon');
                if (content) {
                    const isHidden = content.classList.contains('hidden');
                    if (isHidden) {
                        content.classList.remove('hidden');
                        if (icon) icon.textContent = '⌃';
                    } else {
                        content.classList.add('hidden');
                        if (icon) icon.textContent = '⌄';
                    }
                }
            });
        });
    });
</script>
@endpush
