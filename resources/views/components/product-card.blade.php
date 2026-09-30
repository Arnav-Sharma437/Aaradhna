@props(['product'])

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

    $hoverImageMap = [
        // Bambooless products -> single stick / lifestyle hover
        'kesar-chandan' => 'assets/images/single-bambooless-stick.jpg',
        'gulab' => 'assets/images/single-bambooless-stick.jpg',
        'naagchampa' => 'assets/images/single-bambooless-stick.jpg',
        'chandan' => 'assets/images/single-bambooless-stick.jpg',
        'havan-bambooless' => 'assets/images/single-bambooless-stick.jpg',
        'oudh' => 'assets/images/single-bambooless-stick.jpg',
        'mongra' => 'assets/images/single-bambooless-stick.jpg',
        'bambooless-2-combo-pack' => 'assets/images/single-bambooless-stick.jpg',
        'bambooless-3-combo-pack' => 'assets/images/single-bambooless-stick.jpg',

        // Havan Cups products -> single havan cup hover
        'google-dhoop' => 'assets/images/single-havan-cup.jpg',
        'loban' => 'assets/images/single-havan-cup.jpg',
        'havan-cup' => 'assets/images/single-havan-cup.jpg',
        'havan-cups-2-combo-pack' => 'assets/images/single-havan-cup.jpg',
        'havan-cups-3-combo-pack' => 'assets/images/single-havan-cup.jpg',

        // Dhoop Cones products -> single dhoop cone hover
        'rooh-rose' => 'assets/images/single-dhoop-cone.jpg',
        'jasmine' => 'assets/images/single-dhoop-cone.jpg',
        'sandalwood-dhoop-cones' => 'assets/images/single-dhoop-cone.jpg',
        'forest-wood' => 'assets/images/single-dhoop-cone.jpg',
        'lavender' => 'assets/images/single-dhoop-cone.jpg',
        'patchouli' => 'assets/images/single-dhoop-cone.jpg',
        'dhoop-cones-2-combo-pack' => 'assets/images/single-dhoop-cone.jpg',
        'dhoop-cones-3-combo-pack' => 'assets/images/single-dhoop-cone.jpg',
    ];

    $primaryDbImage = $product->primaryImage ? $product->primaryImage->image_path : ($product->images->first() ? $product->images->first()->image_path : null);
    $imageSrc = $primaryDbImage ?? ($imageMap[$product->slug] ?? 'assets/images/incense-pack.jpg');
    
    // Check if secondary image exists in DB or fallback to hoverImageMap
    $secondaryDbImage = $product->images->count() > 1 ? $product->images->get(1)->image_path : null;
    $hoverImageSrc = $secondaryDbImage ?? ($hoverImageMap[$product->slug] ?? 'assets/images/single-bambooless-stick.jpg');

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

<div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[16px] sm:rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body">
    
    <!-- Overlapping Top Border Pill Badge -->
    <div class="absolute -top-2.5 sm:-top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
        <span class="inline-block bg-white px-2.5 sm:px-4 py-0.5 rounded-full border border-[#D38928] text-[11px] sm:text-xs font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
            {{ $topBadge }}
        </span>
    </div>

    <!-- Product Image Box with Smooth Hover Transition -->
    <div class="p-2 sm:p-3.5 pb-0">
        <div class="relative w-full aspect-square rounded-[12px] sm:rounded-[16px] overflow-hidden bg-[#FAF7F2]">
            <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full relative overflow-hidden">
                <!-- Primary Image -->
                <img 
                    src="{{ asset($imageSrc) }}" 
                    alt="{{ $product->title }}" 
                    class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"
                >
                <!-- Secondary / Hover Image -->
                <img 
                    src="{{ asset($hoverImageSrc) }}" 
                    alt="{{ $product->title }} (Detail)" 
                    class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out"
                    loading="lazy"
                >
            </a>

            <!-- Top Right Pack Info -->
            <div class="absolute top-2 right-2 sm:top-3 sm:right-3 text-right pointer-events-none select-none leading-none z-10">
                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">pack of</span>
                <span class="text-xl sm:text-2xl font-black font-heading {{ $packColor }} block my-0.5">{{ $packCount }}</span>
                <span class="text-[10px] sm:text-[11px] uppercase font-semibold text-gray-500 block">{{ $packUnit }}</span>
            </div>

            <!-- Free Ceramic Stand Banner for Devi / Specials -->
            @if(str_contains($product->slug, 'devi'))
                <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/55 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[5px] sm:rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider z-10">
                    FREE STAND <span class="text-[#F6DAA8] font-normal hidden sm:inline">₹150/-</span>
                </div>
            @endif

            <!-- Wishlist Floating Button -->
            <button 
                type="button" 
                class="wishlist-toggle-btn absolute top-2 left-2 sm:top-3 sm:left-3 z-10 w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-white/90 hover:bg-white text-gray-400 hover:text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200 focus:outline-none cursor-pointer"
                data-product-id="{{ $product->id }}"
                data-product-title="{{ $product->title }}"
                data-product-slug="{{ $product->slug }}"
                data-product-price="{{ $product->active_price }}"
                data-product-image="{{ asset($imageSrc) }}"
                aria-label="Save to Wishlist"
            >
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Product Card Content -->
    <div class="p-3 sm:p-5 pt-2 sm:pt-4 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3.5">
        
        <div class="space-y-1">
            <h3 class="text-[15px] sm:text-xl font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->title }}
                </a>
            </h3>

            <!-- 5 Star Golden Rating Strip -->
            <div class="flex items-center space-x-1.5 text-[#D38928] text-xs">
                <div class="flex text-xs">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <span class="text-xs text-gray-500 font-medium">({{ $reviewCount }})</span>
            </div>
        </div>

        <!-- Pricing & Add to Cart -->
        <div>
            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3.5">
                <span class="text-xs sm:text-sm text-gray-400 line-through">
                    ₹{{ number_format($mrpPrice, 0) }}
                </span>
                <span class="text-base sm:text-xl font-black font-heading text-[#C87A1E]">
                    ₹{{ number_format($product->active_price, 2) }}
                </span>
            </div>

            @if($isSoldOut)
                <button 
                    type="button" 
                    disabled
                    class="w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-gray-200 text-gray-500 text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[8px] sm:rounded-[10px] cursor-not-allowed font-heading text-center"
                >
                    Sold Out
                </button>
            @else
                <button 
                    type="button" 
                    class="quick-add-to-cart-btn w-full py-2.5 sm:py-3 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-heading cursor-pointer"
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