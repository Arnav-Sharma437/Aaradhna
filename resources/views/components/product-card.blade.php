@props(['product'])

@php
    $imageSrc = $product->primary_image_url;
    $hoverImageSrc = $product->secondary_image_url;
    $isSoldOut = $product->stock_quantity <= 0;
    
    // Top-Right Pack / Badge Tag
    $packTag = $product->pack_tag;

    $reviewCount = ($product->approvedReviews && $product->approvedReviews->count() > 0) 
        ? $product->approvedReviews->count() 
        : (200 + (abs(crc32($product->slug ?? $product->id)) % 90));
        
    $mrpPrice = $product->base_price > $product->active_price 
        ? $product->base_price 
        : ($product->active_price * 1.35);
        
    $displayTitle = $product->clean_title;
    $hindiTitle = $product->hindi_title ? trim($product->hindi_title) : null;
@endphp

<div {{ $attributes->merge(['class' => 'product-card group relative flex flex-col bg-white rounded-[20px] border border-[#EADBCC] shadow-xs overflow-hidden h-full font-body']) }}>
    
    <!-- Product Image Box (5px padding, 20px border radius) -->
    <div class="p-[5px] pb-0">
        <div class="relative w-full aspect-[4/4.8] rounded-[20px] overflow-hidden bg-[#FAF7F2]">
            <a href="{{ route('products.show', $product->slug) }}" class="block w-full h-full relative overflow-hidden rounded-[20px]">
                <!-- Primary Image (Solid Base Layer, No Flicker) -->
                <img 
                    src="{{ $imageSrc }}" 
                    alt="{{ $product->title }}" 
                    class="w-full h-full object-cover object-top rounded-[20px]"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='{{ asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png') }}';"
                >
                <!-- Secondary / Hover Image (Smooth Luxurious Crossfade) -->
                <img 
                    src="{{ $hoverImageSrc }}" 
                    alt="{{ $product->title }} (Detail)" 
                    class="absolute inset-0 w-full h-full object-cover object-center rounded-[20px] opacity-0 group-hover:opacity-100 transition-opacity duration-500 ease-in-out pointer-events-none"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='{{ asset('assets/images/products/ishanaa-incense-sticks-trio.jpg') }}';"
                >
            </a>

            <!-- Top-Right Tag Type Badge (Compact size & shifted slightly more left) -->
            @php
                $tagParts = $product->pack_tag_parts;
                $tagColor = $product->badge_color;
            @endphp
            @if(!empty($tagParts))
                <div class="absolute top-3.5 right-5 sm:top-4 sm:right-6 z-20 pointer-events-none select-none">
                    @if(!empty($tagParts['number']))
                        <div 
                            class="pack-tag-badge flex flex-col items-center justify-center text-center leading-none"
                            style="color: {{ $tagColor }}; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;"
                        >
                            <span class="pack-tag-prefix text-[8.5px] sm:text-[9.5px] font-black lowercase tracking-tight leading-none" style="font-weight: 900 !important;">
                                {{ $tagParts['prefix'] }}
                            </span>
                            <span class="pack-tag-number text-[18px] sm:text-[20px] font-black leading-none my-0.5 tracking-tighter" style="font-weight: 900 !important; line-height: 0.86;">
                                {{ $tagParts['number'] }}
                            </span>
                            <span class="pack-tag-suffix text-[8.5px] sm:text-[9.5px] font-black lowercase tracking-tight leading-none" style="font-weight: 900 !important;">
                                {{ $tagParts['suffix'] }}
                            </span>
                        </div>
                    @else
                        <span 
                            class="pack-tag-badge-single inline-flex items-center px-2 py-0.5 rounded-[5px] bg-white/95 border text-[9px] sm:text-[10px] font-black tracking-wider shadow-xs uppercase leading-none"
                            style="color: {{ $tagColor }}; border-color: {{ $tagColor }}40; font-weight: 900 !important; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;"
                        >
                            {{ $tagParts['suffix'] }}
                        </span>
                    @endif
                </div>
            @endif

            <!-- Free Ceramic Stand Banner for Devi / Specials -->
            @if(str_contains(strtolower($product->slug), 'devi'))
                <div class="absolute bottom-1.5 left-1.5 right-1.5 sm:bottom-2 sm:left-2 sm:right-2 bg-black/65 backdrop-blur-xs py-1 sm:py-1.5 px-1.5 sm:px-2 rounded-[6px] text-center text-white text-[10px] sm:text-xs font-bold tracking-wider z-10 pointer-events-none">
                    FREE STAND <span class="text-[#F6DAA8] font-normal hidden sm:inline">₹150/-</span>
                </div>
            @endif

        </div>
    </div>

    <!-- Product Card Content -->
    <div class="p-3.5 sm:p-4 pt-2 sm:pt-3 flex flex-col justify-between flex-grow space-y-2 sm:space-y-3">
        
        <div class="space-y-1">
            <h3 class="text-[13.5px] sm:text-[15px] font-bold text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-2 leading-snug font-body min-h-[2.4em]">
                <a href="{{ route('products.show', $product->slug) }}">
                    {{ $displayTitle }}@if(!empty($hindiTitle) && !str_contains($displayTitle, $hindiTitle)) <span class="font-bold font-serif text-[13px] sm:text-[14px] text-[#8B4513]">({{ $hindiTitle }})</span>@endif
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
                    class="quick-add-to-cart-btn w-full py-2 px-2 sm:px-4 bg-[#C18129] hover:bg-[#A86911] text-white text-xs sm:text-sm font-normal rounded-[8px] sm:rounded-[10px] shadow-xs hover:shadow-md transition-colors duration-200 text-center flex items-center justify-center space-x-1.5 font-body cursor-pointer"
                    data-product-id="{{ $product->id }}"
                    data-product-title="{{ $product->formatted_title }}"
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