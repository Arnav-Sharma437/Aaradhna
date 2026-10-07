<div 
    id="mobile-drawer-overlay" 
    class="fixed inset-0 bg-black/70 backdrop-blur-xs z-50 opacity-0 pointer-events-none transition-opacity duration-300"
    aria-hidden="true"
></div>

<aside 
    id="mobile-drawer"
    class="fixed top-0 left-0 w-full sm:w-[400px] h-full bg-[#D38928] text-white z-50 shadow-2xl -translate-x-full transition-transform duration-300 ease-in-out flex flex-col font-body select-none overflow-hidden"
    aria-label="Mobile Navigation"
>
    <!-- Drawer Header Bar (Clean White Background with Logo & Close X) -->
    <div class="p-3.5 sm:p-4 bg-white text-[#121212] border-b border-[#EAE3D9] flex items-center justify-between shrink-0 shadow-xs relative z-20">
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

        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="ISHANAA" class="h-8 sm:h-9 w-auto object-contain">
        </a>

        <!-- Right Quick Actions -->
        <div class="flex items-center space-x-1.5 text-[#121212]">
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

    <!-- Scrollable Navigation Body (Brand Golden Yellow #D38928 Palette, Zero Extra Tags) -->
    <div class="relative flex-1 overflow-y-auto bg-gradient-to-b from-[#D38928] via-[#C77C1B] to-[#B56D10] text-white font-body flex flex-col justify-between">
        
        <!-- Main Navigation Links List (Clean, No Tags) -->
        <div class="divide-y divide-white/20 text-white font-body">
            
            <!-- 1. Bambooless -->
            <a 
                href="{{ route('collections.show', 'bambooless') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Bambooless</span>
            </a>

            <!-- 2. Havan Cups -->
            <a 
                href="{{ route('collections.show', 'havan-cups') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Havan Cups</span>
            </a>

            <!-- 3. Dhoop Cones -->
            <a 
                href="{{ route('collections.show', 'dhoop-cones') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Dhoop Cones</span>
            </a>

            <!-- 4. Super Save Offers (Dropdown Accordion - Closed by Default, Opens on Click with Arrow) -->
            <div class="w-full">
                <button 
                    type="button" 
                    id="mobile-drawer-offers-toggle"
                    class="w-full py-4 px-5 flex items-center justify-between hover:bg-black/10 transition-colors text-left group cursor-pointer focus:outline-none"
                >
                    <span class="text-base sm:text-lg font-bold font-serif tracking-wide text-[#FFFDF9]">Super Save Offers</span>
                    <svg id="mobile-drawer-offers-arrow" class="w-5 h-5 text-white/90 transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="mobile-drawer-offers-content" class="hidden bg-black/15 pl-6 pr-5 py-2 space-y-2 font-body">
                    <a href="{{ route('bundles.trial-packs') }}" class="flex items-center justify-between py-2 text-sm font-medium text-white hover:text-white/80 transition-colors">
                        <span>Buy any 5 Trial Pack @ 799</span>
                        <span class="text-[9px] font-bold text-[#831F2E] bg-white px-2 py-0.5 rounded-full shadow-xs">₹799</span>
                    </a>
                    <a href="{{ route('bundles.buy2get1') }}" class="flex items-center justify-between py-2 text-sm font-medium text-white hover:text-white/80 transition-colors border-t border-white/10">
                        <span>Buy 2 get 1 free</span>
                        <span class="text-[9px] font-bold text-white bg-[#831F2E] px-2 py-0.5 rounded-full">FREE GIFT</span>
                    </a>
                </div>
            </div>

            <!-- 5. Best Seller Combo -->
            <a 
                href="{{ route('products.show', 'pack-of-six') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Best Seller Combo</span>
            </a>

            <!-- 6. Shri Ram Pitambara Havan -->
            <a 
                href="{{ route('products.pitambara') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Shri Ram Uphaar</span>
            </a>

            <!-- 7. Contact Us -->
            <a 
                href="{{ route('pages.contact') }}" 
                class="block py-4 px-5 text-base sm:text-lg font-bold font-serif tracking-wide text-white hover:bg-black/10 transition-colors"
            >
                <span>Contact Us</span>
            </a>

        </div>

        <!-- Devotee Account / Help Links -->
        <div class="p-5 space-y-2 text-xs text-white/90 border-t border-white/15 bg-black/10">
            <a href="{{ auth()->check() ? route('account.index') : route('account.login') }}" class="flex items-center space-x-2 py-1 text-white hover:text-[#FFFDF9] font-medium">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>{{ auth()->check() ? 'My Devotee Account (' . auth()->user()->name . ')' : 'Sign In / Register' }}</span>
            </a>
            @if(auth()->check())
                <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="flex items-center space-x-2 py-1 text-white hover:text-[#FFFDF9]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span>My Sacred Orders</span>
                </a>
            @endif
            <div class="flex items-center space-x-3 pt-1 text-white/80 text-xs">
                <a href="{{ route('pages.about') }}" class="hover:text-white">About Us</a>
                <span>•</span>
                <a href="{{ route('pages.show', 'faqs') }}" class="hover:text-white">FAQs</a>
            </div>
            @if(auth()->check())
                <form action="{{ route('account.logout') }}" method="POST" class="pt-1">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-white bg-black/25 px-2.5 py-1 rounded hover:bg-black/40 flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Sign Out</span>
                    </button>
                </form>
            @endif
        </div>

        <!-- Sacred Vedic Bottom Card with Coupon Pill -->
        <div class="p-5 text-center space-y-2.5 bg-black/20 backdrop-blur-xs border-t border-white/15">
            <div class="space-y-0.5">
                <h4 class="text-lg font-serif font-bold text-white tracking-wide">
                    शुद्धं समर्पयामि।
                </h4>
                <p class="text-[11px] font-serif italic text-white/90">
                    Śuddhaṁ Samarpayāmi.
                </p>
                <p class="text-[10px] text-white/80">
                    "I offer that which is pure."
                </p>
            </div>

            <!-- Coupon Pill Button -->
            <div class="pt-1">
                <div class="inline-flex items-center space-x-1.5 bg-white text-[#D38928] px-4 py-2 rounded-full font-bold text-xs shadow-lg">
                    <span>Use code <strong>ISHANAA10</strong> at checkout</span>
                    <span>🏷️</span>
                </div>
            </div>
        </div>

    </div>
</aside>

<!-- Dropdown Click Script (Closed by default, toggles on click) -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('mobile-drawer-offers-toggle');
        const content = document.getElementById('mobile-drawer-offers-content');
        const arrow = document.getElementById('mobile-drawer-offers-arrow');

        if (toggle && content) {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                content.classList.toggle('hidden');
                if (arrow) arrow.classList.toggle('rotate-180');
            });
        }
    });
</script>
