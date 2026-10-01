@extends('layouts.app')

@section('title', 'Mangalam.co™ — 100% Pure Bambooless Agarbatti & Vedic Pooja Samagri')
@section('meta_description', 'Shri Ram Uphaar, Bambooless Incense Sticks, Havan Cups, Dhoop Cones, and Natural Attar Sprays crafted as per Vedic Vidhi.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. FULL-WIDTH CLEAN LUXURY HERO BANNER                                     -->
<!-- ========================================================================= -->
<section class="relative w-full bg-[#FAF5EE] overflow-hidden select-none border-b border-[#EAE3D9] font-body" id="hero-banner-carousel">
    
    <!-- Slides Wrapper (Fixed Height for all Screens & Zoom levels) -->
    <div class="relative w-full h-[340px] sm:h-[420px] md:h-[480px] lg:h-[540px] xl:h-[580px] overflow-hidden bg-[#FAF4EB]">
        
        <!-- SLIDE 1: SACRED BAMBOOLEES COLLECTION (RESPONSIVE DESKTOP & MOBILE BANNER) -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 pointer-events-auto z-10 flex items-center justify-center bg-[#FAF4EB]" data-slide="0">
            <a href="{{ route('collections.show', 'bambooless') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Bambooless Incense Collection">
                <picture class="w-full h-full block">
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/hero-sacred-mobile.jpg') }}">
                    <img 
                        src="{{ asset('assets/images/hero-sacred.jpg') }}" 
                        alt="Mangalam Sacred Bambooless Collection" 
                        class="w-full h-full object-cover object-center"
                    >
                </picture>
            </a>
        </div>

        <!-- SLIDE 2: SACRED HAVAN CUPS COLLECTION (RESPONSIVE DESKTOP & MOBILE BANNER) -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center justify-center bg-[#FAF4EB]" data-slide="1">
            <a href="{{ route('collections.show', 'havan-cups') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Havan Cups Collection">
                <picture class="w-full h-full block">
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/hero-sacred-hawan-cups-mobile.jpg') }}">
                    <img 
                        src="{{ asset('assets/images/hero-sacred-hawan-cups.jpg') }}" 
                        alt="Mangalam Sacred Havan Cups Collection" 
                        class="w-full h-full object-cover object-center"
                    >
                </picture>
            </a>
        </div>

        <!-- SLIDE 3: SACRED DHOOP CONES COLLECTION (RESPONSIVE DESKTOP & MOBILE BANNER) -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center justify-center bg-[#FAF4EB]" data-slide="2">
            <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Dhoop Cones Collection">
                <picture class="w-full h-full block">
                    <source media="(max-width: 768px)" srcset="{{ asset('assets/images/hera-sacred-dhoop-cones-mobile.jpg') }}">
                    <img 
                        src="{{ asset('assets/images/hera-sacred-dhoop-cones.jpg') }}" 
                        alt="Mangalam Sacred Dhoop Cones Collection" 
                        class="w-full h-full object-cover object-center"
                    >
                </picture>
            </a>
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
        <button type="button" class="w-2.5 h-2 rounded-[10px] bg-[#1F1F1F]/30 hover:bg-[#1F1F1F]/60 transition-all duration-300" data-index="2" aria-label="Slide 3"></button>
    </div>

</section>



<!-- ========================================================================= -->
<!-- 2. BESTSELLER OF THE MONTH (Mobile Horizontal Slider + 4+4 Load More)     -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-[#FAF7F2] border-b border-[#EAE3D9] overflow-hidden">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header with Subtitle -->
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ PURE VEDIC BLESSINGS ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                Bestseller of the Month
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Most cherished sacred samagri, handcrafted for your daily morning and evening pooja.
            </p>
        </div>

        <!-- Bestseller Section Container with Mobile Slider Arrows -->
        <div class="relative">
            <!-- Left / Right Mobile Navigation Buttons -->
            <button 
                type="button" 
                id="bestseller-prev-btn" 
                class="sm:hidden absolute -left-2 top-[38%] -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-white/95 border border-[#EADBCC] text-[#965A15] shadow-md flex items-center justify-center active:scale-95 transition-all cursor-pointer"
                aria-label="Previous Slide"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button 
                type="button" 
                id="bestseller-next-btn" 
                class="sm:hidden absolute -right-2 top-[38%] -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-white/95 border border-[#EADBCC] text-[#965A15] shadow-md flex items-center justify-center active:scale-95 transition-all cursor-pointer"
                aria-label="Next Slide"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- 8-Card Luxury Grid (Mobile Swipeable Slider + Desktop Grid) -->
            <div id="bestseller-grid" class="flex sm:grid overflow-x-auto sm:overflow-visible scrollbar-none snap-x snap-mandatory sm:grid-cols-2 lg:grid-cols-4 gap-2.5 sm:gap-4 lg:gap-5 pb-4 sm:pb-0 -mx-5 px-5 sm:mx-0 sm:px-0 scroll-smooth">
                
                <!-- Card 1: Swarna Pushpa (TOP PICKS) -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            ✨ BUY 2 GET 1 FREE ✨
                        </span>
                    </div>
                    <!-- Image (10px side gap) -->
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'swarna-pushpa') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Swarna Pushpa Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Swarna Pushpa (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Swarna Pushpa" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'swarna-pushpa') }}">Swarna Pushpa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Marygold)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(277)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Swarna Pushpa" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Chandan Saanjh (TOP PICKS) -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <!-- Image (10px side gap) -->
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'chandan-saanjh') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Chandan Saanjh Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Chandan Saanjh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Chandan Saanjh" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'chandan-saanjh') }}">Chandan Saanjh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(218)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Chandan Saanjh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Royal Oudh (FAVORITE) -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <!-- Image (10px side gap) -->
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'royal-oudh') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Royal Oudh Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Royal Oudh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Royal Oudh" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'royal-oudh') }}">Royal Oudh <span class="text-xs font-normal text-gray-500 ml-0.5">(रॉयल ऊद)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(234)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Royal Oudh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Google Dhoop Havan Cup (TOP PICKS) -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            TOP PICKS
                        </span>
                    </div>
                    <!-- Image (10px side gap) -->
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'google-dhoop') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/havan-cup.jpg') }}" alt="Google Dhoop Havan Cup" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-havan-cup.jpg') }}" alt="Google Dhoop (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">box of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#965A15] block my-0.5">12</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">cups</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Google Dhoop" aria-label="Save to Wishlist">
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

                <!-- ================================================================= -->
                <!-- 4 EXTRA PRODUCTS REVEALED UPON CLICKING LOAD MORE                -->
                <!-- ================================================================= -->

                <!-- Card 5: Divya Naagchampa (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'divya-naagchampa') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Divya Naagchampa Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Divya Naagchampa (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Divya Naagchampa" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'divya-naagchampa') }}">Divya Naagchampa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(नागचंपा)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(219)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Divya Naagchampa" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Mogra Noor (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'mogra-noor') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Mogra Noor Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Mogra Noor (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Mogra Noor" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'mogra-noor') }}">Mogra Noor <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(मोगरा)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(194)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Mogra Noor" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Gulab Rooh (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'gulab-rooh') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Gulab Rooh Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Gulab Rooh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Gulab Rooh" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'gulab-rooh') }}">Gulab Rooh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(गुलाब)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(204)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Gulab Rooh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Lavender Veda (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                            BUY 2 GET 1 FREE
                        </span>
                    </div>
                    <div class="p-2.5 pb-0">
                        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                            <a href="{{ route('products.show', 'lavender-veda') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Lavender Veda Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Lavender Veda (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Lavender Veda" aria-label="Save to Wishlist">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'lavender-veda') }}">Lavender Veda <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(लैवेंडर)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                                <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(178)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                                <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Lavender Veda" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Dynamic Action: Simple Load More Text -> Changes to View All Products Button (Only Desktop) -->
        <div class="mt-8 sm:mt-10 text-center hidden sm:block">
            <!-- 1. Simple Load More Text Action -->
            <button 
                type="button" 
                id="bestseller-load-more-btn"
                class="inline-flex items-center space-x-1.5 text-xs sm:text-sm font-bold text-[#D38928] hover:text-[#965A15] border-b-2 border-[#D38928] hover:border-[#965A15] pb-0.5 tracking-wider transition-all duration-200 cursor-pointer font-heading uppercase group"
            >
                <span>Load More Products</span>
                <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>

            <!-- 2. Small View All Products Button (Appears after Load More is clicked) -->
            <a 
                href="{{ route('collections.show', 'all') }}" 
                id="bestseller-view-all-btn"
                style="display: none;"
                class="inline-flex items-center justify-center px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
            >
                <span>View All Products</span>
                <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loadMoreBtn = document.getElementById('bestseller-load-more-btn');
        const viewAllBtn = document.getElementById('bestseller-view-all-btn');
        const extraCards = document.querySelectorAll('.bestseller-extra-card');
        const bestsellerGrid = document.getElementById('bestseller-grid');
        const prevBtn = document.getElementById('bestseller-prev-btn');
        const nextBtn = document.getElementById('bestseller-next-btn');

        if (loadMoreBtn && viewAllBtn) {
            loadMoreBtn.addEventListener('click', () => {
                extraCards.forEach(card => {
                    card.classList.remove('hidden');
                });
                loadMoreBtn.style.display = 'none';
                viewAllBtn.style.display = 'inline-flex';
            });
        }

        if (prevBtn && bestsellerGrid) {
            prevBtn.addEventListener('click', () => {
                bestsellerGrid.scrollBy({ left: -270, behavior: 'smooth' });
            });
        }
        if (nextBtn && bestsellerGrid) {
            nextBtn.addEventListener('click', () => {
                bestsellerGrid.scrollBy({ left: 270, behavior: 'smooth' });
            });
        }
    });
