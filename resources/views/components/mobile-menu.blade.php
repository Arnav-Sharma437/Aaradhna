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
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Manglam" class="h-10 sm:h-12 w-auto object-contain">
        </a>
        <button 
            type="button" 
            id="mobile-drawer-close"
            class="p-2 text-gray-500 hover:text-[#831F2E] focus:outline-none cursor-pointer"
            aria-label="Close Mobile Menu"
        >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Drawer Navigation Content (Scrollable) -->
    <div class="flex-1 overflow-y-auto divide-y divide-[#EAE3D9]/60 font-body">
        
        <!-- Direct Nav Links -->
        <div class="p-4 space-y-3 text-base font-semibold">
            <a href="{{ route('collections.show', 'bambooless') }}" class="block py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <span>Bambooless</span>
            </a>
            <a href="{{ route('collections.show', 'havan-cups') }}" class="block py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <span>Havan Cups</span>
            </a>
            <a href="{{ route('collections.show', 'dhoop-cones') }}" class="block py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <span>Dhoop Cones</span>
            </a>
            <div class="pt-1">
                <div class="py-1 text-xs font-bold tracking-wider text-[#831F2E] uppercase">
                    <span>Super Save Offers</span>
                </div>
                <div class="pl-2 mt-1 space-y-1.5">
                    <a href="{{ route('bundles.trial-packs') }}" class="flex items-center justify-between py-1 text-sm font-medium text-[#2B1810] hover:text-[#831F2E]">
                        <span>Buy any 5 Trial Pack @ 799</span>
                        <span class="text-[9px] font-bold text-white bg-[#831F2E] px-1.5 py-0.5 rounded">₹799</span>
                    </a>
                    <a href="{{ route('bundles.buy2get1') }}" class="flex items-center justify-between py-1 text-sm font-medium text-[#2B1810] hover:text-[#831F2E]">
                        <span>Buy 2 get 1 free</span>
                        <span class="text-[9px] font-bold text-white bg-[#B24E2B] px-1.5 py-0.5 rounded">FREE GIFT</span>
                    </a>
                </div>
            </div>
            <a href="{{ route('products.show', 'pack-of-six') }}" class="block py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <span>Best Seller Combo</span>
            </a>

            <!-- Pitambara Havan Link -->
            <a 
                href="{{ route('products.pitambara') }}" 
                class="block py-1 text-[#831F2E] font-bold transition-colors"
            >
                <span>Pitambara Havan</span>
            </a>
        </div>

        <!-- Prominent Contact Us Button in Side Drawer -->
        <div class="p-4 bg-[#FAF7F2]">
            <a 
                href="{{ route('pages.contact') }}" 
                class="w-full flex items-center justify-center space-x-2 py-3 px-4 bg-[#831F2E] hover:bg-[#6E1724] text-white text-sm font-bold uppercase tracking-wider rounded-[12px] shadow-sm font-body transition-colors"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Contact Us</span>
            </a>
        </div>

        <!-- Account / Help Links -->
        <div class="p-4 space-y-2 text-sm text-gray-500">
            <a href="{{ auth()->check() ? route('account.index') : route('account.login') }}" class="flex items-center space-x-2 py-1 text-[#2B1810] hover:text-[#D38928] font-medium">
                <svg class="w-4 h-4 text-[#D38928]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                <span>{{ auth()->check() ? 'My Devotee Account (' . auth()->user()->name . ')' : 'Sign In / Register' }}</span>
            </a>
            @if(auth()->check())
                <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="flex items-center space-x-2 py-1 text-[#2B1810] hover:text-[#D38928]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span>My Sacred Orders</span>
                </a>
            @endif
            <a href="{{ route('pages.about') }}" class="block py-1 hover:text-[#2B1810]">
                About Manglam.co
            </a>
            <a href="{{ route('pages.show', 'faqs') }}" class="block py-1 hover:text-[#2B1810]">
                Frequently Asked Questions
            </a>
            @if(auth()->check())
                <form action="{{ route('account.logout') }}" method="POST" class="pt-2">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 flex items-center gap-1 cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        <span>Sign Out</span>
                    </button>
                </form>
            @endif
        </div>

    </div>

    <!-- Drawer Footer -->
    <div class="p-4 border-t border-[#EADBCC] bg-[#FAF7F2] text-xs text-gray-500">
        <p class="font-semibold text-[#2B1810] font-heading">✦ शुद्धं समर्पयामि ✦</p>
        <p class="mt-0.5 text-gray-500">100% Pure Vedic Samagri | Bambooless</p>
    </div>
</aside>
