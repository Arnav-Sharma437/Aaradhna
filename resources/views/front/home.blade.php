@extends('layouts.app')

@section('title', 'Mangalam.co™ — 100% Pure Bambooless Agarbatti & Vedic Pooja Samagri')
@section('meta_description', 'Shri Ram Uphaar, Bambooless Incense Sticks, Havan Cups, Dhoop Cones, and Natural Attar Sprays crafted as per Vedic Vidhi.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. FULL-WIDTH CLEAN LUXURY HERO BANNER                                     -->
<!-- ========================================================================= -->
<section class="relative w-full bg-white overflow-hidden select-none border-b border-[#EAE3D9] font-body" id="hero-banner-carousel">
    
    <!-- Slides Wrapper (Fixed 550px Height Across All Screens) -->
    <div class="relative w-full h-[550px] min-h-[550px] max-h-[550px] overflow-hidden bg-white">
        
        @if(isset($banners) && $banners->isNotEmpty())
            @foreach($banners as $index => $banner)
                <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100 pointer-events-auto z-10' : 'opacity-0 pointer-events-none z-0' }} flex items-center justify-center bg-white" data-slide="{{ $index }}">
                    <a href="{{ $banner->button_link ?: route('collections.show', 'bambooless') }}" class="block w-full h-full relative cursor-pointer" aria-label="{{ $banner->title }}">
                        @if($banner->mobile_image_path)
                            <picture class="w-full h-full block">
                                <source media="(max-width: 768px)" srcset="{{ asset($banner->mobile_image_path) }}">
                                <img 
                                    src="{{ asset($banner->desktop_image_path) }}" 
                                    alt="{{ $banner->title }}" 
                                    class="w-full h-full object-cover object-center"
                                    {{ $index > 0 ? 'loading=lazy' : '' }}
                                >
                            </picture>
                        @else
                            <img 
                                src="{{ asset($banner->desktop_image_path) }}" 
                                alt="{{ $banner->title }}" 
                                class="w-full h-full object-cover object-center"
                                {{ $index > 0 ? 'loading=lazy' : '' }}
                            >
                        @endif
                    </a>
                </div>
            @endforeach
        @else
            <!-- SLIDE 1: SACRED BAMBOOLEES COLLECTION -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 pointer-events-auto z-10 flex items-center justify-center bg-white" data-slide="0">
                <a href="{{ route('collections.show', 'bambooless') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Bambooless Incense Collection">
                    <img 
                        src="{{ asset('assets/images/hero-sacred.jpg') }}" 
                        alt="Mangalam Sacred Bambooless Collection" 
                        class="w-full h-full object-cover object-center"
                    >
                </a>
            </div>

            <!-- SLIDE 2: SACRED HAVAN CUPS COLLECTION (RESPONSIVE DESKTOP & MOBILE BANNER) -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center justify-center bg-white" data-slide="1">
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
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center justify-center bg-white" data-slide="2">
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
        @endif

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
    @php
        $slideCount = (isset($banners) && $banners->isNotEmpty()) ? $banners->count() : 3;
    @endphp
    <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 z-20 flex space-x-2.5" id="hero-slider-dots">
        @for($i = 0; $i < $slideCount; $i++)
            <button type="button" class="{{ $i === 0 ? 'w-8 h-2 rounded-[10px] bg-[#D38928]' : 'w-2.5 h-2 rounded-[10px] bg-[#1F1F1F]/30 hover:bg-[#1F1F1F]/60' }} transition-all duration-300" data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
        @endfor
    </div>

</section>



<!-- ========================================================================= -->
<!-- 2. BESTSELLER OF THE MONTH (Mobile Horizontal Slider + 4+4 Load More)     -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-white border-b border-[#EAE3D9] overflow-hidden">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
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
                
                <!-- Card 1: Swarna Pushpa -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <!-- Image Box (Matching Categories Inner Padding & Radius) -->
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'swarna-pushpa') }}" class="block w-full h-full relative overflow-hidden">
                                <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Swarna Pushpa Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                                <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Swarna Pushpa (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'swarna-pushpa') }}">Swarna Pushpa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Marygold)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(277)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Swarna Pushpa" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Chandan Saanjh -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <!-- Image Box (Matching Categories Inner Padding & Radius) -->
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'chandan-saanjh') }}" class="block w-full h-full relative overflow-hidden">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Chandan Saanjh Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                                <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Chandan Saanjh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'chandan-saanjh') }}">Chandan Saanjh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(218)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Chandan Saanjh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Royal Oudh -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <!-- Image Box (Matching Categories Inner Padding & Radius) -->
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'royal-oudh') }}" class="block w-full h-full relative overflow-hidden">
                                <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Royal Oudh Incense" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                                <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Royal Oudh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'royal-oudh') }}">Royal Oudh <span class="text-xs font-normal text-gray-500 ml-0.5">(रॉयल ऊद)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(234)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Royal Oudh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Google Dhoop Havan Cup -->
                <div class="product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <!-- Top Pill Badge -->
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>TOP PICKS</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <!-- Image Box (Matching Categories Inner Padding & Radius) -->
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'google-dhoop') }}" class="block w-full h-full relative overflow-hidden">
                                <img src="{{ asset('assets/images/havan-cup.jpg') }}" alt="Google Dhoop Havan Cup" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                                <img src="{{ asset('assets/images/single-havan-cup.jpg') }}" alt="Google Dhoop (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">BOX OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#965A15] block my-0.5">12</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">CUPS</span>
                            </div>
                        </div>
                    </div>
                    <!-- Content -->
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'google-dhoop') }}">Google Dhoop <span class="text-xs font-normal text-gray-500 ml-0.5">Havan Cup</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(210)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹450</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹349.00</span>
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
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'divya-naagchampa') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Divya Naagchampa Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Divya Naagchampa (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'divya-naagchampa') }}">Divya Naagchampa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(नागचंपा)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(219)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Divya Naagchampa" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 6: Mogra Noor (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'mogra-noor') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Mogra Noor Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Mogra Noor (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'mogra-noor') }}">Mogra Noor <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(मोगरा)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(194)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Mogra Noor" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 7: Gulab Rooh (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'gulab-rooh') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Gulab Rooh Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Gulab Rooh (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'gulab-rooh') }}">Gulab Rooh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(गुलाब)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(212)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                            </div>
                            <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Gulab Rooh" data-product-price="399.00">
                                <span>Add to cart</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Card 8: Lavender Veda (Sticks) -->
                <div class="bestseller-extra-card hidden product-card w-[260px] sm:w-auto shrink-0 sm:shrink snap-start group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                        <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                            <span class="text-[#D38928] text-xs">✨</span>
                            <span>BUY 2 GET 1 FREE</span>
                            <span class="text-[#D38928] text-xs">✨</span>
                        </span>
                    </div>
                    <div class="p-2.5 sm:p-3.5 pb-0">
                        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                            <a href="{{ route('products.show', 'lavender-veda') }}" class="block w-full h-full">
                                <img src="{{ asset('assets/images/incense-pack.jpg') }}" alt="Lavender Veda Bambooless" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"><img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Lavender Veda (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                            </a>
                            <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                                <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                                <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                        <div class="space-y-1">
                            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                                <a href="{{ route('products.show', 'lavender-veda') }}">Lavender Veda <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(लैवेंडर)</span></a>
                            </h3>
                            <div class="flex items-center space-x-1.5 text-[#D38928]">
                                <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                                <span class="text-xs text-gray-500 font-medium">(178)</span>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
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
                extraCards.forEach((card, index) => {
                    card.classList.remove('hidden');
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(24px)';
                    card.style.transition = 'opacity 0.6s cubic-bezier(0.16, 1, 0.3, 1), transform 0.6s cubic-bezier(0.16, 1, 0.3, 1)';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 90 + 30);
                });

                loadMoreBtn.style.transition = 'opacity 0.2s ease-out';
                loadMoreBtn.style.opacity = '0';
                setTimeout(() => {
                    loadMoreBtn.style.display = 'none';
                    viewAllBtn.style.display = 'inline-flex';
                    viewAllBtn.style.opacity = '0';
                    viewAllBtn.style.transform = 'scale(0.95)';
                    viewAllBtn.style.transition = 'opacity 0.4s ease-out, transform 0.4s ease-out';
                    setTimeout(() => {
                        viewAllBtn.style.opacity = '1';
                        viewAllBtn.style.transform = 'scale(1)';
                    }, 40);
                }, 200);
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

