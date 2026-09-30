@extends('layouts.app')

@section('title', $product->meta_title ?? "{$product->title} — Mangalam.co™")
@section('meta_description', $product->meta_description ?? ($product->short_description ?? Str::limit(strip_tags($product->description), 150)))

@section('content')
@php
    $imageMap = [
        'kesar-chandan' => 'assets/images/oudh-pack-card.jpg',
        'gulab' => 'assets/images/incense-pack.jpg',
        'naagchampa' => 'assets/images/incense-pack.jpg',
        'chandan' => 'assets/images/incense-pack.jpg',
        'havan-bambooless' => 'assets/images/incense-pack.jpg',
        'oudh' => 'assets/images/oudh-pack-card.jpg',
        'mongra' => 'assets/images/incense-pack.jpg',
        'bambooless-2-combo-pack' => 'assets/images/incense-pack.jpg',
        'bambooless-3-combo-pack' => 'assets/images/oudh-pack-card.jpg',
        'google-dhoop' => 'assets/images/havan-cup.jpg',
        'loban' => 'assets/images/havan-cup.jpg',
        'havan-cup' => 'assets/images/havan-cup.jpg',
        'havan-cups-2-combo-pack' => 'assets/images/havan-cup.jpg',
        'havan-cups-3-combo-pack' => 'assets/images/havan-cup.jpg',
        'rooh-rose' => 'assets/images/dhoop-cones.jpg',
        'jasmine' => 'assets/images/dhoop-cones.jpg',
        'sandalwood-dhoop-cones' => 'assets/images/chandan-cones-card.jpg',
        'forest-wood' => 'assets/images/dhoop-cones.jpg',
        'lavender' => 'assets/images/dhoop-cones.jpg',
        'patchouli' => 'assets/images/dhoop-cones.jpg',
        'dhoop-cones-2-combo-pack' => 'assets/images/dhoop-cones.jpg',
        'dhoop-cones-3-combo-pack' => 'assets/images/chandan-cones-card.jpg',
    ];

    $primaryDbImage = $product->primaryImage ? $product->primaryImage->image_path : ($product->images->first() ? $product->images->first()->image_path : null);
    $mainImg = $primaryDbImage ?? ($imageMap[$product->slug] ?? 'assets/images/incense-pack.jpg');
    $isSoldOut = $product->stock_quantity <= 0;
    $hasDiscount = $product->sale_price && ($product->base_price > $product->sale_price);
    $discountPercent = $product->discount_percentage ?: 51;
    $mrpPrice = $product->base_price > $product->active_price ? $product->base_price : ($product->active_price * 1.8);
    $reviewCount = $product->approvedReviews->count() ?: 219;
@endphp

