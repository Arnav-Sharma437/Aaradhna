<!-- ========================================================================= -->
<!-- SPIRITUAL VEDIC FOOTER - AARADHNA.CO™                                      -->
<!-- ========================================================================= -->
<footer class="text-white font-body pt-12 sm:pt-16 pb-10 px-4 sm:px-6 lg:px-[40px] bg-cover bg-center relative overflow-hidden" style="background-color: #C87A1E; background-image: url('{{ asset('images/footer-pattern-bg.png') }}'); background-repeat: repeat;">
    
    <!-- Subtle Golden Aura Overlay -->
    <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/35 pointer-events-none"></div>

    <div class="w-full max-w-[1440px] mx-auto space-y-12 relative z-10">
        
        <!-- 1. Spiritual Vedic Header / Blessings Ribbon -->
        <div class="text-center space-y-2 pb-4">
            <div class="inline-flex items-center justify-center space-x-3 text-[#F6DAA8] text-xs sm:text-sm font-heading tracking-[0.25em] uppercase font-bold">
                <span>ॐ</span>
                <span>॥ ॐ भूर्भुवः स्वः तत्सवितुर्वरेण्यं भर्गो देवस्य धीमहि धियो यो नः प्रचोदयात् ॥</span>
                <span>ॐ</span>
            </div>
            <p class="text-white/85 text-xs sm:text-sm max-w-xl mx-auto font-light">
                Handcrafted pure temple fragrances &amp; sacred pooja samagri preserving the eternal traditions of Sanatana Dharma.
            </p>
        </div>

        <!-- 2. Main Luxury Translucent Card -->
        <div class="bg-[#9E5A12]/85 backdrop-blur-md rounded-[28px] sm:rounded-[36px] p-7 sm:p-10 lg:p-14 border border-[#F6DAA8]/30 shadow-2xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Column 1: Newsletter & Vedic Community (5 Cols) -->
                <div class="lg:col-span-5 space-y-5">
                    <span class="text-[11px] font-extrabold uppercase tracking-[0.2em] text-[#F6DAA8] font-heading">✦ VEDIC BLESSINGS INBOX ✦</span>
                    <h3 class="text-2xl sm:text-3xl lg:text-[32px] font-bold font-heading text-white tracking-tight leading-snug">
                        Stay Connected to Daily Pooja &amp; Festival Essentials
                    </h3>
                    <p class="text-xs sm:text-sm text-white/90 leading-relaxed font-light">
                        Receive auspicious festival muhurats, sacred vidhi guides, and exclusive devotee offers straight to your inbox.
                    </p>
                    
                    <form action="#" method="POST" onsubmit="event.preventDefault();" class="space-y-3.5 max-w-md">
                        <!-- White Pill Newsletter Input with Gold Arrow -->
                        <div class="relative">
                            <input 
                                type="email" 
                                placeholder="Enter email for 10% off your first order" 
                                class="w-full px-5 py-3.5 bg-white text-[#121212] placeholder-gray-500 rounded-full text-xs sm:text-sm focus:outline-none shadow-md pr-12 font-medium"
                                required
                            >
                            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-[#D38928] text-white flex items-center justify-center hover:bg-[#121212] font-bold text-sm transition-colors shadow-xs" aria-label="Subscribe">
                                ➔
                            </button>
                        </div>

                        <!-- Pill Buttons: Bulk / Mandir Supplies -->
                        <div class="flex flex-wrap gap-2.5 pt-1">
                            <a 
                                href="{{ route('pages.show', 'contact') }}" 
                                class="inline-flex items-center px-6 py-2.5 bg-[#F26522] hover:bg-[#d95213] text-white text-xs sm:text-sm font-extrabold uppercase tracking-wider rounded-full shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-heading"
                            >
                                Mandir &amp; Bulk Pooja Samagri 🪔
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Column 2: POOJA SHOP (2.5 Cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading border-b border-white/15 pb-2">
                        POOJA SHOP
                    </h4>
                    <ul class="space-y-2.5 text-xs sm:text-[14px] text-white/90">
                        <li><a href="{{ route('collections.show', 'incense-sticks') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Incense Sticks</a></li>
                        <li><a href="{{ route('collections.show', 'charcoal-free-dhoop-cones') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Dhoop Cones</a></li>
                        <li><a href="{{ route('collections.show', 'organic-havan-cups') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Havan Cups</a></li>
                        <li><a href="{{ route('collections.show', 'attar-spray') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Attar Sprays</a></li>
                        <li><a href="{{ route('collections.show', 'refill-packs') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Refill Packs</a></li>
                        <li><a href="{{ route('products.show', 'trial-pack-combo') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Trial Packs</a></li>
                        <li><a href="{{ route('collections.show', 'combos') }}" class="hover:text-[#F6DAA8] transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-60">✦</span>Festive Combos</a></li>
                        <li><a href="{{ route('collections.show', 'all') }}" class="hover:text-[#F6DAA8] font-bold transition-colors flex items-center"><span class="text-[10px] mr-1.5 opacity-80">★</span>All Samagri</a></li>
                    </ul>
                </div>

                <!-- Column 3: SACRED VIDHI (2 Cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading border-b border-white/15 pb-2">
                        VEDIC VIDHI
                    </h4>
                    <ul class="space-y-2.5 text-xs sm:text-[14px] text-white/90">
                        <li><a href="{{ route('pages.show', 'about-us') }}" class="hover:text-[#F6DAA8] transition-colors">About Aaradhna</a></li>
                        <li><a href="{{ route('blogs.index', 'hindu-rituals') }}" class="hover:text-[#F6DAA8] transition-colors">Rituals &amp; Vidhi Blog</a></li>
                        <li><a href="{{ route('blogs.index', 'festival-guides') }}" class="hover:text-[#F6DAA8] transition-colors">Festival Calendars</a></li>
                        <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-[#F6DAA8] transition-colors">Pooja Consultation</a></li>
                    </ul>
                </div>

                <!-- Column 4: DEVOTEE SUPPORT (2.5 Cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading border-b border-white/15 pb-2">
                        DEVOTEE HELP
                    </h4>
                    <ul class="space-y-2.5 text-xs sm:text-[14px] text-white/90">
                        <li><a href="{{ url('/account') }}" class="hover:text-[#F6DAA8] transition-colors">My Devotee Account</a></li>
                        <li><a href="{{ route('wishlist.index') }}" class="hover:text-[#F6DAA8] transition-colors">Sacred Wishlist</a></li>
                        <li><a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Return &amp; Refund Policy</a></li>
                        <li><a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Pan-India Shipping</a></li>
                        <li><a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-[#F6DAA8] transition-colors">Terms of Service</a></li>
                        <li><a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-[#F6DAA8] font-bold transition-colors">Contact Support</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- 3. Bottom Row: WhatsApp & Support (Left), Center Brand Emblem, Address & Socials (Right) -->
        <div class="pt-2 flex flex-col md:flex-row items-center justify-between gap-8 text-xs sm:text-sm text-white/95 border-t border-white/15 pt-8">
            
            <!-- Left: Contact WhatsApp & Email -->
            <div class="space-y-3 text-center md:text-left">
                <a href="https://wa.me/919999999999" target="_blank" class="inline-flex items-center space-x-2.5 px-4 py-2 rounded-full bg-emerald-800/60 hover:bg-emerald-800 border border-emerald-400/40 text-white transition-all shadow-xs">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.043.072.043.419-.101.824zM12 2C6.477 2 2 6.477 2 12c0 1.891.524 3.662 1.435 5.178L2 22l4.981-1.309A9.957 9.957 0 0 0 12 22c5.523 0 10-4.477 10-10S17.523 2 12 2z"/></svg>
                    <span class="font-bold text-xs">WhatsApp Vedic Support</span>
                </a>
                <div>
                    <a href="mailto:support@aaradhna.co" class="flex items-center justify-center md:justify-start space-x-2 hover:text-[#F6DAA8] transition-colors text-xs text-white/90">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <span>support@aaradhna.co</span>
                    </a>
                </div>
            </div>

            <!-- Center: Aaradhna Brand Logo & Subtitle -->
            <div class="flex flex-col items-center text-center space-y-1">
                <a href="{{ route('home') }}" class="group inline-flex flex-col items-center">
                    <img 
                        src="{{ asset('assets/images/aaradhna-logo.png') }}" 
                        alt="Aaradhna" 
                        class="h-12 sm:h-14 w-auto object-contain brightness-0 invert opacity-95 transition-transform duration-200 group-hover:scale-105"
                    >
                    <span class="text-[10px] uppercase tracking-[0.3em] text-[#F6DAA8] font-heading font-bold mt-1">
                        POOJA SAMAGRI &amp; VIDHI
                    </span>
                </a>
                <span class="text-[10px] text-white/70">
                    © {{ date('Y') }} Aaradhna.co™ • शुद्धं समर्पयामि
                </span>
            </div>

            <!-- Right: Address & Social Icons -->
            <div class="text-center md:text-right space-y-2.5">
                <h5 class="text-sm font-bold font-heading text-[#F6DAA8] uppercase tracking-wider">Sanctuary Address</h5>
                <p class="text-xs text-white/85 leading-relaxed font-body">
                    Durga Industrial Park, Sahibabad<br>
                    Ghaziabad, Uttar Pradesh, 201005
                </p>
                <!-- Social Media Icons -->
                <div class="flex items-center justify-center md:justify-end space-x-3 pt-1 text-white">
                    <a href="https://instagram.com" target="_blank" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white hover:text-[#121212] flex items-center justify-center transition-all p-1" aria-label="Instagram">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/></svg>
                    </a>
                    <a href="https://facebook.com" target="_blank" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white hover:text-[#121212] flex items-center justify-center transition-all p-1" aria-label="Facebook">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.667 5H18V0h-3.808C10.595 0 9 1.582 9 4.615V8z"/></svg>
                    </a>
                    <a href="https://youtube.com" target="_blank" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white hover:text-[#121212] flex items-center justify-center transition-all p-1" aria-label="YouTube">
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</footer>
