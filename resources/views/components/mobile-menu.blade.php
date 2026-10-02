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
            <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Mangalam" class="h-10 sm:h-12 w-auto object-contain">
        </a>
        <button 
            type="button" 
            id="mobile-drawer-close"
            class="p-2 text-gray-500 hover:text-[#831F2E] focus:outline-none"
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
            <a href="{{ route('collections.show', 'bambooless') }}" class="flex items-center space-x-2.5 py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none">
                    <path d="M7 21L11.5 8" stroke="#8C827A" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 21V8" stroke="#8C827A" stroke-width="2" stroke-linecap="round"/>
                    <path d="M17 21L12.5 8" stroke="#8C827A" stroke-width="2" stroke-linecap="round"/>
                    <circle cx="12" cy="7.5" r="1.5" fill="#EF4444"/>
                    <circle cx="9.5" cy="8.5" r="1.3" fill="#F59E0B"/>
                    <circle cx="14.5" cy="8.5" r="1.3" fill="#F59E0B"/>
                    <path d="M12 5.5C11 4 13 3 12 1.5" stroke="#D38928" stroke-width="1.3" stroke-linecap="round"/>
                </svg>
                <span>Bambooless</span>
            </a>
            <a href="{{ route('collections.show', 'havan-cups') }}" class="flex items-center space-x-2.5 py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none">
                    <path d="M5 13H19L17 21H7L5 13Z" fill="#FAF5EE" stroke="#78350F" stroke-width="1.8"/>
                    <path d="M4 13H20" stroke="#78350F" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 2C12 2 15.5 5.5 15.5 8C15.5 10 14 11 12 11C10 11 8.5 10 8.5 8C8.5 5.5 12 2 12 2Z" fill="#F59E0B" stroke="#D97706" stroke-width="1"/>
                    <path d="M12 5.5C12 5.5 13.5 7.5 13.5 8.8C13.5 9.7 12.8 10.3 12 10.3C11.2 10.3 10.5 9.7 10.5 8.8C10.5 7.5 12 5.5 12 5.5Z" fill="#EF4444"/>
                </svg>
                <span>Havan Cups</span>
            </a>
            <a href="{{ route('collections.show', 'dhoop-cones') }}" class="flex items-center space-x-2.5 py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none">
                    <path d="M6 21L12 8L18 21H6Z" fill="#FAF5EE" stroke="#78350F" stroke-width="1.8" stroke-linejoin="round"/>
                    <circle cx="12" cy="7.5" r="1.5" fill="#EF4444"/>
                    <path d="M12 5C11 3.5 13.5 2.5 12.5 1" stroke="#D38928" stroke-width="1.3" stroke-linecap="round"/>
                </svg>
                <span>Dhoop Cones</span>
            </a>
            <div class="pt-1">
                <div class="py-1 text-xs font-bold tracking-wider text-[#831F2E] uppercase flex items-center space-x-1.5">
                    <svg class="w-4 h-4 shrink-0" viewBox="0 0 24 24" fill="none">
                        <path d="M12 2L14.2 8.5L21 9.2L16 13.8L17.5 20.5L12 17L6.5 20.5L8 13.8L3 9.2L9.8 8.5L12 2Z" fill="#FEF3C7" stroke="#D97706" stroke-width="1.5"/>
                    </svg>
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
            <a href="{{ route('products.show', 'pack-of-six') }}" class="flex items-center space-x-2.5 py-1 text-[#444444] hover:text-[#831F2E] transition-colors">
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none">
                    <path d="M4 18L2 7L7.5 11L12 4L16.5 11L22 7L20 18H4Z" fill="#FEF3C7" stroke="#B45309" stroke-width="1.5" stroke-linejoin="round"/>
                </svg>
                <span>Best Seller Combo</span>
            </a>

            <!-- Pitambara Havan Link -->
            <a 
                href="{{ route('products.pitambara') }}" 
                class="flex items-center space-x-2.5 py-1 text-[#831F2E] font-bold transition-colors"
            >
                <svg class="w-5 h-5 shrink-0" viewBox="0 0 24 24" fill="none">
                    <path d="M4 14C4 18 7.5 20.5 12 20.5C16.5 20.5 20 18 20 14H4Z" fill="#FDF2E9" stroke="#831F2E" stroke-width="1.8"/>
                    <path d="M12 2.5C12 2.5 15.5 6 15.5 9C15.5 11 14 12.5 12 12.5C10 12.5 8.5 11 8.5 9C8.5 6 12 2.5 12 2.5Z" fill="#F59E0B" stroke="#B45309" stroke-width="1"/>
                    <circle cx="12" cy="9" r="1.3" fill="#EF4444"/>
                </svg>
                <span>Pitambara Havan</span>
            </a>
        </div>

        <!-- Prominent Contact Us Button in Side Drawer -->
        <div class="p-4 bg-[#FAF7F2]">
            <a 
                href="{{ route('pages.show', 'contact') }}" 
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
                About Mangalam.co
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