</script>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 3. PRODUCTS CATEGORY (Clean Large Single-Item Circles on Pure White)      -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9] font-body select-none">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-14 sm:mb-18 space-y-2">
            <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.3em] text-[#D38928] font-heading">
                ✦ 100% NATURAL • CHARCOAL FREE ✦
            </span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#2B1810] font-heading tracking-tight capitalize leading-tight">
                Product Categories
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 max-w-md mx-auto">
                Handcrafted from sacred temple flowers &amp; pure living resins for divine daily rituals.
            </p>
        </div>

        <!-- 4 Big Single-Product Category Circles -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8 lg:gap-10 max-w-6xl mx-auto">
            
            <!-- Category 1: Single Bamboo-less Dhoop Stick -->
            <div class="group flex flex-col items-center text-center space-y-3.5 sm:space-y-4">
                <!-- Borderless White Rounded Circle -->
                <a href="{{ route('collections.show', 'bambooless') }}" class="block relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 xl:w-68 xl:h-68 rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" 
                            alt="Bamboo-less Dhoop Stick" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-1 max-w-xs flex flex-col items-center">
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading block">
                        Dhoop Stick
                    </span>
                    <h3 class="text-xs sm:text-sm lg:text-base font-semibold text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'bambooless') }}" class="hover:text-[#D38928] transition-colors">Bamboo-less Dhoop Stick</a>
                    </h3>
                    <p class="text-[10px] sm:text-[11px] text-gray-500 leading-normal font-normal line-clamp-2">
                        Dhoop Sticks fill your space with soothing fragrance and divine calm.
                    </p>
                </div>
            </div>

            <!-- Category 2: Single Dhoop Cone -->
            <div class="group flex flex-col items-center text-center space-y-3.5 sm:space-y-4">
                <!-- Borderless White Rounded Circle -->
                <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 xl:w-68 xl:h-68 rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-dhoop-cone.jpg') }}" 
                            alt="Easy to Use Dhoop Cone" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-1 max-w-xs flex flex-col items-center">
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading block">
                        Dhoop Cones
                    </span>
                    <h3 class="text-xs sm:text-sm lg:text-base font-semibold text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'dhoop-cones') }}" class="hover:text-[#D38928] transition-colors">Easy to Use Dhoop Cone</a>
                    </h3>
                    <p class="text-[10px] sm:text-[11px] text-gray-500 leading-normal font-normal line-clamp-2">
                        Dhoop Cones release a rich, long-lasting aroma that purifies the air.
                    </p>
                </div>
            </div>

            <!-- Category 3: Single 100% Organic Havan Cup -->
            <div class="group flex flex-col items-center text-center space-y-3.5 sm:space-y-4">
                <!-- Borderless White Rounded Circle -->
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 xl:w-68 xl:h-68 rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-havan-cup.jpg') }}" 
                            alt="100% Organic Havan Cups" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-1 max-w-xs flex flex-col items-center">
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading block">
                        Havan Cup
                    </span>
                    <h3 class="text-xs sm:text-sm lg:text-base font-semibold text-[#1F1F1F]">
                        <a href="{{ route('collections.show', 'havan-cups') }}" class="hover:text-[#D38928] transition-colors">100% Organic Havan Cups</a>
                    </h3>
                    <p class="text-[10px] sm:text-[11px] text-gray-500 leading-normal font-normal line-clamp-2">
                        Organic Havan Cups made with pure natural ingredients and herbs.
                    </p>
                </div>
            </div>

            <!-- Category 4: Mangalam Pitambara Havan Pack -->
            <div class="group flex flex-col items-center text-center space-y-3.5 sm:space-y-4">
                <!-- Borderless White Rounded Circle -->
                <a href="{{ route('products.pitambara') }}" class="block relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 xl:w-68 xl:h-68 rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/pitambara-pack.jpg') }}" 
                            alt="Pitambara Havan Pack" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-1 max-w-xs flex flex-col items-center">
                    <span class="text-[10px] sm:text-[11px] font-bold uppercase tracking-[0.2em] text-[#965A15] font-heading block">
                        Pitambara Havan Pack
                    </span>
                    <h3 class="text-xs sm:text-sm lg:text-base font-semibold text-[#1F1F1F]">
                        <a href="{{ route('products.pitambara') }}" class="hover:text-[#D38928] transition-colors">Pitambara Havan Pack</a>
                    </h3>
                    <p class="text-[10px] sm:text-[11px] text-gray-500 leading-normal font-normal line-clamp-2">
                        Sacred Vedic blend with fresh mango wood sticks. VIP Pre-booking open.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 4. STANDALONE PROMO BANNER: BUY 5 TRIAL PACKS @ 799 (Edge-to-Edge)        -->
<!-- ========================================================================= -->
<section class="w-full bg-[#FAF4EB] border-b border-[#EADBCC] overflow-hidden select-none">
    <a href="{{ route('bundles.trial-packs') }}" class="block w-full group focus:outline-none">
        <img 
            src="{{ asset('assets/images/banner-5-trial-packs.jpg') }}" 
            alt="Festive Collection - 5 Divine Essentials at just ₹799 - Mangalam" 
            class="w-full h-auto block object-cover group-hover:opacity-95 transition-opacity duration-300"
            loading="lazy"
        >
    </a>
</section>

<!-- ========================================================================= -->
<!-- 5. SHOPPABLE VIDEO REELS (Watch, Play & Direct Add to Cart)               -->
<!-- ========================================================================= -->
<x-shoppable-video-reels />

<!-- ========================================================================= -->
<!-- 6. DAILY DEVOTIONAL RITUALS (Exact Match to User Screenshot Standard) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DAILY RITUAL GUIDES ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                Devotional Moments of Peace
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Tailored sacred blends for every auspicious hour of your day.
            </p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2.5 sm:gap-4 lg:gap-5">
            
            <!-- Card 1: Swarna Pushpa Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        MORNING SANDHYA
                    </span>
                </div>
                <div class="p-2.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'swarna-pushpa') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Swarna Pushpa Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Swarna Pushpa Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">100</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[4px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider">
                            BUY 2 GET 1 FREE <span class="text-[#F6DAA8] font-normal hidden sm:inline">Offer</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Swarna Pushpa Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'swarna-pushpa') }}">Swarna Pushpa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Refill 100)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(277)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹499.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Swarna Pushpa Refill Pack" data-product-price="499.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Divya Naagchampa Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TEMPLE AARTI
                    </span>
                </div>
                <div class="p-2.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'divya-naagchampa') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Divya Naagchampa Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Divya Naagchampa Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[4px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider">
                            BUY 2 GET 1 FREE <span class="text-[#F6DAA8] font-normal hidden sm:inline">Offer</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Divya Naagchampa Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'divya-naagchampa') }}">Divya Naagchampa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Refill)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(219)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹499.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Divya Naagchampa Refill Pack" data-product-price="499.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Royal Oudh Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        EVENING DHYAN
                    </span>
                </div>
                <div class="p-2.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'royal-oudh') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Royal Oudh Bambooless Sticks" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Royal Oudh Bambooless Sticks (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[4px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider">
                            BUY 2 GET 1 FREE <span class="text-[#F6DAA8] font-normal hidden sm:inline">Offer</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Royal Oudh Bambooless Sticks" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'royal-oudh') }}">Royal Oudh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Sticks)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(184)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Royal Oudh Bambooless Sticks" data-product-price="399.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Chandan Saanjh Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        DAILY HAVAN
                    </span>
                </div>
                <div class="p-2.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'chandan-saanjh') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Chandan Saanjh Sticks" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Chandan Saanjh Sticks (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                            <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[4px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider">
                            BUY 2 GET 1 FREE <span class="text-[#F6DAA8] font-normal hidden sm:inline">Offer</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 cursor-pointer" data-product-title="Chandan Saanjh Sticks" aria-label="Save to Wishlist">
                            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'chandan-saanjh') }}">Chandan Saanjh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1 text-[#D38928] text-xs">
                            <div class="flex text-xs"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(162)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹499</span>
                            <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">₹399.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Chandan Saanjh Sticks" data-product-price="399.00">
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
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
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
<!-- 6. ROOTED IN PURITY (4 Pillars of Vedic Dharma)                           -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#FDFBF7] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SACRED PROMISES ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
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
<!-- 7. STANDALONE PROMO BANNER: BUY 2 GET 1 FREE (Edge-to-Edge Above FAQ)     -->
<!-- ========================================================================= -->
<section class="w-full bg-[#FAF4EB] border-b border-[#EADBCC] overflow-hidden select-none">
    <a href="{{ route('bundles.buy2get1') }}" class="block w-full group focus:outline-none">
        <img 
            src="{{ asset('assets/images/banner-buy2-get1-free.jpg') }}" 
            alt="Buy 2 Get 1 FREE + Chandan Pack FREE @ ₹999 - Mangalam" 
            class="w-full h-auto block object-cover group-hover:opacity-95 transition-opacity duration-300"
            loading="lazy"
        >
    </a>
