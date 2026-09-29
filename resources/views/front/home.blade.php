@extends('layouts.app')

@section('title', 'Aaradhna.co™ — 100% Pure Bambooless Agarbatti & Vedic Pooja Samagri')
@section('meta_description', 'Shri Ram Uphaar, Bambooless Incense Sticks, Havan Cups, Dhoop Cones, and Natural Attar Sprays crafted as per Vedic Vidhi.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. FULL-WIDTH INTERACTIVE LUXURY HERO SLIDER                               -->
<!-- ========================================================================= -->
<section class="relative w-full bg-[#121212] overflow-hidden select-none" id="hero-banner-carousel">
    
    <!-- Slides Wrapper -->
    <div class="relative w-full min-h-[520px] sm:min-h-[600px] lg:min-h-[650px] overflow-hidden">
        
        <!-- SLIDE 1: SHRI RAM UPHAAR -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 z-10 flex items-center" data-slide="0">
            <img 
                src="{{ asset('assets/images/hero-ram-uphaar-banner.jpg') }}" 
                alt="Shri Ram Uphaar Luxury Pooja Gift Box - Aaradhna" 
                class="absolute inset-0 w-full h-full object-cover object-center transform scale-100 transition-transform duration-10000"
            >
            <!-- Vignette Overlays -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/55 to-black/30 sm:to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-transparent to-black/40"></div>

            <!-- Content Container (Increased left padding to avoid arrow overlapping text) -->
            <div class="relative w-full mx-auto px-6 sm:px-12 lg:px-[80px] py-16 sm:py-20 lg:py-24 w-full">
                <div class="max-w-xl lg:max-w-2xl text-left space-y-5 sm:space-y-6 animate-fadeIn">
                    
                    <!-- Top Pill Badge -->
                    <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-[10px] bg-[#D38928]/90 text-white backdrop-blur-md shadow-lg border border-[#F6DAA8]/40">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-widest font-heading">✦ SHRI RAM UPHAAR • DIVINE EDITION ✦</span>
                    </div>

                    <!-- Main Hero Headlines -->
                    <div class="space-y-2">
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-heading text-white tracking-tight leading-[1.12] drop-shadow-md">
                            Everything For Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F6DAA8] via-[#D38928] to-[#F6DAA8]">Sacred Rituals</span>
                        </h1>
                        <p class="text-sm sm:text-base lg:text-lg text-white/90 font-medium leading-relaxed drop-shadow">
                            100% Charcoal-Free Incense, Organic Havan Cups &amp; Pure Temple Fragrances crafted in accordance with sacred Vedic traditions.
                        </p>
                    </div>

                    <!-- Price & Savings Callout -->
                    <div class="flex flex-wrap items-center gap-3 pt-1">
                        <div class="bg-black/60 backdrop-blur-md px-4 py-2.5 rounded-[10px] border border-[#D38928]/50 text-white inline-flex items-center space-x-3">
                            <span class="text-xs uppercase tracking-wider text-white/80">Festive Special:</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#F6DAA8]">Rs 1,999</span>
                            <span class="text-xs sm:text-sm text-white/70 line-through">Rs 2,924</span>
                            <span class="text-xs font-bold text-white bg-[#9B1C31] px-2.5 py-0.5 rounded-[10px] uppercase">SAVE Rs 925</span>
                        </div>
                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a 
                            href="{{ route('products.show', 'trial-pack-combo') }}" 
                            class="inline-flex items-center justify-center px-8 py-3.5 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
                        >
                            <span>Order Ram Uphaar Box</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a 
                            href="{{ route('collections.show', 'all') }}" 
                            class="inline-flex items-center justify-center px-7 py-3.5 bg-white/15 hover:bg-white/25 text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] backdrop-blur-md border border-white/30 transition-all duration-200 font-heading"
                        >
                            Explore All Collections
                        </a>
                    </div>

                    <!-- Trust Micro-pills -->
                    <div class="flex items-center space-x-6 pt-2 text-xs text-white/85">
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-[#D38928]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>100% Charcoal-Free</span>
                        </div>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-[#D38928]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Free Shipping ₹499+</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SLIDE 2: BAMBOOLEES AGARBATTI & INCENSE -->
        <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center" data-slide="1">
            <img 
                src="{{ asset('assets/images/hero-incense-banner.jpg') }}" 
                alt="Pure Bambooless Incense Sticks - Aaradhna" 
                class="absolute inset-0 w-full h-full object-cover object-center"
            >
            <!-- Vignette Overlays -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/60 to-black/30 sm:to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#121212] via-transparent to-black/40"></div>

            <!-- Content Container (Increased left padding to avoid arrow overlapping text) -->
            <div class="relative w-full mx-auto px-6 sm:px-12 lg:px-[80px] py-16 sm:py-20 lg:py-24 w-full">
                <div class="max-w-xl lg:max-w-2xl text-left space-y-5 sm:space-y-6">
                    
                    <!-- Top Pill Badge -->
                    <div class="inline-flex items-center space-x-2 px-4 py-1.5 rounded-[10px] bg-[#D38928]/90 text-white backdrop-blur-md shadow-lg border border-[#F6DAA8]/40">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                        <span class="text-[11px] sm:text-xs font-bold uppercase tracking-widest font-heading">✦ ZERO BAMBOO • 100% PURE HERBS ✦</span>
                    </div>

                    <!-- Main Hero Headlines -->
                    <div class="space-y-2">
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-heading text-white tracking-tight leading-[1.12] drop-shadow-md">
                            Bambooless <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F6DAA8] via-[#D38928] to-[#F6DAA8]">Incense Sticks</span>
                        </h1>
                        <p class="text-sm sm:text-base lg:text-lg text-white/90 font-medium leading-relaxed drop-shadow">
                            Non-toxic, soot-free fragrances infused with pure sandalwood, rose petals &amp; natural herbs for serene meditation.
                        </p>
                    </div>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-2">
                        <a 
                            href="{{ route('collections.show', 'incense-sticks') }}" 
                            class="inline-flex items-center justify-center px-8 py-3.5 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
                        >
                            <span>Shop Incense Sticks</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a 
                            href="{{ route('products.show', 'trial-pack-combo') }}" 
                            class="inline-flex items-center justify-center px-7 py-3.5 bg-white/15 hover:bg-white/25 text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] backdrop-blur-md border border-white/30 transition-all duration-200 font-heading"
                        >
                            Try Discovery Pack
                        </a>
                    </div>

                    <!-- Trust Micro-pills -->
                    <div class="flex items-center space-x-6 pt-2 text-xs text-white/85">
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-[#D38928]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>Non-Irritating to Eyes</span>
                        </div>
                        <div class="flex items-center space-x-1.5">
                            <svg class="w-4 h-4 text-[#D38928]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            <span>45+ Mins Long Burn</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Luxury Premium Carousel Arrow Controls -->
    <button 
        type="button" 
        id="hero-slider-prev"
        class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-black/45 hover:bg-[#D38928] text-white hover:text-white flex items-center justify-center backdrop-blur-md border border-white/30 hover:border-[#F6DAA8] shadow-2xl transition-all duration-300 transform hover:scale-110 active:scale-95 focus:outline-none cursor-pointer group"
        aria-label="Previous Slide"
    >
        <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button 
        type="button" 
        id="hero-slider-next"
        class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-black/45 hover:bg-[#D38928] text-white hover:text-white flex items-center justify-center backdrop-blur-md border border-white/30 hover:border-[#F6DAA8] shadow-2xl transition-all duration-300 transform hover:scale-110 active:scale-95 focus:outline-none cursor-pointer group"
        aria-label="Next Slide"
    >
        <svg class="w-5 h-5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
    </button>

    <!-- Carousel Pagination Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2.5" id="hero-slider-dots">
        <button type="button" class="w-8 h-2 rounded-[10px] bg-[#D38928] transition-all duration-300" data-index="0" aria-label="Slide 1"></button>
        <button type="button" class="w-2.5 h-2 rounded-[10px] bg-white/40 hover:bg-white/70 transition-all duration-300" data-index="1" aria-label="Slide 2"></button>
    </div>

</section>

<!-- ========================================================================= -->
<!-- 2. BESTSELLER OF THE MONTH (Exact Match to User Screenshot)       -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-[#FAF7F2] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header with Subtitle -->
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ PURE VEDIC BLESSINGS ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Bestseller of the Month
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
                Most cherished sacred samagri, handcrafted for your daily morning and evening pooja.
            </p>
        </div>

        <!-- 4-Card Luxury Grid (Exact Match to Screenshot) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7 lg:gap-8">
            
            <!-- Card 1: Devi Refill Pack (FESTIVE) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        ✨ FESTIVE ✨
                    </span>
                </div>
                <!-- Image -->
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'devi-refill-pack') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Devi Refill Pack" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">100</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-2 left-2 right-2 bg-black/45 backdrop-blur-xs py-1 px-2 rounded-[6px] text-center text-white text-[10px] sm:text-[11px] font-bold tracking-wider">
                            FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Devi Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'devi-refill-pack') }}">Devi <span class="text-xs font-normal uppercase text-gray-500 ml-1">Refill Pack</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(277 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Devi Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Camphor Refill Pack (TOP PICKS) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TOP PICKS
                    </span>
                </div>
                <!-- Image -->
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Camphor Refill Pack" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Camphor Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}">Camphor <span class="text-xs font-normal uppercase text-gray-500 ml-1">Refill Pack</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(218 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹700.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Camphor Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Oudh (अवध) (FOUNDER'S FAVORITE) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        FOUNDER'S FAVORITE
                    </span>
                </div>
                <!-- Image -->
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Oudh Incense" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Oudh (अवध)" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}">Oudh <span class="text-xs font-normal text-gray-500 ml-1">(अवध)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(234 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹375.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹289.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Oudh (अवध)" data-product-price="289.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Sandalwood (चंदन) (TOP PICKS) -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <!-- Top Pill Badge -->
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TOP PICKS
                    </span>
                </div>
                <!-- Image -->
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'sandalwood-havan-cup') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Sandalwood Cones" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#965A15] block my-0.5">40</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">cones</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Sandalwood (चंदन)" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <!-- Content -->
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'sandalwood-havan-cup') }}">Sandalwood <span class="text-xs font-normal text-gray-500 ml-1">(चंदन)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(210 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹450.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹349.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Sandalwood (चंदन)" data-product-price="349.00">
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
<!-- 3. SACRED FRAGRANCE COLLECTION (Luxury 4-Category Visual Cards)            -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-[#FDFBF7] border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
            <div class="space-y-2 max-w-xl">
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CATEGORY SHOWCASE ✦</span>
                <h2 class="text-3xl sm:text-4xl font-black text-[#121212] font-heading tracking-tight">
                    Sacred Fragrance Collection
                </h2>
                <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                    Pure bambooless incense &amp; havan cups, made with sacred herbs &amp; living resin, strictly as prescribed in our holy scriptures.
                </p>
            </div>
            <div>
                <a href="{{ route('collections.show', 'all') }}" class="inline-flex items-center text-xs font-bold text-[#D38928] hover:text-[#b8741e] uppercase tracking-wider">
                    <span>Explore All Categories</span>
                    <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- 4 Luxury Category Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Category 1 -->
            <a href="{{ route('collections.show', 'incense-sticks') }}" class="group relative rounded-[14px] overflow-hidden bg-white border border-[#EAE3D9] shadow-xs hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                <div class="relative w-full aspect-square overflow-hidden bg-stone-100">
                    <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Bambooless Incense Sticks" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#F6DAA8] block">Zero Bamboo</span>
                        <h3 class="text-lg font-bold font-heading">Incense Sticks</h3>
                    </div>
                </div>
                <div class="p-4 bg-white flex items-center justify-between text-xs font-bold text-[#121212] group-hover:text-[#D38928] transition-colors">
                    <span>Explore Sticks</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

            <!-- Category 2 -->
            <a href="{{ route('collections.show', 'organic-havan-cups') }}" class="group relative rounded-[14px] overflow-hidden bg-white border border-[#EAE3D9] shadow-xs hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                <div class="relative w-full aspect-square overflow-hidden bg-stone-100">
                    <img src="{{ asset('assets/images/havan-cup.jpg') }}" alt="Organic Havan Cups" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#F6DAA8] block">100% Vedic Ghee</span>
                        <h3 class="text-lg font-bold font-heading">Havan Cups</h3>
                    </div>
                </div>
                <div class="p-4 bg-white flex items-center justify-between text-xs font-bold text-[#121212] group-hover:text-[#D38928] transition-colors">
                    <span>Explore Cups</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

            <!-- Category 3 -->
            <a href="{{ route('collections.show', 'charcoal-free-dhoop-cones') }}" class="group relative rounded-[14px] overflow-hidden bg-white border border-[#EAE3D9] shadow-xs hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                <div class="relative w-full aspect-square overflow-hidden bg-stone-100">
                    <img src="{{ asset('assets/images/dhoop-cones.jpg') }}" alt="Charcoal Free Dhoop Cones" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#F6DAA8] block">Low Smoke</span>
                        <h3 class="text-lg font-bold font-heading">Dhoop Cones</h3>
                    </div>
                </div>
                <div class="p-4 bg-white flex items-center justify-between text-xs font-bold text-[#121212] group-hover:text-[#D38928] transition-colors">
                    <span>Explore Cones</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

            <!-- Category 4 -->
            <a href="{{ route('collections.show', 'attar-spray') }}" class="group relative rounded-[14px] overflow-hidden bg-white border border-[#EAE3D9] shadow-xs hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex flex-col">
                <div class="relative w-full aspect-square overflow-hidden bg-stone-100">
                    <img src="{{ asset('assets/images/attar-spray.jpg') }}" alt="Natural Attar Sprays" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#F6DAA8] block">Alcohol Free</span>
                        <h3 class="text-lg font-bold font-heading">Attar Sprays</h3>
                    </div>
                </div>
                <div class="p-4 bg-white flex items-center justify-between text-xs font-bold text-[#121212] group-hover:text-[#D38928] transition-colors">
                    <span>Explore Attars</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </a>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 4. DAILY DEVOTIONAL RITUALS (Exact Match to User Screenshot Standard) -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DAILY RITUAL GUIDES ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Devotional Moments of Peace
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
                Tailored sacred blends for every auspicious hour of your day.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7 lg:gap-8">
            
            <!-- Card 1: Devi Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        MORNING SANDHYA
                    </span>
                </div>
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'devi-refill-pack') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Devi Refill Pack" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">100</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-2 left-2 right-2 bg-black/45 backdrop-blur-xs py-1 px-2 rounded-[6px] text-center text-white text-[10px] sm:text-[11px] font-bold tracking-wider">
                            FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Devi Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'devi-refill-pack') }}">Devi <span class="text-xs font-normal uppercase text-gray-500 ml-1">Refill Pack</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(277 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Devi Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Camphor Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TEMPLE AARTI
                    </span>
                </div>
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Camphor Refill Pack" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Camphor Refill Pack" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'camphor-bambooless-incense-sticks') }}">Camphor <span class="text-xs font-normal uppercase text-gray-500 ml-1">Refill Pack</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(219 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹999.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹489.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Camphor Refill Pack" data-product-price="489.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Oudh Bambooless Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        EVENING DHYAN
                    </span>
                </div>
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Oudh Bambooless Sticks" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Oudh Bambooless Sticks" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'oudh-bambooless-incense-sticks') }}">Oudh <span class="text-xs font-normal uppercase text-gray-500 ml-1">Bambooless Sticks</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(184 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹499.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹279.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Oudh Bambooless Sticks" data-product-price="279.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Chandan Cones -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        DAILY HAVAN
                    </span>
                </div>
                <div class="p-3.5 pb-0">
                    <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
                        <a href="{{ route('products.show', 'kesar-chandan-dhoop-cones') }}" class="block w-full h-full">
                            <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Chandan Cones" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out">
                        </a>
                        <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                            <span class="text-[10px] uppercase font-semibold text-gray-500 block">cones</span>
                        </div>
                        <button type="button" class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Chandan Cones" aria-label="Save to Wishlist">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
                    <div class="space-y-1.5">
                        <h3 class="text-lg sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'kesar-chandan-dhoop-cones') }}">Chandan <span class="text-xs font-normal uppercase text-gray-500 ml-1">Cones</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                            <div class="flex"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-[11px] text-gray-500 font-medium">(162 reviews)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                            <span class="text-xs sm:text-sm text-gray-400 line-through">₹449.00</span>
                            <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">₹249.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer" data-product-title="Chandan Cones" data-product-price="249.00">
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
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ 50,000+ BLESSED HOMES ✦</span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#121212] font-heading tracking-tight">
                Devotee Experiences
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
                Verified reviews from families, yoga practitioners &amp; temple priests across sacred India.
            </p>
        </div>

        <!-- 3D Perspective Stage Container -->
        <div class="relative w-full max-w-4xl mx-auto h-[380px] sm:h-[400px] flex items-center justify-center" id="testimonial-3d-stage" style="perspective: 1200px;">
            
            <!-- Card 0: Pandit Radhe Shyam -->
            <div 
                class="testimonial-card absolute w-[300px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="0"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Temple Priest
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#121212] leading-relaxed italic font-medium pt-1">
                        "I am a regular devotee of Aaradhna products since 2 years. Very pure havan cups and sambrani. In temples, we strictly avoid toxic bamboo, and Aaradhna is 100% compliant with sacred Agamas."
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#D38928]/30 mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#D38928] text-white flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        PR
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Pandit Radhe Shyam</h4>
                        <p class="text-[11px] text-[#D38928] font-semibold">Vrindavan Dham</p>
                    </div>
                </div>
            </div>

            <!-- Card 1: Ramesh Joshi -->
            <div 
                class="testimonial-card absolute w-[300px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="1"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#333] leading-relaxed italic pt-1">
                        "Thank you so much for this pure product. Everyone in my family loves the sacred fragrance of the camphor sticks. Zero smoke irritation in eyes during morning aarti!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        RJ
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Ramesh Joshi</h4>
                        <p class="text-[11px] text-gray-500">Varanasi, UP</p>
                    </div>
                </div>
            </div>

            <!-- Card 2: Pooja Mishra -->
            <div 
                class="testimonial-card absolute w-[300px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="2"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#333] leading-relaxed italic pt-1">
                        "Excellent aroma. I didn't feel like burning any other regular chemical stick after experiencing this. The luxury gift boxes are also perfect for festive gifting!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        PM
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Pooja Mishra</h4>
                        <p class="text-[11px] text-gray-500">Ayodhya, UP</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Virendra Sharma -->
            <div 
                class="testimonial-card absolute w-[300px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="3"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Dhyan Devotee
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#333] leading-relaxed italic pt-1">
                        "The Bambooless Oudh and Chandan agarbatti create an instant meditative vibration in my morning meditation. Pure natural resins without any burning charcoal smell."
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        VS
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Virendra Sharma</h4>
                        <p class="text-[11px] text-gray-500">Haridwar, Uttarakhand</p>
                    </div>
                </div>
            </div>

            <!-- Card 4: Geeta Agarwal -->
            <div 
                class="testimonial-card absolute w-[300px] sm:w-[380px] md:w-[420px] bg-white rounded-[16px] p-7 shadow-xl transition-all duration-500 ease-out flex flex-col justify-between"
                data-index="4"
                style="transform-style: preserve-3d;"
            >
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-1 text-[#D38928] text-sm">
                            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2.5 py-0.5 rounded-full border border-emerald-200">
                            Verified Devotee
                        </span>
                    </div>
                    <p class="text-xs sm:text-sm text-[#333] leading-relaxed italic pt-1">
                        "Very easy to place order with pure natural aroma. The Havan cups are so convenient for our daily evening aarti. Highly recommend to every Hindu home!"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-[#EAE3D9] mt-4">
                    <div class="w-11 h-11 rounded-full bg-[#F6DAA8] text-[#121212] flex items-center justify-center font-bold text-sm shadow-sm font-heading">
                        GA
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Geeta Agarwal</h4>
                        <p class="text-[11px] text-gray-500">Jaipur, Rajasthan</p>
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
<!-- 6. INTRODUCING ANANTA & SHUBH (Luxury Spotlight Showcase)                 -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-20 bg-white border-b border-[#EAE3D9]">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="relative rounded-[20px] overflow-hidden bg-gradient-to-r from-[#181818] via-[#2A1810] to-[#141414] border border-[#D38928]/40 p-8 sm:p-12 lg:p-16 shadow-2xl">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left Content Block -->
                <div class="lg:col-span-6 space-y-5 text-left text-white">
                    <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-[10px] bg-[#D38928]/90 text-white backdrop-blur-md shadow-md border border-[#F6DAA8]/40">
                        <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
                        <span class="text-[10px] font-bold uppercase tracking-widest font-heading">✦ INTRODUCING NEW EDITION ✦</span>
                    </div>

                    <div class="space-y-2">
                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black font-heading tracking-tight leading-tight">
                            ANANTA &amp; SHUBH <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#F6DAA8] via-[#D38928] to-[#F6DAA8]">COLLECTION</span>
                        </h2>
                        <p class="text-xs sm:text-sm lg:text-base text-gray-300 leading-relaxed">
                            Handcrafted incense created with rare oudh, living sandalwood resins, and Himalayan spices where ancient tradition creates pure spiritual aura.
                        </p>
                    </div>

                    <!-- Dual CTAs INSIDE the card properly -->
                    <div class="flex flex-wrap gap-4 pt-3">
                        <a 
                            href="{{ route('products.show', 'trial-pack-combo') }}" 
                            class="inline-flex items-center justify-center px-8 py-3.5 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] shadow-lg hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading"
                        >
                            <span>Buy Ananta</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a 
                            href="{{ route('collections.show', 'combos') }}" 
                            class="inline-flex items-center justify-center px-7 py-3.5 bg-white/15 hover:bg-white/25 text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[10px] backdrop-blur-md border border-white/30 transition-all duration-200 font-heading"
                        >
                            Buy Shubh
                        </a>
                    </div>
                </div>

                <!-- Right Visual Presentation -->
                <div class="lg:col-span-6 flex justify-center">
                    <div class="relative w-full max-w-md aspect-[4/3] rounded-[14px] overflow-hidden border border-[#D38928]/40 shadow-2xl">
                        <img 
                            src="{{ asset('assets/images/hero-incense-banner.jpg') }}" 
                            alt="Ananta &amp; Shubh Collection" 
                            class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 text-white">
                            <span class="text-xs font-bold font-heading text-[#F6DAA8]">Handmade Vedic Incense</span>
                            <p class="text-[11px] text-gray-300">Natural Essential Oils • 45 Mins Burn</p>
                        </div>
                    </div>
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
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SACRED PROMISES ✦</span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#121212] font-heading tracking-tight">
                Rooted in Purity
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
                Crafted the way incense was made for centuries — with zero compromises on holy vidhi.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🌿
                </div>
                <h3 class="text-base font-bold font-heading text-[#121212]">100% Bamboo-Free</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    According to Hindu scriptures, burning bamboo (Vamsha) is prohibited. We use only pure herb cores.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🪵
                </div>
                <h3 class="text-base font-bold font-heading text-[#121212]">Zero Charcoal or Coal</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    No toxic black coal smoke or eye-burning chemicals. Only dried sacred temple flowers and pure natural resins.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    🛕
                </div>
                <h3 class="text-base font-bold font-heading text-[#121212]">Vedic Agamas Compliant</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Hand-rolled and blended strictly following the formulations described in traditional Ayurveda texts.
                </p>
            </div>

            <div class="bg-white rounded-[14px] border border-[#EAE3D9] p-6 text-center space-y-3 shadow-xs hover:shadow-lg hover:border-[#D38928]/40 transition-all duration-300">
                <div class="w-14 h-14 rounded-full bg-[#FDF5EB] border border-[#D38928]/40 text-[#D38928] flex items-center justify-center mx-auto text-2xl shadow-xs">
                    ✨
                </div>
                <h3 class="text-base font-bold font-heading text-[#121212]">Desi Cow Ghee &amp; Camphor</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
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
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CLARITY &amp; VIDHI ✦</span>
            <h2 class="text-3xl sm:text-4xl font-black text-[#121212] font-heading tracking-tight">
                Frequently Asked Questions
            </h2>
            <p class="text-xs sm:text-sm text-gray-500">
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
                        <span>What makes Aaradhna products eco-friendly and low-smoke?</span>
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
                        <span>Are Aaradhna products safe to use around babies, elders, and pets?</span>
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
            let toast = document.getElementById('aaradhna-live-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'aaradhna-live-toast';
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
        // 4. QUICK ADD TO CART SYSTEM
        // -------------------------------------------------------------
        const quickAddButtons = document.querySelectorAll('.quick-add-to-cart-btn');
        quickAddButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const productTitle = btn.getAttribute('data-product-title') || 'Sacred Pooja Item';
                
                // Header badge update
                const badge = document.getElementById('header-cart-badge');
                let count = 1;
                if (badge) {
                    count = parseInt(badge.textContent || '0') + 1;
                    badge.textContent = count;
                    badge.classList.remove('hidden');
                }

                // Button visual feedback
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<span>Added to Cart ✓</span>';
                btn.classList.add('bg-emerald-700', 'hover:bg-emerald-800');
                btn.classList.remove('bg-[#D38928]', 'hover:bg-[#B8741E]');

                showNotification('Added to Sacred Cart', `${productTitle} has been added.`, 'cart');

                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.classList.remove('bg-emerald-700', 'hover:bg-emerald-800');
                    btn.classList.add('bg-[#D38928]', 'hover:bg-[#B8741E]');
                }, 1500);
            });
        });

        // -------------------------------------------------------------
        // 5. WISHLIST TOGGLE SYSTEM
        // -------------------------------------------------------------
        const wishlistButtons = document.querySelectorAll('.wishlist-toggle-btn');
        let wishlistState = JSON.parse(localStorage.getItem('aaradhna_wishlist') || '[]');

        function updateWishlistVisuals() {
            wishlistButtons.forEach(btn => {
                const title = btn.getAttribute('data-product-title');
                const svg = btn.querySelector('svg');
                if (wishlistState.includes(title)) {
                    btn.classList.add('text-[#9B1C31]', 'scale-110');
                    btn.classList.remove('text-gray-400');
                    if (svg) svg.setAttribute('fill', 'currentColor');
                } else {
                    btn.classList.remove('text-[#9B1C31]', 'scale-110');
                    btn.classList.add('text-gray-400');
                    if (svg) svg.setAttribute('fill', 'none');
                }
            });
        }

        wishlistButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const title = btn.getAttribute('data-product-title') || 'Pooja Samagri';
                const index = wishlistState.indexOf(title);

                if (index > -1) {
                    wishlistState.splice(index, 1);
                    showNotification('Removed from Wishlist', `${title} removed.`, 'wishlist');
                } else {
                    wishlistState.push(title);
                    showNotification('Added to Sacred Wishlist', `${title} saved for later.`, 'wishlist');
                }

                localStorage.setItem('aaradhna_wishlist', JSON.stringify(wishlistState));
                updateWishlistVisuals();
            });
        });

        updateWishlistVisuals();

        // -------------------------------------------------------------
        // 6. FAQ ACCORDION LOGIC
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