<!-- ========================================================================= -->
<!-- 3. PRODUCTS CATEGORY (Clean Large Single-Item Circles on Pure White)      -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-white border-b border-[#EAE3D9] font-body select-none">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-16 space-y-2">
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

        <!-- 4 Big Single-Product Category Circles (Spanning full container width) -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 w-full">
            
            <!-- Category 1: Single Bamboo-less Dhoop Stick -->
            <div class="group flex flex-col items-center text-center space-y-3 sm:space-y-4">
                <a href="{{ route('collections.show', 'bambooless') }}" class="block relative w-full max-w-[200px] sm:max-w-[250px] lg:max-w-[280px] aspect-square rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
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
            <div class="group flex flex-col items-center text-center space-y-3 sm:space-y-4">
                <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block relative w-full max-w-[200px] sm:max-w-[250px] lg:max-w-[280px] aspect-square rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
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
            <div class="group flex flex-col items-center text-center space-y-3 sm:space-y-4">
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block relative w-full max-w-[200px] sm:max-w-[250px] lg:max-w-[280px] aspect-square rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
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
            <div class="group flex flex-col items-center text-center space-y-3 sm:space-y-4">
                <a href="{{ route('products.pitambara') }}" class="block relative w-full max-w-[200px] sm:max-w-[250px] lg:max-w-[280px] aspect-square rounded-full p-2 bg-white shadow-md hover:shadow-2xl group-hover:scale-105 transition-all duration-500 cursor-pointer">
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
<!-- 4. STANDALONE PROMO BANNER: BUY 5 TRIAL PACKS @ 799 (Full Width Edge-to-Edge) -->
<!-- ========================================================================= -->
<section class="w-full bg-white overflow-hidden select-none">
    <a href="{{ route('bundles.trial-packs') }}" class="block w-full group focus:outline-none">
        <picture class="block w-full">
            <source media="(max-width: 640px)" srcset="{{ asset('assets/images/trial-pack-mobile.jpg') }}">
            <img 
                src="{{ asset('assets/images/trial-pack-desktop.jpg') }}" 
                alt="Festive Collection - 5 Divine Essentials at just ₹799 - Mangalam" 
                class="w-full h-auto block object-cover group-hover:opacity-95 transition-opacity duration-300"
                loading="lazy"
            >
        </picture>
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
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
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
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                        <span class="text-[#D38928] text-xs">✨</span>
                        <span>MORNING SANDHYA</span>
                        <span class="text-[#D38928] text-xs">✨</span>
                    </span>
                </div>
                <div class="p-2.5 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                        <a href="{{ route('products.show', 'swarna-pushpa') }}" class="block w-full h-full relative overflow-hidden">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Swarna Pushpa Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                            <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Swarna Pushpa Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#8B2626] block my-0.5">100</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                        </div>
                    </div>
                </div>
                <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'swarna-pushpa') }}">Swarna Pushpa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Refill 100)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928]">
                            <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(277)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                            <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹999</span>
                            <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹499.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Swarna Pushpa Refill Pack" data-product-price="499.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2: Divya Naagchampa Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                        <span class="text-[#D38928] text-xs">✨</span>
                        <span>TEMPLE AARTI</span>
                        <span class="text-[#D38928] text-xs">✨</span>
                    </span>
                </div>
                <div class="p-2.5 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                        <a href="{{ route('products.show', 'divya-naagchampa') }}" class="block w-full h-full relative overflow-hidden">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Divya Naagchampa Refill Pack" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                            <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Divya Naagchampa Refill Pack (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                        </div>
                    </div>
                </div>
                <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'divya-naagchampa') }}">Divya Naagchampa <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Refill)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928]">
                            <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(219)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                            <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹999</span>
                            <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹499.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Divya Naagchampa Refill Pack" data-product-price="499.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3: Royal Oudh Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                        <span class="text-[#D38928] text-xs">✨</span>
                        <span>EVENING DHYAN</span>
                        <span class="text-[#D38928] text-xs">✨</span>
                    </span>
                </div>
                <div class="p-2.5 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                        <a href="{{ route('products.show', 'royal-oudh') }}" class="block w-full h-full relative overflow-hidden">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Royal Oudh Bambooless Sticks" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                            <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Royal Oudh Bambooless Sticks (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#7A3A22] block my-0.5">40</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                        </div>
                    </div>
                </div>
                <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'royal-oudh') }}">Royal Oudh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(Sticks)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928]">
                            <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(184)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                            <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                            <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
                        </div>
                        <button type="button" class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer" data-product-title="Royal Oudh Bambooless Sticks" data-product-price="399.00">
                            <span>Add to cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4: Chandan Saanjh Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-flex items-center space-x-1 bg-white px-3 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading">
                        <span class="text-[#D38928] text-xs">✨</span>
                        <span>DAILY HAVAN</span>
                        <span class="text-[#D38928] text-xs">✨</span>
                    </span>
                </div>
                <div class="p-2.5 sm:p-3.5 pb-0">
                    <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
                        <a href="{{ route('products.show', 'chandan-saanjh') }}" class="block w-full h-full relative overflow-hidden">
                            <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Chandan Saanjh Sticks" class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105">
                            <img src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" alt="Chandan Saanjh Sticks (Detail)" class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out" loading="lazy">
                        </a>
                        <div class="absolute top-2.5 right-2.5 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">PACK OF</span>
                            <span class="text-xl sm:text-2xl font-black font-heading text-[#3E2D22] block my-0.5">40</span>
                            <span class="text-[9px] sm:text-[10px] uppercase font-semibold text-gray-500 block tracking-wider">STICKS</span>
                        </div>
                    </div>
                </div>
                <div class="p-3.5 sm:p-5 pt-3 sm:pt-4 flex flex-col justify-between flex-grow space-y-2.5 sm:space-y-3.5">
                    <div class="space-y-1">
                        <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                            <a href="{{ route('products.show', 'chandan-saanjh') }}">Chandan Saanjh <span class="text-xs font-normal uppercase text-gray-500 ml-0.5">(चंदन)</span></a>
                        </h3>
                        <div class="flex items-center space-x-1.5 text-[#D38928]">
                            <div class="flex text-sm sm:text-base leading-none"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div>
                            <span class="text-xs text-gray-500 font-medium">(162)</span>
                        </div>
                    </div>
                    <div>
                        <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                            <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">₹499</span>
                            <span class="text-sm sm:text-base font-bold text-[#C87A1E]">₹399.00</span>
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
<!-- 5. DEVOTEE TESTIMONIALS (2-Row Continuous Smooth Marquee Ticker)         -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-20 bg-white border-b border-[#EAE3D9] overflow-hidden select-none" id="testimonials-marquee-section">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto space-y-2 mb-8 sm:mb-12">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ 50,000+ BLESSED HOMES ✦</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight leading-tight">
                Devotee Experiences
            </h2>
            <p class="text-sm sm:text-base text-gray-600">
                Verified reviews from families, yoga practitioners &amp; temple priests across sacred India.
            </p>
        </div>

        <!-- 2 Continuous Scrolling Rows with Left & Right Gradient Fade Overlays -->
        <div class="relative w-full space-y-4 sm:space-y-6 overflow-hidden marquee-track-pause">
            
            <!-- Left & Right Edge Fade Gradients -->
            <div class="absolute top-0 bottom-0 left-0 w-12 sm:w-28 z-20 pointer-events-none bg-gradient-to-r from-white via-white/90 to-transparent"></div>
            <div class="absolute top-0 bottom-0 right-0 w-12 sm:w-28 z-20 pointer-events-none bg-gradient-to-l from-white via-white/90 to-transparent"></div>
        
            <!-- ========================================== -->
            <!-- ROW 1: RIGHT TO LEFT (Continuous Scroll)   -->
            <!-- ========================================== -->
            <div class="flex overflow-hidden">
                <div class="animate-marquee-left flex space-x-4 sm:space-x-6 py-2">
                
                @php
                    $row1Testimonials = [
                        [
                            'name' => 'Pooja Sharma',
                            'city' => 'Mandi, Himachal Pradesh',
                            'initials' => 'PS',
                            'avatar_bg' => 'bg-[#D38928]',
                            'product' => 'Chandan Saanjh',
                            'quote' => 'Mandi me itni authentic bambooless agarbatti pehli baar try ki. Mandir me subah aarti ke baad shaam tak natural sandalwood aur camphor ki gentle fragrance rehti hai. Pure natural!'
                        ],
                        [
                            'name' => 'अनिल डोगरा',
                            'city' => 'कांगड़ा, हिमाचल प्रदेश',
                            'initials' => 'AD',
                            'avatar_bg' => 'bg-[#831F2E]',
                            'product' => 'Swarna Pushpa',
                            'quote' => 'कांगड़ा में हमारे घर में रोजाना पूजा होती है। बिल्कुल शुद्ध धुआं है और आंखों में कोई जलन नहीं होती। शास्त्रों के अनुसार बिना बांस वाली अगरबत्ती से बहुत ही पवित्र अनुभव मिलता है।'
                        ],
                        [
                            'name' => 'Sunil Thakur',
                            'city' => 'Chamba, Himachal Pradesh',
                            'initials' => 'ST',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'product' => 'Devi Bambooless Pack',
                            'quote' => 'Ordered the 100 sticks refill cylinder from Chamba. Exceptional quality and true chemical-free formulation. The complimentary handcrafted ceramic stand is very beautiful.'
                        ],
                        [
                            'name' => 'Meenakshi Verma',
                            'city' => 'Bilaspur, Himachal Pradesh',
                            'initials' => 'MV',
                            'avatar_bg' => 'bg-[#D38928]',
                            'product' => 'Mogra Noor & Oudh',
                            'quote' => 'Bilaspur me delivery 3 din me aa gayi. Packaging aur fragrance dono top notch hain. Bhimseni camphor aur mogra ke notes bilkul original aur calming hain.'
                        ],
                        [
                            'name' => 'राजेश धीमान',
                            'city' => 'हमीरपुर, हिमाचल प्रदेश',
                            'initials' => 'RD',
                            'avatar_bg' => 'bg-[#831F2E]',
                            'product' => 'Bambooless Incense',
                            'quote' => 'हमीरपुर से मंगवाया था। पहले बाजार वाली धूप से कमरे में भारीपन और सिरदर्द होता था, लेकिन इसमें सिर्फ शुद्ध जड़ी-बूटियों की महक है। बहुत ही शांत वातावरण बनता है।'
                        ],
                        [
                            'name' => 'Dr. Shalini Katoch',
                            'city' => 'Kangra, Himachal Pradesh',
                            'initials' => 'SK',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'product' => 'Pitambara Havan Cups',
                            'quote' => 'Being from Kangra, I always prefer clean, organic products for home prayer. Mangalam bambooless sticks emit gentle white smoke that keeps our living room fragrant and tranquil.'
                        ]
                    ];
                @endphp

                <!-- First Pass -->
                @foreach($row1Testimonials as $t)
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[400px] bg-white rounded-[18px] p-5 sm:p-6 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center space-x-1.5 text-[#D38928] text-xl sm:text-2xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-relaxed font-normal pt-0.5">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-[#EAE3D9] mt-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-xs font-heading shrink-0">
                                    {{ $t['initials'] }}
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading leading-tight">{{ $t['name'] }}</h4>
                                    <p class="text-[11px] text-gray-500">{{ $t['city'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Second Duplicate Pass for Infinite Seamless Marquee -->
                @foreach($row1Testimonials as $t)
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[400px] bg-white rounded-[18px] p-5 sm:p-6 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between" aria-hidden="true">
                        <div class="space-y-3">
                            <div class="flex items-center space-x-1.5 text-[#D38928] text-xl sm:text-2xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-relaxed font-normal pt-0.5">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-[#EAE3D9] mt-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-xs font-heading shrink-0">
                                    {{ $t['initials'] }}
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading leading-tight">{{ $t['name'] }}</h4>
                                    <p class="text-[11px] text-gray-500">{{ $t['city'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- ========================================== -->
        <!-- ROW 2: LEFT TO RIGHT (Continuous Scroll)   -->
        <!-- ========================================== -->
        <div class="flex overflow-hidden">
            <div class="animate-marquee-right flex space-x-4 sm:space-x-6 py-2">
                
                @php
                    $row2Testimonials = [
                        [
                            'name' => 'दीपक शर्मा',
                            'city' => 'मंडी, हिमाचल प्रदेश',
                            'initials' => 'DS',
                            'avatar_bg' => 'bg-[#831F2E]',
                            'quote' => 'मंडी के हमारे मंदिर में सुबह-शाम यही अगरबत्ती जलती है। घर का वातावरण एकदम शांत और सकारात्मक हो जाता है। बिना बांस के शुद्ध वैदिक खुशबू।'
                        ],
                        [
                            'name' => 'Pankaj Rana',
                            'city' => 'Chamba, Himachal Pradesh',
                            'initials' => 'PR',
                            'avatar_bg' => 'bg-[#D38928]',
                            'quote' => 'Chamba me thand ke time room me band space me bhi bina kisi suffocation ke itni pyari temple fragrance aati hai. Truly 100% natural and long burning.'
                        ],
                        [
                            'name' => 'Kavita Sen',
                            'city' => 'Bilaspur, Himachal Pradesh',
                            'initials' => 'KS',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'quote' => 'Bought the 5-pack festive bundle in Bilaspur. Every fragrance is distinct and long-lasting. Divine quality for daily morning prayers and meditation.'
                        ],
                        [
                            'name' => 'Vikas Jaswal',
                            'city' => 'Hamirpur, Himachal Pradesh',
                            'initials' => 'VJ',
                            'avatar_bg' => 'bg-[#831F2E]',
                            'quote' => 'Hamirpur me daily Sandhya aarti ke liye best incense mila hai. Charcoal-free hone ki wajah se pure white ash banti hai jo mandir ko clean rakhti hai.'
                        ],
                        [
                            'name' => 'रोहन गुलेरिया',
                            'city' => 'कांगड़ा, हिमाचल प्रदेश',
                            'initials' => 'RG',
                            'avatar_bg' => 'bg-[#D38928]',
                            'quote' => 'कांगड़ा धाम के पास रहने के कारण शुद्धता हमारे लिए बहुत जरूरी है। इस अगरबत्ती में प्राकृतिक फूल और चंदन का अर्क है जो मन को तुरंत शांति देता है।'
                        ],
                        [
                            'name' => 'Suman Lata',
                            'city' => 'Mandi, Himachal Pradesh',
                            'initials' => 'SL',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'quote' => 'Mandi se order kiya tha. Trial pack use karne ke baad 100 sticks ka pack re-order kiya. Jo bhi ghar aata hai sabhi puchte hain kaunsi divine agarbatti hai.'
                        ]
                    ];
                @endphp

                <!-- First Pass -->
                @foreach($row2Testimonials as $t)
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[400px] bg-white rounded-[18px] p-5 sm:p-6 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-3">
                            <div class="flex items-center space-x-1.5 text-[#D38928] text-xl sm:text-2xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-relaxed font-normal pt-0.5">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-[#EAE3D9] mt-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-xs font-heading shrink-0">
                                    {{ $t['initials'] }}
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading leading-tight">{{ $t['name'] }}</h4>
                                    <p class="text-[11px] text-gray-500">{{ $t['city'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Second Duplicate Pass for Infinite Seamless Marquee -->
                @foreach($row2Testimonials as $t)
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[400px] bg-white rounded-[18px] p-5 sm:p-6 border border-[#EADBCC] shadow-xs hover:shadow-xl hover:border-[#D38928] transition-all duration-300 flex flex-col justify-between" aria-hidden="true">
                        <div class="space-y-3">
                            <div class="flex items-center space-x-1.5 text-[#D38928] text-xl sm:text-2xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-relaxed font-normal pt-0.5">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-[#EAE3D9] mt-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs sm:text-sm shadow-xs font-heading shrink-0">
                                    {{ $t['initials'] }}
                                </div>
                                <div>
                                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading leading-tight">{{ $t['name'] }}</h4>
                                    <p class="text-[11px] text-gray-500">{{ $t['city'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
    </div>
</section>

<!-- ========================================================================= -->
<!-- 6. ROOTED IN PURITY (Clean & Minimalist 3-Card Layout with BG Illustrations)-->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EAE3D9] select-none font-body relative overflow-hidden">
    
    <!-- Background Botanical Line Illustrations (Left & Right) -->
    <div class="absolute -left-10 top-1/2 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 pointer-events-none opacity-[0.08] text-[#121212]">
        <svg viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full">
            <path d="M20 180C60 140 100 80 180 20"/>
            <path d="M70 130C60 115 65 95 80 90C90 105 85 125 70 130Z"/>
            <path d="M100 100C90 85 95 65 110 60C120 75 115 95 100 100Z"/>
            <path d="M130 70C120 55 125 35 140 30C150 45 145 65 130 70Z"/>
            <path d="M110 115C125 120 135 135 130 150C115 145 105 130 110 115Z"/>
            <path d="M140 85C155 90 165 105 160 120C145 115 135 100 140 85Z"/>
        </svg>
    </div>
    
    <div class="absolute -right-10 top-1/2 -translate-y-1/2 w-64 h-64 sm:w-80 sm:h-80 pointer-events-none opacity-[0.08] text-[#121212] rotate-180">
        <svg viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-full h-full">
            <path d="M20 180C60 140 100 80 180 20"/>
            <path d="M70 130C60 115 65 95 80 90C90 105 85 125 70 130Z"/>
            <path d="M100 100C90 85 95 65 110 60C120 75 115 95 100 100Z"/>
            <path d="M130 70C120 55 125 35 140 30C150 45 145 65 130 70Z"/>
            <path d="M110 115C125 120 135 135 130 150C115 145 105 130 110 115Z"/>
            <path d="M140 85C155 90 165 105 160 120C145 115 135 100 140 85Z"/>
        </svg>
    </div>

    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] relative z-10">
        
        <!-- Clean Title Exactly Like Reference -->
        <div class="text-center max-w-xl mx-auto mb-10 sm:mb-14">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-normal text-[#121212] font-heading tracking-tight">
                Rooted in Purity
            </h2>
        </div>

        <!-- 3 Rectangular Cards Exactly Like Reference -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 max-w-4xl mx-auto">
            
            <!-- Card 1: Ancient Recipes -->
            <div class="bg-[#FAF4EB] rounded-[8px] sm:rounded-[12px] py-12 px-6 sm:py-16 sm:px-8 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-sm">
                <!-- Circular Line-Art Icon -->
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#121212] flex items-center justify-center text-[#121212]">
                    <svg class="w-13 h-13 sm:w-14 sm:h-14" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <!-- Mortar Bowl -->
                        <path d="M16 34h32c0 10-7.2 18-16 18s-16-8-16-18Z"/>
                        <path d="M24 52h16"/>
                        <!-- Pestle Grinder Stick -->
                        <path d="M38 18l7-6a1.5 1.5 0 0 1 2.1.2l1.1 1.1a1.5 1.5 0 0 1-.2 2.1L38 34"/>
                        <!-- Floating Herbal Leaves -->
                        <path d="M22 22c0-3.5 3.5-5.5 6-5.5s1 3.5 0 5.5-6 0-6 0Z"/>
                        <circle cx="28" cy="27" r="1.5" fill="currentColor"/>
                        <circle cx="23" cy="29" r="1" fill="currentColor"/>
                    </svg>
                </div>
                <!-- Clean Label -->
                <h3 class="text-sm sm:text-base font-serif font-normal text-[#121212] mt-8 tracking-wide">
                    Ancient Recipes
                </h3>
            </div>

            <!-- Card 2: Purest Ingredients -->
            <div class="bg-[#FAF4EB] rounded-[8px] sm:rounded-[12px] py-12 px-6 sm:py-16 sm:px-8 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-sm">
                <!-- Circular Line-Art Icon -->
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#121212] flex items-center justify-center text-[#121212]">
                    <svg class="w-13 h-13 sm:w-14 sm:h-14" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <!-- 3 Sacred Botanical Leaves -->
                        <path d="M32 14c-3.5 4.5-3.5 10.5 0 14 3.5-3.5 3.5-9.5 0-14Z"/>
                        <path d="M23 20c-4.5 1-6.5 5.5-4 10 3.5-1 6.5-4.5 4-10Z"/>
                        <path d="M41 20c4.5 1 6.5 5.5 4 10-3.5-1-6.5-4.5-4-10Z"/>
                        <!-- Cupped Hand Underneath -->
                        <path d="M17 38c5-1.5 11 1 14 4.5l2.5-1.5c2.5-1.5 5-1.5 7.5 1l5 6"/>
                        <path d="M15 38c-2.5 2.5-3 6-.5 8.5l6.5 6.5h17l7.5-8.5"/>
                    </svg>
                </div>
                <!-- Clean Label -->
                <h3 class="text-sm sm:text-base font-serif font-normal text-[#121212] mt-8 tracking-wide">
                    Purest Ingredients
                </h3>
            </div>

            <!-- Card 3: Eco-conscious -->
            <div class="bg-[#FAF4EB] rounded-[8px] sm:rounded-[12px] py-12 px-6 sm:py-16 sm:px-8 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-sm">
                <!-- Circular Line-Art Icon -->
                <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full border-2 border-[#121212] flex items-center justify-center text-[#121212]">
                    <svg class="w-13 h-13 sm:w-14 sm:h-14" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <!-- Open Box -->
                        <path d="M19 35l13 6 13-6"/>
                        <path d="M32 41v13"/>
                        <path d="M17 33l15-7 15 7v13l-15 7-15-7V33Z"/>
                        <path d="M14 29l8-5"/>
                        <path d="M50 29l-8-5"/>
                        <!-- Recycle Leaf / Leaves Circle Above Box -->
                        <circle cx="32" cy="19" r="6"/>
                        <path d="M30 16l3 3-3 3"/>
                    </svg>
                </div>
                <!-- Clean Label -->
                <h3 class="text-sm sm:text-base font-serif font-normal text-[#121212] mt-8 tracking-wide">
                    Eco-conscious
                </h3>
            </div>

        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 7. FREQUENTLY ASKED QUESTIONS (Luxury Modern Accordions)                  -->
<!-- ========================================================================= -->
<section class="py-16 sm:py-24 bg-white border-b border-[#EADBCC] select-none">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        <div class="max-w-4xl mx-auto space-y-10">
        
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
<!-- 8. CERTIFIED TRUST & PURITY RECOGNITION (Centered Big Logos & Headings)   -->
<!-- ========================================================================= -->
<section class="py-14 sm:py-18 bg-white border-b border-[#EAE3D9] select-none">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center mb-8 sm:mb-10">
            <span class="text-[11px] sm:text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CERTIFIED VEDIC STANDARDS ✦</span>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            
            <!-- Make in India -->
            <div class="bg-white rounded-[16px] border border-[#EAE3D9] p-5 sm:p-7 flex flex-col items-center justify-center text-center shadow-xs hover:border-[#D38928]/50 hover:shadow-md transition-all duration-300 group">
                <div class="w-full h-16 sm:h-20 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/images/trust/make-in-india.png') }}" alt="Make in India" class="max-h-full max-w-[130px] sm:max-w-[160px] object-contain">
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading mt-3 sm:mt-4 leading-tight">Make in India</h4>
            </div>

            <!-- MSME Certified -->
            <div class="bg-white rounded-[16px] border border-[#EAE3D9] p-5 sm:p-7 flex flex-col items-center justify-center text-center shadow-xs hover:border-[#D38928]/50 hover:shadow-md transition-all duration-300 group">
                <div class="w-full h-16 sm:h-20 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/images/trust/msme.png') }}" alt="MSME Ministry Govt of India" class="max-h-full max-w-[130px] sm:max-w-[160px] object-contain">
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading mt-3 sm:mt-4 leading-tight">MSME Certified</h4>
            </div>

            <!-- Razorpay Secure -->
            <div class="bg-white rounded-[16px] border border-[#EAE3D9] p-5 sm:p-7 flex flex-col items-center justify-center text-center shadow-xs hover:border-[#D38928]/50 hover:shadow-md transition-all duration-300 group">
                <div class="w-full h-16 sm:h-20 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/images/trust/razorpay.png') }}" alt="Razorpay Secure Payments" class="max-h-full max-w-[130px] sm:max-w-[160px] object-contain">
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading mt-3 sm:mt-4 leading-tight">Razorpay Secure</h4>
            </div>

            <!-- Amazon / Trusted Delivery -->
            <div class="bg-white rounded-[16px] border border-[#EAE3D9] p-5 sm:p-7 flex flex-col items-center justify-center text-center shadow-xs hover:border-[#D38928]/50 hover:shadow-md transition-all duration-300 group">
                <div class="w-full h-16 sm:h-20 flex items-center justify-center transition-transform duration-300 group-hover:scale-105">
                    <img src="{{ asset('assets/images/trust/amazon.png') }}" alt="Available on Amazon" class="max-h-full max-w-[130px] sm:max-w-[160px] object-contain">
                </div>
                <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading mt-3 sm:mt-4 leading-tight">Amazon Trusted</h4>
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