</section>

<!-- ========================================================================= -->
<!-- 8. FREQUENTLY ASKED QUESTIONS (Luxury Modern Accordions)                  -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-[#FAF7F2]/60 border-b border-[#EADBCC] select-none">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto space-y-3">
            <div class="inline-flex items-center space-x-2 px-3.5 py-1 rounded-full bg-white border border-[#EADBCC] text-[#C87A1E] shadow-2xs">
                <span class="w-1.5 h-1.5 rounded-full bg-[#D38928]"></span>
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] font-heading">Clarity &amp; Vidhi</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[#121212] font-heading tracking-tight leading-tight">
                Frequently Asked Questions
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed max-w-xl mx-auto">
                Everything you need to know about our authentic Vedic ingredients, burning times, and delivery.
            </p>
        </div>

        <!-- Accordion Cards List -->
        <div class="space-y-3.5 sm:space-y-4">
            
            <!-- FAQ 1 -->
            <div class="faq-card bg-white rounded-[16px] border border-[#EADBCC] shadow-xs hover:border-[#D38928]/50 transition-all duration-200 overflow-hidden">
                <button type="button" class="faq-toggle w-full p-4 sm:p-5 flex items-center justify-between text-left focus:outline-none cursor-pointer group">
                    <div class="flex items-center space-x-3.5 sm:space-x-4 pr-4">
                        <span class="w-8 h-8 rounded-[10px] bg-[#FAF5EE] text-[#D38928] text-xs font-black font-heading flex items-center justify-center shrink-0 border border-[#D38928]/20 group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                            01
                        </span>
                        <span class="text-sm sm:text-base font-bold text-[#121212] font-heading group-hover:text-[#D38928] transition-colors leading-snug">
                            What makes Mangalam bambooless incense sticks and havan cups unique?
                        </span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-1 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-100">
                    <p>
                        Our incense is <strong>100% bamboo-free</strong> (compliant with Vedic and Vastu scriptures) and <strong>0% toxic charcoal</strong>. Handcrafted using upcycled temple flower powders, pure Bhimseni camphor, natural Loban, and Guggal resins, it produces soothing herbal aroma that leaves behind clean, auspicious white ash without causing any eye irritation or coughing.
                    </p>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-card bg-white rounded-[16px] border border-[#EADBCC] shadow-xs hover:border-[#D38928]/50 transition-all duration-200 overflow-hidden">
                <button type="button" class="faq-toggle w-full p-4 sm:p-5 flex items-center justify-between text-left focus:outline-none cursor-pointer group">
                    <div class="flex items-center space-x-3.5 sm:space-x-4 pr-4">
                        <span class="w-8 h-8 rounded-[10px] bg-[#FAF5EE] text-[#D38928] text-xs font-black font-heading flex items-center justify-center shrink-0 border border-[#D38928]/20 group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                            02
                        </span>
                        <span class="text-sm sm:text-base font-bold text-[#121212] font-heading group-hover:text-[#D38928] transition-colors leading-snug">
                            How long do they burn, and does the temple fragrance linger in the room?
                        </span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-1 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-100">
                    <p>
                        Each 9-inch Bambooless Stick burns continuously for <strong>45 to 50 minutes</strong>, while our organic Sambrani Havan Cups burn intensely for <strong>25 to 30 minutes</strong>. Due to high botanical essential oil concentration, the uplifting sacred fragrance lingers throughout your home for <strong>4 to 6 hours</strong> after burning.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-card bg-white rounded-[16px] border border-[#EADBCC] shadow-xs hover:border-[#D38928]/50 transition-all duration-200 overflow-hidden">
                <button type="button" class="faq-toggle w-full p-4 sm:p-5 flex items-center justify-between text-left focus:outline-none cursor-pointer group">
                    <div class="flex items-center space-x-3.5 sm:space-x-4 pr-4">
                        <span class="w-8 h-8 rounded-[10px] bg-[#FAF5EE] text-[#D38928] text-xs font-black font-heading flex items-center justify-center shrink-0 border border-[#D38928]/20 group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                            03
                        </span>
                        <span class="text-sm sm:text-base font-bold text-[#121212] font-heading group-hover:text-[#D38928] transition-colors leading-snug">
                            Are Mangalam products safe to use around babies, elders, and pets?
                        </span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-1 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-100">
                    <p>
                        Yes, 100% safe. Because we never use toxic black charcoal, synthetic dipping chemicals, or artificial scent binders, our incense emits gentle herbal aroma rather than suffocating carbon monoxide, making it completely safe for daily pooja in closed or air-conditioned rooms with elders and toddlers.
                    </p>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-card bg-white rounded-[16px] border border-[#EADBCC] shadow-xs hover:border-[#D38928]/50 transition-all duration-200 overflow-hidden">
                <button type="button" class="faq-toggle w-full p-4 sm:p-5 flex items-center justify-between text-left focus:outline-none cursor-pointer group">
                    <div class="flex items-center space-x-3.5 sm:space-x-4 pr-4">
                        <span class="w-8 h-8 rounded-[10px] bg-[#FAF5EE] text-[#D38928] text-xs font-black font-heading flex items-center justify-center shrink-0 border border-[#D38928]/20 group-hover:bg-[#D38928] group-hover:text-white transition-colors">
                            04
                        </span>
                        <span class="text-sm sm:text-base font-bold text-[#121212] font-heading group-hover:text-[#D38928] transition-colors leading-snug">
                            Do you offer nationwide shipping, COD, and complimentary gifts?
                        </span>
                    </div>
                    <div class="w-8 h-8 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-5 pb-5 pt-1 text-xs sm:text-sm text-gray-600 leading-relaxed border-t border-gray-100">
                    <p>
                        We deliver across 19,000+ pin codes across Bharat within 2–4 business days. <strong>Free shipping</strong> is provided on orders above ₹499. We support <strong>Cash on Delivery (COD)</strong>, 1-Click GoKwik UPI checkout, and include an artisan ceramic holder FREE inside every pack.
                    </p>
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
                        if (icon) icon.classList.add('rotate-180');
                    } else {
                        content.classList.add('hidden');
                        if (icon) icon.classList.remove('rotate-180');
                    }
                }
            });
        });
    });
</script>
@endpush
