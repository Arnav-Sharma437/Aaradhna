<footer class="text-white font-body pt-8 sm:pt-12 pb-8 px-4 sm:px-6 lg:px-[40px] bg-cover bg-center relative" style="background-color: #DE8D27; background-image: url('{{ asset('images/footer-pattern-bg.png') }}'); background-repeat: repeat;">
    <div class="w-full max-w-[1440px] mx-auto space-y-10 relative z-10">
        
        <!-- Large Translucent Rounded Container Card (Exact Screenshot) -->
        <div class="bg-[#CA7B1C]/85 backdrop-blur-md rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 lg:p-14 border border-white/20 shadow-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Column 1: Newsletter & B2B Button (5 Cols) -->
                <div class="lg:col-span-5 space-y-5">
                    <h3 class="text-2xl sm:text-3xl lg:text-[34px] font-bold font-heading text-white tracking-tight leading-snug">
                        Stay Connected to Daily Pooja Essentials
                    </h3>
                    
                    <form action="#" method="POST" onsubmit="event.preventDefault();" class="space-y-3 max-w-md">
                        <!-- White Pill Newsletter Input with Arrow -->
                        <div class="relative">
                            <input 
                                type="email" 
                                placeholder="Sign up for extra 10% off" 
                                class="w-full px-5 py-3.5 bg-white text-[#121212] placeholder-gray-500 rounded-full text-sm sm:text-base focus:outline-none shadow-md pr-12 font-medium"
                                required
                            >
                            <button type="submit" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#DE8D27] hover:text-[#121212] font-bold text-lg p-1 transition-colors" aria-label="Subscribe">
                                ➔
                            </button>
                        </div>

                        <!-- Vivid Orange Pill: Wholesale / Bulk / B2B Button -->
                        <div class="pt-1">
                            <a 
                                href="{{ route('pages.show', 'contact') }}" 
                                class="inline-block px-7 py-2.5 bg-[#F26522] hover:bg-[#d95213] text-white text-xs sm:text-sm font-extrabold uppercase tracking-wider rounded-full shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-heading"
                            >
                                Wholesale/ Bulk / B2B
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Column 2: SHOP (2.5 Cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-white font-heading">
                        SHOP
                    </h4>
                    <ul class="space-y-2.5 text-sm sm:text-[15px] text-white/90">
                        <li><a href="{{ route('collections.show', 'incense-sticks') }}" class="hover:text-white hover:underline transition-all">Incense Sticks</a></li>
                        <li><a href="{{ route('collections.show', 'charcoal-free-dhoop-cones') }}" class="hover:text-white hover:underline transition-all">Dhoop Cones</a></li>
                        <li><a href="{{ route('collections.show', 'organic-havan-cups') }}" class="hover:text-white hover:underline transition-all">Havan Cups</a></li>
                        <li><a href="{{ route('collections.show', 'attar-spray') }}" class="hover:text-white hover:underline transition-all">Attar Sprays</a></li>
                        <li><a href="{{ route('collections.show', 'refill-packs') }}" class="hover:text-white hover:underline transition-all">Refill Packs</a></li>
                        <li><a href="{{ route('products.show', 'trial-pack-combo') }}" class="hover:text-white hover:underline transition-all">Trial Packs</a></li>
                        <li><a href="{{ route('collections.show', 'combos') }}" class="hover:text-white hover:underline transition-all">Combos</a></li>
                        <li><a href="{{ route('collections.show', 'all') }}" class="hover:text-white hover:underline transition-all font-bold">Shop All</a></li>
                    </ul>
                </div>

                <!-- Column 3: ABOUT (2 Cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-white font-heading">
                        ABOUT
                    </h4>
                    <ul class="space-y-2.5 text-sm sm:text-[15px] text-white/90">
                        <li><a href="{{ route('pages.show', 'about-us') }}" class="hover:text-white hover:underline transition-all">About</a></li>
                        <li><a href="{{ route('blogs.index', 'hindu-rituals') }}" class="hover:text-white hover:underline transition-all">Blogs</a></li>
                    </ul>
                </div>

                <!-- Column 4: NEED HELP? (2.5 Cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-white font-heading">
                        NEED HELP?
                    </h4>
                    <ul class="space-y-2.5 text-sm sm:text-[15px] text-white/90">
                        <li><a href="{{ url('/account') }}" class="hover:text-white hover:underline transition-all">My Account</a></li>
                        <li><a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-white hover:underline transition-all">Return &amp; Refund Policy</a></li>
                        <li><a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-white hover:underline transition-all">Shipping Policy</a></li>
                        <li><a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-white hover:underline transition-all">Terms &amp; Conditions</a></li>
                        <li><a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-white hover:underline transition-all">Privacy Policy</a></li>
                        <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-white hover:underline transition-all font-bold">Contact Us</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Bottom Row: WhatsApp & Support (Left), Center Logo, Address & Socials (Right) -->
        <div class="pt-4 flex flex-col md:flex-row items-center justify-between gap-8 text-sm sm:text-[15px] text-white/95">
            
            <!-- Left: Contact WhatsApp & Email -->
            <div class="space-y-2.5 text-center md:text-left">
                <a href="https://wa.me/919999999999" target="_blank" class="flex items-center justify-center md:justify-start space-x-2.5 hover:text-white transition-colors">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.072.043.419-.101.824zM12 2C6.477 2 2 6.477 2 12c0 1.891.524 3.662 1.435 5.178L2 22l4.981-1.309A9.957 9.957 0 0 0 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
                    <span class="font-semibold">Whatsapp Support</span>
                </a>
                <a href="mailto:support@aaradhna.co" class="flex items-center justify-center md:justify-start space-x-2.5 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span>support@aaradhna.co</span>
                </a>
            </div>

            <!-- Center: Aaradhna Brand Logo & Subtitle -->
            <div class="flex flex-col items-center text-center">
                <a href="{{ route('home') }}" class="group inline-flex flex-col items-center">
                    <img 
                        src="{{ asset('assets/images/aaradhna-logo.png') }}" 
                        alt="Aaradhna" 
                        class="h-14 sm:h-16 w-auto object-contain brightness-0 invert opacity-95 transition-transform duration-200 group-hover:scale-105"
                    >
                    <span class="text-[10px] uppercase tracking-[0.25em] text-white/80 font-heading font-semibold mt-1">
                        POOJA SAMAGRI &amp; VIDHI
                    </span>
                </a>
            </div>

            <!-- Right: Address & Social Icons -->
            <div class="text-center md:text-right space-y-2">
                <h5 class="text-base font-bold font-heading text-white">Address</h5>
                <p class="text-xs sm:text-[13px] text-white/90 leading-relaxed font-body">
                    Durga Industrial Park,<br>
                    Sahibabad, Ghaziabad<br>
                    Uttar Pradesh, 201005
                </p>
                <!-- Social Media Icons (Exact Screenshot: Instagram, Facebook, LinkedIn, Pinterest, YouTube) -->
                <div class="flex items-center justify-center md:justify-end space-x-3.5 pt-1.5 text-white">
                    <!-- Instagram -->
                    <a href="https://instagram.com" target="_blank" class="hover:text-[#121212] transition-colors p-1" aria-label="Instagram">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/></svg>
                    </a>
                    <!-- Facebook -->
                    <a href="https://facebook.com" target="_blank" class="hover:text-[#121212] transition-colors p-1" aria-label="Facebook">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.667 5H18V0h-3.808C10.595 0 9 1.582 9 4.615V8z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://linkedin.com" target="_blank" class="hover:text-[#121212] transition-colors p-1" aria-label="LinkedIn">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                    <!-- Pinterest -->
                    <a href="https://pinterest.com" target="_blank" class="hover:text-[#121212] transition-colors p-1" aria-label="Pinterest">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.372-12 12 0 5.084 3.163 9.426 7.627 11.174-.105-.949-.2-2.405.042-3.441.218-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 12-5.373 12-12 0-6.628-5.393-12-12-12z"/></svg>
                    </a>
                    <!-- YouTube -->
                    <a href="https://youtube.com" target="_blank" class="hover:text-[#121212] transition-colors p-1" aria-label="YouTube">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</footer>
