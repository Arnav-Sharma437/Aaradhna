@extends('layouts.app')

@section('title', 'ISHANAA™ — 100% Pure Incense Sticks & Vedic Pooja Samagri')
@section('meta_description', 'Shri Ram Uphaar, Pure Incense Sticks, Havan Cups, Dhoop Cones, and Natural Attar Sprays crafted as per Vedic Vidhi.')

@section('content')

<!-- ========================================================================= -->
<!-- 1. FULL-WIDTH CLEAN LUXURY HERO BANNER                                     -->
<!-- ========================================================================= -->
<section class="relative w-full bg-white overflow-hidden select-none font-body" id="hero-banner-carousel">
    
    <!-- Full-Width Glass Announcement Bar Attached to Top of Hero Banner -->
    <div class="absolute top-0 inset-x-0 w-full z-25 pointer-events-auto">
        <x-announcement-bar />
    </div>

    <!-- Slides Wrapper (Responsive Hero Banner Wrapper for 100%, 110%, 125%, 150% Zoom & Mac) -->
    <div class="hero-banner-wrapper relative w-full overflow-hidden bg-white">
        
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
            <!-- SLIDE 1: SACRED INCENSE STICKS COLLECTION -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-100 pointer-events-auto z-10 flex items-center justify-center bg-white" data-slide="0">
                <a href="{{ route('collections.show', 'bambooless') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Incense Sticks Collection">
                    <picture class="w-full h-full block">
                        <source media="(max-width: 768px)" srcset="{{ asset('assets/images/hero-sacred-mobile.jpg') }}">
                        <img 
                            src="{{ asset('assets/images/hero-sacred.jpg') }}" 
                            alt="ISHANAA Sacred Incense Sticks Collection" 
                            class="w-full h-full object-cover object-center"
                        >
                    </picture>
                </a>
            </div>

            <!-- SLIDE 2: SACRED HAVAN CUPS COLLECTION (RESPONSIVE DESKTOP & MOBILE BANNER) -->
            <div class="hero-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none z-0 flex items-center justify-center bg-white" data-slide="1">
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block w-full h-full relative cursor-pointer" aria-label="Explore Sacred Havan Cups Collection">
                    <picture class="w-full h-full block">
                        <source media="(max-width: 768px)" srcset="{{ asset('assets/images/hero-sacred-hawan-cups-mobile.jpg') }}">
                        <img 
                            src="{{ asset('assets/images/hero-sacred-hawan-cups.jpg') }}" 
                            alt="ISHANAA Sacred Havan Cups Collection" 
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
                            alt="ISHANAA Sacred Dhoop Cones Collection" 
                            class="w-full h-full object-cover object-center"
                        >
                    </picture>
                </a>
            </div>
        @endif

    </div>

    <!-- Carousel Pagination Indicators (Rounded Dots, Below Banner on both Mobile & Desktop) -->
    @php
        $slideCount = (isset($banners) && $banners->isNotEmpty()) ? $banners->count() : 3;
    @endphp
    <div class="flex py-3 sm:py-3.5 bg-white justify-center items-center space-x-2 sm:space-x-2.5 relative z-20" id="hero-slider-dots">
        @for($i = 0; $i < $slideCount; $i++)
            <button type="button" class="{{ $i === 0 ? 'w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-[#C18129]' : 'w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-[#C18129]/30 hover:bg-[#C18129]/60' }} transition-all duration-300 cursor-pointer" data-index="{{ $i }}" aria-label="Slide {{ $i + 1 }}"></button>
        @endfor
    </div>

</section>



