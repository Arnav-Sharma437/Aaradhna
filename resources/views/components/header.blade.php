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
                    class="nav-link-hover text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-semibold text-[#1F1F1F] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Bambooless
                </a>

                <!-- 2. Havan Cups -->
                <a 
                    href="{{ route('collections.show', 'havan-cups') }}" 
                    class="nav-link-hover text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-semibold text-[#1F1F1F] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Havan Cups
                </a>

                <!-- 3. Dhoop Cones -->
                <a 
                    href="{{ route('collections.show', 'dhoop-cones') }}" 
                    class="nav-link-hover text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-semibold text-[#1F1F1F] transition-colors py-2 xl:py-3 whitespace-nowrap tracking-normal"
                >
                    Dhoop Cones
                </a>

                <!-- 4. Super Save Offers (Mega Menu Dropdown) -->
                <div class="relative group py-2 xl:py-3">
                    <button 
                        type="button"
                        class="nav-link-hover flex items-center space-x-1 text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-semibold text-[#1F1F1F] group-hover:text-[#831F2E] transition-colors whitespace-nowrap tracking-normal cursor-pointer focus:outline-none"
                    >
                        <span>Super Save Offers</span>
                        <svg class="w-3.5 h-3.5 text-[#8C827A] group-hover:text-[#831F2E] group-hover:rotate-180 transition-transform duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Mega Menu Dropdown Container -->
                    <div class="absolute -left-12 top-full -mt-0.5 w-[540px] bg-white rounded-2xl shadow-2xl border border-[#EAE3D9] p-4 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top group-hover:translate-y-0 translate-y-1.5 pointer-events-none group-hover:pointer-events-auto">
                        
                        <div class="text-[11px] font-bold text-[#831F2E] uppercase tracking-wider mb-2.5 flex items-center justify-between border-b border-[#F0EAE1] pb-2">
                            <span>✨ Exclusive Sacred Bundles</span>
                            <span class="text-[10px] font-normal text-[#7B7B7B]">Limited Festive Stock</span>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <!-- Mega Card 1: Trial Pack 5 -->
                            <a 
                                href="{{ route('bundles.trial-packs') }}" 
                                class="group/card flex flex-col justify-between p-3.5 rounded-xl bg-gradient-to-br from-[#FFFDF9] to-[#FAF5EE] border border-[#EAE3D9] hover:border-[#831F2E]/40 hover:shadow-md transition-all duration-200"
                            >
                                <div>
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-[9px] font-black uppercase tracking-wider bg-[#D38928]/15 text-[#965A15] px-2 py-0.5 rounded-full">POPULAR</span>
                                        <span class="text-xs font-black text-[#831F2E]">₹799</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-[#1F1F1F] group-hover/card:text-[#831F2E] transition-colors leading-tight">
                                        Buy Any 5 Trial Pack
                                    </h4>
                                    <p class="text-[11px] text-[#666666] mt-1 leading-snug">
                                        Pick 5 pure aromatic trial packs & create your sacred pooja mix.
                                    </p>
                                </div>
                                <div class="mt-3 flex items-center text-xs font-bold text-[#831F2E] group-hover/card:translate-x-1 transition-transform">
                                    <span>Claim Offer</span>
                                    <span class="ml-1">➔</span>
                                </div>
                            </a>

                            <!-- Mega Card 2: Buy 2 Get 1 Free -->
                            <a 
                                href="{{ route('bundles.buy2get1') }}" 
                                class="group/card flex flex-col justify-between p-3.5 rounded-xl bg-gradient-to-br from-[#FFFDF9] to-[#FAF5EE] border border-[#EAE3D9] hover:border-[#831F2E]/40 hover:shadow-md transition-all duration-200"
                            >
                                <div>
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-[9px] font-black uppercase tracking-wider bg-[#831F2E]/15 text-[#831F2E] px-2 py-0.5 rounded-full">SPECIAL DEAL</span>
                                        <span class="text-[10px] font-black uppercase text-[#831F2E] bg-rose-50 px-1.5 py-0.5 rounded">FREE GIFT</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-[#1F1F1F] group-hover/card:text-[#831F2E] transition-colors leading-tight">
                                        Buy 2 Get 1 FREE
                                    </h4>
                                    <p class="text-[11px] text-[#666666] mt-1 leading-snug">
                                        Purchase 2 packs and receive an authentic Chandan pack free.
                                    </p>
                                </div>
                                <div class="mt-3 flex items-center text-xs font-bold text-[#831F2E] group-hover/card:translate-x-1 transition-transform">
                                    <span>Shop Offer</span>
                                    <span class="ml-1">➔</span>
                                </div>
                            </a>
                        </div>

                        <!-- Mega Menu Footer Bar -->
                        <div class="mt-3 pt-2.5 border-t border-[#F0EAE1] flex items-center justify-between text-[11px] text-[#7B7B7B]">
                            <span class="flex items-center gap-1.5">
                                <span class="text-amber-500">✦</span>
                                <span>100% Charcoal Free • Free Shipping Above ₹499</span>
                            </span>
                            <a href="{{ route('collections.show', 'super-save-offers') }}" class="font-bold text-[#831F2E] hover:underline">
                                View All ➔
                            </a>
                        </div>

                    </div>
                </div>

                <!-- 5. Best Seller Combo (Mega Menu Dropdown) -->
                <div class="relative group py-2 xl:py-3">
                    <button 
                        type="button"
                        class="nav-link-hover flex items-center space-x-1 text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-semibold text-[#1F1F1F] group-hover:text-[#831F2E] transition-colors whitespace-nowrap tracking-normal cursor-pointer focus:outline-none"
                    >
                        <span>Best Seller Combo</span>
                        <svg class="w-3.5 h-3.5 text-[#8C827A] group-hover:text-[#831F2E] group-hover:rotate-180 transition-transform duration-200 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Mega Menu Dropdown Container -->
                    <div class="absolute -left-16 top-full -mt-0.5 w-[540px] bg-white rounded-2xl shadow-2xl border border-[#EAE3D9] p-4 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top group-hover:translate-y-0 translate-y-1.5 pointer-events-none group-hover:pointer-events-auto">
                        
                        <div class="text-[11px] font-bold text-[#831F2E] uppercase tracking-wider mb-2.5 flex items-center justify-between border-b border-[#F0EAE1] pb-2">
                            <span>🪷 Curated Devotional Combos</span>
                            <span class="text-[10px] font-bold text-[#D38928]">Save Up To 40%</span>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <!-- Mega Card 1: Pack of Six -->
                            <a 
                                href="{{ route('products.show', 'pack-of-six') }}" 
                                class="group/card flex flex-col justify-between p-3.5 rounded-xl bg-gradient-to-br from-[#FFFDF9] to-[#FAF5EE] border border-[#EAE3D9] hover:border-[#831F2E]/40 hover:shadow-md transition-all duration-200"
                            >
                                <div>
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-[9px] font-black uppercase tracking-wider bg-amber-100 text-amber-900 px-2 py-0.5 rounded-full">★ BESTSELLER</span>
                                        <span class="text-xs font-black text-[#831F2E]">₹1199</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-[#1F1F1F] group-hover/card:text-[#831F2E] transition-colors leading-tight">
                                        Pack of Six Grand Combo
                                    </h4>
                                    <p class="text-[11px] text-[#666666] mt-1 leading-snug">
                                        6 divine Vedic fragrances in 1 ultimate master collection.
                                    </p>
                                </div>
                                <div class="mt-3 flex items-center text-xs font-bold text-[#831F2E] group-hover/card:translate-x-1 transition-transform">
                                    <span>Explore Grand Combo</span>
                                    <span class="ml-1">➔</span>
                                </div>
                            </a>

                            <!-- Mega Card 2: All Combos -->
                            <a 
                                href="{{ route('collections.show', 'best-seller-combo') }}" 
                                class="group/card flex flex-col justify-between p-3.5 rounded-xl bg-gradient-to-br from-[#FFFDF9] to-[#FAF5EE] border border-[#EAE3D9] hover:border-[#831F2E]/40 hover:shadow-md transition-all duration-200"
                            >
                                <div>
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-[9px] font-black uppercase tracking-wider bg-[#831F2E]/15 text-[#831F2E] px-2 py-0.5 rounded-full">ALL COMBOS</span>
                                        <span class="text-[10px] font-bold text-stone-600">6+ Options</span>
                                    </div>
                                    <h4 class="text-sm font-bold text-[#1F1F1F] group-hover/card:text-[#831F2E] transition-colors leading-tight">
                                        Explore All Combos
                                    </h4>
                                    <p class="text-[11px] text-[#666666] mt-1 leading-snug">
                                        Perfect devotional pairings for daily home puja & auspicious gifting.
                                    </p>
                                </div>
                                <div class="mt-3 flex items-center text-xs font-bold text-[#831F2E] group-hover/card:translate-x-1 transition-transform">
                                    <span>Browse Collection</span>
                                    <span class="ml-1">➔</span>
                                </div>
                            </a>
                        </div>

                        <!-- Mega Menu Footer Bar -->
                        <div class="mt-3 pt-2.5 border-t border-[#F0EAE1] flex items-center justify-between text-[11px] text-[#7B7B7B]">
                            <span class="flex items-center gap-1.5">
                                <span class="text-amber-500">✦</span>
                                <span>Crafted with Pure Herbs as per Vedic Shastras</span>
                            </span>
                            <a href="{{ route('collections.show', 'best-seller-combo') }}" class="font-bold text-[#831F2E] hover:underline">
                                View All Combos ➔
                            </a>
                        </div>

                    </div>
                </div>

                <!-- 6. Pitambara Havan (Small Coming Soon Badge Positioned ON TOP) -->
                <a 
                    href="{{ route('products.pitambara') }}" 
                    class="relative flex flex-col items-center justify-center py-1 xl:py-1.5 px-2 group shrink-0 transition-transform hover:-translate-y-0.5"
                    aria-label="Pitambara Havan - Coming Soon"
                >
                    <!-- Small Badge directly ABOVE the text -->
                    <span class="text-[8px] font-black uppercase tracking-wider bg-gradient-to-r from-[#831F2E] to-[#B24E2B] text-white px-2 py-0.5 rounded-full shadow-2xs leading-none mb-1 animate-pulse">
                        COMING SOON 🔥
                    </span>
                    <span class="nav-link-hover text-[13px] lg:text-[13.5px] xl:text-[14.5px] font-bold text-[#831F2E] whitespace-nowrap">
                        Pitambara Havan
                    </span>
                </a>

            </nav>

            <!-- RIGHT: Clean Compact Action Icons (Search + Account + Wishlist + Cart) -->
            <div class="flex items-center justify-end space-x-0.5 sm:space-x-1 lg:space-x-1.5 shrink-0">
                
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

                <!-- 2. Customer Account (Hidden on small screens) -->
                <a 
                    href="{{ auth()->check() ? route('account.index') : route('account.login') }}" 
                    class="p-1.5 sm:p-2 text-[#1F1F1F] hover:text-[#D38928] transition-colors hidden md:inline-flex items-center justify-center shrink-0 rounded-full hover:bg-stone-50 relative group"
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
