<div 
    id="mobile-drawer-overlay" 
    class="fixed inset-0 bg-black/75 backdrop-blur-xs z-50 opacity-0 pointer-events-none transition-opacity duration-300"
    aria-hidden="true"
></div>

<aside 
    id="mobile-drawer"
    class="fixed top-0 left-0 w-full sm:w-[380px] max-w-full h-full bg-[#1F1815] text-white z-50 shadow-2xl -translate-x-full transition-transform duration-300 ease-in-out flex flex-col font-body select-none overflow-hidden"
    aria-label="Mobile Navigation"
>
    <!-- Drawer Header Bar (Clean White Background with Close X, Logo & Right Actions) -->
    <div class="p-3 sm:p-4 bg-white text-[#121212] border-b border-[#EAE3D9] flex items-center justify-between shrink-0 shadow-xs relative z-20">
        <!-- Close Button (Left) -->
        <button 
            type="button" 
            id="mobile-drawer-close"
            class="p-1.5 -ml-1 text-[#121212] hover:text-[#831F2E] transition-colors rounded-lg cursor-pointer focus:outline-none"
            aria-label="Close Mobile Menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Center Brand Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Manglam" class="h-8 sm:h-9 w-auto object-contain">
        </a>

        <!-- Right Header Actions (Search, Account, Cart) -->
        <div class="flex items-center space-x-1 sm:space-x-2 text-[#121212]">
            <button 
                type="button" 
                class="p-1.5 hover:text-[#D38928] transition-colors search-modal-opener cursor-pointer"
                aria-label="Search"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>

            <a 
                href="{{ auth()->check() ? route('account.index') : route('account.login') }}" 
                class="p-1.5 hover:text-[#D38928] transition-colors relative"
                aria-label="Account"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </a>

            <a 
                href="{{ route('cart.index') }}" 
                class="p-1.5 hover:text-[#D38928] transition-colors relative cart-drawer-opener cursor-pointer"
                aria-label="Cart"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <span class="absolute top-0 right-0 bg-[#831F2E] text-white text-[8px] font-bold w-3.5 h-3.5 rounded-full flex items-center justify-center leading-none ring-1 ring-white">
                    {{ session('cart_count', 0) }}
                </span>
            </a>
        </div>
    </div>

    <!-- Sliding Viewports Wrapper -->
    <div class="relative flex-1 overflow-hidden bg-gradient-to-b from-[#1F1815] via-[#281E19] to-[#171210] text-white font-body">
        
        <!-- ============================================================= -->
        <!-- VIEW 1: MAIN NAVIGATION MENU (Manglam Brand Style)            -->
        <!-- ============================================================= -->
        <div 
            id="mobile-nav-main-panel"
            class="absolute inset-0 flex flex-col justify-between overflow-y-auto transition-transform duration-300 ease-in-out translate-x-0"
        >
            <!-- Menu Links List -->
            <div class="divide-y divide-white/10 text-white font-body">
                
                <!-- 1. Pooja Shop (Slides to Submenu) -->
                <button 
                    type="button" 
                    id="mobile-open-pooja-shop"
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer focus:outline-none"
                >
                    <div class="flex items-center space-x-2.5">
                        <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-[#F6DAA8]">Pooja Shop</span>
                        <span class="text-[9px] uppercase tracking-wider font-bold bg-[#D38928]/30 border border-[#D38928]/60 text-[#F6DAA8] px-2 py-0.5 rounded-full">
                            Pure Vedic
                        </span>
                    </div>
                    <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

                <!-- 2. Super Save Offers (Slides to Submenu) -->
                <button 
                    type="button" 
                    id="mobile-open-offers"
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer focus:outline-none"
                >
                    <div class="flex items-center space-x-2.5">
                        <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-white">Super Save Offers</span>
                        <span class="text-[9px] uppercase tracking-wider font-bold bg-[#831F2E] text-white px-2 py-0.5 rounded-full">
                            Offers
                        </span>
                    </div>
                    <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

                <!-- 3. Bambooless Dhoop Sticks -->
                <a 
                    href="{{ route('collections.show', 'bambooless') }}" 
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer"
                >
                    <div class="flex items-center space-x-2.5">
                        <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-white">Bambooless Incense</span>
                        <span class="text-[9px] uppercase tracking-wider font-bold bg-[#D38928] text-white px-2 py-0.5 rounded-full">
                            100% Natural
                        </span>
                    </div>
                    <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- 4. Havan Cups & Dhoop Cones -->
                <a 
                    href="{{ route('collections.show', 'havan-cups') }}" 
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer"
                >
                    <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-white">Organic Havan Cups</span>
                    <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- 5. Shri Ram Pitambara Havan -->
                <a 
                    href="{{ route('products.pitambara') }}" 
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer"
                >
                    <div class="flex items-center space-x-2.5">
                        <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-white">Pitambara Havan Pack</span>
                        <span class="text-[9px] uppercase tracking-wider font-bold bg-[#D38928] text-white px-2 py-0.5 rounded-full">
                            Vedic Kit
                        </span>
                    </div>
                    <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- 6. About Us -->
                <a 
                    href="{{ route('pages.about') }}" 
                    class="w-full py-3.5 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer"
                >
                    <span class="text-sm sm:text-base font-bold font-serif tracking-wide text-white/90">About Us</span>
                    <svg class="w-4 h-4 text-white/60 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

                <!-- 7. Contact Us -->
                <a 
                    href="{{ route('pages.contact') }}" 
                    class="w-full py-3.5 px-5 flex items-center justify-between hover:bg-white/5 transition-colors text-left group cursor-pointer"
                >
                    <span class="text-sm sm:text-base font-bold font-serif tracking-wide text-white/90">Contact Us</span>
                    <svg class="w-4 h-4 text-white/60 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>

            </div>

            <!-- Sacred Vedic Bottom Card (Signature Manglam Identity) -->
            <div class="p-5 text-center space-y-3 bg-black/40 backdrop-blur-xs border-t border-white/10 mt-auto">
                <div class="space-y-1">
                    <h4 class="text-lg sm:text-xl font-serif font-bold text-[#F6DAA8] tracking-wide">
                        शुद्धं समर्पयामि।
                    </h4>
                    <p class="text-xs font-serif italic text-white/85">
                        Śuddhaṁ Samarpayāmi.
                    </p>
                    <p class="text-[11px] text-white/70">
                        "I offer that which is pure."
                    </p>
                </div>

                <!-- Coupon Pill Button -->
                <div class="pt-1">
                    <div class="inline-flex items-center space-x-1.5 bg-white text-[#1F1815] px-4 py-2 rounded-full font-bold text-xs sm:text-[13px] shadow-lg">
                        <span>Use code <strong>MANGLAM10</strong> at checkout</span>
                        <span>🏷️</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- VIEW 2: POOJA SHOP SUB-PANEL (Manglam Catalog)                -->
        <!-- ============================================================= -->
        <div 
            id="mobile-nav-pooja-shop-panel"
            class="absolute inset-0 flex flex-col justify-between overflow-y-auto transition-transform duration-300 ease-in-out translate-x-full bg-gradient-to-b from-[#1F1815] via-[#281E19] to-[#171210]"
        >
            <div>
                <!-- Submenu Top Bar with Back Arrow -->
                <button 
                    type="button" 
                    id="mobile-back-to-main"
                    class="w-full py-3.5 px-5 flex items-center space-x-3 text-white font-serif font-bold text-base sm:text-lg border-b border-white/15 hover:bg-white/5 transition-colors cursor-pointer focus:outline-none"
                >
                    <svg class="w-5 h-5 text-[#F6DAA8]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Pooja Shop</span>
                </button>

                <!-- Submenu Items List -->
                <div class="divide-y divide-white/10 font-body">
                    
                    <!-- 1. Bambooless Incense Sticks -->
                    <a 
                        href="{{ route('collections.show', 'bambooless') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="flex items-center space-x-3.5 min-w-0">
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 text-[#F6DAA8]">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 3v12M12 3c-1 0-2 1-2 2s1 2 2 2 2-1 2-2-1-2-2-2zM8 18h8v2H8z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h4 class="text-sm sm:text-base font-bold text-white font-body">Bambooless Incense Sticks</h4>
                                    <span class="text-[9px] font-bold bg-[#D38928] text-white px-2 py-0.5 rounded-full">Natural</span>
                                </div>
                                <p class="text-xs text-white/70 mt-0.5">Non-irritating, 100% charcoal-free.</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- 2. Havan Cups -->
                    <a 
                        href="{{ route('collections.show', 'havan-cups') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="flex items-center space-x-3.5 min-w-0">
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 text-[#F6DAA8]">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M6 9h12v7a5 5 0 01-5 5h-2a5 5 0 01-5-5V9zM18 11h2a2 2 0 012 2v1a2 2 0 01-2 2h-2"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h4 class="text-sm sm:text-base font-bold text-white font-body">Havan Cups</h4>
                                    <span class="text-[9px] font-bold border border-white/40 text-white/90 px-2 py-0.5 rounded-full">Organic</span>
                                </div>
                                <p class="text-xs text-white/70 mt-0.5">Mini havan at home with sacred samagri.</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- 3. Dhoop Cones -->
                    <a 
                        href="{{ route('collections.show', 'dhoop-cones') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="flex items-center space-x-3.5 min-w-0">
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 text-[#F6DAA8]">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 3l7 14H5l7-14zM8 19h8v2H8z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center space-x-2">
                                    <h4 class="text-sm sm:text-base font-bold text-white font-body">Dhoop Cones</h4>
                                    <span class="text-[9px] font-bold border border-white/40 text-white/90 px-2 py-0.5 rounded-full">6 Fragrances</span>
                                </div>
                                <p class="text-xs text-white/70 mt-0.5">Slow-burning, calming sacred aroma.</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- 4. Shri Ram Pitambara Havan Pack -->
                    <a 
                        href="{{ route('products.pitambara') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="flex items-center space-x-3.5 min-w-0">
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 text-[#F6DAA8]">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-sm sm:text-base font-bold text-white font-body">Pitambara Havan Samagri</h4>
                                <p class="text-xs text-white/70 mt-0.5">Complete ritual pack for home prosperity.</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <!-- 5. All Products -->
                    <a 
                        href="{{ route('collections.show', 'all') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="flex items-center space-x-3.5 min-w-0">
                            <div class="w-8 h-8 flex items-center justify-center shrink-0 text-[#F6DAA8]">
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-sm sm:text-base font-bold text-white font-body">View All Products</h4>
                                <p class="text-xs text-white/70 mt-0.5">Explore entire Vedic fragrance collection.</p>
                            </div>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                </div>
            </div>

            <!-- Submenu Bottom Ticker Strip -->
            <div class="p-3 bg-black/40 border-t border-white/10 text-center text-[11px] text-[#F6DAA8] font-medium tracking-wide">
                <span>Free Gifts worth ₹898 on orders above ₹1999 • Free Delivery</span>
            </div>
        </div>

        <!-- ============================================================= -->
        <!-- VIEW 3: SUPER SAVE OFFERS SUB-PANEL                            -->
        <!-- ============================================================= -->
        <div 
            id="mobile-nav-offers-panel"
            class="absolute inset-0 flex flex-col justify-between overflow-y-auto transition-transform duration-300 ease-in-out translate-x-full bg-gradient-to-b from-[#1F1815] via-[#281E19] to-[#171210]"
        >
            <div>
                <!-- Submenu Top Bar with Back Arrow -->
                <button 
                    type="button" 
                    id="mobile-back-to-main-from-offers"
                    class="w-full py-3.5 px-5 flex items-center space-x-3 text-white font-serif font-bold text-base sm:text-lg border-b border-white/15 hover:bg-white/5 transition-colors cursor-pointer focus:outline-none"
                >
                    <svg class="w-5 h-5 text-[#F6DAA8]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Super Save Offers</span>
                </button>

                <!-- Offers Items -->
                <div class="divide-y divide-white/10 font-body">
                    <a 
                        href="{{ route('bundles.trial-packs') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="min-w-0">
                            <div class="flex items-center space-x-2">
                                <h4 class="text-sm sm:text-base font-bold text-white font-body">Buy any 5 Trial Pack @ 799</h4>
                                <span class="text-[9px] font-bold bg-[#D38928] text-white px-2 py-0.5 rounded-full">₹799</span>
                            </div>
                            <p class="text-xs text-white/70 mt-0.5">5 Divine Vedic Fragrances trial set.</p>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    <a 
                        href="{{ route('bundles.buy2get1') }}"
                        class="p-4 sm:p-5 flex items-center justify-between hover:bg-white/5 transition-colors group"
                    >
                        <div class="min-w-0">
                            <div class="flex items-center space-x-2">
                                <h4 class="text-sm sm:text-base font-bold text-white font-body">Buy 2 Get 1 FREE</h4>
                                <span class="text-[9px] font-bold bg-[#831F2E] text-white px-2 py-0.5 rounded-full">FREE GIFT</span>
                            </div>
                            <p class="text-xs text-white/70 mt-0.5">Pay for 2 packs &amp; receive 3rd pack free.</p>
                        </div>
                        <svg class="w-5 h-5 text-white/80 group-hover:translate-x-1 transition-transform shrink-0 ml-2" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Submenu Bottom Ticker Strip -->
            <div class="p-3 bg-black/40 border-t border-white/10 text-center text-[11px] text-[#F6DAA8] font-medium tracking-wide">
                <span>Free Shipping on all bundles • Use Code MANGLAM10</span>
            </div>
        </div>

    </div>
</aside>

<!-- Script for Smooth Sliding Navigation Inside Mobile Menu Drawer -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainPanel = document.getElementById('mobile-nav-main-panel');
        const poojaPanel = document.getElementById('mobile-nav-pooja-shop-panel');
        const offersPanel = document.getElementById('mobile-nav-offers-panel');

        const openPoojaBtn = document.getElementById('mobile-open-pooja-shop');
        const openOffersBtn = document.getElementById('mobile-open-offers');
        const backToMainBtn = document.getElementById('mobile-back-to-main');
        const backToMainFromOffersBtn = document.getElementById('mobile-back-to-main-from-offers');

        if (openPoojaBtn && mainPanel && poojaPanel) {
            openPoojaBtn.addEventListener('click', () => {
                mainPanel.classList.add('-translate-x-full');
                mainPanel.classList.remove('translate-x-0');
                poojaPanel.classList.remove('translate-x-full');
                poojaPanel.classList.add('translate-x-0');
            });
        }

        if (backToMainBtn && mainPanel && poojaPanel) {
            backToMainBtn.addEventListener('click', () => {
                poojaPanel.classList.add('translate-x-full');
                poojaPanel.classList.remove('translate-x-0');
                mainPanel.classList.remove('-translate-x-full');
                mainPanel.classList.add('translate-x-0');
            });
        }

        if (openOffersBtn && mainPanel && offersPanel) {
            openOffersBtn.addEventListener('click', () => {
                mainPanel.classList.add('-translate-x-full');
                mainPanel.classList.remove('translate-x-0');
                offersPanel.classList.remove('translate-x-full');
                offersPanel.classList.add('translate-x-0');
            });
        }

        if (backToMainFromOffersBtn && mainPanel && offersPanel) {
            backToMainFromOffersBtn.addEventListener('click', () => {
                offersPanel.classList.add('translate-x-full');
                offersPanel.classList.remove('translate-x-0');
                mainPanel.classList.remove('-translate-x-full');
                mainPanel.classList.add('translate-x-0');
            });
        }
    });
</script>
