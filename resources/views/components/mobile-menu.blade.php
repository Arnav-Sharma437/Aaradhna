<div 
    id="mobile-drawer-overlay" 
    class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 opacity-0 pointer-events-none transition-opacity duration-300"
    aria-hidden="true"
></div>

<aside 
    id="mobile-drawer"
    class="fixed top-0 left-0 w-4/5 max-w-sm h-full bg-white z-50 shadow-2xl -translate-x-full transition-transform duration-300 ease-in-out flex flex-col font-body"
    aria-label="Mobile Navigation"
>
    <!-- Drawer Header -->
    <div class="p-4 border-b border-stone-200 flex items-center justify-between bg-[#FAF7F2]">
        <div class="flex items-center space-x-2">
            <div class="w-7 h-7 rounded-full bg-white border border-[#D38928]/40 flex items-center justify-center text-[#965A15] shadow-xs">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M12 2C6.5 2 2 6.5 2 12c0 3.5 1.8 6.6 4.6 8.4C8 18.5 11 16 12 12c1 4 4 6.5 5.4 8.4C20.2 18.6 22 15.5 22 12c0-5.5-4.5-10-10-10z"/>
                    <path d="M12 2v20"/>
                </svg>
            </div>
            <span class="font-serif text-lg font-black text-[#2B1810] tracking-wider uppercase">
                Mangalam
            </span>
        </div>
        <button 
            type="button" 
            id="mobile-drawer-close"
            class="p-2 text-gray-500 hover:text-[#2B1810] focus:outline-none"
            aria-label="Close Mobile Menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Drawer Navigation Content (Scrollable) -->
    <div class="flex-1 overflow-y-auto divide-y divide-[#EAE3D9]/60">
        
        <!-- Direct Nav Links (No Dropdowns) -->
        <div class="p-4 space-y-3 text-base font-medium">
            <a href="{{ route('collections.show', 'bambooless') }}" class="block py-1 text-[#2B1810] hover:text-[#D38928] transition-colors font-semibold">
                Bambooless
            </a>
            <a href="{{ route('collections.show', 'havan-cups') }}" class="block py-1 text-[#2B1810] hover:text-[#D38928] transition-colors font-semibold">
                Havan Cups
            </a>
            <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block py-1 text-[#2B1810] hover:text-[#D38928] transition-colors font-semibold">
                Dhoop Cones
            </a>
            <div>
                <div class="py-1 text-xs font-bold tracking-wider text-[#965A15] uppercase">Super Save Offers</div>
                <div class="pl-2 mt-1 space-y-1">
                    <a href="{{ route('bundles.trial-packs') }}" class="flex items-center justify-between py-1 text-sm font-medium text-[#2B1810] hover:text-[#D38928]">
                        <span>Buy any 5 Trial Pack @ 799</span>
                        <span class="text-[9px] font-bold text-white bg-[#D38928] px-1.5 py-0.5 rounded">₹799</span>
                    </a>
                    <a href="{{ route('bundles.buy2get1') }}" class="flex items-center justify-between py-1 text-sm font-medium text-[#2B1810] hover:text-[#D38928]">
                        <span>Buy 2 get 1 free</span>
                        <span class="text-[9px] font-bold text-white bg-[#B24E2B] px-1.5 py-0.5 rounded">Offer</span>
                    </a>
                </div>
            </div>
            <a href="{{ route('collections.show', 'best-seller-combo') }}" class="block py-1 text-[#2B1810] hover:text-[#D38928] transition-colors font-semibold">
                Best Seller Combo
            </a>
        </div>

        <!-- Prominent Contact Us Button in Side Drawer -->
        <div class="p-4 bg-[#FAF7F2]">
            <a 
                href="{{ route('pages.show', 'contact') }}" 
                class="w-full flex items-center justify-center space-x-2 py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] text-white text-sm font-bold uppercase tracking-wider rounded-[12px] shadow-sm font-heading transition-colors"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Contact Us</span>
            </a>
        </div>

        <!-- Account / Help Links -->
        <div class="p-4 space-y-2 text-sm text-gray-500">
            <a href="{{ url('/account') }}" class="flex items-center space-x-2 py-1 text-[#2B1810] hover:text-[#D38928]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>My Account</span>
            </a>
            <a href="{{ url('/account/wishlist') }}" class="flex items-center space-x-2 py-1 text-[#2B1810] hover:text-mangalam-maroon">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span>Saved Wishlist</span>
            </a>
            <a href="{{ route('pages.show', 'about-us') }}" class="block py-1 hover:text-[#2B1810]">
                About Mangalam.co
            </a>
            <a href="{{ route('pages.show', 'faqs') }}" class="block py-1 hover:text-[#2B1810]">
                Frequently Asked Questions
            </a>
        </div>

    </div>

    <!-- Drawer Footer -->
    <div class="p-4 border-t border-[#EADBCC] bg-[#FAF7F2] text-xs text-gray-500">
        <p class="font-semibold text-[#2B1810] font-heading">✦ शुद्धं समर्पयामि ✦</p>
        <p class="mt-0.5 text-gray-500">100% Pure Vedic Samagri | Bambooless</p>
    </div>
</aside>
