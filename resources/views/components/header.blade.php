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
                <a href="{{ route('home') }}" class="group flex items-center py-1" aria-label="Aaradhna - Everything For Your Sacred Rituals">
                    <img 
                        src="{{ asset('assets/images/aaradhna-logo.png') }}" 
                        alt="Aaradhna - Everything For Your Sacred Rituals" 
                        class="h-10 sm:h-11 lg:h-12 w-auto object-contain mix-blend-multiply transition-transform duration-200 group-hover:scale-105 drop-shadow-xs"
                    >
                </a>
            </div>

            <!-- CENTER: Navigation Menu (Desktop) - Perfectly Centered, No Dropdown -->
            <nav class="hidden lg:flex items-center justify-center flex-1 space-x-5 xl:space-x-7">
                
                <!-- 1. Bambooless -->
                <a 
                    href="{{ route('collections.show', 'bambooless') }}" 
                    class="text-[14px] xl:text-[15px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Bambooless
                </a>

                <!-- 2. Havan Cups -->
                <a 
                    href="{{ route('collections.show', 'havan-cups') }}" 
                    class="text-[14px] xl:text-[15px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Havan Cups
                </a>

                <!-- 3. Dhoop Cones -->
                <a 
                    href="{{ route('collections.show', 'dhoop-cones') }}" 
                    class="text-[14px] xl:text-[15px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Dhoop Cones
                </a>

                <!-- 4. Super Save Offer -->
                <a 
                    href="{{ route('collections.show', 'super-save-offers') }}" 
                    class="text-[14px] xl:text-[15px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Super Save Offer
                </a>

                <!-- 5. Best Seller Combo -->
                <a 
                    href="{{ route('collections.show', 'best-seller-combo') }}" 
                    class="text-[14px] xl:text-[15px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-4 whitespace-nowrap tracking-wide"
                >
                    Best Seller Combo
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
                    href="{{ url('/account') }}" 
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors hidden sm:inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50"
                    aria-label="Customer Account"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
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
