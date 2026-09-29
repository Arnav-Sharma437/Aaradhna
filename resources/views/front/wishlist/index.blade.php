@extends('layouts.app')

@section('title', 'Sacred Wishlist — Aaradhna.co™')
@section('meta_description', 'Your saved sacred pooja essentials and devotional fragrances.')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-10 sm:py-16 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SAVED DEVOTIONAL SAMAGRI ✦</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Your Sacred Wishlist
            </h1>
            <p class="text-xs sm:text-sm text-gray-500">
                Items saved for your upcoming auspicious festivals, havans, and daily morning Sandhya.
            </p>
        </div>

        <!-- Wishlist Grid -->
        <div id="wishlist-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7 lg:gap-8">
            
            <!-- Default Wishlist Card 1: Devi Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        ✨ FESTIVE ✨
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
                        <button type="button" class="wishlist-toggle-btn active-wishlist absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Devi Refill Pack" aria-label="Remove from Wishlist">
                            <svg class="w-4 h-4 fill-current text-[#9B1C31]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
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
                            <span>Move to Cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Default Wishlist Card 2: Camphor Refill Pack -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        TOP PICKS
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
                        <button type="button" class="wishlist-toggle-btn active-wishlist absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Camphor Refill Pack" aria-label="Remove from Wishlist">
                            <svg class="w-4 h-4 fill-current text-[#9B1C31]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
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
                            <span>Move to Cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Default Wishlist Card 3: Oudh Sticks -->
            <div class="product-card group relative flex flex-col bg-[#FFFDF9] rounded-[20px] border border-[#EADBCC] hover:border-[#D38928] shadow-xs hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 h-full">
                <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-20 pointer-events-none">
                    <span class="inline-block bg-white px-4 py-0.5 rounded-full border border-[#D38928] text-[10px] sm:text-[11px] font-bold tracking-widest text-[#965A15] uppercase shadow-xs whitespace-nowrap font-heading">
                        FOUNDER'S FAVORITE
                    </span>
                </div>
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
                        <button type="button" class="wishlist-toggle-btn active-wishlist absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Oudh Bambooless Sticks" aria-label="Remove from Wishlist">
                            <svg class="w-4 h-4 fill-current text-[#9B1C31]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
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
                            <span>Move to Cart</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Default Wishlist Card 4: Chandan Cones -->
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
                        <button type="button" class="wishlist-toggle-btn active-wishlist absolute top-3 left-3 z-10 w-8 h-8 rounded-full bg-white text-[#9B1C31] flex items-center justify-center shadow-md transition-all duration-200" data-product-title="Chandan Cones" aria-label="Remove from Wishlist">
                            <svg class="w-4 h-4 fill-current text-[#9B1C31]" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
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
                            <span>Move to Cart</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Back to shop link -->
        <div class="text-center mt-14">
            <a href="{{ route('collections.show', 'all') }}" class="inline-flex items-center px-10 py-3.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                ← Explore More Sacred Samagri
            </a>
        </div>

    </div>
</div>
@endsection