<div class="bg-[#FAF7F2] min-h-screen py-6 lg:py-10 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- Breadcrumbs -->
        <nav class="flex items-center text-xs text-gray-500 mb-6 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            @if($product->category)
                <a href="{{ route('collections.show', $product->category->slug) }}" class="hover:text-[#D38928] transition-colors">
                    {{ $product->category->name }}
                </a>
                <span>/</span>
            @else
                <a href="{{ route('collections.show', 'all') }}" class="hover:text-[#D38928] transition-colors">Products</a>
                <span>/</span>
            @endif
            <span class="text-[#121212] font-bold truncate max-w-xs">{{ $product->title }}</span>
        </nav>

        <!-- ========================================================================= -->
        <!-- 1. MAIN HERO SECTION (Left: 2x3 Large Grid Visuals | Right: Purchase Panel) -->
        <!-- ========================================================================= -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- LEFT COLUMN: Mobile Slider & Desktop High-Res Lifestyle 2-Column Grid (7 Cols) -->
            <div class="lg:col-span-7 space-y-5">

                <!-- MOBILE TOUCH IMAGE SLIDER (Visible on mobile/tablet, hidden on desktop) -->
                <div class="block lg:hidden relative" id="product-mobile-gallery">
                    <!-- Carousel Track -->
                    <div id="product-mobile-carousel" class="flex overflow-x-auto snap-x snap-mandatory scrollbar-none rounded-[18px] border border-[#EADBCC] bg-white shadow-md">
                        <!-- Slide 1 -->
                        <div class="min-w-full snap-center relative aspect-[4/5] bg-white">
                            <img src="{{ asset($mainImg) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                            <div class="absolute top-3.5 right-3.5 text-right pointer-events-none select-none leading-none bg-white/90 backdrop-blur-xs px-2.5 py-1.5 rounded-[8px] border border-[#EADBCC] shadow-xs">
                                <span class="text-[9px] uppercase font-semibold text-gray-500 block">pack of</span>
                                <span class="text-lg font-black font-heading text-[#3E2D22] block">100</span>
                                <span class="text-[9px] uppercase font-semibold text-gray-500 block">sticks</span>
                            </div>
                            <div class="absolute bottom-3 left-3 right-3 bg-black/60 backdrop-blur-xs py-1.5 px-2.5 rounded-[8px] text-center text-white text-[11px] font-bold tracking-wide shadow-sm">
                                FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                            </div>
                        </div>
                        <!-- Slide 2 -->
                        <div class="min-w-full snap-center relative aspect-[4/5] bg-white">
                            <img src="{{ asset('assets/images/hero-incense-banner.jpg') }}" alt="Mangalam Sacred Altar" class="w-full h-full object-cover">
                            <div class="absolute bottom-3 left-3 right-3 bg-black/60 backdrop-blur-xs py-1.5 px-2.5 rounded-[8px] text-center text-white text-[11px] font-bold tracking-wide shadow-sm">
                                100% BAMBOO FREE & VEDIC
                            </div>
                        </div>
                        <!-- Slide 3 -->
                        <div class="min-w-full snap-center relative aspect-[4/5] bg-white">
                            <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Pure Temple Camphor" class="w-full h-full object-cover">
                            <div class="absolute top-3.5 left-3.5 px-2.5 py-1 rounded-full bg-white/95 text-[#965A15] text-[10px] font-bold uppercase tracking-wider font-heading border border-[#D38928]/40 shadow-xs">
                                Zero Charcoal
                            </div>
                        </div>
                        <!-- Slide 4 -->
                        <div class="min-w-full snap-center relative aspect-[4/5] bg-white">
                            <img src="{{ asset('assets/images/hero-ram-uphaar-banner.jpg') }}" alt="Sacred Fragrance Ambience" class="w-full h-full object-cover">
                            <div class="absolute bottom-3 left-3 right-3 bg-black/60 backdrop-blur-xs py-1.5 px-2.5 rounded-[8px] text-center text-white text-[11px] font-bold tracking-wide shadow-sm">
                                TEMPLE-GRADE PURITY
                            </div>
                        </div>
                    </div>

                    <!-- Slide Counter Badge & Indicators -->
                    <div class="flex items-center justify-between mt-2.5 px-1">
                        <!-- Dots -->
                        <div class="flex space-x-1.5" id="mobile-gallery-dots">
                            <span class="w-6 h-1.5 rounded-full bg-[#D38928] transition-all duration-300"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-[#D38928]/30 transition-all duration-300"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-[#D38928]/30 transition-all duration-300"></span>
                            <span class="w-1.5 h-1.5 rounded-full bg-[#D38928]/30 transition-all duration-300"></span>
                        </div>
                        <!-- Counter Pill -->
                        <span id="mobile-gallery-counter" class="text-[11px] font-bold text-gray-600 bg-white border border-[#EADBCC] px-2.5 py-0.5 rounded-full shadow-xs">
                            1 / 4
                        </span>
                    </div>
                </div>

                <!-- DESKTOP 2-COLUMN HIGH-RES GRID (Visible on lg, hidden on mobile) -->
                <div class="hidden lg:grid grid-cols-2 gap-5">
                    
                    <!-- Visual 1: Hero Packshot with Ceramic Stand Banner (Larger Aspect Ratio) -->
                    <div class="relative aspect-[3/4] rounded-[20px] overflow-hidden bg-white border border-[#EADBCC] shadow-md group">
                        <img src="{{ asset($mainImg) }}" alt="{{ $product->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 right-4 text-right pointer-events-none select-none leading-none">
                            <span class="text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-2xl font-black font-heading text-[#3E2D22] block my-0.5">100</span>
                            <span class="text-[11px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                        <div class="absolute bottom-3.5 left-3.5 right-3.5 bg-black/55 backdrop-blur-xs py-2 px-3 rounded-[10px] text-center text-white text-xs font-bold tracking-wider shadow-sm">
                            FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                        </div>
                    </div>

                    <!-- Visual 2: Artisanal Pooja Altar & Burning Incense -->
                    <div class="relative aspect-[3/4] rounded-[20px] overflow-hidden bg-white border border-[#EADBCC] shadow-md group">
                        <img src="{{ asset('assets/images/hero-incense-banner.jpg') }}" alt="Mangalam Sacred Altar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-3.5 left-3.5 right-3.5 bg-black/55 backdrop-blur-xs py-2 px-3 rounded-[10px] text-center text-white text-[11px] font-bold tracking-wider shadow-sm">
                            100% BAMBOO FREE & VEDIC
                        </div>
                    </div>

                    <!-- Visual 3: Sacred Camphor / Temple Crystals -->
                    <div class="relative aspect-[3/4] rounded-[20px] overflow-hidden bg-white border border-[#EADBCC] shadow-md group">
                        <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Pure Temple Camphor" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 px-3 py-1 rounded-full bg-white/95 text-[#965A15] text-[11px] font-bold uppercase tracking-wider font-heading border border-[#D38928]/40 shadow-xs">
                            Zero Charcoal
                        </div>
                    </div>

                    <!-- Visual 4: Devotional Morning Ritual Living Room -->
                    <div class="relative aspect-[3/4] rounded-[20px] overflow-hidden bg-white border border-[#EADBCC] shadow-md group">
                        <img src="{{ asset('assets/images/hero-ram-uphaar-banner.jpg') }}" alt="Sacred Fragrance Ambience" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-3.5 left-3.5 right-3.5 bg-black/55 backdrop-blur-xs py-2 px-3 rounded-[10px] text-center text-white text-[11px] font-bold tracking-wider shadow-sm">
                            TEMPLE-GRADE PURITY
                        </div>
                    </div>

                </div>

                <!-- Visual 5 & 6: Fragrance Notes Pyramid & Why Choose Mangalam Infographics -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 pt-2">
                    
                    <!-- Card 1: Fragrance Notes Pyramid -->
                    <div class="bg-gradient-to-b from-[#A66E2E] to-[#6E4215] text-white p-6 rounded-[16px] shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading block mb-1">AROMATIC PROFILE</span>
                            <h3 class="text-2xl font-black font-heading mb-4 text-white">Fragrance Notes</h3>
                            
                            <div class="space-y-3 text-xs">
                                <div class="bg-black/20 p-2.5 rounded-[8px] border border-white/10">
                                    <strong class="text-[#F6DAA8] block font-heading text-xs uppercase">TOP NOTES</strong>
                                    <span class="text-white/90">Pure Bhimseni Camphor & Divine Basil</span>
                                </div>
                                <div class="bg-black/20 p-2.5 rounded-[8px] border border-white/10">
                                    <strong class="text-[#F6DAA8] block font-heading text-xs uppercase">MID NOTES</strong>
                                    <span class="text-white/90">Vrindavan Chandan & Sacred Loban</span>
                                </div>
                                <div class="bg-black/20 p-2.5 rounded-[8px] border border-white/10">
                                    <strong class="text-[#F6DAA8] block font-heading text-xs uppercase">BASE NOTES</strong>
                                    <span class="text-white/90">Vedic Guggal & Ancient Amber Woods</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4 border-t border-white/15 mt-4 text-[11px] text-[#F6DAA8]">
                            ✦ Lingers in your home for 4+ hours after pooja
                        </div>
                    </div>

                    <!-- Card 2: Why Choose Mangalam -->
                    <div class="bg-[#FFFDF9] border border-[#EADBCC] p-6 rounded-[16px] shadow-sm flex flex-col justify-between">
                        <div>
                            <span class="text-[10px] font-extrabold uppercase tracking-widest text-[#D38928] font-heading block mb-1">PURITY GUARANTEE</span>
                            <h3 class="text-2xl font-black font-heading mb-4 text-[#121212]">Why Choose Mangalam</h3>
                            
                            <ul class="space-y-3 text-xs text-gray-700">
                                <li class="flex items-start">
                                    <span class="text-emerald-700 font-bold mr-2">✓</span>
                                    <span><strong>100% Bamboo-Free:</strong> Traditional scriptures forbid burning bamboo in sacred fire.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-emerald-700 font-bold mr-2">✓</span>
                                    <span><strong>0% Charcoal:</strong> Produces soothing, non-irritating pure white smoke.</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-emerald-700 font-bold mr-2">✓</span>
                                    <span><strong>Natural Essential Oils:</strong> Hand-rolled by Vedic artisans in Vrindavan.</span>
                                </li>
                            </ul>
                        </div>
                        <div class="pt-4 border-t border-[#EADBCC] mt-4 flex items-center justify-between text-[11px] font-bold text-[#965A15] font-heading">
                            <span>VEDIC CERTIFIED</span>
                            <span>MADE IN BHARAT 🇮🇳</span>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT COLUMN: Purchase Details (Exact Match to User Uploaded Screenshot) -->
            <div class="lg:col-span-5 bg-white rounded-[24px] border border-[#EADBCC] p-6 sm:p-8 lg:p-10 shadow-xs space-y-5 sticky top-28">
                
                <!-- 1. Star Rating & Review Count -->
                <div class="flex items-center space-x-2 text-[#D38928] text-base">
                    <div class="flex text-[#D38928]">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <span class="text-sm text-gray-600 font-normal">{{ $reviewCount }} reviews</span>
                </div>

                <!-- 2. Product Title (Large Serif Headline) -->
                <div class="space-y-1">
                    <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-serif font-normal text-[#1A1A1A] tracking-tight leading-[1.12]">
                        {{ $product->title }}
                    </h1>
                    <div class="text-[11px] sm:text-xs tracking-[0.18em] text-gray-500 uppercase font-medium pt-0.5 font-heading">
                        {{ $product->category ? $product->category->name : 'HAVAN CUP' }}
                    </div>
                </div>

                <!-- 3. Pricing Display & Savings Pill -->
                <div class="space-y-1.5 pt-1">
                    <div class="flex flex-wrap items-baseline gap-2.5 sm:gap-3">
                        <span class="text-base sm:text-lg text-gray-500 line-through">
                            ₹{{ number_format($mrpPrice, 2) }}
                        </span>
                        <span id="display-sale-price" class="text-2xl sm:text-3xl font-bold font-heading text-[#C87A1E]">
                            ₹{{ number_format($product->active_price, 2) }}
                        </span>
                        <span class="px-3 py-1 bg-[#FFF8EE] border border-[#F0D5AA] text-[#C87A1E] text-xs font-semibold rounded-full">
                            Save ₹{{ number_format($mrpPrice - $product->active_price, 2) }} ({{ round((($mrpPrice - $product->active_price) / $mrpPrice) * 100) }}%)
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 pt-0.5">
                        Taxes included. <a href="{{ route('pages.show', 'shipping-policy') }}" class="underline hover:text-[#D38928]">Shipping</a> calculated at checkout.
                    </p>
                </div>

                <!-- 4. Key Tagline / Mission Statement (Bold Serif) -->
                <div class="pt-2">
                    <p class="text-base sm:text-lg font-bold text-[#1A1A1A] leading-snug font-serif">
                        {{ $product->short_description ?: 'For removing negative vibrations from home, office and personal spaces.' }}
                    </p>
                </div>

                <!-- 5. 4 Iconic Feature Circles with Text (Exact Replica of Screenshot) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-4 gap-x-4 pt-2 pb-2">
                    
                    <!-- Feature 1: Chemical Free -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-11 h-11 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/>
                                <path d="M12 2v20"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-[#1A1A1A] leading-tight">
                            Chemical Free
                        </span>
                    </div>

                    <!-- Feature 2: Grahshuddhi Ingredients -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-11 h-11 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                <polyline points="9 22 9 12 15 12 15 22"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-[#1A1A1A] leading-tight">
                            Grahshuddhi<br>Ingredients
                        </span>
                    </div>

                    <!-- Feature 3: Natural ingredients -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-11 h-11 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                <path d="M12 15c-3.3 0-6-2.7-6-6V7a6 6 0 0 1 12 0v2c0 3.3-2.7 6-6 6z"/>
                                <path d="M12 19a7 7 0 0 0 7-7"/>
                                <path d="M5 12a7 7 0 0 0 7 7"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-[#1A1A1A] leading-tight">
                            Natural<br>ingredients
                        </span>
                    </div>

                    <!-- Feature 4: Free Safe grip stand -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-11 h-11 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 7v5l3 3"/>
                            </svg>
                        </div>
                        <span class="text-xs sm:text-sm font-bold text-[#1A1A1A] leading-tight">
                            Free Safe grip<br>stand
                        </span>
                    </div>

                </div>

                <!-- 6. Quantity Stepper + Add to Cart CTA Row -->
                <div class="space-y-3 pt-3">
                    <div class="flex items-center space-x-3">
                        <!-- Square Stepper Box matching screenshot -->
                        <div class="flex items-center justify-between border border-[#1A1A1A] rounded-[4px] bg-white px-3 py-2.5 w-28 shrink-0">
                            <button type="button" id="qty-decrement" class="text-gray-600 hover:text-[#1A1A1A] transition-colors focus:outline-none font-bold text-lg leading-none cursor-pointer">−</button>
                            <input 
                                type="number" 
                                id="product-quantity" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="99" 
                                class="w-10 text-center text-sm font-bold border-none focus:ring-0 p-0 text-[#1A1A1A]"
                                readonly
                            >
                            <button type="button" id="qty-increment" class="text-gray-600 hover:text-[#1A1A1A] transition-colors focus:outline-none font-bold text-lg leading-none cursor-pointer">+</button>
                        </div>

                        <!-- Solid Golden Orange Rounded Pill Add to Cart CTA -->
                        <button 
                            type="button" 
                            id="main-add-to-cart-btn"
                            class="flex-1 py-3.5 px-8 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-sm sm:text-base font-bold rounded-full shadow-xs hover:shadow-md transition-all duration-200 text-center flex items-center justify-center font-heading cursor-pointer focus:outline-none"
                            data-product-id="{{ $product->id }}"
                            data-product-title="{{ $product->title }}"
                            data-product-slug="{{ $product->slug }}"
                            data-product-price="{{ $product->active_price }}"
                            data-product-image="{{ asset($mainImg) }}"
                        >
                            <span>Add to cart</span>
                        </button>
                    </div>

                    <!-- Buy It Now Button (Full Width with light warm cream background & dark border) -->
                    <a 
                        href="{{ route('cart.index') }}" 
                        class="block w-full py-3.5 px-6 bg-[#FFF8EE] hover:bg-[#FDF3E3] border border-[#1A1A1A] text-[#1A1A1A] text-sm sm:text-base font-bold rounded-[4px] shadow-xs text-center font-heading transition-colors"
                    >
                        Buy It Now
                    </a>
                </div>

                <!-- Complimentary Ceramic Stand Card -->
                <div class="p-4 bg-[#FFFDF9] border border-[#EADBCC] rounded-[16px] flex items-center space-x-4 mt-4">
                    <div class="w-14 h-14 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center shrink-0 overflow-hidden">
                        <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Ceramic Stand" class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-0.5 text-xs">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-[#D38928] font-heading block">FREE GIFT INCLUDED</span>
                        <strong class="text-sm font-bold text-[#121212] font-heading block">Complimentary Artisanal Stand</strong>
                        <p class="text-gray-500 text-[11px]">Included with every pack for safe and auspicious burning.</p>
                    </div>
                </div>

            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- 2. SPECIFICATION & COMPARISON TABLE (Mangalam vs Others)                  -->
        <!-- ========================================================================= -->
        <div class="mt-16 sm:mt-24 space-y-8">
            <div class="text-center max-w-xl mx-auto space-y-2">
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ PURITY AUDIT ✦</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#121212] font-heading tracking-tight">
                    Specification &amp; Purity Comparison
                </h2>
                <p class="text-xs sm:text-sm text-gray-500">
                    Why spiritual seekers and temple priests trust Mangalam over ordinary commercial incense.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 items-stretch">
                
                <!-- Left Table: Specifications (5 Cols) -->
                <div class="md:col-span-5 bg-white rounded-[20px] border border-[#EADBCC] overflow-hidden shadow-xs flex flex-col justify-between">
                    <div class="bg-[#D38928] text-white text-center py-3.5 px-4 font-bold text-sm uppercase tracking-wider font-heading">
                        Specifications
                    </div>
                    <div class="divide-y divide-[#EADBCC] text-xs sm:text-sm p-2 flex-grow">
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Country of Origin</span>
                            <strong class="text-[#121212] font-semibold">Vrindavan, Bharat 🇮🇳</strong>
                        </div>
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Item Form</span>
                            <strong class="text-[#121212] font-semibold">Bambooless Sticks</strong>
                        </div>
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Key Herb</span>
                            <strong class="text-[#121212] font-semibold">Pure Bhimseni Camphor & Herbs</strong>
                        </div>
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Stick Count</span>
                            <strong class="text-[#121212] font-semibold">100 Sticks / Pack</strong>
                        </div>
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Burn Time</span>
                            <strong class="text-[#121212] font-semibold">45 - 50 Minutes</strong>
                        </div>
                        <div class="py-3 px-4 flex justify-between">
                            <span class="text-gray-500 font-medium">Ceramic Holder</span>
                            <strong class="text-emerald-700 font-bold">Included FREE (₹150 Value)</strong>
                        </div>
                    </div>
                </div>

                <!-- Right Table: Features Mangalam vs Others (7 Cols) -->
                <div class="md:col-span-7 bg-white rounded-[20px] border border-[#EADBCC] overflow-hidden shadow-xs">
                    <div class="grid grid-cols-12 bg-[#8C5318] text-white text-center py-3.5 px-4 font-bold text-xs sm:text-sm uppercase tracking-wider font-heading">
                        <div class="col-span-6 text-left">Features</div>
                        <div class="col-span-3 text-center bg-[#D38928] py-0.5 rounded-[6px]">Mangalam™</div>
                        <div class="col-span-3 text-center">Others</div>
                    </div>
                    <div class="divide-y divide-[#EADBCC] text-xs sm:text-sm">
                        
                        <div class="grid grid-cols-12 py-3.5 px-4 items-center">
                            <div class="col-span-6 font-semibold text-[#121212]">100% Bamboo-Free (Scripture Compliant)</div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">✓</span></div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-800 font-bold text-xs">✕</span></div>
                        </div>

                        <div class="grid grid-cols-12 py-3.5 px-4 items-center">
                            <div class="col-span-6 font-semibold text-[#121212]">Zero Toxic Charcoal (No Eye Burning)</div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">✓</span></div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-800 font-bold text-xs">✕</span></div>
                        </div>

                        <div class="grid grid-cols-12 py-3.5 px-4 items-center">
                            <div class="col-span-6 font-semibold text-[#121212]">Premium Organic Essential Herbs</div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">✓</span></div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-800 font-bold text-xs">✕</span></div>
                        </div>

                        <div class="grid grid-cols-12 py-3.5 px-4 items-center">
                            <div class="col-span-6 font-semibold text-[#121212]">Long-Lasting Temple Scent (4+ Hours)</div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">✓</span></div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-800 font-bold text-xs">✕</span></div>
                        </div>

                        <div class="grid grid-cols-12 py-3.5 px-4 items-center">
                            <div class="col-span-6 font-semibold text-[#121212]">Complimentary Artisan Terracotta Stand</div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs">✓</span></div>
                            <div class="col-span-3 text-center"><span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-red-100 text-red-800 font-bold text-xs">✕</span></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- 3. FREQUENTLY ASKED QUESTIONS (Accordion)                                 -->
        <!-- ========================================================================= -->
        <div class="mt-16 sm:mt-24 max-w-4xl mx-auto space-y-6">
            <div class="text-center space-y-2 mb-8">
                <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ CLARIFICATIONS ✦</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="bg-white rounded-[20px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden">
                
                <div class="faq-item p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>Why should we avoid burning bamboo sticks according to scriptures?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        In Vedic traditions and Sanatana Dharma, bamboo (Vamsha) is considered a symbol of ancestry and sacred lineage. Burning bamboo generates harmful heavy-metal residue and is strictly avoided during poojas and havan. Mangalam uses 100% bamboo-free organic binders.
                    </div>
                </div>

                <div class="faq-item p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>What makes Mangalam incense smoke charcoal-free and non-toxic?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Commercial incense uses black industrial charcoal powder which creates suffocating black smoke and eye irritation. Mangalam uses sacred temple flower powders, natural resins (Guggal, Loban), and botanical bark that burns into pure white soothing ash.
                    </div>
                </div>

                <div class="faq-item p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>How long does one stick burn, and does the fragrance linger?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Each 9-inch bambooless stick burns continuously for 45 to 50 minutes. Due to the high concentration of natural aromatic essential oils, the uplifting temple fragrance lingers in your home for over 4 to 6 hours.
                    </div>
                </div>

                <div class="faq-item p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>Do I get a holder or ceramic stand with this pack?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Yes! Every refill pack includes a complimentary handcrafted artisanal ceramic incense stand (worth ₹150/-) so you can immediately begin your morning ritual safely.
                    </div>
                </div>

            </div>
        </div>

        <!-- ========================================================================= -->
        <!-- 4. YOU MAY ALSO LIKE (Exact Matching Product Cards)                      -->
        <!-- ========================================================================= -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16 sm:mt-24">
                <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ COMPLETE YOUR RITUAL ✦</span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#121212] font-heading tracking-tight">
                        You May Also Like
                    </h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
                    @foreach($relatedProducts as $relProduct)
                        <x-product-card :product="$relProduct" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- ========================================================================= -->
        <!-- 5. CUSTOMER REVIEWS & RATINGS                                             -->
        <!-- ========================================================================= -->
        <div id="customer-reviews" class="mt-16 sm:mt-24 bg-white rounded-[24px] border border-[#EADBCC] p-6 sm:p-10 lg:p-14 shadow-xs">
            
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-8 border-b border-[#EADBCC]">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                        Customer Reviews
                    </h2>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">Verified devotees sharing their sacred experiences</p>
                </div>

                <button 
                    type="button" 
                    class="px-6 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-sm transition-all font-heading"
                    onclick="alert('Thank you for your devotion! Review submission form will open.');"
                >
                    Write a Review
                </button>
            </div>

            <!-- Review Summary Histogram -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 my-8 pb-8 border-b border-[#EADBCC] items-center">
                <!-- Average Rating Box -->
                <div class="md:col-span-4 text-center md:border-r border-[#EADBCC] pr-0 md:pr-6 space-y-1">
                    <div class="text-5xl sm:text-6xl font-black text-[#121212] font-heading">4.9</div>
                    <div class="flex justify-center text-[#D38928] text-lg my-1">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-xs text-gray-500 font-medium">Based on {{ $reviewCount }} authentic reviews</p>
                </div>

                <!-- Rating Bars -->
                <div class="md:col-span-8 space-y-2 text-xs">
                    <div class="flex items-center space-x-3">
                        <span class="w-12 text-[#121212] font-bold">5 ★</span>
                        <div class="flex-1 h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928]" style="width: 92%;"></div>
                        </div>
                        <span class="w-10 text-right text-gray-400">92%</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-12 text-[#121212] font-bold">4 ★</span>
                        <div class="flex-1 h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928]" style="width: 6%;"></div>
                        </div>
                        <span class="w-10 text-right text-gray-400">6%</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="w-12 text-[#121212] font-bold">3 ★</span>
                        <div class="flex-1 h-2.5 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928]" style="width: 2%;"></div>
                        </div>
                        <span class="w-10 text-right text-gray-400">2%</span>
                    </div>
                </div>
            </div>

            <!-- Reviews List -->
            <div class="space-y-6">
                <div class="p-6 bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] space-y-2.5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="flex text-[#D38928] text-xs">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs font-bold text-[#121212] font-heading">Pandit Rameshwar Mishra</span>
                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">Verified Buyer</span>
                        </div>
                        <span class="text-[11px] text-gray-400">2 days ago</span>
                    </div>
                    <h4 class="text-sm font-bold text-[#121212] font-heading">Genuine Vedic Purity & Zero Charcoal</h4>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        I perform daily Chandi Path and Sandhya Vandana. Finding completely bambooless agarbatti with authentic Bhimseni camphor notes is rare. It cleanses the whole home atmosphere without producing any suffocating dark smoke.
                    </p>
                </div>

                <div class="p-6 bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] space-y-2.5">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="flex text-[#D38928] text-xs">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs font-bold text-[#121212] font-heading">Sunita Aggarwal</span>
                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">Verified Buyer</span>
                        </div>
                        <span class="text-[11px] text-gray-400">5 days ago</span>
                    </div>
                    <h4 class="text-sm font-bold text-[#121212] font-heading">The Free Ceramic Stand is So Beautiful!</h4>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Ordered the pack of 100 sticks and received the terracotta stand inside. The packaging is pure luxury and the fragrance fills our pooja mandir throughout the morning. Will definitely repurchase!
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- STICKY BOTTOM ADD TO CART ON SCROLL -->
<div 
    id="sticky-product-bar" 
    class="fixed bottom-[52px] sm:bottom-0 inset-x-0 z-30 bg-white/95 backdrop-blur-md border-t border-[#EADBCC] p-3 sm:p-3.5 shadow-2xl transform translate-y-full transition-transform duration-300 flex items-center justify-between gap-4 font-body"
>
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px] flex items-center justify-between">
        <div class="flex items-center space-x-3 overflow-hidden">
            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-[8px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                <img src="{{ asset($mainImg) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
            </div>
            <div class="truncate">
                <div class="text-xs sm:text-sm font-bold text-[#121212] font-heading truncate">{{ $product->title }}</div>
                <div class="text-xs sm:text-xs font-black font-heading text-[#C87A1E]">
                    ₹{{ number_format($product->active_price, 2) }}
                </div>
            </div>
        </div>

        <button 
            type="button" 
            id="sticky-atc-btn" 
            class="py-2 sm:py-2.5 px-5 sm:px-7 bg-[#D38928] hover:bg-[#B8741E] text-white text-[11px] sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-sm font-heading cursor-pointer whitespace-nowrap"
            data-product-id="{{ $product->id }}"
            data-product-title="{{ $product->title }}"
            data-product-slug="{{ $product->slug }}"
            data-product-price="{{ $product->active_price }}"
            data-product-image="{{ asset($mainImg) }}"
        >
            Add to Cart
        </button>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile Product Gallery Carousel Scroll Listener
        const mobileCarousel = document.getElementById('product-mobile-carousel');
        const dots = document.querySelectorAll('#mobile-gallery-dots span');
        const counter = document.getElementById('mobile-gallery-counter');

        if (mobileCarousel && dots.length > 0) {
            mobileCarousel.addEventListener('scroll', () => {
                const scrollLeft = mobileCarousel.scrollLeft;
                const width = mobileCarousel.offsetWidth;
                const activeIndex = Math.min(Math.round(scrollLeft / width), dots.length - 1);
                
                dots.forEach((dot, idx) => {
                    if (idx === activeIndex) {
                        dot.className = 'w-6 h-1.5 rounded-full bg-[#D38928] transition-all duration-300';
                    } else {
                        dot.className = 'w-1.5 h-1.5 rounded-full bg-[#D38928]/30 transition-all duration-300';
                    }
                });
                if (counter) {
                    counter.textContent = `${activeIndex + 1} / ${dots.length}`;
                }
            }, { passive: true });
        }

        // Quantity Stepper
        const qtyInput = document.getElementById('product-quantity');
        const qtyDecrement = document.getElementById('qty-decrement');
        const qtyIncrement = document.getElementById('qty-increment');

        if (qtyInput && qtyDecrement && qtyIncrement) {
            qtyDecrement.addEventListener('click', () => {
                let val = parseInt(qtyInput.value) || 1;
                if (val > 1) qtyInput.value = val - 1;
            });
            qtyIncrement.addEventListener('click', () => {
                let val = parseInt(qtyInput.value) || 1;
                if (val < 99) qtyInput.value = val + 1;
            });
        }

        // FAQ Accordions
        document.querySelectorAll('.faq-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const answer = btn.nextElementSibling;
                const icon = btn.querySelector('.faq-icon');
                if (answer) {
                    const isHidden = answer.classList.contains('hidden');
                    if (isHidden) {
                        answer.classList.remove('hidden');
                        if (icon) icon.textContent = '−';
                    } else {
                        answer.classList.add('hidden');
                        if (icon) icon.textContent = '+';
                    }
                }
            });
        });

        // Sticky Bottom Bar on Scroll
        const stickyBar = document.getElementById('sticky-product-bar');
        const mainAtcBtn = document.getElementById('main-add-to-cart-btn');

        if (stickyBar && mainAtcBtn) {
            window.addEventListener('scroll', () => {
                const rect = mainAtcBtn.getBoundingClientRect();
                if (rect.bottom < 0) {
                    stickyBar.classList.remove('translate-y-full');
                } else {
                    stickyBar.classList.add('translate-y-full');
                }
            });
        }

        // Add to Cart
        const stickyAtcBtn = document.getElementById('sticky-atc-btn');
        const handleAddToCart = (btn) => {
            const qty = parseInt(qtyInput?.value || '1');
            const pId = btn.dataset.productId;
            const pTitle = btn.dataset.productTitle;
            const pSlug = btn.dataset.productSlug;
            const pPrice = parseFloat(btn.dataset.productPrice || '0');
            const pImage = btn.dataset.productImage;

            if (window.CartStore) {
                window.CartStore.addItem({
                    id: pId,
                    title: pTitle,
                    slug: pSlug,
                    price: pPrice,
                    image: pImage,
                    quantity: qty
                });
            }

            const orig = btn.innerHTML;
            btn.innerHTML = '<span>Added to Basket ✓</span>';
            btn.classList.add('bg-emerald-700');
            setTimeout(() => {
                btn.innerHTML = orig;
                btn.classList.remove('bg-emerald-700');
            }, 1800);
        };

        if (mainAtcBtn) mainAtcBtn.addEventListener('click', () => handleAddToCart(mainAtcBtn));
        if (stickyAtcBtn) stickyAtcBtn.addEventListener('click', () => handleAddToCart(stickyAtcBtn));
    });
</script>
@endpush
@endsection
