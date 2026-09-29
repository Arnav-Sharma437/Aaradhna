<!-- ========================================================================= -->
<!-- SLIDE-OVER LUXURY CART DRAWER (Exact Match to User Screenshot)           -->
<!-- ========================================================================= -->
<div 
    id="cart-drawer-backdrop" 
    class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs opacity-0 pointer-events-none transition-opacity duration-300 ease-out font-body"
    aria-hidden="true"
>
    <!-- Slide-over Container -->
    <div 
        id="cart-drawer-panel" 
        class="fixed inset-y-0 right-0 max-w-full w-full sm:w-[480px] md:w-[500px] bg-white shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-out overflow-hidden"
    >
        
        <!-- 1. Header: Welcome & Close Button -->
        <div class="px-5 py-4 border-b border-[#EADBCC] flex items-center justify-between bg-white shrink-0">
            <div class="flex items-center space-x-2">
                <span class="text-base text-[#D38928]">✨</span>
                <h3 class="text-base sm:text-lg font-bold font-heading text-[#121212] tracking-tight">
                    Welcome to Aaradhna.co®
                </h3>
                <span class="text-xs text-gray-400 font-mono" id="drawer-item-count-badge">(2)</span>
            </div>
            <button 
                type="button" 
                id="cart-drawer-close" 
                class="p-1.5 text-gray-500 hover:text-[#121212] rounded-full hover:bg-gray-100 transition-colors focus:outline-none"
                aria-label="Close Cart"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- 2. Orange Banner: Threshold Message -->
        <div class="bg-[#D38928] text-white px-4 py-2 text-center text-xs sm:text-[13px] font-bold font-heading shrink-0 shadow-xs">
            <span id="drawer-threshold-text">Add items worth ₹1,011 to Unlock <strong class="underline font-black">Free Gift ₹399</strong></span>
        </div>

        <!-- 3. Multi-tier Milestone Progress Meter -->
        <div class="px-5 py-3.5 bg-[#FAF7F2] border-b border-[#EADBCC] shrink-0">
            <!-- Tier labels -->
            <div class="flex items-center justify-between text-[10px] sm:text-[11px] font-bold font-heading text-[#965A15] mb-2 px-1">
                <span class="px-2 py-0.5 bg-white rounded-full border border-[#D38928]/40 shadow-2xs">₹499 OFF</span>
                <span class="px-2 py-0.5 bg-white rounded-full border border-[#D38928]/40 shadow-2xs">FREE GIFT ₹249</span>
                <span class="px-2 py-0.5 bg-white rounded-full border border-[#D38928]/40 shadow-2xs">FREE GIFT ₹399</span>
            </div>

            <!-- Progress Bar Track -->
            <div class="relative w-full h-2 bg-[#EADBCC] rounded-full my-3">
                <!-- Active Fill -->
                <div id="drawer-milestone-fill" class="h-full bg-gradient-to-r from-[#D38928] to-[#965A15] rounded-full transition-all duration-300" style="width: 58%;"></div>
                
                <!-- Step Pin 1 (₹499) -->
                <div class="absolute top-1/2 left-[30%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                    <div class="w-5 h-5 rounded-full bg-[#D38928] text-white text-[9px] font-bold flex items-center justify-center border-2 border-white shadow-xs">✓</div>
                    <span class="text-[9px] font-bold text-gray-500 mt-0.5">₹499</span>
                </div>

                <!-- Step Pin 2 (₹999) -->
                <div class="absolute top-1/2 left-[65%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                    <div class="w-5 h-5 rounded-full bg-[#D38928] text-white text-[9px] font-bold flex items-center justify-center border-2 border-white shadow-xs">✓</div>
                    <span class="text-[9px] font-bold text-gray-500 mt-0.5">₹999</span>
                </div>

                <!-- Step Pin 3 (₹1,499) -->
                <div class="absolute top-1/2 left-[95%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center">
                    <div class="w-5 h-5 rounded-full bg-white text-gray-400 text-[9px] font-bold flex items-center justify-center border-2 border-[#EADBCC] shadow-xs">🎁</div>
                    <span class="text-[9px] font-bold text-gray-500 mt-0.5">₹1,499</span>
                </div>
            </div>
        </div>

        <!-- Scrollable Middle Section -->
        <div class="flex-1 overflow-y-auto divide-y divide-[#EADBCC] p-4 space-y-4 scrollbar-thin">
            
            <!-- Cart Items List Container -->
            <div id="drawer-items-list" class="space-y-3">
                
                <!-- Drawer Item 1: Camphor Refill Pack -->
                <div class="drawer-item-row flex items-start justify-between gap-3 p-3 bg-[#FFFDF9] rounded-[14px] border border-[#EADBCC]" data-id="1" data-price="489.00">
                    <div class="w-16 h-16 rounded-[10px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                        <img src="{{ asset('assets/images/camphor-refill-pack-card.jpg') }}" alt="Camphor Refill Pack" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0 space-y-0.5">
                        <h4 class="text-xs sm:text-[13px] font-bold font-serif text-[#121212] truncate">Camphor Refill Pack</h4>
                        <div class="flex items-baseline space-x-2 text-xs">
                            <span class="text-[#C87A1E] font-black font-heading">₹489.00</span>
                            <span class="text-gray-400 line-through text-[11px]">₹700.00</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-end justify-between h-16">
                        <button type="button" class="drawer-remove-item text-gray-400 hover:text-[#9B1C31] transition-colors p-1" title="Remove item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                        <!-- Stepper -->
                        <div class="flex items-center border border-[#EADBCC] rounded-[6px] bg-white overflow-hidden text-xs">
                            <button type="button" class="drawer-qty-minus px-2 py-0.5 text-gray-500 hover:text-black font-bold">−</button>
                            <span class="drawer-qty-val w-6 text-center font-bold text-[#121212]">1</span>
                            <button type="button" class="drawer-qty-plus px-2 py-0.5 text-gray-500 hover:text-black font-bold">+</button>
                        </div>
                    </div>
                </div>

                <!-- Drawer Item 2: Sandalwood Havan Cup -->
                <div class="drawer-item-row flex items-start justify-between gap-3 p-3 bg-[#FFFDF9] rounded-[14px] border border-[#EADBCC]" data-id="2" data-price="499.00">
                    <div class="w-16 h-16 rounded-[10px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                        <img src="{{ asset('assets/images/chandan-cones-card.jpg') }}" alt="Sandalwood Havan Cup" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1 min-w-0 space-y-0.5">
                        <h4 class="text-xs sm:text-[13px] font-bold font-serif text-[#121212] truncate">Sandalwood Havan Cup</h4>
                        <div class="flex items-baseline space-x-2 text-xs">
                            <span class="text-[#C87A1E] font-black font-heading">₹499.00</span>
                            <span class="text-gray-400 line-through text-[11px]">₹649.00</span>
                        </div>
                    </div>
                    <div class="flex flex-col items-end justify-between h-16">
                        <button type="button" class="drawer-remove-item text-gray-400 hover:text-[#9B1C31] transition-colors p-1" title="Remove item">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                        <!-- Stepper -->
                        <div class="flex items-center border border-[#EADBCC] rounded-[6px] bg-white overflow-hidden text-xs">
                            <button type="button" class="drawer-qty-minus px-2 py-0.5 text-gray-500 hover:text-black font-bold">−</button>
                            <span class="drawer-qty-val w-6 text-center font-bold text-[#121212]">1</span>
                            <button type="button" class="drawer-qty-plus px-2 py-0.5 text-gray-500 hover:text-black font-bold">+</button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- 4. Quick Cross-Sell: Try These Fresh Fragrances As Well 👇 -->
            <div class="pt-4 space-y-2.5">
                <div class="flex items-center justify-between text-xs font-bold text-[#121212] font-heading">
                    <span>Try these fresh fragrances as well 👇</span>
                </div>

                <!-- 3-Column Mini Upsell Carousel -->
                <div class="grid grid-cols-3 gap-2">
                    
                    <!-- Upsell 1 -->
                    <div class="bg-[#FFFDF9] border border-[#EADBCC] rounded-[12px] p-2 flex flex-col justify-between text-center space-y-1 relative">
                        <span class="absolute top-1 left-1 px-1.5 py-0.2 bg-[#9B1C31] text-white text-[8px] font-bold rounded-full font-heading">30% OFF</span>
                        <div class="w-full aspect-square rounded-[8px] overflow-hidden bg-white mb-1">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Bestseller Combo" class="w-full h-full object-cover">
                        </div>
                        <h5 class="text-[10px] font-bold font-serif text-[#121212] truncate">Bestseller Combo</h5>
                        <div class="text-[11px] font-black text-[#C87A1E] font-heading">₹1,399.00</div>
                        <button type="button" class="drawer-quick-add w-full py-1 bg-[#D38928] hover:bg-[#B8741E] text-white text-[10px] font-bold rounded-[6px] font-heading transition-colors" data-title="Bestseller Combo" data-price="1399.00">
                            Add to cart
                        </button>
                    </div>

                    <!-- Upsell 2 -->
                    <div class="bg-[#FFFDF9] border border-[#EADBCC] rounded-[12px] p-2 flex flex-col justify-between text-center space-y-1 relative">
                        <span class="absolute top-1 left-1 px-1.5 py-0.2 bg-[#9B1C31] text-white text-[8px] font-bold rounded-full font-heading">30% OFF</span>
                        <div class="w-full aspect-square rounded-[8px] overflow-hidden bg-white mb-1">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Bhairav Refill Pack" class="w-full h-full object-cover">
                        </div>
                        <h5 class="text-[10px] font-bold font-serif text-[#121212] truncate">Bhairav Refill Pack</h5>
                        <div class="text-[11px] font-black text-[#C87A1E] font-heading">₹489.00</div>
                        <button type="button" class="drawer-quick-add w-full py-1 bg-[#D38928] hover:bg-[#B8741E] text-white text-[10px] font-bold rounded-[6px] font-heading transition-colors" data-title="Bhairav Refill Pack" data-price="489.00">
                            Add to cart
                        </button>
                    </div>

                    <!-- Upsell 3 -->
                    <div class="bg-[#FFFDF9] border border-[#EADBCC] rounded-[12px] p-2 flex flex-col justify-between text-center space-y-1 relative">
                        <span class="absolute top-1 left-1 px-1.5 py-0.2 bg-[#9B1C31] text-white text-[8px] font-bold rounded-full font-heading">51% OFF</span>
                        <div class="w-full aspect-square rounded-[8px] overflow-hidden bg-white mb-1">
                            <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Devi Refill Pack" class="w-full h-full object-cover">
                        </div>
                        <h5 class="text-[10px] font-bold font-serif text-[#121212] truncate">Devi Refill Pack</h5>
                        <div class="text-[11px] font-black text-[#C87A1E] font-heading">₹489.00</div>
                        <button type="button" class="drawer-quick-add w-full py-1 bg-[#D38928] hover:bg-[#B8741E] text-white text-[10px] font-bold rounded-[6px] font-heading transition-colors" data-title="Devi Refill Pack" data-price="489.00">
                            Add to cart
                        </button>
                    </div>

                </div>
            </div>

            <!-- 5. Unlocked Special Offer: Buy Any Fragrance at ₹99 -->
            <div class="pt-4">
                <div class="bg-[#FFFDF9] border border-[#D38928]/40 rounded-[14px] p-3 space-y-2">
                    <div class="flex items-center justify-between text-[11px] font-bold font-heading">
                        <span class="text-[#D38928]">🎉 Unlocked! Buy any fragrance at ₹99</span>
                        <span class="text-[10px] text-gray-500">*Valid Today</span>
                    </div>

                    <div class="flex items-center justify-between gap-3 bg-white p-2.5 rounded-[10px] border border-[#EADBCC]">
                        <div class="w-12 h-12 rounded-[6px] bg-[#FAF7F2] overflow-hidden shrink-0">
                            <img src="{{ asset('assets/images/oudh-pack-card.jpg') }}" alt="Oudh Trial Pack" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h6 class="text-xs font-bold font-serif text-[#121212] truncate">Oudh Trial Pack</h6>
                            <div class="flex items-baseline space-x-1.5 text-xs">
                                <span class="font-black text-[#C87A1E] font-heading">₹99.00</span>
                                <span class="text-gray-400 line-through text-[10px]">₹229.00</span>
                            </div>
                        </div>
                        <button type="button" class="drawer-quick-add px-3 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-[11px] font-bold rounded-[8px] font-heading whitespace-nowrap" data-title="Oudh Trial Pack" data-price="99.00">
                            Buy at ₹99
                        </button>
                    </div>
                </div>
            </div>

        </div>

        <!-- 6. Footer Checkout & Calculations -->
        <div class="p-4 bg-white border-t border-[#EADBCC] space-y-3 shrink-0 shadow-lg">
            
            <!-- Trust strip -->
            <div class="py-1 px-2 bg-[#FAF7F2] rounded-[6px] text-center text-[10px] font-bold text-gray-600 font-heading flex items-center justify-center space-x-2">
                <span class="text-emerald-700">🚚 Free Shipping</span>
                <span>•</span>
                <span class="text-emerald-700">💵 COD Available</span>
                <span>•</span>
                <span>✨ 100% Vedic</span>
            </div>

            <!-- Price Breakdown -->
            <div class="space-y-1 text-xs">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal</span>
                    <span id="drawer-subtotal-val" class="font-bold text-[#121212]">₹1,598.00</span>
                </div>
                <div class="flex justify-between text-emerald-700 font-semibold">
                    <span>Discounts Applied</span>
                    <span id="drawer-discount-val">-₹610.00</span>
                </div>
                <div class="flex justify-between text-base font-black font-heading text-[#121212] pt-1.5 border-t border-gray-100">
                    <span>Total</span>
                    <span id="drawer-total-val" class="text-[#C87A1E]">₹988.00</span>
                </div>
            </div>

            <!-- Gold Checkout Button with Payment Gateway icons -->
            <a 
                href="{{ route('cart.index') }}" 
                class="w-full py-3.5 px-5 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-sm sm:text-base font-bold uppercase tracking-wider rounded-[10px] shadow-md hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 font-heading text-center cursor-pointer"
            >
                <span>CHECKOUT</span>
                <span class="text-xs font-mono bg-white/20 px-2 py-0.5 rounded-full">GPay / UPI / Cards ➔</span>
            </a>

        </div>

    </div>
</div>
