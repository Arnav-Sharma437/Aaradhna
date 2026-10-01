<!-- ========================================================================= -->
<!-- MOBILE APP-LIKE BOTTOM FLOATING NAVIGATION BAR                           -->
<!-- ========================================================================= -->
<nav class="lg:hidden fixed bottom-0 inset-x-0 z-50 bg-white/98 backdrop-blur-lg border-t border-[#EADBCC] shadow-2xl py-2 px-3 pb-safe font-body pointer-events-auto select-none">
    <div class="grid grid-cols-5 items-center text-center">
        
        <!-- 1. Home -->
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center space-y-1 py-1 text-xs {{ request()->routeIs('home') ? 'text-[#D38928]' : 'text-gray-500 hover:text-[#121212]' }} transition-colors">
            <svg class="w-5 h-5 {{ request()->routeIs('home') ? 'stroke-[2.5]' : 'stroke-2' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span class="text-xs font-bold font-heading">Home</span>
        </a>

        <!-- 2. Pooja Shop Collections -->
        <a href="{{ route('collections.show', 'all') }}" class="flex flex-col items-center justify-center space-y-1 py-1 text-xs {{ request()->routeIs('collections.show') ? 'text-[#D38928]' : 'text-gray-500 hover:text-[#121212]' }} transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span class="text-xs font-bold font-heading">Shop</span>
        </a>

        <!-- 3. Search Modal Trigger -->
        <button 
            type="button" 
            id="mobile-app-search-trigger" 
            class="search-modal-opener flex flex-col items-center justify-center space-y-1 py-1 text-xs text-gray-500 hover:text-[#D38928] transition-colors focus:outline-none cursor-pointer"
        >
            <div class="w-9 h-9 -mt-3 rounded-full bg-[#D38928] text-white flex items-center justify-center shadow-lg border-2 border-white hover:scale-105 active:scale-95 transition-transform">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
            <span class="text-xs font-bold font-heading">Search</span>
        </button>

        <!-- 4. Account -->
        <a href="{{ auth()->check() ? route('account.index') : route('account.login') }}" class="flex flex-col items-center justify-center space-y-1 py-1 text-xs {{ request()->routeIs('account.*') ? 'text-[#D38928]' : 'text-gray-500 hover:text-[#121212]' }} transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span class="text-xs font-bold font-heading">Account</span>
        </a>

        <!-- 5. Cart Drawer Opener -->
        <button 
            type="button" 
            id="mobile-app-cart-trigger" 
            class="cart-drawer-opener flex flex-col items-center justify-center space-y-1 py-1 text-xs text-gray-500 hover:text-[#D38928] transition-colors relative focus:outline-none cursor-pointer"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
            <span class="text-xs font-bold font-heading">Cart</span>
        </button>

    </div>
</nav>