<!-- ========================================================================= -->
<!-- 2. BESTSELLER OF THE MONTH (All 8 Products in Mobile Slider & Desktop Grid) -->
<!-- ========================================================================= -->
<section class="py-[40px] bg-white overflow-hidden">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-5 sm:mb-6 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">✦ PURE VEDIC BLESSINGS ✦</span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-normal capitalize text-[#121212] font-heading tracking-[0.06em] leading-tight whitespace-nowrap">
                Bestseller of the Month
            </h2>
        </div>

        <!-- Bestseller Section Container with Mobile Slider Arrows -->
        <div class="relative">
            <!-- Left / Right Mobile Navigation Buttons (Rounded) -->
            <button 
                type="button" 
                id="bestseller-prev-btn" 
                class="sm:hidden absolute -left-2 top-[38%] -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-white border border-[#EADBCC] text-[#965A15] flex items-center justify-center active:scale-95 transition-all shadow-xs cursor-pointer"
                aria-label="Previous Slide"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button 
                type="button" 
                id="bestseller-next-btn" 
                class="sm:hidden absolute -right-2 top-[38%] -translate-y-1/2 z-30 w-8 h-8 rounded-full bg-white border border-[#EADBCC] text-[#965A15] flex items-center justify-center active:scale-95 transition-all shadow-xs cursor-pointer"
                aria-label="Next Slide"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Dynamic Bestseller Grid (Mobile Swipeable Slider + Desktop Grid) -->
            <div id="bestseller-grid" class="flex sm:grid overflow-x-auto sm:overflow-visible scrollbar-none snap-x snap-mandatory sm:grid-cols-2 lg:grid-cols-4 gap-[10px] pt-4 sm:pt-5 pb-4 sm:pb-0 -mx-5 px-5 sm:mx-0 sm:px-0 scroll-smooth">
                @forelse($bestsellers as $product)
                    <x-product-card 
                        :product="$product" 
                        class="w-[260px] sm:w-auto shrink-0 sm:shrink snap-start {{ $loop->index >= 4 ? 'bestseller-extra-card sm:hidden' : '' }}" 
                    />
                @empty
                    <div class="w-full col-span-full py-12 text-center">
                        <div class="w-14 h-14 mx-auto mb-3 rounded-full bg-[#FAF3EA] flex items-center justify-center text-[#965A15]">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                        <h3 class="text-base font-bold text-gray-800 font-heading">New Products Coming Soon</h3>
                        <p class="text-xs text-gray-500 mt-1">Our sacred fragrances are being carefully prepared with Vedic devotion.</p>
                    </div>
                @endforelse
            </div>
        </div>

        @if($bestsellers->count() > 4)
            <!-- Dynamic Action: Simple Load More Text -> Changes to View All Products Button (Only Desktop) -->
            <div class="mt-8 sm:mt-10 text-center hidden sm:block">
                <!-- 1. Simple Load More Text Action -->
                <button 
                    type="button" 
                    id="bestseller-load-more-btn"
                    class="inline-flex items-center space-x-1.5 text-xs sm:text-sm font-bold text-[#D38928] hover:text-[#965A15] border-b-2 border-[#D38928] hover:border-[#965A15] pb-0.5 tracking-wider transition-all duration-200 cursor-pointer font-heading capitalize group"
                >
                    <span>Load More</span>
                    <svg class="w-3.5 h-3.5 group-hover:translate-y-0.5 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>

                <!-- 2. Themed 'View All Products' Button (Appears after Load More is clicked) -->
                <div id="bestseller-view-all-wrapper" style="display: none;">
                    <a 
                        href="{{ route('collections.show', 'all') }}" 
                        id="bestseller-view-all-btn"
                        class="inline-flex items-center space-x-2 px-8 py-3.5 bg-[#A86911] hover:bg-[#8D540A] active:bg-[#744406] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[8px] sm:rounded-[10px] shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 font-heading cursor-pointer"
                        aria-label="View All Products"
                    >
                        <span>View All Products</span>
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
        @elseif($bestsellers->count() > 0)
            <div class="mt-8 sm:mt-10 text-center hidden sm:block">
                <a 
                    href="{{ route('collections.show', 'all') }}" 
                    class="inline-flex items-center space-x-2 px-8 py-3.5 bg-[#A86911] hover:bg-[#8D540A] active:bg-[#744406] text-white text-xs sm:text-sm font-bold uppercase tracking-widest rounded-[8px] sm:rounded-[10px] shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 font-heading cursor-pointer"
                    aria-label="View All Products"
                >
                    <span>View All Products</span>
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        @endif

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const loadMoreBtn = document.getElementById('bestseller-load-more-btn');
        const viewAllWrapper = document.getElementById('bestseller-view-all-wrapper');
        const extraCards = document.querySelectorAll('.bestseller-extra-card');
        const bestsellerGrid = document.getElementById('bestseller-grid');
        const prevBtn = document.getElementById('bestseller-prev-btn');
        const nextBtn = document.getElementById('bestseller-next-btn');

        if (loadMoreBtn && viewAllWrapper) {
            loadMoreBtn.addEventListener('click', () => {
                extraCards.forEach((card, index) => {
                    card.classList.remove('sm:hidden');
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
                    viewAllWrapper.style.display = 'block';
                    viewAllWrapper.style.opacity = '0';
                    viewAllWrapper.style.transform = 'scale(0.95)';
                    viewAllWrapper.style.transition = 'opacity 0.4s ease-out, transform 0.4s ease-out';
                    setTimeout(() => {
                        viewAllWrapper.style.opacity = '1';
                        viewAllWrapper.style.transform = 'scale(1)';
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

        // Product Categories Mobile Scroll Indicator
        const catSlider = document.getElementById('category-slider');
        const catScrollBar = document.getElementById('category-scroll-bar');
        if (catSlider && catScrollBar) {
            catSlider.addEventListener('scroll', () => {
                const maxScroll = catSlider.scrollWidth - catSlider.clientWidth;
                if (maxScroll > 0) {
                    const scrollPercent = catSlider.scrollLeft / maxScroll;
                    const maxTranslate = 112 - 40; // 28*4 (112px) - 10*4 (40px) = 72px
                    catScrollBar.style.transform = `translateX(${scrollPercent * maxTranslate}px)`;
                }
            }, { passive: true });
        }
    });
</script>

<!-- ========================================================================= -->
<!-- 3. PRODUCTS CATEGORY (Clean Large Single-Item Square Tiles on #f5ecda)   -->
<!-- ========================================================================= -->
<section class="py-10 sm:py-14 lg:py-16 bg-[#f5ecda] font-body select-none">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-6 sm:mb-10 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">
                ✦ 100% NATURAL • CHARCOAL FREE ✦
            </span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-normal capitalize text-[#121212] font-heading tracking-[0.06em] leading-tight whitespace-nowrap">
                Product Categories
            </h2>
        </div>

        <!-- 3 Big Single-Product Category Circles (Centered Grid & Balanced Spacing) -->
        <div id="category-slider" class="flex sm:grid overflow-x-auto sm:overflow-visible scrollbar-none snap-x snap-mandatory sm:grid-cols-3 justify-start sm:justify-center items-start gap-4 sm:gap-6 lg:gap-8 max-w-4xl mx-auto pb-3 sm:pb-0 -mx-4 px-4 sm:mx-auto sm:px-0 w-full">
            
            <!-- Category 1: Single Incense Sticks -->
            <div class="w-[165px] sm:w-auto shrink-0 snap-start group flex flex-col items-center text-center space-y-2.5 sm:space-y-3">
                <a href="{{ route('collections.show', 'bambooless') }}" class="block relative w-full max-w-[195px] sm:max-w-[230px] lg:max-w-[245px] aspect-square rounded-full p-2.5 sm:p-3 bg-white border border-[#EADBCC] hover:border-[#C18129] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1.5 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-bambooless-stick.jpg') }}" 
                            alt="Incense Sticks" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-0.5 max-w-xs flex flex-col items-center">
                    <h3 class="text-sm sm:text-base lg:text-[17px] font-normal capitalize tracking-wide text-[#121212] hover:text-[#C18129] transition-colors font-heading block">
                        <a href="{{ route('collections.show', 'bambooless') }}">Incense Sticks</a>
                    </h3>
                    <p class="text-[11px] sm:text-xs text-[#7A7A7A] font-medium leading-tight">
                        Pure Incense Sticks
                    </p>
                </div>
            </div>

            <!-- Category 2: Single Dhoop Cone -->
            <div class="w-[165px] sm:w-auto shrink-0 snap-start group flex flex-col items-center text-center space-y-2.5 sm:space-y-3">
                <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block relative w-full max-w-[195px] sm:max-w-[230px] lg:max-w-[245px] aspect-square rounded-full p-2.5 sm:p-3 bg-white border border-[#EADBCC] hover:border-[#C18129] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1.5 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-dhoop-cone.jpg') }}" 
                            alt="Easy to Use Dhoop Cone" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-0.5 max-w-xs flex flex-col items-center">
                    <h3 class="text-sm sm:text-base lg:text-[17px] font-normal capitalize tracking-wide text-[#121212] hover:text-[#C18129] transition-colors font-heading block">
                        <a href="{{ route('collections.show', 'dhoop-cones') }}">Dhoop Cones</a>
                    </h3>
                    <p class="text-[11px] sm:text-xs text-[#7A7A7A] font-medium leading-tight">
                        Easy to Use Dhoop Cone
                    </p>
                </div>
            </div>

            <!-- Category 3: Single 100% Organic Havan Cup -->
            <div class="w-[165px] sm:w-auto shrink-0 snap-start group flex flex-col items-center text-center space-y-2.5 sm:space-y-3">
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block relative w-full max-w-[195px] sm:max-w-[230px] lg:max-w-[245px] aspect-square rounded-full p-2.5 sm:p-3 bg-white border border-[#EADBCC] hover:border-[#C18129] group-hover:scale-105 transition-all duration-500 cursor-pointer">
                    <div class="w-full h-full rounded-full overflow-hidden bg-white p-1.5 sm:p-2 flex items-center justify-center relative">
                        <img 
                            src="{{ asset('assets/images/single-havan-cup.jpg') }}" 
                            alt="100% Organic Havan Cups" 
                            class="w-full h-full object-contain rounded-full scale-105 group-hover:scale-115 transition-transform duration-500"
                        >
                    </div>
                </a>

                <!-- Category Details -->
                <div class="space-y-0.5 max-w-xs flex flex-col items-center">
                    <h3 class="text-sm sm:text-base lg:text-[17px] font-normal capitalize tracking-wide text-[#121212] hover:text-[#C18129] transition-colors font-heading block">
                        <a href="{{ route('collections.show', 'havan-cups') }}">Havan Cup</a>
                    </h3>
                    <p class="text-[11px] sm:text-xs text-[#7A7A7A] font-medium leading-tight">
                        100% Organic Havan Cups
                    </p>
                </div>
            </div>

        </div>

        <!-- Mobile Scroll Indicator Line -->
        <div class="sm:hidden flex justify-center mt-5">
            <div class="w-28 h-1 bg-[#EADBCC] rounded-full overflow-hidden relative">
                <div id="category-scroll-bar" class="w-10 h-full bg-[#C18129] rounded-full transition-transform duration-75"></div>
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
            <source media="(max-width: 640px)" srcset="{{ asset('assets/images/festive-offer-mobile-banner.png') }}">
            <img 
                src="{{ asset('assets/images/Banner 9.jpg') }}" 
                alt="Festive Collection - 5 Divine Essentials at just ₹799 - ISHANAA" 
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
<!-- ========================================================================= -->
<!-- 6. DAILY DEVOTIONAL RITUALS (Dynamic Sacred Products) -->
<!-- ========================================================================= -->
@if(isset($newLaunches) && $newLaunches->isNotEmpty())
<section class="py-[40px] bg-white">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <div class="text-center max-w-4xl mx-auto mb-5 sm:mb-6 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">✦ DAILY RITUAL GUIDES ✦</span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-normal capitalize text-[#121212] font-heading tracking-[0.06em] leading-tight whitespace-nowrap">
                Devotional Moments
            </h2>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-[10px] pt-4 sm:pt-5">
            @foreach($newLaunches as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>

    </div>
</section>
@endif

<!-- ========================================================================= -->
<!-- 5. DEVOTEE TESTIMONIALS (2-Row Continuous Smooth Marquee Ticker)         -->
<!-- ========================================================================= -->
<section class="py-[40px] bg-white overflow-hidden select-none" id="testimonials-marquee-section">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-4xl mx-auto space-y-1.5 mb-5 sm:mb-6">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">✦ 50,000+ BLESSED DEVOTEES ✦</span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-normal capitalize text-[#121212] font-heading tracking-[0.06em] leading-tight whitespace-nowrap">
                Customer Testimonials
            </h2>
        </div>

        <!-- 2 Continuous Scrolling Rows with Left & Right Gradient Fade Overlays -->
        <div class="relative w-full space-y-4 sm:space-y-5 overflow-hidden marquee-track-pause">
            
            <!-- Left & Right Edge Fade Gradients -->
            <div class="absolute top-0 bottom-0 left-0 w-12 sm:w-28 z-20 pointer-events-none bg-gradient-to-r from-white via-white/90 to-transparent"></div>
            <div class="absolute top-0 bottom-0 right-0 w-12 sm:w-28 z-20 pointer-events-none bg-gradient-to-l from-white via-white/90 to-transparent"></div>
        
            <!-- ========================================== -->
            <!-- ROW 1: RIGHT TO LEFT (Continuous Scroll)   -->
            <!-- ========================================== -->
            <div class="flex overflow-hidden">
                <div class="animate-marquee-left flex space-x-4 sm:space-x-5 py-0">
                
                @php
                    $row1Testimonials = [
                        [
                            'name' => 'Pooja Sharma',
                            'city' => 'Mandi, Himachal Pradesh',
                            'initials' => 'PS',
                            'avatar_bg' => 'bg-[#D38928]',
                            'product' => 'Chandan Saanjh',
                            'quote' => 'Mandi me itni authentic pure incense sticks agarbatti pehli baar try ki. Mandir me subah aarti ke baad shaam tak natural sandalwood aur camphor ki gentle fragrance rehti hai. Pure natural!'
                        ],
                        [
                            'name' => 'अनिल डोगरा',
                            'city' => 'कांगड़ा, हिमाचल प्रदेश',
                            'initials' => 'AD',
                            'avatar_bg' => 'bg-[#831F2E]',
                            'product' => 'Swarna Pushpa',
                            'quote' => 'कांगड़ा में हमारे घर में रोजाना पूजा होती है। बिल्कुल शुद्ध धुआं है और आंखों में कोई जलन नहीं होती। शास्त्रों के अनुसार शुद्ध अगरबत्ती से बहुत ही पवित्र अनुभव मिलता है।'
                        ],
                        [
                            'name' => 'Sunil Thakur',
                            'city' => 'Chamba, Himachal Pradesh',
                            'initials' => 'ST',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'product' => 'Devi Incense Stick Pack',
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
                            'product' => 'Incense Sticks',
                            'quote' => 'हमीरपुर से मंगवाया था। पहले बाजार वाली धूप से कमरे में भारीपन और सिरदर्द होता था, लेकिन इसमें सिर्फ शुद्ध जड़ी-बूटियों की महक है। बहुत ही शांत वातावरण बनता है।'
                        ],
                        [
                            'name' => 'Dr. Shalini Katoch',
                            'city' => 'Kangra, Himachal Pradesh',
                            'initials' => 'SK',
                            'avatar_bg' => 'bg-[#3E2314]',
                            'product' => 'Organic Havan Cups',
                            'quote' => 'Being from Kangra, I always prefer clean, organic products for home prayer. ISHANAA incense sticks emit gentle white smoke that keeps our living room fragrant and tranquil.'
                        ]
                    ];
                @endphp

                <!-- First Pass -->
                @foreach($row1Testimonials as $t)
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[380px] h-[180px] bg-white rounded-[16px] p-5 border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center space-x-1 text-[#D38928] text-lg sm:text-xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-snug font-normal line-clamp-3">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-[#EAE3D9] mt-2">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-9 h-9 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs font-heading shrink-0 shadow-xs">
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
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[380px] h-[180px] bg-white rounded-[16px] p-5 border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between" aria-hidden="true">
                        <div class="space-y-2">
                            <div class="flex items-center space-x-1 text-[#D38928] text-lg sm:text-xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-snug font-normal line-clamp-3">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-[#EAE3D9] mt-2">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-9 h-9 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs font-heading shrink-0 shadow-xs">
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
            <div class="animate-marquee-right flex space-x-4 sm:space-x-5 py-0">
                
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
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[380px] h-[180px] bg-white rounded-[16px] p-5 border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center space-x-1 text-[#D38928] text-lg sm:text-xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-snug font-normal line-clamp-3">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-[#EAE3D9] mt-2">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-9 h-9 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs font-heading shrink-0 shadow-xs">
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
                    <div class="shrink-0 w-[290px] sm:w-[360px] md:w-[380px] h-[180px] bg-white rounded-[16px] p-5 border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-md transition-all duration-300 flex flex-col justify-between" aria-hidden="true">
                        <div class="space-y-2">
                            <div class="flex items-center space-x-1 text-[#D38928] text-lg sm:text-xl leading-none">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <p class="text-xs sm:text-[13px] text-[#2B1810] leading-snug font-normal line-clamp-3">
                                "{{ $t['quote'] }}"
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-3 border-t border-[#EAE3D9] mt-2">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-9 h-9 rounded-full {{ $t['avatar_bg'] }} text-white flex items-center justify-center font-bold text-xs font-heading shrink-0 shadow-xs">
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
<!-- 6. ROOTED IN PURITY (Exact Matching Reference Screenshot Styling)         -->
<!-- ========================================================================= -->
<section class="py-12 sm:py-16 bg-[#FFFDF9] select-none font-body">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        
        <!-- Clean Standard Eyebrow Header -->
        <div class="text-center max-w-4xl mx-auto mb-4 sm:mb-6 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">✦ CRAFTED WITH CARE ✦</span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-heading font-normal capitalize text-[#2B1810] tracking-[0.06em] leading-tight whitespace-nowrap">
                Rooted in Purity
            </h2>
        </div>

        <!-- Slim & Wide Elegant Card Container (Rounded Corners, Soft Gold Border) -->
        <div class="bg-white rounded-[20px] border-2 border-[#D38928]/40 max-w-[1260px] mx-auto overflow-hidden shadow-xs">
            <div class="grid grid-cols-1 md:grid-cols-3 relative">
                
                <!-- Column 1: Ancient Recipes -->
                <div class="relative py-7 sm:py-9 lg:py-10 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center space-y-3 group">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#FAF5EE] border-2 border-[#D38928]/40 flex items-center justify-center text-[#C28430] group-hover:scale-105 transition-transform shadow-2xs">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 64 64" fill="none" stroke="#C28430" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 34h32c0 10-7.2 18-16 18s-16-8-16-18Z"/>
                            <path d="M24 52h16"/>
                            <path d="M38 18l7-6a1.5 1.5 0 0 1 2.1.2l1.1 1.1a1.5 1.5 0 0 1-.2 2.1L38 34"/>
                            <path d="M22 22c0-3.5 3.5-5.5 6-5.5s1 3.5 0 5.5-6 0-6 0Z"/>
                            <circle cx="28" cy="27" r="1.5" fill="#C28430"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl lg:text-[23px] font-heading font-semibold text-[#2B1810]">
                        Ancient Recipes
                    </h3>
                    <p class="text-xs sm:text-[14px] lg:text-[14.5px] text-gray-600 font-normal font-body leading-relaxed max-w-[280px]">
                        Inspired by time-honoured traditions.
                    </p>
                    <!-- Inset Vertical Line (Desktop - Matching Soft Gold) -->
                    <div class="hidden md:block absolute right-0 top-5 bottom-5 w-[2px] bg-[#D38928]/40"></div>
                    <!-- Inset Horizontal Line (Mobile - Matching Soft Gold) -->
                    <div class="md:hidden absolute bottom-0 left-6 right-6 h-[2px] bg-[#D38928]/40"></div>
                </div>

                <!-- Column 2: Purest Ingredients -->
                <div class="relative py-7 sm:py-9 lg:py-10 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center space-y-3 group">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#FAF5EE] border-2 border-[#D38928]/40 flex items-center justify-center text-[#C28430] group-hover:scale-105 transition-transform shadow-2xs">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 64 64" fill="none" stroke="#C28430" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Sacred Flames & Kund -->
                            <path d="M32 16c-3 4-3 9 0 12 3-3 3-8 0-12Z"/>
                            <path d="M23 21c-3.5 1-5 4.5-3 8 2.5-1 4.5-4 3-8Z"/>
                            <path d="M41 21c3.5 1 5 4.5 3 8-2.5-1-4.5-4-3-8Z"/>
                            <path d="M18 36h28c0 7-6.3 12-14 12s-14-5-14-12Z"/>
                            <path d="M25 48h14"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl lg:text-[23px] font-heading font-semibold text-[#2B1810]">
                        Purest Ingredients
                    </h3>
                    <p class="text-xs sm:text-[14px] lg:text-[14.5px] text-gray-600 font-normal font-body leading-relaxed max-w-[280px]">
                        Carefully selected for every ritual.
                    </p>
                    <!-- Inset Vertical Line (Desktop - Matching Soft Gold) -->
                    <div class="hidden md:block absolute right-0 top-5 bottom-5 w-[2px] bg-[#D38928]/40"></div>
                    <!-- Inset Horizontal Line (Mobile - Matching Soft Gold) -->
                    <div class="md:hidden absolute bottom-0 left-6 right-6 h-[2px] bg-[#D38928]/50"></div>
                </div>

                <!-- Column 3: Eco-conscious -->
                <div class="relative py-7 sm:py-9 lg:py-10 px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center space-y-3 group">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-[#FAF5EE] border-2 border-[#D38928]/40 flex items-center justify-center text-[#C28430] group-hover:scale-105 transition-transform shadow-2xs">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" viewBox="0 0 64 64" fill="none" stroke="#C28430" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <!-- Box & Leaf -->
                            <path d="M19 24l13-8 13 8v22l-13 8-13-8V24Z"/>
                            <path d="M19 24l13 8 13-8"/>
                            <path d="M32 32v22"/>
                            <path d="M28 42c0-5 4-8 8-8s1 5 0 8-8 0-8 0Z"/>
                            <path d="M30 42l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl lg:text-[23px] font-heading font-semibold text-[#2B1810]">
                        Eco-conscious
                    </h3>
                    <p class="text-xs sm:text-[14px] lg:text-[14.5px] text-gray-600 font-normal font-body leading-relaxed max-w-[280px]">
                        Thoughtful choices, mindful practices.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ========================================================================= -->
<!-- 8. FREQUENTLY ASKED QUESTIONS (Pure White Background, 10px Padding, 8px)  -->
<!-- ========================================================================= -->
<section class="py-[40px] bg-white select-none">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        <div class="max-w-5xl lg:max-w-[1100px] mx-auto space-y-6 sm:space-y-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-4xl mx-auto mb-6 sm:mb-8 space-y-1.5">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#C18129] font-heading">✦ CLARITY &amp; VIDHI ✦</span>
            <h2 class="text-[18px] sm:text-[24px] md:text-[28px] lg:text-[34px] font-normal capitalize text-[#121212] font-heading tracking-[0.06em] leading-tight whitespace-nowrap">
                Frequently Asked Questions
            </h2>
        </div>

        <!-- Seamless Accordion Container (8px Rounded Corners & 10px Inner Padding) -->
        <div class="bg-white rounded-[8px] border border-[#EADBCC] divide-y divide-[#EADBCC] overflow-hidden shadow-xs">
            
            <!-- FAQ 1 -->
            <div class="faq-item">
                <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                    <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                        What makes ISHANAA pure incense sticks and havan cups unique?
                    </span>
                    <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                    <p>
                        Our incense is <strong>100% natural</strong> (compliant with Vedic and Vastu scriptures) and <strong>0% toxic charcoal</strong>. Handcrafted using upcycled temple flower powders, pure Bhimseni camphor, natural Loban, and Guggal resins, it produces a soothing herbal aroma that leaves behind clean, auspicious white ash without causing any eye irritation or coughing.
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
                        Each 9-inch Incense Stick burns continuously for <strong>45 to 50 minutes</strong>, while our organic Sambrani Havan Cups burn intensely for <strong>25 to 30 minutes</strong>. Due to our rich botanical essential oil concentration, the uplifting sacred fragrance lingers throughout your home for <strong>4 to 6 hours</strong> after burning.
                    </p>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item">
                <button type="button" class="faq-toggle w-full p-[10px] px-3.5 sm:px-4 flex items-center justify-between text-left focus:outline-none cursor-pointer group hover:bg-[#FAF7F2]/60 transition-colors">
                    <span class="text-xs sm:text-[13.5px] font-medium text-[#121212] font-heading group-hover:text-[#D38928] transition-colors pr-4 leading-snug">
                        Are ISHANAA products safe to use around babies, elders, and pets?
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
                        What is the spiritual significance of burning 100% Pure Vedic Agarbatti?
                    </span>
                    <div class="w-6 h-6 rounded-full bg-[#FAF7F2] group-hover:bg-[#D38928]/10 text-[#D38928] flex items-center justify-center shrink-0 transition-colors">
                        <svg class="faq-icon w-3 h-3 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="faq-content hidden px-3.5 sm:px-4 pb-[10px] pt-1 text-xs sm:text-[13px] text-gray-600 leading-relaxed bg-[#FAF7F2]/30">
                    <p>
                        In Sanatana Dharma and ancient Vedic scriptures, incense is revered for purifying space and inviting positive energies into the home. ISHANAA adheres strictly to traditional Vidhi by crafting pure incense sticks without toxic charcoal or artificial chemicals.
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
                        Every batch of ISHANAA incense is lovingly handcrafted by Vedic artisans using dried consecrated flowers collected from sacred shrines, combined with pure Desi cow dung powder, organic Guggal, natural Sambrani Loban resin, Jatamansi, and natural therapeutic-grade essential oils.
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
                        dot.className = 'w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-[#C18129] transition-all duration-300 cursor-pointer';
                    } else {
                        dot.className = 'w-2 sm:w-2.5 h-2 sm:h-2.5 rounded-full bg-[#C18129]/30 hover:bg-[#C18129]/60 transition-all duration-300 cursor-pointer';
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
            let toast = document.getElementById('ishanaa-live-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'ishanaa-live-toast';
                toast.className = 'fixed bottom-6 right-6 z-50 bg-[#121212] text-white px-5 py-3.5 rounded-[10px] shadow-2xl border border-[#D38928]/50 flex items-center space-x-3 transition-all duration-300 transform translate-y-20 opacity-0 font-body';
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
        // 4. FAQ ACCORDION LOGIC (Exclusive Single Open Behavior)
        // -------------------------------------------------------------
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const item = toggle.closest('.faq-item');
                const content = item.querySelector('.faq-content');
                const icon = toggle.querySelector('.faq-icon');
                const isHidden = content.classList.contains('hidden');

                // Close all items first
                document.querySelectorAll('.faq-content').forEach(c => c.classList.add('hidden'));
                document.querySelectorAll('.faq-icon').forEach(i => i.classList.remove('rotate-180'));

                // Open clicked item if it was closed
                if (isHidden) {
                    content.classList.remove('hidden');
                    if (icon) icon.classList.add('rotate-180');
                }
            });
        });
    });
</script>
@endpush
