<header class="sticky top-0 z-40 bg-white/98 backdrop-blur-md border-b border-[#EAE3D9] transition-all duration-200 shadow-xs font-body">
    <div class="w-full max-w-[1440px] mx-auto px-3 sm:px-6 lg:px-8 xl:px-10">
        <div class="flex items-center justify-between h-18 sm:h-20 lg:h-22 gap-2 sm:gap-4">
            
            <!-- LEFT: Mobile Menu Button (Mobile only) + Brand Logo -->
            <div class="flex items-center space-x-2 sm:space-x-3 shrink-0">
                <!-- Mobile Menu Button (Mobile / Tablet Only) -->
                <button 
                    type="button" 
                    id="mobile-menu-trigger"
                    class="lg:hidden p-2 -ml-1.5 text-[#121212] hover:text-[#D38928] focus:outline-none transition-colors rounded-lg hover:bg-stone-100/60 cursor-pointer"
                    aria-label="Open Mobile Menu"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Brand Logo (Left-aligned) -->
                <a href="{{ route('home') }}" class="group flex items-center py-1" aria-label="Mangalam - Pure Sacred Rituals">
                    <img 
                        src="{{ asset('assets/images/mangalam-logo.png') }}" 
                        alt="Mangalam" 
                        class="h-10 sm:h-13 lg:h-15 w-auto max-w-[130px] sm:max-w-[160px] lg:max-w-[190px] xl:max-w-[210px] object-contain transition-transform group-hover:scale-102"
                    >
                </a>
            </div>

            <!-- CENTER: Navigation Menu (Desktop & Laptop) - Fluid Auto Spacing -->
            <nav class="hidden lg:flex items-center justify-center flex-1 min-w-0 space-x-2.5 lg:space-x-4 xl:space-x-6 2xl:space-x-7 px-1 xl:px-3 font-body">
                
                <!-- 1. Bambooless -->
                <a 
                    href="{{ route('collections.show', 'bambooless') }}" 
                    class="nav-link-hover text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-medium text-[#1F1F1F] hover:text-[#831F2E] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Bambooless
                </a>

                <!-- 2. Havan Cups -->
                <a 
                    href="{{ route('collections.show', 'havan-cups') }}" 
                    class="nav-link-hover text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-medium text-[#1F1F1F] hover:text-[#831F2E] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Havan Cups
                </a>

                <!-- 3. Dhoop Cones -->
                <a 
                    href="{{ route('collections.show', 'dhoop-cones') }}" 
                    class="nav-link-hover text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-medium text-[#1F1F1F] hover:text-[#831F2E] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Dhoop Cones
                </a>

                <!-- 4. Super Save Offers (Interactive Mega Menu with Hover Image Preview) -->
                <div class="relative group py-2 xl:py-3 flex items-center">
                    <button 
                        type="button"
                        class="nav-link-hover flex items-center space-x-1 text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-medium text-[#1F1F1F] group-hover:text-[#831F2E] transition-colors whitespace-nowrap tracking-normal cursor-pointer focus:outline-none"
                    >
                        <span>Super Save Offers</span>
                        <svg class="w-3.5 h-3.5 text-[#8C827A] group-hover:text-[#831F2E] group-hover:rotate-180 transition-transform duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Mega Menu with Dynamic Image Preview -->
                    <div class="absolute -left-12 top-full -mt-0.5 w-[540px] bg-white rounded-2xl shadow-2xl border border-[#EAE3D9] p-4 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top group-hover:translate-y-0 translate-y-1 pointer-events-none group-hover:pointer-events-auto">
                        <div class="grid grid-cols-12 gap-4 items-center">
                            
                            <!-- Left: 2 Offer Items (7 Cols) -->
                            <div class="col-span-7 space-y-1.5">
                                <a 
                                    href="{{ route('bundles.trial-packs') }}" 
                                    class="group/item flex items-center justify-between p-2.5 rounded-xl hover:bg-[#FAF7F2] transition-colors cursor-pointer"
                                    onmouseenter="document.getElementById('mega-preview-trial').classList.remove('opacity-0', 'pointer-events-none'); document.getElementById('mega-preview-b2g1').classList.add('opacity-0', 'pointer-events-none');"
                                >
                                    <div>
                                        <div class="text-[13.5px] font-semibold text-[#1F1F1F] group-hover/item:text-[#831F2E] transition-colors">
                                            Buy any 5 Trial Pack @ 799
                                        </div>
                                        <div class="text-[11px] text-[#7B7B7B]">5 Sacred Vedic Fragrances</div>
                                    </div>
                                    <span class="text-[10px] font-bold bg-[#D38928]/15 text-[#965A15] px-2 py-0.5 rounded-full shrink-0 ml-2">₹799</span>
                                </a>

                                <a 
                                    href="{{ route('bundles.buy2get1') }}" 
                                    class="group/item flex items-center justify-between p-2.5 rounded-xl hover:bg-[#FAF7F2] transition-colors cursor-pointer"
                                    onmouseenter="document.getElementById('mega-preview-b2g1').classList.remove('opacity-0', 'pointer-events-none'); document.getElementById('mega-preview-trial').classList.add('opacity-0', 'pointer-events-none');"
                                >
                                    <div>
                                        <div class="text-[13.5px] font-semibold text-[#1F1F1F] group-hover/item:text-[#831F2E] transition-colors">
                                            Buy 2 Get 1 FREE
                                        </div>
                                        <div class="text-[11px] text-[#7B7B7B]">Free Chandan pack included</div>
                                    </div>
                                    <span class="text-[10px] font-bold bg-[#831F2E]/10 text-[#831F2E] px-2 py-0.5 rounded-full shrink-0 ml-2">FREE GIFT</span>
                                </a>

                                <div class="pt-2 px-2.5 border-t border-stone-100">
                                    <a 
                                        href="{{ route('collections.show', 'super-save-offers') }}" 
                                        class="flex items-center justify-between text-xs font-semibold text-[#831F2E] hover:text-[#6E1724] transition-colors"
                                    >
                                        <span>View All Offers</span>
                                        <span>&rarr;</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Right: Dynamic Hover Image Preview Box (5 Cols) -->
                            <div class="col-span-5 relative w-full h-[155px] rounded-xl overflow-hidden bg-stone-100 border border-[#EAE3D9] shadow-inner">
                                <img 
                                    id="mega-preview-trial" 
                                    src="{{ asset('assets/images/banner-5-trial-packs.jpg') }}" 
                                    alt="Buy 5 Trial Packs @ ₹799"
                                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 opacity-100"
                                >
                                <img 
                                    id="mega-preview-b2g1" 
                                    src="{{ asset('assets/images/banner-buy2-get1-free.jpg') }}" 
                                    alt="Buy 2 Get 1 FREE"
                                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 opacity-0 pointer-events-none"
                                >
                            </div>

                        </div>
                    </div>
                </div>

                <!-- 5. Best Seller Combo (Direct Product Link - No Dropdown) -->
                <a 
                    href="{{ route('products.show', 'pack-of-six') }}" 
                    class="nav-link-hover text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-medium text-[#1F1F1F] hover:text-[#831F2E] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Best Seller Combo
                </a>

                <!-- 6. Pitambara Havan (Underline Hover Link) -->
                <a 
                    href="{{ route('products.pitambara') }}" 
                    class="nav-link-hover text-[13.5px] lg:text-[14px] xl:text-[14.5px] font-bold text-[#831F2E] hover:text-[#6E1724] transition-colors py-2 xl:py-3 whitespace-nowrap"
                >
                    Pitambara Havan
                </a>

            </nav>

            <!-- RIGHT: Clean Compact Action Icons (Search + Account + Wishlist + Cart) -->
            <div class="flex items-center justify-end space-x-1 sm:space-x-1.5 lg:space-x-2 shrink-0">
                
                <!-- 1. Search Icon Button -->
                <button 
                    type="button" 
                    id="search-modal-trigger"
                    class="p-2 text-[#1F1F1F] hover:text-[#831F2E] transition-colors focus:outline-none shrink-0 cursor-pointer rounded-full hover:bg-stone-50"
                    aria-label="Open Search"
                >
                    <svg class="w-6 h-6 sm:w-[25px] sm:h-[25px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- 2. Customer Account (Hidden on small screens) -->
                <a 
                    href="{{ auth()->check() ? route('account.index') : route('account.login') }}" 
                    class="p-2 text-[#1F1F1F] hover:text-[#831F2E] transition-colors hidden md:inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50 relative group"
                    aria-label="Customer Account"
                    title="{{ auth()->check() ? 'My Devotee Account (' . auth()->user()->name . ')' : 'Sign In to Devotee Account' }}"
                >
                    <svg class="w-6 h-6 sm:w-[25px] sm:h-[25px] {{ auth()->check() ? 'text-[#831F2E]' : '' }}" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </a>

                <!-- 3. Wishlist with live badge -->
                <a 
                    href="{{ route('wishlist.index') }}" 
                    class="p-2 text-[#1F1F1F] hover:text-[#831F2E] transition-colors relative inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50"
                    aria-label="Wishlist"
                >
                    <svg class="w-6 h-6 sm:w-[25px] sm:h-[25px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span 
                        id="header-wishlist-badge"
                        class="absolute top-1 right-0.5 bg-[#831F2E] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        0
                    </span>
                </a>

                <!-- 4. Shopping Bag / Cart with live badge -->
                <a 
                    href="{{ route('cart.index') }}" 
                    id="cart-drawer-trigger"
                    class="p-2 text-[#1F1F1F] hover:text-[#831F2E] transition-colors relative inline-flex items-center justify-center shrink-0 cursor-pointer rounded-full hover:bg-stone-50"
                    aria-label="Cart"
                >
                    <svg class="w-6 h-6 sm:w-[25px] sm:h-[25px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    
                    <span 
                        id="header-cart-badge"
                        class="absolute top-1 right-0.5 bg-[#831F2E] text-white text-[9px] font-bold w-4 h-4 rounded-full flex items-center justify-center leading-none ring-2 ring-white"
                    >
                        {{ session('cart_count', 0) }}
                    </span>
                </a>

            </div>

        </div>
    </div>
</header>
