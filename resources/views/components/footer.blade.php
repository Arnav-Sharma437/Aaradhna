<footer class="bg-[#E59834] text-white font-body pt-14 pb-8">
    <div class="w-full mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Top Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10 pb-12 border-b border-white/20">
            
            <!-- Col 1: Newsletter / Stay Connected (5 cols) -->
            <div class="lg:col-span-5 space-y-4">
                <h4 class="text-lg sm:text-xl font-extrabold font-heading text-white tracking-tight">
                    Stay Connected to Daily Pooja Essentials
                </h4>
                
                <form action="#" method="POST" onsubmit="event.preventDefault();" class="space-y-2 max-w-sm">
                    <div class="relative">
                        <input 
                            type="email" 
                            placeholder="Sign up for extra 10% off" 
                            class="w-full px-4 py-2.5 bg-white text-[#121212] placeholder-gray-500 rounded-[10px] text-xs sm:text-sm focus:outline-none"
                            required
                        >
                        <button type="submit" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-[#D38928] hover:text-[#121212] font-bold text-xs">
                            ➔
                        </button>
                    </div>
                    <button 
                        type="submit" 
                        class="w-full py-2 bg-[#D38928] hover:bg-[#b8741e] text-white text-xs font-bold uppercase tracking-wider rounded-[10px] shadow-xs transition-colors border border-white/20"
                    >
                        Subscribe For 10% Off
                    </button>
                </form>
            </div>

            <!-- Col 2: SHOP (2.5 cols) -->
            <div class="lg:col-span-2 space-y-3 text-xs sm:text-sm">
                <h5 class="text-xs font-bold uppercase tracking-widest text-white/90 font-heading">
                    SHOP
                </h5>
                <ul class="space-y-2 text-white/80">
                    <li><a href="{{ route('collections.show', 'incense-sticks') }}" class="hover:text-white transition-colors">Incense Sticks</a></li>
                    <li><a href="{{ route('collections.show', 'organic-havan-cups') }}" class="hover:text-white transition-colors">Havan Cups</a></li>
                    <li><a href="{{ route('collections.show', 'charcoal-free-dhoop-cones') }}" class="hover:text-white transition-colors">Dhoop Cones</a></li>
                    <li><a href="{{ route('collections.show', 'attar-spray') }}" class="hover:text-white transition-colors">Attar Spray</a></li>
                    <li><a href="{{ route('collections.show', 'refill-packs') }}" class="hover:text-white transition-colors">Refill Packs</a></li>
                    <li><a href="{{ route('products.show', 'trial-pack-combo') }}" class="hover:text-white transition-colors">Trial Packs</a></li>
                    <li><a href="{{ route('collections.show', 'combos') }}" class="hover:text-white transition-colors">Combos</a></li>
                    <li><a href="{{ route('collections.show', 'all') }}" class="hover:text-white transition-colors">View All</a></li>
                </ul>
            </div>

            <!-- Col 3: ABOUT (2 cols) -->
            <div class="lg:col-span-2 space-y-3 text-xs sm:text-sm">
                <h5 class="text-xs font-bold uppercase tracking-widest text-white/90 font-heading">
                    ABOUT
                </h5>
                <ul class="space-y-2 text-white/80">
                    <li><a href="{{ route('pages.show', 'about-us') }}" class="hover:text-white transition-colors">About</a></li>
                    <li><a href="{{ route('blogs.index', 'hindu-rituals') }}" class="hover:text-white transition-colors">Blogs</a></li>
                </ul>
            </div>

            <!-- Col 4: NEED HELP? (2.5 cols) -->
            <div class="lg:col-span-3 space-y-3 text-xs sm:text-sm">
                <h5 class="text-xs font-bold uppercase tracking-widest text-white/90 font-heading">
                    NEED HELP?
                </h5>
                <ul class="space-y-2 text-white/80">
                    <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-white transition-colors">Track Order</a></li>
                    <li><a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-white transition-colors">Return &amp; Refund Policy</a></li>
                    <li><a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-white transition-colors">Shipping Policy</a></li>
                    <li><a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-white transition-colors">Terms &amp; Conditions</a></li>
                    <li><a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>

        </div>

        <!-- Bottom Row: WhatsApp Support, Centered Logo, Address & Socials -->
        <div class="mt-8 pt-4 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-white/80">
            
            <!-- Left: Contact WhatsApp & Email -->
            <div class="space-y-1 text-center md:text-left">
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>WhatsApp Support</span>
                </div>
                <div class="flex items-center space-x-2">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>support@aaradhna.co</span>
                </div>
            </div>

            <!-- Center Logo Brand -->
            <div class="flex flex-col items-center">
                <img src="{{ asset('assets/images/aaradhna-logo.png') }}" alt="Aaradhna" class="h-12 sm:h-14 w-auto object-contain brightness-0 invert opacity-95 mb-1">
                <span class="text-[9px] uppercase tracking-[0.25em] text-white/80 font-semibold">
                    Everything For Your Sacred Rituals
                </span>
            </div>

        </div>

    </div>
</footer>
