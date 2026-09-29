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
    <div class="p-4 border-b border-sadhna-border flex items-center justify-between bg-sadhna-warm-bg/60">
        <div class="flex items-center">
            <img src="{{ asset('assets/images/aaradhna-logo.png') }}" alt="Aaradhna" class="h-8 w-auto object-contain">
        </div>
        <button 
            type="button" 
            id="mobile-drawer-close"
            class="p-2 text-sadhna-muted hover:text-sadhna-primary focus:outline-none"
            aria-label="Close Mobile Menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Drawer Navigation Content (Scrollable) -->
    <div class="flex-1 overflow-y-auto divide-y divide-sadhna-border/60">
        
        <!-- Accordion 1: Pooja Shop -->
        <div class="p-4">
            <button 
                type="button" 
                class="mobile-accordion-toggle w-full flex items-center justify-between text-base font-bold text-sadhna-primary"
                aria-expanded="false"
            >
                <span>Pooja Shop</span>
                <svg class="w-4 h-4 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div class="mobile-accordion-content hidden mt-3 pl-3 space-y-2 border-l-2 border-sadhna-gold/40 text-sm">
                <a href="{{ route('collections.show', 'bambooless') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    Bambooless
                </a>
                <a href="{{ route('collections.show', 'havan-cups') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    Havan Cups
                </a>
                <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    Dhoop Cones
                </a>
                
                <div class="pt-2 border-t border-sadhna-border/50 text-xs font-semibold text-sadhna-muted uppercase tracking-wider">
                    Offers &amp; Combos
                </div>
                <a href="{{ route('collections.show', 'super-save-offers') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    Super Save Offers
                </a>
                <a href="{{ route('collections.show', 'best-seller-combo') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    Best Seller Combo
                </a>
                <a href="{{ route('collections.show', 'all') }}" class="block py-1 text-sadhna-primary hover:text-sadhna-gold">
                    All Sacred Products
                </a>
            </div>
        </div>

        <!-- Direct Nav Links -->
        <div class="p-4 space-y-3 text-base font-medium">
            <a href="{{ route('collections.show', 'bambooless') }}" class="block text-sadhna-primary hover:text-sadhna-gold">
                Bambooless
            </a>
            <a href="{{ route('collections.show', 'super-save-offers') }}" class="flex items-center justify-between text-sadhna-primary hover:text-sadhna-gold">
                <span>Super Save Offers</span>
                <span class="text-[10px] font-bold text-white bg-sadhna-gold px-2 py-0.5 rounded-full uppercase">Save</span>
            </a>
            <a href="{{ route('collections.show', 'best-seller-combo') }}" class="block text-sadhna-primary hover:text-sadhna-gold">
                Best Seller Combo
            </a>
            <a href="{{ route('collections.show', 'all') }}" class="block text-sadhna-primary hover:text-sadhna-gold">
                All Products
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
        <div class="p-4 space-y-2 text-sm text-sadhna-muted">
            <a href="{{ url('/account') }}" class="flex items-center space-x-2 py-1 text-sadhna-primary hover:text-sadhna-gold">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>My Account</span>
            </a>
            <a href="{{ url('/account/wishlist') }}" class="flex items-center space-x-2 py-1 text-sadhna-primary hover:text-sadhna-maroon">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                <span>Saved Wishlist</span>
            </a>
            <a href="{{ route('pages.show', 'about-us') }}" class="block py-1 hover:text-sadhna-primary">
                About Aaradhna.co
            </a>
            <a href="{{ route('pages.show', 'faqs') }}" class="block py-1 hover:text-sadhna-primary">
                Frequently Asked Questions
            </a>
        </div>

    </div>

    <!-- Drawer Footer -->
    <div class="p-4 border-t border-[#EADBCC] bg-[#FAF7F2] text-xs text-sadhna-muted">
        <p class="font-semibold text-sadhna-primary font-heading">✦ शुद्धं समर्पयामि ✦</p>
        <p class="mt-0.5 text-gray-500">100% Pure Vedic Samagri | Bambooless</p>
    </div>
</aside>
