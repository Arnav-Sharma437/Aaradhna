<header class="sticky top-0 z-40 bg-white/98 backdrop-blur-md border-b border-[#EAE3D9] transition-all duration-200 shadow-xs font-body">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        <div class="flex items-center justify-between h-20 sm:h-22">
            
            <!-- LEFT: Mobile Menu Button (Mobile only) + Brand Logo -->
            <div class="flex items-center space-x-3 sm:space-x-4 lg:w-1/4 justify-start shrink-0">
                <!-- Mobile Menu Button (Mobile Only) -->
                <button 
                    type="button" 
                    id="mobile-menu-trigger"
                    class="lg:hidden p-2 -ml-2 text-[#121212] hover:text-[#D38928] focus:outline-none transition-colors"
                    aria-label="Open Mobile Menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Brand Logo (Left-aligned) -->
                <a href="{{ route('home') }}" class="group flex items-center py-1" aria-label="Mangalam - Pure Sacred Rituals">
                    <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Mangalam" class="h-12 sm:h-16 w-auto max-w-[160px] sm:max-w-[220px] object-contain transition-transform group-hover:scale-105">
                </a>
            </div>

            <!-- CENTER: Navigation Menu (Desktop) - Perfectly Centered, Normal Font Weight -->
            <nav class="hidden lg:flex items-center justify-center flex-1 space-x-6 xl:space-x-8">
                
                <!-- 1. Bambooless -->
                <a 
                    href="{{ route('collections.show', 'bambooless') }}" 
                    class="text-[14px] xl:text-[15px] font-normal text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Bambooless
                </a>

                <!-- 2. Havan Cups -->
                <a 
                    href="{{ route('collections.show', 'havan-cups') }}" 
                    class="text-[14px] xl:text-[15px] font-normal text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Havan Cups
                </a>

                <!-- 3. Dhoop Cones -->
                <a 
                    href="{{ route('collections.show', 'dhoop-cones') }}" 
                    class="text-[14px] xl:text-[15px] font-normal text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Dhoop Cones
                </a>

                <!-- 4. Super Save Offers (Dropdown matching screenshot) -->
                <div class="relative group py-4">
                    <button 
                        type="button"
                        class="flex items-center space-x-1 text-[14px] xl:text-[15px] font-normal text-[#1F1F1F] group-hover:text-[#D38928] transition-colors whitespace-nowrap tracking-wide cursor-pointer focus:outline-none"
                    >
                        <span>Super Save Offers</span>
                        <svg class="w-4 h-4 text-[#8C827A] group-hover:text-[#D38928] group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Content -->
                    <div class="absolute left-0 top-full -mt-1 w-64 bg-white rounded-xl shadow-xl border border-[#EAE3D9] py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top group-hover:translate-y-0 translate-y-1 pointer-events-none group-hover:pointer-events-auto">
                        <a 
                            href="{{ route('bundles.trial-packs') }}" 
                            class="flex items-center justify-between px-4 py-2.5 text-sm font-normal text-[#2B1810] hover:bg-[#FAF7F2] hover:text-[#D38928] transition-colors"
                        >
                            <span>Buy any 5 Trial Pack @ 799</span>
                            <span class="text-[10px] font-bold bg-[#D38928]/10 text-[#965A15] px-1.5 py-0.5 rounded">₹799</span>
                        </a>
                        <a 
                            href="{{ route('bundles.buy2get1') }}" 
                            class="flex items-center justify-between px-4 py-2.5 text-sm font-normal text-[#2B1810] hover:bg-[#FAF7F2] hover:text-[#D38928] transition-colors"
                        >
                            <span>Buy 2 get 1 free</span>
                            <span class="text-[10px] font-bold bg-[#B24E2B]/10 text-[#B24E2B] px-1.5 py-0.5 rounded">FREE GIFT</span>
                        </a>
                    </div>
                </div>

                <!-- 5. Best Seller Combo (Dropdown) -->
                <div class="relative group py-4">
                    <button 
                        type="button"
                        class="flex items-center space-x-1 text-[14px] xl:text-[15px] font-normal text-[#1F1F1F] group-hover:text-[#D38928] transition-colors whitespace-nowrap tracking-wide cursor-pointer focus:outline-none"
                    >
                        <span>Best Seller Combo</span>
                        <svg class="w-4 h-4 text-[#8C827A] group-hover:text-[#D38928] group-hover:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Dropdown Content for 3 Combo Products -->
                    <div class="absolute left-0 top-full -mt-1 w-72 bg-white rounded-xl shadow-xl border border-[#EAE3D9] py-2 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top group-hover:translate-y-0 translate-y-1 pointer-events-none group-hover:pointer-events-auto">
                        <!-- Combo 1: Pack of Six -->
                        <a 
                            href="{{ route('products.show', 'pack-of-six') }}" 
                            class="flex items-center justify-between px-4 py-2.5 text-sm font-normal text-[#2B1810] hover:bg-[#FAF7F2] hover:text-[#D38928] transition-colors"
                        >
                            <span>Pack of Six Grand Combo</span>
                            <span class="text-[10px] font-bold bg-[#D38928]/10 text-[#965A15] px-1.5 py-0.5 rounded">₹1199</span>
                        </a>

                        <!-- View All Combos Link -->
                        <div class="pt-1.5 mt-1.5 border-t border-[#EAE3D9]">
                            <a 
                                href="{{ route('collections.show', 'best-seller-combo') }}" 
                                class="flex items-center justify-between px-4 py-1.5 text-xs font-bold text-[#D38928] hover:text-[#B8741E] transition-colors font-heading"
                            >
                                <span>View All Combos</span>
                                <span>➔</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- 6. Pitambara Havan (At the End of the Menu) -->
                <a 
                    href="{{ route('products.pitambara') }}" 
                    class="relative inline-flex items-center space-x-1.5 text-[14px] xl:text-[15px] font-bold text-[#965A15] hover:text-[#D38928] transition-all py-4 whitespace-nowrap tracking-wide group"
                >
                    <span class="text-amber-500 animate-pulse text-xs">✦</span>
                    <span class="font-heading">Pitambara Havan</span>
                    <span class="text-[9px] font-black uppercase tracking-wider bg-gradient-to-r from-[#D38928] to-[#B8741E] text-white px-2 py-0.5 rounded-full shadow-xs ring-1 ring-[#D38928]/40 animate-pulse">
                        COMING SOON 🔥
                    </span>
                </a>

            </nav>

            <!-- RIGHT: Clean Compact Action Icons (Search + Account + Wishlist + Cart) with Tight Gap -->
            <div class="flex items-center justify-end space-x-1 sm:space-x-1.5 lg:w-1/4 shrink-0">
                
                <!-- 1. Search Icon Button -->
                <button 
                    type="button" 
                    id="search-modal-trigger"
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors focus:outline-none shrink-0 cursor-pointer rounded-full hover:bg-stone-50"
                    aria-label="Open Search"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- 2. Customer Account (Hidden on Mobile) -->
                <a 
                    href="{{ auth()->check() ? route('account.index') : route('account.login') }}" 
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors hidden sm:inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50 relative group"
                    aria-label="Customer Account"
                    title="{{ auth()->check() ? 'My Devotee Account (' . auth()->user()->name . ')' : 'Sign In to Devotee Account' }}"
                >
                    <svg class="w-5 h-5 {{ auth()->check() ? 'text-[#D38928]' : '' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    @if(auth()->check())
                        <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-emerald-500 ring-2 ring-white"></span>
                    @endif
                </a>

                <!-- 3. Wishlist with live badge -->
                <a 
                    href="{{ route('wishlist.index') }}" 
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors relative inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50"
                    aria-label="Wishlist"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span 
                        id="header-wishlist-badge"
                        class="absolute top-1 right-0.5 bg-[#D38928] text-white text-[9px] font-bold w-3.5 h-3.5 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        0
                    </span>
                </a>

                <!-- 4. Shopping Bag / Cart with live badge -->
                <a 
                    href="{{ route('cart.index') }}" 
                    id="cart-drawer-trigger"
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors relative inline-flex items-center justify-center shrink-0 cursor-pointer rounded-full hover:bg-stone-50"
                    aria-label="Cart"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    
                    <span 
                        id="header-cart-badge"
                        class="absolute top-1 right-0.5 bg-[#9B1C31] text-white text-[9px] font-bold w-3.5 h-3.5 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

            </div>

        </div>
    </div>
</header>
