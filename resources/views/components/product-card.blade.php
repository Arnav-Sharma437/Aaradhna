@props(['product'])

@php
    $imageMap = [
        'devi-refill-pack' => 'assets/images/devi-refill-pack-card.jpg',
        'camphor-bambooless-incense-sticks' => 'assets/images/camphor-refill-pack-card.jpg',
        'oudh-bambooless-incense-sticks' => 'assets/images/oudh-pack-card.jpg',
        'sandalwood-havan-cup' => 'assets/images/chandan-cones-card.jpg',
        'kesar-chandan-dhoop-cones' => 'assets/images/chandan-cones-card.jpg',
        'guggal-loban-havan-cup' => 'assets/images/havan-cup.jpg',
        'sandalwood-bambooless-incense-sticks' => 'assets/images/incense-pack.jpg',
        'rose-bambooless-incense-sticks' => 'assets/images/incense-pack.jpg',
        'chandan-attar-spray' => 'assets/images/attar-spray.jpg',
        'trial-pack-combo' => 'assets/images/devi-refill-pack-card.jpg',
    ];

    $imageSrc = $imageMap[$product->slug] ?? 'assets/images/devi-refill-pack-card.jpg';
    $isSoldOut = $product->stock_quantity <= 0;
    
    // Top border pill badges
    $topBadges = [
        'devi-refill-pack' => '✨ FESTIVE ✨',
        'camphor-bambooless-incense-sticks' => 'TOP PICKS',
        'oudh-bambooless-incense-sticks' => "FOUNDER'S FAVORITE",
        'sandalwood-havan-cup' => 'TOP PICKS',
        'kesar-chandan-dhoop-cones' => 'TOP PICKS',
    ];
    $topBadge = $topBadges[$product->slug] ?? ($product->is_bestseller ? 'TOP PICKS' : 'SACRED VEDIC');

    // Pack labels
    $packCount = str_contains($product->slug, 'refill') ? '100' : (str_contains($product->slug, 'havan') ? '12' : '40');
    $packUnit = str_contains($product->slug, 'havan') ? 'cups' : (str_contains($product->slug, 'cones') ? 'cones' : 'sticks');
    $packColor = str_contains($product->slug, 'devi') ? 'text-[#8B2626]' : (str_contains($product->slug, 'oudh') ? 'text-[#7A3A22]' : 'text-[#3E2D22]');

    $reviewCount = $product->approvedReviews->count() ?: (200 + (abs(crc32($product->slug)) % 90));
    $mrpPrice = $product->base_price > $product->active_price ? $product->base_price : ($product->active_price * 1.4);
@endphp

<div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
    
    <!-- Overlapping Top Border Pill Badge (Exact Screenshot) -->
    <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
        <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
            {{ $topBadge }}
        </span>
    </div>

    <!-- Product Image Box -->
    <div class="p-3.5 pb-0">
        <div class="relative w-full aspect-square rounded-[16px] overflow-hidden bg-[#FAF7F2]">
            <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full">
                <img 
                    src="{{ asset($imageSrc) }}" 
                    alt="{{ $product->title }}" 
                    class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out"
                >
            </a>

            <!-- Top Right Pack Info (Exact Screenshot Style) -->
            <div class="absolute top-3 right-3 text-right pointer-events-none select-none leading-none">
                <span class="text-[10px] uppercase font-semibold text-gray-500 block">pack of</span>
                <span class="text-xl sm:text-2xl font-black font-heading {{ $packColor }} block my-0.5">{{ $packCount }}</span>
                <span class="text-[10px] uppercase font-semibold text-gray-500 block">{{ $packUnit }}</span>
            </div>

            <!-- Free Ceramic Stand Banner for Devi / Specials -->
            @if(str_contains($product->slug, 'devi'))
                <div class="absolute bottom-2 left-2 right-2 bg-black/40 backdrop-blur-xs py-1 px-2 rounded-[6px] text-center text-white text-[10px] sm:text-[11px] font-bold tracking-wider">
                    FREE CERAMIC STAND <span class="text-[#F6DAA8] font-normal">Worth ₹150/-</span>
                </div>
            @endif

            <!-- Wishlist Floating Button -->
            <button 
                type="button" 
                class="wishlist-toggle-btn absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 focus:outline-none"
                data-product-id="{{ $product->id }}"
                data-product-title="{{ $product->title }}"
                data-product-slug="{{ $product->slug }}"
                data-product-price="{{ $product->active_price }}"
                data-product-image="{{ asset($imageSrc) }}"
                aria-label="Save to Wishlist"
            >
                <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Product Details Content (Larger Fonts & Hierarchy) -->
    <div class="p-5 pt-4 flex flex-col justify-between flex-grow space-y-3.5">
        
        <div class="space-y-1.5">
            <!-- Title -->
            <h3 class="text-base sm:text-lg font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->title }}
                </a>
            </h3>

            <!-- Reviews Rating -->
            <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                <div class="flex">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <span class="text-[11px] text-gray-500 font-medium">({{ $reviewCount }} reviews)</span>
            </div>
        </div>

        <div>
            <!-- Price Block -->
            <div class="flex items-baseline space-x-2 pt-1 pb-3.5">
                <span class="text-xs sm:text-sm text-gray-400 line-through">
                    ₹{{ number_format($mrpPrice, 2) }}
                </span>
                <span class="text-lg sm:text-xl font-black font-heading text-[#C87A1E]">
                    ₹{{ number_format($product->active_price, 2) }}
                </span>
            </div>

            <!-- Add to Cart CTA Button -->
            <div>
                @if($isSoldOut)
                    <button 
                        type="button" 
                        disabled 
                        class="w-full py-3 px-4 bg-gray-200 text-gray-400 text-xs sm:text-sm font-semibold rounded-[10px] cursor-not-allowed text-center font-heading"
                    >
                        Sold Out
                    </button>
                @else
                    <button 
                        type="button"
                        class="quick-add-to-cart-btn w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-semibold rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-2 font-heading cursor-pointer focus:outline-none"
                        data-product-id="{{ $product->id }}"
                        data-product-title="{{ $product->title }}"
                        data-product-slug="{{ $product->slug }}"
                        data-product-price="{{ $product->active_price }}"
                        data-product-image="{{ asset($imageSrc) }}"
                    >
                        <span>Add to cart</span>
                    </button>
                @endif
            </div>
        </div>

    </div>

</div>
