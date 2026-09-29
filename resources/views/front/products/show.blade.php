@extends('layouts.app')

@section('title', $product->meta_title ?? "{$product->title} — Aaradhna.co™")
@section('meta_description', $product->meta_description ?? ($product->short_description ?? Str::limit(strip_tags($product->description), 150)))

@section('content')
@php
    $isSoldOut = $product->stock_quantity <= 0;
    $hasDiscount = $product->sale_price && ($product->base_price > $product->sale_price);
    $discountPercent = $product->discount_percentage;
    $images = $product->images;
    $primaryImg = $product->primaryImage?->image_path ?? 'assets/images/products/' . $product->slug . '-1.webp';
@endphp

<div class="bg-[#FDFDFC] min-h-screen py-6 lg:py-10">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">

        <!-- Breadcrumbs -->
        <nav class="flex items-center text-xs text-sadhna-muted mb-6 space-x-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-sadhna-primary transition-colors">Home</a>
            <span>/</span>
            @if($product->category)
                <a href="{{ route('collections.show', $product->category->slug) }}" class="hover:text-sadhna-primary transition-colors">
                    {{ $product->category->name }}
                </a>
                <span>/</span>
            @else
                <a href="{{ route('collections.show', 'all') }}" class="hover:text-sadhna-primary transition-colors">Products</a>
                <span>/</span>
            @endif
            <span class="text-sadhna-primary font-bold truncate max-w-xs">{{ $product->title }}</span>
        </nav>

        <!-- Main Product Hero Section (Gallery + Purchase Panel) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start bg-white border border-sadhna-border/80 p-6 sm:p-8 lg:p-10 shadow-sm">
            
            <!-- LEFT COLUMN: Product Image Gallery (7 Cols on desktop) -->
            <div class="lg:col-span-7 flex flex-col md:flex-row-reverse gap-4">
                
                <!-- Main Featured Image with Zoom & Lightbox Trigger -->
                <div class="flex-1 relative aspect-square bg-sadhna-warm-bg/40 border border-sadhna-border overflow-hidden group cursor-crosshair">
                    
                    <!-- Badges -->
                    <div class="absolute top-3.5 left-3.5 z-20 flex flex-col items-start gap-1.5 pointer-events-none">
                        @if($isSoldOut)
                            <span class="px-3 py-1 bg-sadhna-primary text-white text-[11px] font-bold uppercase tracking-wider">
                                Sold Out
                            </span>
                        @elseif($hasDiscount)
                            <span class="px-3 py-1 bg-sadhna-maroon text-white text-[11px] font-bold uppercase tracking-wider shadow-sm">
                                {{ $discountPercent }}% OFF
                            </span>
                        @endif

                        @if($product->is_bestseller && !$isSoldOut)
                            <span class="px-3 py-1 bg-sadhna-gold text-sadhna-primary text-[11px] font-extrabold uppercase tracking-wider">
                                Bestseller
                            </span>
                        @endif
                    </div>

                    <!-- Lightbox Zoom Icon Button -->
                    <button 
                        type="button" 
                        id="open-lightbox-btn" 
                        class="absolute bottom-3.5 right-3.5 z-20 w-10 h-10 bg-white/90 hover:bg-white text-sadhna-primary rounded-[10px] shadow-md flex items-center justify-center transition-all opacity-80 hover:opacity-100 hover:scale-105"
                        title="Click to Zoom Fullscreen"
                    >
                        <svg class="w-5 h-5 text-sadhna-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                        </svg>
                    </button>

                    <!-- Large Interactive Viewport -->
                    <div id="main-image-container" class="w-full h-full flex items-center justify-center p-8 transition-transform duration-300">
                        <div id="main-image-display" class="w-full h-full flex flex-col items-center justify-center text-sadhna-gold transition-transform duration-300">
                            <!-- Hero Vector Presentation -->
                            <svg class="w-48 h-48 stroke-[1.1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                @if(str_contains($product->slug, 'havan'))
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343a7.975 7.975 0 012.344 5.657c0 2.122-.843 4.156-2.343 5.657z"/>
                                @elseif(str_contains($product->slug, 'attar'))
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                @elseif(str_contains($product->slug, 'cones'))
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                @else
                                    <circle cx="12" cy="12" r="8"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12"/>
                                @endif
                            </svg>
                            <span class="mt-4 text-xs font-bold tracking-widest uppercase text-sadhna-maroon font-heading">
                                100% PURE SACRED VEDIC FORMULA
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Thumbnails Gallery (Left on desktop, Bottom on mobile) -->
                <div class="flex md:flex-col gap-3 overflow-x-auto md:overflow-y-auto md:w-20 lg:w-24 shrink-0 pb-2 md:pb-0 scrollbar-none">
                    @php
                        $thumbList = $images->count() > 0 ? $images : [
                            (object)['image_path' => 'thumb-1', 'alt_text' => 'Main Pack Image'],
                            (object)['image_path' => 'thumb-2', 'alt_text' => 'Burn Test & Smoke'],
                            (object)['image_path' => 'thumb-3', 'alt_text' => 'Sacred Ingredients'],
                            (object)['image_path' => 'thumb-4', 'alt_text' => 'Pooja Vidhi Guide']
                        ];
                    @endphp

                    @foreach($thumbList as $idx => $img)
                        <button 
                            type="button" 
                            class="thumb-btn relative aspect-square w-16 md:w-full bg-sadhna-warm-bg/60 border {{ $idx === 0 ? 'border-sadhna-gold ring-1 ring-sadhna-gold' : 'border-sadhna-border hover:border-sadhna-gold/50' }} p-1 flex items-center justify-center transition-all focus:outline-none"
                            data-index="{{ $idx }}"
                            data-label="Perspective {{ $idx + 1 }}"
                        >
                            <div class="text-[10px] font-bold text-sadhna-muted font-heading uppercase text-center">
                                View {{ $idx + 1 }}
                            </div>
                        </button>
                    @endforeach
                </div>

            </div>

            <!-- RIGHT COLUMN: Purchase Details & Action Selectors (5 Cols on desktop) -->
            <div class="lg:col-span-5 flex flex-col space-y-6">
                
                <!-- Category & SKU -->
                <div class="flex items-center justify-between text-xs text-sadhna-muted">
                    <span class="font-bold uppercase tracking-widest text-sadhna-maroon font-heading">
                        {{ $product->category?->name ?? 'Sacred Samagri' }}
                    </span>
                    <span class="font-mono text-[11px]">SKU: <strong id="product-sku" class="text-sadhna-primary">{{ $defaultVariant?->sku ?? $product->sku ?? 'SADH-001' }}</strong></span>
                </div>

                <!-- Main Title & Vedic Subtitle -->
                <div>
                    <h1 class="text-2xl sm:text-3xl font-extrabold text-sadhna-primary font-heading tracking-tight leading-snug">
                        {{ $product->title }}
                    </h1>
                    
                    @if($product->short_description)
                        <p class="text-xs sm:text-sm text-sadhna-maroon font-semibold mt-1 font-heading">
                            {{ $product->short_description }}
                        </p>
                    @endif
                </div>

                <!-- Star Rating & Review Link -->
                <div class="flex items-center space-x-3 pb-3 border-b border-sadhna-border/60">
                    <div class="flex text-sadhna-gold text-sm">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <a href="#customer-reviews" class="text-xs font-semibold text-sadhna-primary underline hover:text-sadhna-gold transition-colors">
                        {{ $avgRating }} ({{ $totalReviews }} {{ Str::plural('review', $totalReviews) }})
                    </a>
                    <span class="text-sadhna-border">|</span>
                    <span class="text-xs text-green-700 font-bold flex items-center">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        100% Bamboo-Free & Pure
                    </span>
                </div>

                <!-- Pricing Display -->
                <div class="flex items-baseline space-x-3">
                    <span id="display-sale-price" class="text-2xl sm:text-3xl font-extrabold text-sadhna-primary font-heading">
                        ₹{{ number_format($defaultVariant?->price ?? $product->active_price, 2) }}
                    </span>

                    <span id="display-compare-price" class="text-sm sm:text-base text-sadhna-muted line-through {{ ($defaultVariant?->compare_at_price ?? $product->base_price) > ($defaultVariant?->price ?? $product->active_price) ? '' : 'hidden' }}">
                        ₹{{ number_format($defaultVariant?->compare_at_price ?? $product->base_price, 2) }}
                    </span>

                    <span id="display-discount-badge" class="px-2 py-0.5 bg-sadhna-maroon text-white text-xs font-bold uppercase tracking-wider {{ $hasDiscount ? '' : 'hidden' }}">
                        Save <span id="discount-percent-val">{{ $discountPercent }}</span>%
                    </span>
                </div>
                <p class="text-[11px] text-sadhna-muted -mt-4">
                    Inclusive of all taxes. Free shipping on orders above ₹499.
                </p>

                <!-- Variant / Pack Size Selector -->
                @if($product->variants->count() > 0)
                    <div class="space-y-3 pt-2">
                        <div class="flex items-center justify-between">
                            <label class="text-xs font-bold uppercase tracking-wider text-sadhna-primary font-heading">
                                Pack Size / Option: <span id="selected-variant-title" class="text-sadhna-maroon font-semibold">{{ $defaultVariant?->title }}</span>
                            </label>
                            <span id="variant-stock-status" class="text-[11px] font-bold text-green-700">
                                In Stock
                            </span>
                        </div>

                        <div class="flex flex-wrap gap-2.5" id="variant-selector-group">
                            @foreach($product->variants as $variant)
                                <button 
                                    type="button"
                                    class="variant-pill-btn px-4 py-2 border text-xs font-bold transition-all duration-150 {{ ($defaultVariant && $defaultVariant->id === $variant->id) ? 'border-sadhna-gold bg-sadhna-warm-bg text-sadhna-primary ring-1 ring-sadhna-gold' : 'border-sadhna-border bg-white text-sadhna-muted hover:border-sadhna-primary/40' }}"
                                    data-variant-id="{{ $variant->id }}"
                                    data-title="{{ $variant->title }}"
                                    data-price="{{ $variant->price }}"
                                    data-compare-price="{{ $variant->compare_at_price ?? 0 }}"
                                    data-sku="{{ $variant->sku ?? $product->sku }}"
                                    data-stock="{{ $variant->stock_quantity }}"
                                >
                                    {{ $variant->title }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Quantity Selector & Actions -->
                <div class="space-y-3 pt-2">
                    <label class="text-xs font-bold uppercase tracking-wider text-sadhna-primary font-heading">
                        Quantity
                    </label>
                    <div class="flex items-stretch space-x-3">
                        <!-- Stepper -->
                        <div class="flex items-center border border-sadhna-border bg-white">
                            <button type="button" id="qty-decrement" class="px-3.5 py-2.5 text-sadhna-muted hover:text-sadhna-primary transition-colors focus:outline-none font-bold text-sm">
                                −
                            </button>
                            <input 
                                type="number" 
                                id="product-quantity" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="99" 
                                class="w-12 text-center text-xs font-bold border-none focus:ring-0 p-0 text-sadhna-primary"
                            >
                            <button type="button" id="qty-increment" class="px-3.5 py-2.5 text-sadhna-muted hover:text-sadhna-primary transition-colors focus:outline-none font-bold text-sm">
                                +
                            </button>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="flex-1" id="main-atc-wrapper">
                            @if($isSoldOut)
                                <button 
                                    type="button" 
                                    disabled 
                                    class="w-full h-full py-3.5 px-6 bg-gray-200 border border-gray-300 text-gray-400 text-xs font-bold uppercase tracking-wider cursor-not-allowed text-center"
                                >
                                    Sold Out
                                </button>
                            @else
                                <button 
                                    type="button"
                                    id="main-add-to-cart-btn"
                                    class="w-full h-full py-3.5 px-6 bg-sadhna-primary hover:bg-sadhna-gold text-white text-xs font-bold uppercase tracking-widest transition-all duration-200 text-center flex items-center justify-center space-x-2 shadow-sm focus:outline-none"
                                    data-product-id="{{ $product->id }}"
                                    data-product-title="{{ $product->title }}"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                    <span>Add to Cart</span>
                                </button>
                            @endif
                        </div>
                    </div>

                    <!-- Buy Now Direct Action Button -->
                    @if(!$isSoldOut)
                        <button 
                            type="button"
                            id="main-buy-now-btn"
                            class="w-full py-3.5 px-6 bg-sadhna-gold hover:bg-amber-600 text-sadhna-primary hover:text-white text-xs font-bold uppercase tracking-widest transition-all duration-200 text-center flex items-center justify-center space-x-2 font-heading shadow-sm"
                        >
                            <span>Buy It Now ➔</span>
                        </button>
                    @endif
                </div>

                <!-- Bundle Offers Box -->
                <div class="bg-sadhna-warm-bg border border-sadhna-gold/40 p-4 space-y-2 rounded-none">
                    <div class="flex items-center text-xs font-bold uppercase tracking-wider text-sadhna-primary font-heading">
                        <span class="w-2 h-2 bg-sadhna-maroon rounded-[10px] mr-2"></span>
                        Special Temple Multi-Buy Offers
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                        <div class="p-2.5 bg-white border border-sadhna-border/80 flex items-center justify-between">
                            <span>Buy 2 Packs</span>
                            <strong class="text-sadhna-maroon">Get 10% Off</strong>
                        </div>
                        <div class="p-2.5 bg-white border border-sadhna-border/80 flex items-center justify-between">
                            <span>Buy 4+ Packs</span>
                            <strong class="text-sadhna-maroon">Get 20% Off</strong>
                        </div>
                    </div>
                </div>

                <!-- Free Gift Highlight -->
                <div class="flex items-center p-3.5 bg-amber-50/70 border border-amber-200 text-xs text-amber-900 space-x-3">
                    <div class="p-2 bg-amber-100 rounded-[10px] text-amber-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                    </div>
                    <div>
                        <strong class="block font-bold">Complimentary Sacred Ceramic Stand Included</strong>
                        <span class="text-[11px] text-amber-800/80">Every pack comes with an artisanal terracotta Agarbatti stand for safe burning.</span>
                    </div>
                </div>

                <!-- Trust Guarantee Icons -->
                <div class="grid grid-cols-3 gap-2 pt-2 border-t border-sadhna-border/60 text-center text-[11px] text-sadhna-muted">
                    <div class="flex flex-col items-center p-2">
                        <svg class="w-5 h-5 text-sadhna-gold mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span class="font-bold text-sadhna-primary">0% Bamboo</span>
                        <span>Safe For Health</span>
                    </div>
                    <div class="flex flex-col items-center p-2">
                        <svg class="w-5 h-5 text-sadhna-gold mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                        <span class="font-bold text-sadhna-primary">Zero Charcoal</span>
                        <span>Non-Toxic White Ash</span>
                    </div>
                    <div class="flex flex-col items-center p-2">
                        <svg class="w-5 h-5 text-sadhna-gold mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-bold text-sadhna-primary">Fast Dispatch</span>
                        <span>Direct to Doorstep</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- PRODUCT SPECIFICATIONS & VEDIC VIDHI TABS / ACCORDIONS -->
        <div class="mt-12 bg-white border border-sadhna-border/80 p-6 sm:p-10 shadow-sm space-y-8">
            
            <div class="border-b border-sadhna-border pb-4">
                <h2 class="text-xl sm:text-2xl font-extrabold text-sadhna-primary font-heading uppercase tracking-wide flex items-center">
                    <span class="text-sadhna-gold mr-3">✦</span> Product Details & Sacred Vidhi
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Description & Sacred Ingredients -->
                <div class="md:col-span-2 space-y-6 text-sm text-sadhna-primary leading-relaxed">
                    <div>
                        <h3 class="text-base font-bold font-heading text-sadhna-maroon mb-2">Sacred Vedic Formulation</h3>
                        <p class="text-sadhna-muted leading-relaxed">
                            {!! nl2br(e($product->description)) !!}
                        </p>
                    </div>

                    @if($product->benefits)
                        <div class="pt-4 border-t border-sadhna-border/60">
                            <h3 class="text-base font-bold font-heading text-sadhna-primary mb-3">Spiritual & Health Benefits</h3>
                            <div class="prose prose-sm text-sadhna-muted">
                                {!! nl2br(e($product->benefits)) !!}
                            </div>
                        </div>
                    @endif
                </div>

                <!-- How to Use / Vidhi & Specifications Sidebar -->
                <div class="space-y-6 bg-sadhna-warm-bg/60 p-6 border border-sadhna-border">
                    <div>
                        <h3 class="text-xs font-bold uppercase tracking-widest text-sadhna-maroon font-heading mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            How to Use (विधि)
                        </h3>
                        <p class="text-xs text-sadhna-muted leading-relaxed">
                            {{ $product->how_to_use ?? 'Light the tip of the incense stick or cup until a small flame catches. Gently blow out the flame leaving a glowing sacred amber. Place in the provided ceramic holder and allow the purifying sacred aroma to sanctify your surroundings.' }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-sadhna-border/60">
                        <h3 class="text-xs font-bold uppercase tracking-widest text-sadhna-primary font-heading mb-3">
                            Specifications
                        </h3>
                        <ul class="text-xs space-y-2 text-sadhna-muted">
                            <li class="flex justify-between">
                                <span>Burn Time:</span>
                                <strong class="text-sadhna-primary">{{ $product->burn_time ?? '45 to 50 Minutes' }}</strong>
                            </li>
                            <li class="flex justify-between">
                                <span>Bamboo Content:</span>
                                <strong class="text-sadhna-primary">0% (Completely Bamboo Free)</strong>
                            </li>
                            <li class="flex justify-between">
                                <span>Charcoal:</span>
                                <strong class="text-sadhna-primary">0% (No Black Toxic Smoke)</strong>
                            </li>
                            <li class="flex justify-between">
                                <span>Origin:</span>
                                <strong class="text-sadhna-primary">Vrindavan & Haridwar, India</strong>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

        <!-- FREQUENTLY ASKED QUESTIONS ACCORDION -->
        @if($product->faqs->count() > 0)
            <div class="mt-12 bg-white border border-sadhna-border/80 p-6 sm:p-10 shadow-sm">
                <div class="border-b border-sadhna-border pb-4 mb-6">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-sadhna-primary font-heading uppercase tracking-wide">
                        Frequently Asked Questions
                    </h2>
                </div>

                <div class="divide-y divide-sadhna-border/70">
                    @foreach($product->faqs as $faq)
                        <div class="faq-item py-4">
                            <button type="button" class="faq-toggle flex justify-between items-center w-full text-left font-bold text-sm sm:text-base text-sadhna-primary hover:text-sadhna-gold transition-colors focus:outline-none">
                                <span>{{ $faq->question }}</span>
                                <span class="faq-icon ml-4 text-sadhna-gold text-lg font-bold">+</span>
                            </button>
                            <div class="faq-answer hidden mt-3 text-xs sm:text-sm text-sadhna-muted leading-relaxed">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- CUSTOMER REVIEWS & RATINGS SECTION -->
        <div id="customer-reviews" class="mt-12 bg-white border border-sadhna-border/80 p-6 sm:p-10 shadow-sm scroll-mt-20">
            
            <div class="border-b border-sadhna-border pb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl font-extrabold text-sadhna-primary font-heading uppercase tracking-wide">
                        Customer Reviews
                    </h2>
                    <p class="text-xs text-sadhna-muted mt-1">Verified devotees sharing their authentic experience</p>
                </div>

                <button 
                    type="button" 
                    id="write-review-btn" 
                    class="px-5 py-2.5 bg-sadhna-primary hover:bg-sadhna-gold text-white text-xs font-bold uppercase tracking-wider transition-colors"
                >
                    Write a Review
                </button>
            </div>

            <!-- Review Summary Histogram -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 my-8 pb-8 border-b border-sadhna-border/60 items-center">
                <!-- Average Rating Box -->
                <div class="md:col-span-4 text-center md:border-r border-sadhna-border/60 pr-0 md:pr-6">
                    <div class="text-5xl font-extrabold text-sadhna-primary font-heading">{{ $avgRating }}</div>
                    <div class="flex justify-center text-sadhna-gold text-base my-2">
                        <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                    </div>
                    <p class="text-xs text-sadhna-muted">Based on {{ $totalReviews }} reviews</p>
                </div>

                <!-- Rating Bars -->
                <div class="md:col-span-8 space-y-2 text-xs">
                    @for($stars = 5; $stars >= 1; $stars--)
                        @php
                            $cnt = $ratingCounts[$stars] ?? 0;
                            $pct = $totalReviews > 0 ? round(($cnt / $totalReviews) * 100) : ($stars === 5 ? 100 : 0);
                        @endphp
                        <div class="flex items-center space-x-3">
                            <span class="w-12 text-sadhna-primary font-bold">{{ $stars }} ★</span>
                            <div class="flex-1 h-2.5 bg-sadhna-warm-bg rounded-none overflow-hidden">
                                <div class="h-full bg-sadhna-gold" style="width: {{ $pct }}%;"></div>
                            </div>
                            <span class="w-10 text-right text-sadhna-muted">{{ $cnt }}</span>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Reviews List -->
            <div class="space-y-6">
                @forelse($product->approvedReviews as $review)
                    <div class="p-5 bg-sadhna-warm-bg/40 border border-sadhna-border/60 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-sadhna-gold text-xs">
                                    @for($i = 0; $i < $review->rating; $i++)
                                        <span>★</span>
                                    @endfor
                                </div>
                                <span class="text-xs font-bold text-sadhna-primary">{{ $review->author_name ?? $review->reviewer_name ?? 'Devotee' }}</span>
                                <span class="px-2 py-0.5 bg-green-100 text-green-800 text-[10px] font-bold rounded-none">Verified Buyer</span>
                            </div>
                            <span class="text-[11px] text-sadhna-muted">{{ $review->created_at->format('M d, Y') }}</span>
                        </div>

                        @if($review->title)
                            <h4 class="text-xs sm:text-sm font-bold text-sadhna-primary font-heading">{{ $review->title }}</h4>
                        @endif

                        <p class="text-xs text-sadhna-muted leading-relaxed">
                            {{ $review->body ?? $review->review_text ?? $review->content }}
                        </p>
                    </div>
                @empty
                    <!-- Default Seed Review if none yet in DB -->
                    <div class="p-5 bg-sadhna-warm-bg/40 border border-sadhna-border/60 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="flex text-sadhna-gold text-xs">
                                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                                </div>
                                <span class="text-xs font-bold text-sadhna-primary">Rameshwar Sharma</span>
                                <span class="px-2 py-0.5 bg-green-100 text-green-800 text-[10px] font-bold rounded-none">Verified Buyer</span>
                            </div>
                            <span class="text-[11px] text-sadhna-muted">Yesterday</span>
                        </div>
                        <h4 class="text-xs sm:text-sm font-bold text-sadhna-primary font-heading">Pure Vedic Fragrance & Zero Eye Irritation</h4>
                        <p class="text-xs text-sadhna-muted leading-relaxed">
                            Truly bambooless and pure! Most agarbatti sticks produce black toxic smoke that hurts the eyes, but this creates a serene temple atmosphere at home. The aroma lingers for hours after our morning Sandhya pooja.
                        </p>
                    </div>
                @endforelse
            </div>

        </div>

        <!-- RELATED PRODUCTS SECTION -->
        @if($relatedProducts->count() > 0)
            <div class="mt-16">
                <div class="text-center max-w-xl mx-auto mb-8 space-y-2">
                    <span class="text-xs font-extrabold uppercase tracking-widest text-sadhna-maroon font-heading">
                        Complement Your Sacred Rituals
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-sadhna-primary font-heading tracking-tight">
                        You May Also Like
                    </h2>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
                    @foreach($relatedProducts as $relProduct)
                        <x-product-card :product="$relProduct" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

<!-- STICKY MOBILE ADD TO CART BAR -->
<div 
    id="sticky-mobile-atc" 
    class="fixed bottom-0 inset-x-0 z-40 bg-white border-t border-sadhna-border p-3 shadow-lg transform translate-y-full transition-transform duration-300 md:hidden flex items-center justify-between gap-3"
>
    <div class="flex items-center space-x-3 overflow-hidden">
        <div class="w-10 h-10 bg-sadhna-warm-bg flex-shrink-0 flex items-center justify-center text-sadhna-gold border border-sadhna-border/60">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/></svg>
        </div>
        <div class="truncate">
            <div class="text-xs font-bold text-sadhna-primary truncate">{{ $product->title }}</div>
            <div class="text-xs font-extrabold text-sadhna-primary font-heading" id="sticky-price-val">
                ₹{{ number_format($defaultVariant?->price ?? $product->active_price, 2) }}
            </div>
        </div>
    </div>

    @if($isSoldOut)
        <button type="button" disabled class="px-5 py-2.5 bg-gray-200 text-gray-400 text-xs font-bold uppercase tracking-wider">
            Sold Out
        </button>
    @else
        <button 
            type="button" 
            id="sticky-atc-btn" 
            class="px-5 py-2.5 bg-sadhna-primary hover:bg-sadhna-gold text-white text-xs font-bold uppercase tracking-wider whitespace-nowrap shadow-sm"
            data-product-id="{{ $product->id }}"
        >
            Add to Cart
        </button>
    @endif
</div>

<!-- FULLSCREEN LIGHTBOX MODAL -->
<div 
    id="lightbox-modal" 
    class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-4 opacity-0 pointer-events-none transition-opacity duration-300"
    aria-hidden="true"
>
    <button type="button" id="lightbox-close-btn" class="absolute top-6 right-6 text-white hover:text-sadhna-gold p-2">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    
    <div class="max-w-2xl max-h-[85vh] text-center p-8 text-sadhna-gold flex flex-col items-center justify-center">
        <svg class="w-64 h-64 stroke-[1.1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="8"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12M6 12h12"/>
        </svg>
        <h3 class="text-lg font-bold text-white font-heading mt-6">{{ $product->title }}</h3>
        <p class="text-xs text-sadhna-light-gold mt-1">100% Bamboo-Free Vedic Agarbatti Pure Sacred Elements</p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Variant Switching Logic
        const variantButtons = document.querySelectorAll('.variant-pill-btn');
        const displaySalePrice = document.getElementById('display-sale-price');
        const displayComparePrice = document.getElementById('display-compare-price');
        const displayDiscountBadge = document.getElementById('display-discount-badge');
        const discountPercentVal = document.getElementById('discount-percent-val');
        const selectedVariantTitle = document.getElementById('selected-variant-title');
        const productSku = document.getElementById('product-sku');
        const stickyPriceVal = document.getElementById('sticky-price-val');
        const variantStockStatus = document.getElementById('variant-stock-status');

        variantButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active classes
                variantButtons.forEach(b => {
                    b.classList.remove('border-sadhna-gold', 'bg-sadhna-warm-bg', 'text-sadhna-primary', 'ring-1', 'ring-sadhna-gold');
                    b.classList.add('border-sadhna-border', 'bg-white', 'text-sadhna-muted');
                });

                // Set active class
                btn.classList.add('border-sadhna-gold', 'bg-sadhna-warm-bg', 'text-sadhna-primary', 'ring-1', 'ring-sadhna-gold');
                btn.classList.remove('border-sadhna-border', 'bg-white', 'text-sadhna-muted');

                // Read dataset
                const price = parseFloat(btn.dataset.price);
                const comparePrice = parseFloat(btn.dataset.comparePrice);
                const title = btn.dataset.title;
                const sku = btn.dataset.sku;
                const stock = parseInt(btn.dataset.stock);

                // Update DOM
                if (selectedVariantTitle) selectedVariantTitle.textContent = title;
                if (productSku) productSku.textContent = sku;
                if (displaySalePrice) displaySalePrice.textContent = '₹' + price.toFixed(2);
                if (stickyPriceVal) stickyPriceVal.textContent = '₹' + price.toFixed(2);

                if (comparePrice > price) {
                    if (displayComparePrice) {
                        displayComparePrice.textContent = '₹' + comparePrice.toFixed(2);
                        displayComparePrice.classList.remove('hidden');
                    }
                    const discount = Math.round(((comparePrice - price) / comparePrice) * 100);
                    if (discountPercentVal) discountPercentVal.textContent = discount;
                    if (displayDiscountBadge) displayDiscountBadge.classList.remove('hidden');
                } else {
                    if (displayComparePrice) displayComparePrice.classList.add('hidden');
                    if (displayDiscountBadge) displayDiscountBadge.classList.add('hidden');
                }

                if (variantStockStatus) {
                    if (stock <= 0) {
                        variantStockStatus.textContent = 'Sold Out';
                        variantStockStatus.className = 'text-[11px] font-bold text-red-600';
                    } else {
                        variantStockStatus.textContent = 'In Stock';
                        variantStockStatus.className = 'text-[11px] font-bold text-green-700';
                    }
                }
            });
        });

        // 2. Thumbnail Switcher
        const thumbButtons = document.querySelectorAll('.thumb-btn');
        thumbButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                thumbButtons.forEach(b => {
                    b.classList.remove('border-sadhna-gold', 'ring-1', 'ring-sadhna-gold');
                    b.classList.add('border-sadhna-border');
                });
                btn.classList.add('border-sadhna-gold', 'ring-1', 'ring-sadhna-gold');
                btn.classList.remove('border-sadhna-border');
            });
        });

        // 3. Quantity Stepper
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

        // 4. Lightbox Modal
        const openLightboxBtn = document.getElementById('open-lightbox-btn');
        const lightboxModal = document.getElementById('lightbox-modal');
        const lightboxCloseBtn = document.getElementById('lightbox-close-btn');

        if (openLightboxBtn && lightboxModal) {
            openLightboxBtn.addEventListener('click', () => {
                lightboxModal.classList.remove('opacity-0', 'pointer-events-none');
                lightboxModal.classList.add('opacity-100');
                document.body.classList.add('overflow-hidden');
            });

            const closeLightbox = () => {
                lightboxModal.classList.add('opacity-0', 'pointer-events-none');
                lightboxModal.classList.remove('opacity-100');
                document.body.classList.remove('overflow-hidden');
            };

            if (lightboxCloseBtn) lightboxCloseBtn.addEventListener('click', closeLightbox);
            lightboxModal.addEventListener('click', (e) => {
                if (e.target === lightboxModal) closeLightbox();
            });
        }

        // 5. FAQ Accordion Toggle
        const faqToggles = document.querySelectorAll('.faq-toggle');
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const answer = toggle.nextElementSibling;
                const icon = toggle.querySelector('.faq-icon');
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

        // 6. Sticky Mobile Add to Cart trigger on scroll
        const stickyMobileAtc = document.getElementById('sticky-mobile-atc');
        const mainAtcWrapper = document.getElementById('main-atc-wrapper');

        if (stickyMobileAtc && mainAtcWrapper) {
            window.addEventListener('scroll', () => {
                const rect = mainAtcWrapper.getBoundingClientRect();
                if (rect.bottom < 0) {
                    stickyMobileAtc.classList.remove('translate-y-full');
                } else {
                    stickyMobileAtc.classList.add('translate-y-full');
                }
            });
        }

        // 7. Add to Cart Handlers
        const mainAtcBtn = document.getElementById('main-add-to-cart-btn');
        const stickyAtcBtn = document.getElementById('sticky-atc-btn');
        const handleAddToCart = (btn) => {
            const qty = parseInt(qtyInput?.value || '1');
            const badge = document.getElementById('header-cart-badge');
            if (badge) {
                const currentCount = parseInt(badge.textContent || '0') + qty;
                window.dispatchEvent(new CustomEvent('cart:updated', { detail: { count: currentCount } }));
            }

            const originalContent = btn.innerHTML;
            btn.innerHTML = '<span>Added to Cart ✓</span>';
            btn.classList.add('bg-green-700');
            setTimeout(() => {
                btn.innerHTML = originalContent;
                btn.classList.remove('bg-green-700');
            }, 1500);
        };

        if (mainAtcBtn) mainAtcBtn.addEventListener('click', () => handleAddToCart(mainAtcBtn));
        if (stickyAtcBtn) stickyAtcBtn.addEventListener('click', () => handleAddToCart(stickyAtcBtn));
    });
</script>
@endpush
