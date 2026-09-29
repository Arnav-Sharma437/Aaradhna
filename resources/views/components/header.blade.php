<header class="sticky top-0 z-40 bg-white/98 backdrop-blur-md border-b border-[#EAE3D9] transition-all duration-200 shadow-xs font-body">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px]">
        <div class="flex items-center justify-between h-20 sm:h-22">
            
            <!-- LEFT: Mobile Menu Button (Mobile only) + Brand Logo -->
            <div class="flex items-center space-x-3 sm:space-x-4">
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
                        class="h-11 sm:h-12 lg:h-13 w-auto object-contain mix-blend-multiply transition-transform duration-200 group-hover:scale-105 drop-shadow-xs"
                    >
                </a>
            </div>

            <!-- CENTER: Navigation Menu (Desktop) -->
            <nav class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                
                <!-- 1. Pooja Shop (with Mega Menu) -->
                <div class="relative group" id="pooja-shop-nav-item">
                    <a 
                        href="{{ route('collections.show', 'all') }}" 
                        class="inline-flex items-center py-6 text-[15px] xl:text-[16px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors cursor-pointer"
                        id="pooja-shop-toggle"
                    >
                        <span>Pooja Shop</span>
                        <svg class="w-3.5 h-3.5 ml-1 text-gray-400 group-hover:rotate-180 group-hover:text-[#D38928] transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Embed Exact Mega Menu -->
                    <x-mega-menu />
                </div>

                <!-- 2. Super Save Offers -->
                <div class="relative group">
                    <a 
                        href="{{ route('collections.show', 'combos') }}" 
                        class="inline-flex items-center py-6 text-[15px] xl:text-[16px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors cursor-pointer"
                    >
                        <span>Super Save Offers</span>
                        <!-- <svg class="w-3.5 h-3.5 ml-1 text-gray-400 group-hover:rotate-180 group-hover:text-[#D38928] transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg> -->
                    </a>
                </div>

                <!-- 3. New Launches -->
                <div class="relative group">
                    <a 
                        href="{{ route('collections.show', 'all') }}" 
                        class="inline-flex items-center py-6 text-[15px] xl:text-[16px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors cursor-pointer"
                    >
                        <!-- <span>New Launches</span>
                        <svg class="w-3.5 h-3.5 ml-1 text-gray-400 group-hover:rotate-180 group-hover:text-[#D38928] transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/> -->
                        </svg>
                    </a>
                </div>

                <!-- 4. Best Seller Combo -->
                <a 
                    href="{{ route('products.show', 'trial-pack-combo') }}" 
                    class="text-[15px] xl:text-[16px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-6 whitespace-nowrap">
                    Best Seller Combo
                </a>

                <!-- 5. Shri Ram Uphaar -->
                <a 
                    href="{{ route('products.show', 'trial-pack-combo') }}" 
                    class="text-[15px] xl:text-[16px] font-semibold text-[#1F1F1F] hover:text-[#D38928] transition-colors py-6 whitespace-nowrap"
                >
                    Shri Ram Uphaar
                </a>

            </nav>

            <!-- RIGHT: Contact Us Pill + Search + Account + Wishlist + Cart -->
            <div class="flex items-center space-x-2 sm:space-x-3.5 xl:space-x-4 shrink-0">
                
                <!-- Contact Us Gold Rounded Pill (Desktop & Tablet only) -->
                <a 
                    href="{{ route('pages.show', 'contact') }}" 
                    class="hidden md:inline-flex items-center px-4.5 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold rounded-full shadow-xs hover:shadow-md transition-all duration-200 font-heading shrink-0"
                >
                    <span>Contact Us</span>
                    <!-- <svg class="w-3.5 h-3.5 ml-1.5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg> -->
                </a>

                <!-- Search Icon -->
                <button 
                    type="button" 
                    id="search-modal-trigger"
                    class="p-2 sm:p-2.5 text-[#1F1F1F] hover:text-[#D38928] transition-colors focus:outline-none shrink-0 cursor-pointer"
                    aria-label="Open Search"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Customer Account (Hidden on Mobile) -->
                <a 
                    href="{{ url('/account') }}" 
                    class="p-2 sm:p-2.5 text-[#1F1F1F] hover:text-[#D38928] transition-colors hidden sm:inline-block shrink-0"
                    aria-label="Customer Account"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </a>

                <!-- Wishlist with live badge -->
                <a 
                    href="{{ route('wishlist.index') }}" 
                    class="p-2 sm:p-2.5 text-[#1F1F1F] hover:text-[#D38928] transition-colors relative inline-block shrink-0"
                    aria-label="Wishlist"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span 
                        id="header-wishlist-badge"
                        class="absolute top-1 right-0.5 bg-[#D38928] text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        0
                    </span>
                </a>

                <!-- Shopping Bag / Cart with live badge -->
                <a 
                    href="{{ route('cart.index') }}" 
                    id="cart-drawer-trigger"
                    class="p-2 sm:p-2.5 text-[#1F1F1F] hover:text-[#D38928] transition-colors relative inline-block shrink-0 cursor-pointer"
                    aria-label="Cart"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    
                    <span 
                        id="header-cart-badge"
                        class="absolute top-1 right-0.5 bg-[#9B1C31] text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

            </div>

        </div>
    </div>
</header>
