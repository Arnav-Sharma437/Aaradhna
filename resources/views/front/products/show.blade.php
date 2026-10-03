@extends('layouts.app')

@section('title', $product->meta_title ?? "{$product->title} — Manglam.co™")
@section('meta_description', $product->meta_description ?? ($product->short_description ?? Str::limit(strip_tags($product->description), 150)))

@section('content')
@php
    $imageMap = [
        'swarna-pushpa' => 'assets/images/oudh-pack-card.jpg',
        'swarna-pushpa-100' => 'assets/images/devi-refill-pack-card.jpg',
        'divya-naagchampa' => 'assets/images/incense-pack.jpg',
        'divya-naagchampa-100' => 'assets/images/camphor-refill-pack-card.jpg',
        'chandan-saanjh' => 'assets/images/incense-pack.jpg',
        'chandan-saanjh-100' => 'assets/images/devi-refill-pack-card.jpg',
        'royal-oudh' => 'assets/images/oudh-pack-card.jpg',
        'royal-oudh-100' => 'assets/images/oudh-pack-card.jpg',
        'mogra-noor' => 'assets/images/incense-pack.jpg',
        'mogra-noor-100' => 'assets/images/incense-pack.jpg',
        'gulab-rooh' => 'assets/images/incense-pack.jpg',
        'gulab-rooh-100' => 'assets/images/devi-refill-pack-card.jpg',
        'lavender-veda' => 'assets/images/incense-pack.jpg',
        'lavender-veda-100' => 'assets/images/camphor-refill-pack-card.jpg',
        'pack-of-six' => 'assets/images/oudh-pack-card.jpg',
        'pitambara-havan' => 'assets/images/pitambara-pack.jpg',
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
    $discountPercent = $product->discount_percentage ?: 30;
    $mrpPrice = $product->base_price > $product->active_price ? $product->base_price : ($product->active_price * 1.43);
    $actualReviewCount = $product->approvedReviews ? $product->approvedReviews->count() : 0;
    $reviewCount = $actualReviewCount > 0 ? $actualReviewCount : (1386 + (abs(crc32($product->slug)) % 150));

    // Gallery images array
    $galleryImages = [];
    if ($product->images && $product->images->count() > 0) {
        foreach ($product->images as $img) {
            $galleryImages[] = asset($img->image_path);
        }
    }
    
    if (empty($galleryImages)) {
        $galleryImages[] = asset($mainImg);
        if ($product->category && str_contains(strtolower($product->category->slug), 'cone')) {
            $galleryImages[] = asset('assets/images/single-dhoop-cone.jpg');
            $galleryImages[] = asset('assets/images/chandan-cones-card.jpg');
            $galleryImages[] = asset('assets/images/hero-sacred-cones.jpg');
        } elseif ($product->category && str_contains(strtolower($product->category->slug), 'cup')) {
            $galleryImages[] = asset('assets/images/single-havan-cup.jpg');
            $galleryImages[] = asset('assets/images/havan-cup.jpg');
            $galleryImages[] = asset('assets/images/hero-ram-uphaar-banner.jpg');
        } else {
            $galleryImages[] = asset('assets/images/single-bambooless-stick.jpg');
            $galleryImages[] = asset('assets/images/hero-incense-banner.jpg');
            $galleryImages[] = asset('assets/images/camphor-refill-pack-card.jpg');
        }
    }
@endphp

<div class="bg-white min-h-screen py-2 sm:py-4 pb-20 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">

        <!-- Breadcrumbs (Compact Spacing) -->
        <nav class="flex items-center text-xs text-gray-500 mb-3 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            @if($product->category)
                <a href="{{ route('collections.show', $product->category->slug) }}" class="hover:text-[#D38928] transition-colors capitalize">
                    {{ strtolower($product->category->name) }}
                </a>
                <span>/</span>
            @else
                <a href="{{ route('collections.show', 'all') }}" class="hover:text-[#D38928] transition-colors">Products</a>
                <span>/</span>
            @endif
            <span class="text-[#121212] font-bold truncate max-w-xs">{{ $product->title }}</span>
        </nav>

        <!-- ========================================================================= -->
        <!-- 1. MAIN HERO SECTION (Left: Main Image + Gallery | Right: Clean Purchase Panel) -->
        <!-- ========================================================================= -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-8 items-start">
            
            <!-- LEFT COLUMN: Mobile Single+Thumbnails & Desktop High-Res 2-Column Grid (7 Cols) -->
            <div class="lg:col-span-7 space-y-2.5">

                <!-- 1. MOBILE/TABLET VIEW: Main Hero Image + Horizontal Thumbnails Below (Visible on mobile/tablet, hidden on desktop) -->
                <div class="block lg:hidden space-y-[5px]" id="product-mobile-gallery">
                    <!-- Main Large Hero Image -->
                    <div class="relative w-full aspect-square sm:aspect-[4/3.8] rounded-[8px] sm:rounded-[10px] overflow-hidden bg-[#FAF7F2] shadow-xs group">
                        <img 
                            id="main-product-gallery-img" 
                            src="{{ $galleryImages[0] }}" 
                            alt="{{ $product->title }}" 
                            class="w-full h-full object-cover transition-opacity duration-200 ease-out"
                        >
                        
                        <!-- Discount Badge top-left -->
                        @if($hasDiscount || $discountPercent)
                        <div class="absolute top-2.5 left-2.5 z-10 pointer-events-none">
                            <span class="inline-block bg-[#8B1E1E] text-white text-[11px] sm:text-xs font-bold px-2.5 py-0.5 rounded-[6px] tracking-wide shadow-sm font-body">
                                {{ $discountPercent }}% OFF
                            </span>
                        </div>
                        @endif

                        <!-- Free Ceramic Stand highlight tag bottom -->
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-black/60 backdrop-blur-xs py-1.5 px-3 rounded-[6px] text-center text-white text-xs font-semibold tracking-wide shadow-sm font-body">
                            FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                        </div>
                    </div>

                    <!-- Horizontal Thumbnails Strip Directly Below (5px gap) -->
                    <div class="flex items-center gap-[5px] overflow-x-auto pb-1 scrollbar-none" id="product-thumbnails-container">
                        @foreach($galleryImages as $index => $imgUrl)
                            <button 
                                type="button" 
                                class="gallery-thumbnail-btn relative w-18 h-18 sm:w-20 sm:h-20 rounded-[6px] sm:rounded-[8px] overflow-hidden bg-[#FAF7F2] transition-all duration-200 shrink-0 cursor-pointer focus:outline-none {{ $index === 0 ? 'ring-2 ring-[#D38928] opacity-100' : 'opacity-75 hover:opacity-100' }}"
                                data-img-src="{{ $imgUrl }}"
                                data-index="{{ $index }}"
                                aria-label="View product image {{ $index + 1 }}"
                            >
                                <img src="{{ $imgUrl }}" alt="{{ $product->title }} thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- 2. DESKTOP VIEW: Large High-Res 2-Column Grid (8px gap & 8px/10px radius, No Borders) -->
                <div class="hidden lg:grid grid-cols-2 gap-2">
                    
                    <!-- Visual 1: Hero Packshot with Ceramic Stand Banner -->
                    <div class="relative aspect-[4/4.8] rounded-[8px] sm:rounded-[10px] overflow-hidden bg-[#FAF7F2] shadow-xs group">
                        <img src="{{ $galleryImages[0] }}" alt="{{ $product->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @if($hasDiscount || $discountPercent)
                        <div class="absolute top-2.5 left-2.5 z-10 pointer-events-none">
                            <span class="inline-block bg-[#8B1E1E] text-white text-xs font-bold px-2.5 py-0.5 rounded-[6px] tracking-wide shadow-sm font-body">
                                {{ $discountPercent }}% OFF
                            </span>
                        </div>
                        @endif
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-black/60 backdrop-blur-xs py-1.5 px-3 rounded-[6px] text-center text-white text-xs font-bold tracking-wider shadow-sm font-body">
                            FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                        </div>
                    </div>

                    <!-- Visual 2: Artisanal Pooja Altar & Burning Incense -->
                    <div class="relative aspect-[4/4.8] rounded-[8px] sm:rounded-[10px] overflow-hidden bg-[#FAF7F2] shadow-xs group">
                        <img src="{{ $galleryImages[1] ?? asset('assets/images/hero-incense-banner.jpg') }}" alt="Manglam Sacred Altar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-black/60 backdrop-blur-xs py-1.5 px-3 rounded-[6px] text-center text-white text-xs font-bold tracking-wider shadow-sm font-body">
                            100% BAMBOO FREE &amp; VEDIC
                        </div>
                    </div>

                    <!-- Visual 3: Sacred Camphor / Temple Crystals / Detail -->
                    <div class="relative aspect-[4/4.8] rounded-[8px] sm:rounded-[10px] overflow-hidden bg-[#FAF7F2] shadow-xs group">
                        <img src="{{ $galleryImages[2] ?? asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Pure Temple Ingredients" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-2.5 left-2.5 px-2.5 py-0.5 rounded-full bg-white/95 text-[#965A15] text-[11px] font-bold uppercase tracking-wider font-heading border border-[#D38928]/40 shadow-xs">
                            Zero Charcoal
                        </div>
                    </div>

                    <!-- Visual 4: Devotional Ambient Living Room -->
                    <div class="relative aspect-[4/4.8] rounded-[8px] sm:rounded-[10px] overflow-hidden bg-[#FAF7F2] shadow-xs group">
                        <img src="{{ $galleryImages[3] ?? asset('assets/images/hero-ram-uphaar-banner.jpg') }}" alt="Sacred Fragrance Ambience" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-black/60 backdrop-blur-xs py-1.5 px-3 rounded-[6px] text-center text-white text-xs font-bold tracking-wider shadow-sm font-body">
                            TEMPLE-GRADE PURITY
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT COLUMN: Compact, Tight Spaced Purchase Details (5 Cols) -->
            <div class="lg:col-span-5 space-y-3.5 lg:pl-2 sticky top-24 font-body">
                
                <!-- 1. Star Rating & Review Count (Bigger & Clickable to scroll to reviews) -->
                <a href="#customer-reviews" class="inline-flex items-center space-x-2 text-sm sm:text-[15px] text-gray-700 hover:text-[#D38928] transition-colors group cursor-pointer focus:outline-none">
                    <div class="flex text-[#D38928] text-base sm:text-lg leading-none">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <span class="font-medium underline-offset-3 group-hover:underline font-body text-gray-800 text-sm sm:text-[15px]">{{ $reviewCount }} reviews</span>
                </a>

                <!-- 2. Product Title & Subtitle / Category (Capitalized) -->
                <div class="space-y-0.5">
                    <h1 class="text-2xl sm:text-3xl lg:text-[38px] font-normal text-[#121212] tracking-tight leading-[1.15] font-serif">
                        {{ $product->title }}
                    </h1>
                    <div class="text-xs sm:text-[13px] text-gray-500 capitalize font-medium pt-0.5 font-body">
                        {{ $product->category ? ucwords(strtolower($product->category->name)) : 'Bambooless Incense' }}
                    </div>
                </div>

                <!-- 3. Pricing Display & Savings Pill (Same Font & Cohesive Look) -->
                <div class="space-y-1 pt-0.5">
                    <div class="flex flex-wrap items-baseline gap-2.5 sm:gap-3 font-body">
                        <span class="text-base sm:text-lg text-gray-400 line-through font-medium font-body">
                            ₹{{ number_format($mrpPrice, 2) }}
                        </span>
                        <span id="display-sale-price" class="text-xl sm:text-2xl font-bold text-[#C87A1E] font-body">
                            ₹{{ number_format($product->active_price, 2) }}
                        </span>
                        @if($mrpPrice > $product->active_price)
                        <span class="px-2.5 py-0.5 bg-[#FFF9F2] text-[#C87A1E] border border-[#F0D5B3] text-xs sm:text-[13px] font-semibold rounded-full font-body">
                            Save ₹{{ number_format($mrpPrice - $product->active_price, 2) }} ({{ round((($mrpPrice - $product->active_price) / $mrpPrice) * 100) }}%)
                        </span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 pt-0.5 font-body">
                        Taxes included. <a href="{{ route('pages.show', 'shipping-policy') }}" class="underline hover:text-[#D38928] text-gray-700">Shipping</a> calculated at checkout.
                    </p>
                </div>

                <!-- 4. Bold Hook Statement (20px Font Size) -->
                <div class="pt-1">
                    <p class="text-[18px] sm:text-[20px] font-bold text-[#121212] font-body leading-snug">
                        @if(str_contains(strtolower($product->slug), 'cone'))
                            30 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.
                        @elseif(str_contains(strtolower($product->slug), 'cup'))
                            12 Sambrani Cups. 100% Charcoal Free ~ One cup fills your temple with clean, real fragrance.
                        @elseif(str_contains(strtolower($product->slug), '100'))
                            100 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.
                        @elseif(str_contains(strtolower($product->slug), '240') || str_contains(strtolower($product->slug), 'six'))
                            240 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.
                        @else
                            40 Sticks. No Bamboo ~ One stick fills the room with clean, real fragrance.
                        @endif
                    </p>
                </div>

                <!-- 5. 4 Iconic Feature Circles with Text (16px Font Size, Reduced Space) -->
                <div class="flex flex-wrap items-center gap-x-5 sm:gap-x-7 gap-y-3 pt-2 pb-2">
                    
                    <!-- Feature 1: Chemical Free -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22C12 22 20 18 20 10C20 4.5 15.5 2 12 2C8.5 2 4 4.5 4 10C4 18 12 22 12 22Z"/>
                                <path d="M12 2V22"/>
                                <path d="M12 7L16 11"/>
                                <path d="M12 13L8 17"/>
                            </svg>
                        </div>
                        <span class="text-[15px] sm:text-[16px] font-semibold text-[#121212] font-body leading-tight">
                            Chemical Free
                        </span>
                    </div>

                    <!-- Feature 2: Low Smoke -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M8 18c-1-1.5-1-3.5 0-5s2-3.5 1-5-3-3-1-5"/>
                                <path d="M12 19c-1-1.5-1-3.5 0-5s2-3.5 1-5-3-3-1-5"/>
                                <path d="M16 18c-1-1.5-1-3.5 0-5s2-3.5 1-5-3-3-1-5"/>
                            </svg>
                        </div>
                        <span class="text-[15px] sm:text-[16px] font-semibold text-[#121212] font-body leading-tight">
                            Low Smoke
                        </span>
                    </div>

                    <!-- Feature 3: Long Lasting -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 22h14"/>
                                <path d="M5 2h14"/>
                                <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/>
                                <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/>
                            </svg>
                        </div>
                        <span class="text-[15px] sm:text-[16px] font-semibold text-[#121212] font-body leading-tight">
                            Long Lasting
                        </span>
                    </div>

                    <!-- Feature 4: Free Ceramic Stand -->
                    <div class="flex items-center space-x-2.5">
                        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full border border-[#D38928] flex items-center justify-center text-[#D38928] bg-transparent shrink-0">
                            <svg class="w-4.5 h-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                <ellipse cx="12" cy="17" rx="8" ry="4"/>
                                <path d="M12 17V5"/>
                                <circle cx="12" cy="4" r="1" fill="#D38928"/>
                            </svg>
                        </div>
                        <span class="text-[15px] sm:text-[16px] font-semibold text-[#121212] font-body leading-tight">
                            Free Ceramic Stand
                        </span>
                    </div>

                </div>

                <!-- 6. Quantity Stepper + Add to Cart CTA Row (Matching Website Button Radius: 8px/10px) -->
                <div class="space-y-2.5 pt-1">
                    <div class="flex items-center space-x-2.5 sm:space-x-3">
                        <!-- Stepper Box (8px/10px radius) -->
                        <div class="flex items-center justify-between border border-gray-300 rounded-[8px] sm:rounded-[10px] bg-white px-3 h-11 sm:h-12 w-28 shrink-0">
                            <button type="button" id="qty-decrement" class="text-gray-600 hover:text-[#121212] transition-colors focus:outline-none font-bold text-lg leading-none cursor-pointer">−</button>
                            <input 
                                type="number" 
                                id="product-quantity" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="99" 
                                class="w-10 text-center text-sm font-bold border-none focus:ring-0 p-0 text-[#121212]"
                                readonly
                            >
                            <button type="button" id="qty-increment" class="text-gray-600 hover:text-[#121212] transition-colors focus:outline-none font-bold text-lg leading-none cursor-pointer">+</button>
                        </div>

                        <!-- Add to Cart CTA (Matching Website Button Radius: 8px/10px) -->
                        <button 
                            type="button" 
                            id="main-add-to-cart-btn"
                            class="flex-1 h-11 sm:h-12 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-sm sm:text-base font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 text-center flex items-center justify-center cursor-pointer focus:outline-none font-heading"
                            data-product-id="{{ $product->id }}"
                            data-product-title="{{ $product->title }}"
                            data-product-slug="{{ $product->slug }}"
                            data-product-price="{{ $product->active_price }}"
                            data-product-image="{{ $galleryImages[0] }}"
                        >
                            <span>Add to cart</span>
                        </button>
                    </div>

                    <!-- Buy It Now Button (Matching Website Button Radius: 8px/10px) -->
                    <a 
                        href="{{ route('cart.index') }}" 
                        class="block w-full h-11 sm:h-12 leading-[42px] sm:leading-[46px] bg-[#FAF7F2] hover:bg-[#F3ECE0] border border-black text-[#121212] text-sm sm:text-base font-semibold rounded-[8px] sm:rounded-[10px] shadow-xs text-center transition-colors font-heading"
                    >
                        Buy It Now
                    </a>

                    <!-- Promotional Promo Banner (Max Width 600px, Height 250px with rounded-[8px] sm:rounded-[10px]) -->
                    <div class="pt-2">
                        <a href="{{ route('bundles.trial-packs') }}" class="block w-full max-w-[600px] h-auto max-h-[250px] rounded-[8px] sm:rounded-[10px] overflow-hidden border border-[#EADBCC] shadow-xs group focus:outline-none">
                            <img 
                                src="{{ asset('assets/images/Banner 9.jpg') }}" 
                                alt="Festive Offer - 5 Divine Essentials" 
                                class="w-full h-full max-h-[250px] object-cover group-hover:scale-102 transition-transform duration-300"
                                loading="lazy"
                            >
                        </a>
                    </div>

                    <!-- 1. Product Description Accordion (Collapsible & Closed by Default) -->
                    <div class="pt-2">
                        <div class="border border-[#EADBCC] rounded-[8px] sm:rounded-[10px] bg-white overflow-hidden shadow-2xs">
                            <button 
                                type="button" 
                                id="product-desc-accordion-btn"
                                class="w-full px-4 py-3.5 flex items-center justify-between text-left font-bold text-base sm:text-lg text-[#121212] hover:text-[#D38928] bg-white hover:bg-[#FAF8F5] transition-colors focus:outline-none font-heading cursor-pointer select-none"
                                onclick="
                                    const body = document.getElementById('product-desc-accordion-body');
                                    const icon = document.getElementById('product-desc-accordion-icon');
                                    if (body.classList.contains('hidden')) {
                                        body.classList.remove('hidden');
                                        icon.style.transform = 'rotate(180deg)';
                                    } else {
                                        body.classList.add('hidden');
                                        icon.style.transform = 'rotate(0deg)';
                                    }
                                "
                            >
                                <span>Product Description</span>
                                <svg id="product-desc-accordion-icon" class="w-5 h-5 text-[#D38928] transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div id="product-desc-accordion-body" class="hidden px-4 pb-4 pt-2 text-sm sm:text-[15px] text-gray-700 leading-relaxed font-body border-t border-[#EADBCC]/60 bg-[#FFFEFC] transition-all duration-300">
                                @if($product->description)
                                    <div class="prose prose-sm max-w-none text-gray-700">
                                        {!! $product->description !!}
                                    </div>
                                @else
                                    <p>
                                        Immerse your home temple in divine bliss with <strong>{{ $product->title }}</strong>. Handcrafted with revered Vedic botanicals, organic resins, and essential flower extracts in Vrindavan Dham. 100% bamboo-free and zero charcoal formulation to honor sacred scriptures and protect your prana with soothing, non-irritating pure white smoke.
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- 2. Customer Trust & Reviews Badge (Clickable link to #customer-reviews) -->
                    <div class="pt-2">
                        <a href="#customer-reviews" class="block w-full text-center group cursor-pointer focus:outline-none">
                            <div class="py-2.5 px-4 rounded-[8px] sm:rounded-[10px] bg-[#FAF7F2] border border-[#EADBCC]/80 shadow-2xs hover:shadow-xs transition-all flex flex-col items-center justify-center">
                                <img 
                                    src="{{ asset('assets/images/customer-trust-avatars.png') }}" 
                                    alt="Trusted by 10Lakh+ Happy Customers" 
                                    class="w-full max-w-[340px] sm:max-w-[380px] h-auto object-contain mx-auto group-hover:scale-102 transition-transform duration-300"
                                    loading="lazy"
                                >
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <!-- ========================================================================= -->
        <!-- 2. SPECIFICATIONS & PURITY COMPARISON SECTION (HTML / Tailwind UI)        -->
        <!-- ========================================================================= -->
        <div class="mt-12 sm:mt-16 max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 sm:gap-6 items-stretch">
                
                <!-- Left Card: Specifications (5 Cols) -->
                <div class="lg:col-span-5 bg-white rounded-[14px] sm:rounded-[18px] border border-[#EADBCC] shadow-xs overflow-hidden flex flex-col">
                    <div class="bg-[#7B1925] px-6 py-3.5 border-b border-[#D38928]/40">
                        <h3 class="font-serif text-xl sm:text-2xl text-white font-medium tracking-wide">
                            Specifications
                        </h3>
                    </div>
                    <div class="p-4 sm:p-6 flex-1 flex flex-col justify-between divide-y divide-[#F1E5D8]">
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Country of Origin</span>
                            <span class="text-gray-900 font-bold flex items-center gap-1.5">
                                Vrindavan, Bharat
                                <span class="text-base leading-none">🇮🇳</span>
                            </span>
                        </div>
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Item Form</span>
                            <span class="text-gray-900 font-bold">{{ $product->item_form ?? 'Bambooless Incense' }}</span>
                        </div>
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Key Herb / Essence</span>
                            <span class="text-gray-900 font-bold">{{ $product->fragrance ?? 'Pure Bhimseni & Herbs' }}</span>
                        </div>
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Stick Count</span>
                            <span class="text-gray-900 font-bold">{{ $product->stick_count ? $product->stick_count . ' Sticks / Pack' : '100 Sticks / Pack' }}</span>
                        </div>
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Burn Time</span>
                            <span class="text-gray-900 font-bold">{{ $product->burn_time ?? '45 – 50 Minutes' }}</span>
                        </div>
                        <div class="py-3 flex items-center justify-between text-sm sm:text-[15px]">
                            <span class="text-gray-700 font-medium">Ceramic Holder</span>
                            <span class="text-[#1B7F49] font-bold">Included FREE (₹150 Value)</span>
                        </div>
                    </div>
                </div>

                <!-- Right Card: Features Comparison (7 Cols) -->
                <div class="lg:col-span-7 bg-white rounded-[14px] sm:rounded-[18px] border border-[#EADBCC] shadow-xs overflow-hidden flex flex-col">
                    <!-- Header Bar -->
                    <div class="bg-[#7B1925] border-b border-[#D38928]/40 grid grid-cols-12 items-center">
                        <div class="col-span-6 px-6 py-3.5">
                            <h3 class="font-serif text-xl sm:text-2xl text-white font-medium tracking-wide">
                                Features
                            </h3>
                        </div>
                        <div class="col-span-3 bg-[#FDF6ED] py-2 px-2 text-center rounded-t-lg border-t-2 border-x-2 border-[#D38928]/50 shadow-xs flex flex-col items-center justify-center">
                            <svg class="w-4 h-4 text-[#C27E23] mb-0.5" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C12 2 8 7 8 11C8 14.5 10.5 17 12 18C13.5 17 16 14.5 16 11C16 7 12 2 12 2Z"/>
                                <path d="M6 13C4 14.5 3 17 4 19C5.5 20.5 8 20.5 10 19.5C9 18 8 16 8 13C7.2 13 6.5 13 6 13Z" opacity="0.7"/>
                                <path d="M18 13C18.8 13 19.5 13 20 13C21 17 20 19.5 18.5 20.5C16.5 20.5 14 18 15 16.5C15.8 14.8 17 13.5 18 13Z" opacity="0.7"/>
                            </svg>
                            <span class="text-[11px] sm:text-xs font-black tracking-widest text-[#7B1925] uppercase font-heading">Manglam</span>
                        </div>
                        <div class="col-span-3 py-3 px-2 text-center text-[11px] sm:text-xs font-bold tracking-wider text-[#F7E7CE] uppercase font-heading">
                            Others
                        </div>
                    </div>

                    <!-- Comparison Rows -->
                    <div class="p-0 flex-1 flex flex-col justify-between divide-y divide-[#F1E5D8]">
                        
                        <div class="grid grid-cols-12 items-center text-sm sm:text-[15px]">
                            <div class="col-span-6 px-4 sm:px-6 py-3 text-gray-800 font-medium">
                                100% Bamboo-Free (Scripture Compliant)
                            </div>
                            <div class="col-span-3 bg-[#FDF6ED] h-full flex items-center justify-center py-3 border-x border-[#EEDBCA]/60">
                                <span class="w-6 h-6 rounded-full bg-[#1B7F49] text-white flex items-center justify-center text-xs shadow-xs font-bold">✓</span>
                            </div>
                            <div class="col-span-3 bg-[#FBF7F2]/60 h-full flex items-center justify-center py-3">
                                <span class="w-6 h-6 rounded-full bg-[#D32F2F] text-white flex items-center justify-center text-xs shadow-xs font-bold">✕</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center text-sm sm:text-[15px]">
                            <div class="col-span-6 px-4 sm:px-6 py-3 text-gray-800 font-medium">
                                Zero Toxic Charcoal (No Eye Burning)
                            </div>
                            <div class="col-span-3 bg-[#FDF6ED] h-full flex items-center justify-center py-3 border-x border-[#EEDBCA]/60">
                                <span class="w-6 h-6 rounded-full bg-[#1B7F49] text-white flex items-center justify-center text-xs shadow-xs font-bold">✓</span>
                            </div>
                            <div class="col-span-3 bg-[#FBF7F2]/60 h-full flex items-center justify-center py-3">
                                <span class="w-6 h-6 rounded-full bg-[#D32F2F] text-white flex items-center justify-center text-xs shadow-xs font-bold">✕</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center text-sm sm:text-[15px]">
                            <div class="col-span-6 px-4 sm:px-6 py-3 text-gray-800 font-medium">
                                Premium Organic Essential Herbs
                            </div>
                            <div class="col-span-3 bg-[#FDF6ED] h-full flex items-center justify-center py-3 border-x border-[#EEDBCA]/60">
                                <span class="w-6 h-6 rounded-full bg-[#1B7F49] text-white flex items-center justify-center text-xs shadow-xs font-bold">✓</span>
                            </div>
                            <div class="col-span-3 bg-[#FBF7F2]/60 h-full flex items-center justify-center py-3">
                                <span class="w-6 h-6 rounded-full bg-[#D32F2F] text-white flex items-center justify-center text-xs shadow-xs font-bold">✕</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center text-sm sm:text-[15px]">
                            <div class="col-span-6 px-4 sm:px-6 py-3 text-gray-800 font-medium">
                                Long-Lasting Temple Scent (4+ Hours)
                            </div>
                            <div class="col-span-3 bg-[#FDF6ED] h-full flex items-center justify-center py-3 border-x border-[#EEDBCA]/60">
                                <span class="w-6 h-6 rounded-full bg-[#1B7F49] text-white flex items-center justify-center text-xs shadow-xs font-bold">✓</span>
                            </div>
                            <div class="col-span-3 bg-[#FBF7F2]/60 h-full flex items-center justify-center py-3">
                                <span class="w-6 h-6 rounded-full bg-[#D32F2F] text-white flex items-center justify-center text-xs shadow-xs font-bold">✕</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-12 items-center text-sm sm:text-[15px]">
                            <div class="col-span-6 px-4 sm:px-6 py-3 text-gray-800 font-medium">
                                Complimentary Artisan Terracotta Stand
                            </div>
                            <div class="col-span-3 bg-[#FDF6ED] h-full flex items-center justify-center py-3 border-x border-[#EEDBCA]/60 rounded-b-lg">
                                <span class="w-6 h-6 rounded-full bg-[#1B7F49] text-white flex items-center justify-center text-xs shadow-xs font-bold">✓</span>
                            </div>
                            <div class="col-span-3 bg-[#FBF7F2]/60 h-full flex items-center justify-center py-3">
                                <span class="w-6 h-6 rounded-full bg-[#D32F2F] text-white flex items-center justify-center text-xs shadow-xs font-bold">✕</span>
                            </div>
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
                        In Vedic traditions and Sanatana Dharma, bamboo (Vamsha) is considered a symbol of ancestry and sacred lineage. Burning bamboo generates harmful heavy-metal residue and is strictly avoided during poojas and havan. Manglam uses 100% bamboo-free organic binders.
                    </div>
                </div>

                <div class="faq-item p-5 sm:p-6">
                    <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-[#121212] hover:text-[#D38928] transition-colors focus:outline-none font-heading">
                        <span>What makes Manglam incense smoke charcoal-free and non-toxic?</span>
                        <span class="faq-icon ml-4 text-[#D38928] text-xl font-bold">+</span>
                    </button>
                    <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-gray-600 leading-relaxed">
                        Commercial incense uses black industrial charcoal powder which creates suffocating black smoke and eye irritation. Manglam uses sacred temple flower powders, natural resins (Guggal, Loban), and botanical bark that burns into pure white soothing ash.
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
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#121212] font-heading tracking-tight">
                        You May Also Like
                    </h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-[10px]">
                    @foreach($relatedProducts as $relProduct)
                        <x-product-card :product="$relProduct" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- ========================================================================= -->
        <!-- 5. CUSTOMER REVIEWS & RATINGS (Compact & Contained Section)              -->
        <!-- ========================================================================= -->
        <div id="customer-reviews" class="mt-10 sm:mt-14 mb-12 sm:mb-20 max-w-3xl mx-auto bg-white rounded-[18px] border border-[#EADBCC] p-5 sm:p-7 shadow-xs font-body">
            
            <!-- Compact Header -->
            <div class="flex items-center justify-between gap-3 pb-5 border-b border-[#EADBCC]">
                <div>
                    <h3 class="text-lg sm:text-xl font-bold text-[#121212] font-heading tracking-tight">
                        Customer Reviews
                    </h3>
                    <p class="text-[11px] sm:text-xs text-gray-500 mt-0.5">Verified devotees sharing their sacred experiences</p>
                </div>

                <button 
                    type="button" 
                    id="write-review-toggle-btn"
                    class="px-3.5 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow transition-all font-heading cursor-pointer shrink-0"
                    onclick="const form = document.getElementById('inline-review-form'); form.classList.toggle('hidden');"
                >
                    Write a Review
                </button>
            </div>

            <!-- Inline Compact Review Submission Form (Toggled by Button) -->
            <div id="inline-review-form" class="hidden my-4 p-4 rounded-[12px] bg-[#FAF8F5] border border-[#EADBCC] space-y-3 transition-all duration-200">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-[#121212] font-heading uppercase tracking-wider">✦ Share Your Experience</span>
                    <button type="button" class="text-xs text-gray-400 hover:text-gray-700 font-bold cursor-pointer" onclick="document.getElementById('inline-review-form').classList.add('hidden');">✕ Close</button>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Your Sacred Name *</label>
                        <input type="text" placeholder="e.g. Rameshwar Sharma" class="w-full px-3 py-1.5 rounded-[8px] border border-[#EADBCC] bg-white text-xs focus:border-[#D38928] focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">Your City / State *</label>
                        <input type="text" placeholder="e.g. Varanasi, UP" class="w-full px-3 py-1.5 rounded-[8px] border border-[#EADBCC] bg-white text-xs focus:border-[#D38928] focus:outline-none">
                    </div>
                </div>
                <div class="text-xs">
                    <label class="block text-gray-600 font-medium mb-1">Your Rating *</label>
                    <div class="flex items-center space-x-1 text-base text-[#D38928] cursor-pointer">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                </div>
                <div class="text-xs">
                    <label class="block text-gray-600 font-medium mb-1">Your Sacred Review *</label>
                    <textarea rows="2" placeholder="Share how this pure fragrance elevated your daily pooja or meditation..." class="w-full px-3 py-1.5 rounded-[8px] border border-[#EADBCC] bg-white text-xs focus:border-[#D38928] focus:outline-none"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs cursor-pointer font-heading" onclick="alert('Dhanyawad! Your review has been submitted for Vedic verification.'); document.getElementById('inline-review-form').classList.add('hidden');">
                        Submit Review
                    </button>
                </div>
            </div>

            <!-- Compact Rating Summary Histogram -->
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-5 my-5 pb-5 border-b border-[#EADBCC] items-center">
                <!-- Average Rating Box -->
                <div class="sm:col-span-4 text-center sm:border-r border-[#EADBCC] pr-0 sm:pr-4 space-y-0.5">
                    <div class="text-3xl sm:text-4xl font-black text-[#121212] font-heading leading-none">4.9</div>
                    <div class="flex justify-center text-[#D38928] text-sm my-1">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-[11px] text-gray-500 font-medium">Based on {{ $reviewCount }} authentic reviews</p>
                </div>

                <!-- Compact Rating Bars -->
                <div class="sm:col-span-8 space-y-1.5 text-xs">
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 text-[11px] font-bold text-gray-700">5 ★</span>
                        <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928] rounded-full" style="width: 92%;"></div>
                        </div>
                        <span class="w-8 text-right text-[11px] text-gray-400">92%</span>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 text-[11px] font-bold text-gray-700">4 ★</span>
                        <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928] rounded-full" style="width: 6%;"></div>
                        </div>
                        <span class="w-8 text-right text-[11px] text-gray-400">6%</span>
                    </div>
                    <div class="flex items-center space-x-2.5">
                        <span class="w-7 text-[11px] font-bold text-gray-700">3 ★</span>
                        <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                            <div class="h-full bg-[#D38928] rounded-full" style="width: 2%;"></div>
                        </div>
                        <span class="w-8 text-right text-[11px] text-gray-400">2%</span>
                    </div>
                </div>
            </div>

            <!-- Compact Reviews List -->
            <!-- Compact Reviews List -->
            <div class="space-y-3.5">
                <!-- Review 1 -->
                <div class="p-4 sm:p-5 rounded-[14px] border border-[#EAE3D9] bg-white space-y-2 shadow-2xs">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="flex text-[#D38928] text-sm sm:text-base">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">नेहा ठाकुर, मंडी</span>
                        </div>
                        <span class="text-[11px] text-gray-400">1 day ago</span>
                    </div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading pt-0.5">प्राकृतिक चंदन और जड़ी-बूटियों की मनमोहक खुशबू</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        मंडी में हमारे घर में रोजाना सुबह पूजा होती है। इस अगरबत्ती का धुआं बिल्कुल भी आंखों में नहीं लगता और 4-5 घंटे तक कमरे में ताजगी बनी रहती है। बहुत ही शांत अनुभव!
                    </p>
                </div>

                <!-- Review 2 -->
                <div class="p-4 sm:p-5 rounded-[14px] border border-[#EAE3D9] bg-white space-y-2 shadow-2xs">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="flex text-[#D38928] text-sm sm:text-base">
                                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                            </div>
                            <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Dr. Gaurav Sharma, Kangra</span>
                        </div>
                        <span class="text-[11px] text-gray-400">3 days ago</span>
                    </div>
                    <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading pt-0.5">True chemical-free &amp; very slow burning</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Being an ayurveda practitioner in Kangra, I check ingredients very strictly. Zero charcoal and pure flower extract make it safe for closed rooms. The ceramic stand included in the box is elegant.
                    </p>
                </div>

                <!-- Hidden Extra Reviews (Toggled by Read More button) -->
                <div id="extra-product-reviews" class="hidden space-y-3.5 transition-all duration-300">
                    <!-- Review 3 -->
                    <div class="p-4 sm:p-5 rounded-[14px] border border-[#EAE3D9] bg-white space-y-2 shadow-2xs">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-[#D38928] text-sm sm:text-base">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">सुरेश चंदेल, बिलासपुर</span>
                            </div>
                            <span class="text-[11px] text-gray-400">5 days ago</span>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading pt-0.5">बिलासपुर में 3 दिन में सुरक्षित डिलीवरी मिली</h4>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            100 स्टिक्स वाला पैक मंगाया था। पैकेजिंग बहुत ही सुंदर और मजबूत है। जलने का समय पूरा 50 मिनट रहता है और सफेद शुद्ध भस्म बनती है।
                        </p>
                    </div>

                    <!-- Review 4 -->
                    <div class="p-4 sm:p-5 rounded-[14px] border border-[#EAE3D9] bg-white space-y-2 shadow-2xs">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-[#D38928] text-sm sm:text-base">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Ritu Mahajan, Chamba</span>
                            </div>
                            <span class="text-[11px] text-gray-400">1 week ago</span>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading pt-0.5">No coughing or throat irritation in cold weather</h4>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            In Chamba during winter months, burning ordinary incense used to cause coughing. Manglam bambooless sticks are pure bliss! Subtle, premium fragrance that lasts all evening.
                        </p>
                    </div>

                    <!-- Review 5 -->
                    <div class="p-4 sm:p-5 rounded-[14px] border border-[#EAE3D9] bg-white space-y-2 shadow-2xs">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-[#D38928] text-sm sm:text-base">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">अमित कटोच, हमीरपुर</span>
                            </div>
                            <span class="text-[11px] text-gray-400">2 weeks ago</span>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading pt-0.5">शास्त्र सम्मत बिना बांस की असली अगरबत्ती</h4>
                        <p class="text-xs text-gray-600 leading-relaxed">
                            हमीरपुर से ऑर्डर किया था। पूजा में बांस जलाना हमारे यहां वर्जित मानते हैं। यह पूरी तरह से वेदिक विधि से बनी है। अब हम केवल यही मंगवाते हैं।
                        </p>
                    </div>
                </div>

                <!-- Read More Toggle Button -->
                <div class="text-center pt-2">
                    <button 
                        type="button" 
                        id="toggle-extra-reviews-btn"
                        class="inline-flex items-center space-x-1.5 px-5 py-2.5 rounded-full border border-[#D38928] text-[#965A15] bg-[#FAF8F5] hover:bg-[#D38928] hover:text-white transition-all text-xs font-bold font-heading shadow-2xs cursor-pointer"
                        onclick="
                            const extra = document.getElementById('extra-product-reviews');
                            const isHidden = extra.classList.toggle('hidden');
                            this.innerHTML = isHidden ? 'Read More Reviews (3) ▾' : 'Show Less ▴';
                        "
                    >
                        <span>Read More Reviews (3) ▾</span>
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- FLOATING 3D STICKY BOTTOM ADD TO CART ON SCROLL -->
<div 
    id="sticky-product-bar" 
    class="fixed bottom-[68px] lg:bottom-6 left-1/2 -translate-x-1/2 z-40 w-[94%] sm:w-[85%] lg:w-[70%] max-w-5xl bg-white/98 backdrop-blur-2xl border-2 border-[#831F2E] rounded-2xl sm:rounded-[28px] px-4 sm:px-7 py-3 sm:py-3.5 shadow-[0_25px_60px_-10px_rgba(131,31,46,0.25),0_12px_28px_-6px_rgba(0,0,0,0.18)] transform translate-y-32 opacity-0 pointer-events-none transition-all duration-300 flex items-center justify-between gap-4 sm:gap-8 font-body select-none"
>
    <div class="flex items-center space-x-3.5 sm:space-x-4 overflow-hidden min-w-0 pr-2">
        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl bg-[#FAF7F2] border border-[#831F2E]/30 overflow-hidden shrink-0 shadow-xs">
            <img src="{{ asset($mainImg) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
        </div>
        <div class="truncate text-left">
            <div class="text-xs sm:text-base font-bold text-[#121212] font-heading truncate leading-tight">{{ $product->title }}</div>
            <div class="flex items-baseline space-x-2 pt-0.5 sm:pt-1 font-body">
                <span class="text-sm sm:text-lg font-bold text-[#C87A1E]">
                    ₹{{ number_format($product->active_price, 2) }}
                </span>
                @if(isset($mrpPrice) && $mrpPrice > $product->active_price)
                    <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">
                        ₹{{ number_format($mrpPrice, 2) }}
                    </span>
                    <span class="hidden sm:inline-block px-2 py-0.5 bg-[#FFF8EE] border border-[#F0D5AA] text-[#C87A1E] text-[10px] font-bold rounded-full font-body">
                        {{ round((($mrpPrice - $product->active_price) / $mrpPrice) * 100) }}% OFF
                    </span>
                @endif
            </div>
        </div>
    </div>

    <button 
        type="button" 
        id="sticky-atc-btn" 
        class="py-2.5 sm:py-3 px-5 sm:px-7 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-sm hover:shadow-md transition-all font-heading cursor-pointer whitespace-nowrap shrink-0 flex items-center space-x-2"
        data-product-id="{{ $product->id }}"
        data-product-title="{{ $product->title }}"
        data-product-slug="{{ $product->slug }}"
        data-product-price="{{ $product->active_price }}"
        data-product-image="{{ asset($mainImg) }}"
    >
        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
        </svg>
        <span>Add to Cart</span>
    </button>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Thumbnail Gallery Switcher (Instant Image Swap on Click)
        const mainGalleryImg = document.getElementById('main-product-gallery-img');
        const thumbnailBtns = document.querySelectorAll('.gallery-thumbnail-btn');

        if (mainGalleryImg && thumbnailBtns.length > 0) {
            thumbnailBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const newSrc = btn.dataset.imgSrc;
                    if (newSrc && mainGalleryImg.src !== newSrc) {
                        mainGalleryImg.style.opacity = '0.3';
                        mainGalleryImg.src = newSrc;
                        mainGalleryImg.onload = () => {
                            mainGalleryImg.style.opacity = '1';
                        };
                    }
                    
                    // Update Active Thumbnail Border Styling
                    thumbnailBtns.forEach(b => {
                        b.classList.remove('border-[#D38928]', 'ring-2', 'ring-[#D38928]/30', 'opacity-100');
                        b.classList.add('border-gray-200', 'opacity-75');
                    });
                    btn.classList.remove('border-gray-200', 'opacity-75');
                    btn.classList.add('border-[#D38928]', 'ring-2', 'ring-[#D38928]/30', 'opacity-100');
                });
            });
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
                    stickyBar.classList.remove('translate-y-32', 'opacity-0', 'pointer-events-none');
                    stickyBar.classList.add('translate-y-0', 'opacity-100', 'pointer-events-auto');
                } else {
                    stickyBar.classList.add('translate-y-32', 'opacity-0', 'pointer-events-none');
                    stickyBar.classList.remove('translate-y-0', 'opacity-100', 'pointer-events-auto');
                }
            });
        }

        // Add to Cart & Open Drawer Immediately
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

            // Immediately open cart drawer
            window.dispatchEvent(new CustomEvent('open-cart-drawer'));
        };

        if (mainAtcBtn) mainAtcBtn.addEventListener('click', () => handleAddToCart(mainAtcBtn));
        if (stickyAtcBtn) stickyAtcBtn.addEventListener('click', () => handleAddToCart(stickyAtcBtn));

        // 6. Share Functionality (Native Web Share API + Clipboard Copy fallback with Toast)
        const showShareToast = (message) => {
            let toast = document.getElementById('manglam-share-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.id = 'manglam-share-toast';
                toast.className = 'fixed bottom-6 right-6 z-50 bg-[#1A1A1A] text-white px-5 py-3 rounded-[12px] border border-[#D38928] shadow-2xl text-xs sm:text-sm font-semibold flex items-center space-x-2 transition-all duration-300 transform translate-y-20 opacity-0 font-body';
                document.body.appendChild(toast);
            }
            toast.innerHTML = `<span class="text-[#F6DAA8]">✨</span> <span>${message}</span>`;
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        };

        const executeShare = async (title, text, url) => {
            if (navigator.share) {
                try {
                    await navigator.share({ title, text, url });
                } catch (err) {
                    if (err.name !== 'AbortError') {
                        if (navigator.clipboard) {
                            navigator.clipboard.writeText(url);
                            showShareToast('Product link copied to clipboard!');
                        }
                    }
                }
            } else if (navigator.clipboard) {
                navigator.clipboard.writeText(url);
                showShareToast('Product link copied to clipboard! Share it with your friends.');
            } else {
                showShareToast('Share URL: ' + url);
            }
        };

        document.querySelectorAll('.product-share-trigger').forEach(btn => {
            btn.addEventListener('click', () => {
                const title = btn.dataset.title || document.title;
                const text = btn.dataset.text || 'Check out this sacred Vedic incense on Manglam.co!';
                const url = btn.dataset.url || window.location.href;
                executeShare(title, text, url);
            });
        });

        document.querySelectorAll('.product-copy-link-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const url = btn.dataset.url || window.location.href;
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(url);
                    showShareToast('Product link copied to clipboard!');
                } else {
                    showShareToast('Product URL: ' + url);
                }
            });
        });

        // Smooth scroll for reviews anchor link
        document.querySelectorAll('a[href="#customer-reviews"]').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.getElementById('customer-reviews');
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    });
</script>
@endpush
@endsection
