@props(['product'])

@php
    $imageSrc = $product->primary_image_url;
    $hoverImageSrc = $product->secondary_image_url;
    $isSoldOut = $product->stock_quantity <= 0;
    
    // Top border pill badge: strictly controlled by admin badge_text
    $topBadge = null;
    if (!empty($product->badge_text)) {
        $val = trim($product->badge_text);
        if (!in_array(strtolower($val), ['none', 'null', '0', 'no badge', 'no'])) {
            $topBadge = $val;
        }
    }

    $reviewCount = ($product->approvedReviews && $product->approvedReviews->count() > 0) 
        ? $product->approvedReviews->count() 
        : (200 + (abs(crc32($product->slug ?? $product->id)) % 90));
        
    $mrpPrice = $product->base_price > $product->active_price 
        ? $product->base_price 
        : ($product->active_price * 1.35);
@endphp

<div {{ $attributes->merge(['class' => 'product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] sm:rounded-[24px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 overflow-visible h-full font-body']) }}>
    
    @if(!empty($topBadge))
    <!-- Centered Overlapping Top Border Pill Badge with Sparkles -->
    <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
        <span class="inline-flex items-center space-x-1 bg-white px-2 sm:px-2.5 py-[2px] rounded-full border border-[#D38928] text-[8.5px] sm:text-[9px] font-bold tracking-wider text-[#965A15] uppercase shadow-2xs whitespace-nowrap font-heading leading-tight">
            <span class="text-[#D38928] text-[8px] sm:text-[9px]">✨</span>
            <span>{{ $topBadge }}</span>
            <span class="text-[#D38928] text-[8px] sm:text-[9px]">✨</span>
        </span>
    </div>
    @endif

    <!-- Product Image Box (5px Inner Padding) -->
    <div class="p-[5px] pb-0">
        <div class="relative w-full aspect-[4/4.8] rounded-[16px] sm:rounded-[20px] overflow-hidden bg-[#FAF7F2] shadow-2xs">
            <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full relative overflow-hidden">
                <!-- Primary Image -->
                <img 
                    src="{{ $imageSrc }}" 
                    alt="{{ $product->title }}" 
                    class="w-full h-full object-cover object-center transition-all duration-500 ease-out group-hover:opacity-0 group-hover:scale-105"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='{{ asset('assets/images/incense-pack.jpg') }}';"
                >
                <!-- Secondary / Hover Image -->
                <img 
                    src="{{ $hoverImageSrc }}" 
                    alt="{{ $product->title }} (Detail)" 
                    class="absolute inset-0 w-full h-full object-cover object-center opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100 transition-all duration-500 ease-out"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='{{ asset('assets/images/single-bambooless-stick.jpg') }}';"
                >
            </a>

            <!-- Free Ceramic Stand Banner for Devi / Specials -->
            @if(str_contains(strtolower($product->slug), 'devi'))
                <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/65 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider z-10">
                    FREE STAND <span class="text-[#F6DAA8] font-normal hidden sm:inline">₹150/-</span>
                </div>
            @endif

        </div>
    </div>

    <!-- Product Card Content -->
    <div class="p-3.5 sm:p-4 pt-2 sm:pt-3 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3">
        
        <div class="space-y-1">
            <h3 class="text-[15px] sm:text-base font-bold text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1 leading-snug font-body">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $product->title }}
                </a>
            </h3>

            <!-- 5 Star Golden Rating Strip with Matching Gold Count -->
            <div class="flex items-center space-x-1 text-[#D38928]">
                <div class="flex text-[11px] sm:text-xs leading-none space-x-0.5">
                    <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
                </div>
                <span class="text-[11px] sm:text-xs text-[#D38928] font-medium leading-none">({{ $reviewCount }})</span>
            </div>
        </div>

        <!-- Pricing & Add to Cart -->
        <div>
            <div class="flex items-baseline space-x-1.5 pt-0.5 pb-2 sm:pb-3 font-body">
                <span class="text-xs sm:text-sm text-gray-400 line-through font-medium">
                    ₹{{ number_format($mrpPrice, 0) }}
                </span>
                <span class="text-sm sm:text-base font-bold text-[#C87A1E]">
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
                    class="quick-add-to-cart-btn w-full py-2 px-2 sm:px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-normal rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center space-x-1.5 font-body cursor-pointer"
                    data-product-id="{{ $product->id }}"
                    data-product-title="{{ $product->title }}"
                    data-product-slug="{{ $product->slug }}"
                    data-product-price="{{ $product->active_price }}"
                    data-product-image="{{ $imageSrc }}"
                >
                    <span class="font-normal">Add to cart</span>
                </button>
            @endif
        </div>

    </div>

</div>