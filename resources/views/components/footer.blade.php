<!-- ========================================================================= -->
<!-- PURE DEVOTIONAL BHAKTI FOOTER WITH DHOOP & INCENSE SMOKE AMBIENCE       -->
<!-- ========================================================================= -->
<footer class="text-white font-body relative overflow-hidden bg-cover bg-center border-t-2 border-[#F6DAA8]/40 shadow-2xl" style="background-color: #C87A1E; background-image: url('{{ asset('images/footer-pattern-bg.png') }}'); background-repeat: repeat;">
    
    <!-- Warm Sacred Temple Sunburst Gradient -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#8C3A0A]/90 via-[#A85210]/85 to-[#732B05]/95 pointer-events-none"></div>

    <!-- ========================================================================= -->
    <!-- SACRED DHOOP & INCENSE SMOKE RISING LAYER (Bhakti Aura Effect)            -->
    <!-- ========================================================================= -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <!-- Floating Ambient Smoke Waves from bottom -->
        <div class="absolute -bottom-10 left-[10%] w-[350px] h-[350px] rounded-full bg-white/10 blur-[50px] animate-smoke-1"></div>
        <div class="absolute -bottom-12 left-[35%] w-[420px] h-[420px] rounded-full bg-[#FFF5E5]/15 blur-[60px] animate-smoke-2"></div>
        <div class="absolute -bottom-8 right-[20%] w-[380px] h-[380px] rounded-full bg-white/10 blur-[55px] animate-smoke-3"></div>
        <div class="absolute -bottom-10 right-[5%] w-[300px] h-[300px] rounded-full bg-[#F6DAA8]/12 blur-[45px] animate-smoke-1"></div>

        <!-- Sacred Glowing Bottom Mist Ribbon -->
        <div class="absolute bottom-0 inset-x-0 h-32 bg-gradient-to-t from-white/10 via-white/5 to-transparent blur-md"></div>
    </div>

    <div class="w-full max-w-[1440px] mx-auto pt-14 sm:pt-18 pb-12 px-5 sm:px-8 lg:px-[40px] relative z-10 space-y-12">
        
        <!-- 1. SACRED DHOOP & DIYA DEVOTIONAL HERO BANNER -->
        <div class="bg-gradient-to-r from-[#632306]/90 via-[#803108]/90 to-[#632306]/90 rounded-[28px] sm:rounded-[36px] p-6 sm:p-10 border border-[#F6DAA8]/40 shadow-2xl backdrop-blur-md relative overflow-hidden">
            
            <!-- Incense Burner & Diya Visual Emblems in Banner Background -->
            <div class="absolute right-4 -bottom-6 text-7xl sm:text-8xl opacity-15 select-none pointer-events-none">🪔</div>
            <div class="absolute left-6 -top-4 text-6xl sm:text-7xl opacity-10 select-none pointer-events-none">🕉️</div>

            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 relative z-10">
                
                <!-- Left: Sacred Dhoop Flame & Shloka Header -->
                <div class="flex items-center space-x-4 sm:space-x-6 text-center lg:text-left">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-[#D38928] to-[#FFF0D0] p-1 shadow-lg shrink-0 animate-diya flex items-center justify-center">
                        <div class="w-full h-full rounded-full bg-[#4A1803] flex items-center justify-center text-3xl sm:text-4xl">
                            🪔
                        </div>
                    </div>
                    <div class="space-y-1">
                        <span class="inline-block text-[11px] sm:text-xs font-bold uppercase tracking-[0.25em] text-[#F6DAA8] font-heading">
                            ✦ शुद्धं समर्पयामि • DAILY TEMPLE VIDHI ✦
                        </span>
                        <h3 class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-white tracking-tight drop-shadow-md">
                            Fill Your Mandir with Sacred Vedic Fragrance
                        </h3>
                        <p class="text-xs sm:text-sm text-white/90 font-light max-w-xl">
                            100% Bamboo-Free Incense &amp; Organic Havan Cups rolled with pure Bhimseni camphor, Vrindavan chandan, and natural samagri.
                        </p>
                    </div>
                </div>

                <!-- Right: WhatsApp Devotee Order & Consultation Button -->
                <div class="shrink-0 flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
                    <a 
                        href="https://wa.me/919999999999" 
                        target="_blank" 
                        class="w-full sm:w-auto px-7 py-3.5 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-500 hover:to-emerald-600 text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5 flex items-center justify-center space-x-2.5 font-heading"
                    >
                        <span class="text-base">💬</span>
                        <span>WhatsApp Pooja Helpdesk</span>
                    </a>

                    <a 
                        href="{{ route('pages.show', 'contact') }}" 
                        class="w-full sm:w-auto px-6 py-3.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold text-xs sm:text-sm uppercase tracking-wider rounded-full shadow-lg transition-all font-heading text-center"
                    >
                        Bulk Mandir Samagri ➔
                    </a>
                </div>

            </div>
        </div>

        <!-- 2. MAIN 4-COLUMN SPIRITUAL DIRECTORY -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 items-start pt-4">
            
            <!-- Column 1: Brand Lore, Mantra & Mandir Timings (4 Cols) -->
            <div class="lg:col-span-4 space-y-5">
                <a href="{{ route('home') }}" class="inline-flex items-center space-x-3 group">
                    <img 
                        src="{{ asset('assets/images/aaradhna-logo.png') }}" 
                        alt="Aaradhna.co" 
                        class="h-14 sm:h-16 w-auto object-contain brightness-0 invert opacity-95 transition-transform duration-200 group-hover:scale-105 drop-shadow-md"
                    >
                </a>
                
                <p class="text-xs sm:text-sm text-white/90 leading-relaxed font-light">
                    Aaradhna.co™ honors ancient Sanatana Dharma traditions. We hand-craft non-irritating, low-smoke dhoop and pure havan cups designed to purify home energies and elevate your daily morning &amp; evening Sandhya.
                </p>

                <!-- Sacred Temple Shloka Box -->
                <div class="p-4 rounded-[16px] bg-[#5C1F03]/70 border border-[#F6DAA8]/30 shadow-inner space-y-1">
                    <div class="text-[#F6DAA8] font-bold text-xs font-heading">॥ ॐ तत्सत् ॥</div>
                    <div class="text-xs text-white/90 font-serif leading-relaxed italic">
                        "वनस्पतिरसो दिव्यो गन्धाढ्यः सुमनोहरः।<br>
                        आघ्रेयः सर्वदेवानां धूपोऽयं प्रतिगृह्यताम्॥"
                    </div>
                    <div class="text-[10px] text-[#F6DAA8]/80 font-sans pt-1">
                        (O Lord, please accept this divine aromatic dhoop crafted with sacred natural forest botanicals.)
                    </div>
                </div>

                <div class="text-xs text-white/85 space-y-1 pt-1">
                    <div class="flex items-center space-x-2">
                        <span class="text-[#F6DAA8]">📍</span>
                        <span>Durga Industrial Park, Sahibabad, Ghaziabad, UP 201005</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span class="text-[#F6DAA8]">✉️</span>
                        <a href="mailto:support@aaradhna.co" class="hover:text-[#F6DAA8] underline transition-colors">support@aaradhna.co</a>
                    </div>
                </div>
            </div>

            <!-- Column 2: Sacred Samagri Collections (3 Cols) -->
            <div class="lg:col-span-3 space-y-4">
                <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading border-b border-white/20 pb-2 flex items-center">
                    <span class="text-xs mr-2 text-[#F6DAA8]">🪔</span>
                    POOJA SAMAGRI
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-[14px] text-white/90">
                    <li><a href="{{ route('collections.show', 'incense-sticks') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Bambooless Agarbatti</span></a></li>
                    <li><a href="{{ route('collections.show', 'charcoal-free-dhoop-cones') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Charcoal-Free Dhoop Cones</span></a></li>
                    <li><a href="{{ route('collections.show', 'organic-havan-cups') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Pure Guggal &amp; Loban Cups</span></a></li>
                    <li><a href="{{ route('collections.show', 'attar-spray') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Alcohol-Free Deity Attar</span></a></li>
                    <li><a href="{{ route('collections.show', 'refill-packs') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Mega Devotee Refill Packs</span></a></li>
                    <li><a href="{{ route('collections.show', 'combos') }}" class="hover:text-[#F6DAA8] hover:translate-x-1.5 inline-flex items-center transition-all"><span>✦ Buy 2 Get 1 Festive Offers</span></a></li>
                    <li><a href="{{ route('collections.show', 'all') }}" class="text-[#F6DAA8] font-bold hover:underline inline-flex items-center transition-all"><span>★ Explore All Sacred Shop ➔</span></a></li>
                </ul>
            </div>

            <!-- Column 3: Devotional Vidhi & Guides (2.5 Cols) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-sm sm:text-base font-extrabold uppercase tracking-widest text-[#F6DAA8] font-heading border-b border-white/20 pb-2 flex items-center">
                    <span class="text-xs mr-2 text-[#F6DAA8]">📖</span>
                    POOJA VIDHI
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-[14px] text-white/90">
                    <li><a href="{{ route('pages.show', 'about-us') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform">About Aaradhna</a></li>
                    <li><a href="{{ route('blogs.index', 'hindu-rituals') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform">Daily Pooja Vidhi</a></li>
                    <li><a href="{{ route('blogs.index', 'festival-guides') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform">Festival Muhurats</a></li>
                    <li><a href="{{ route('wishlist.index') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform">Sacred Wishlist</a></li>
                    <li><a href="{{ url('/account') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform">Devotee Account</a></li>
                    <li><a href="{{ route('pages.show', 'contact') }}" class="hover:text-[#F6DAA8] hover:translate-x-1 inline-block transition-transform font-bold">Contact Mandir Desk</a></li>
                </ul>
            </div>

            <!-- Column 4: Devotee Newsletter & Blessings (2.5 Cols) -->
            <div class="lg:col-span-3 space-y-4 bg-[#632306]/85 p-6 rounded-[24px] border border-[#F6DAA8]/30 shadow-xl backdrop-blur-sm">
                <span class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-[#F6DAA8] font-heading block">
                    ✦ BHAKTI BLESSINGS ✦
                </span>
                <h4 class="text-base sm:text-lg font-black font-heading text-white leading-snug">
                    Get 10% Off &amp; Sacred Festival Calendars
                </h4>
                <p class="text-xs text-white/85 font-light">
                    Join over 25,000+ devotees receiving morning mantras, festival muhurat reminders, and blessing offers.
                </p>

                <form action="#" method="POST" onsubmit="event.preventDefault();" class="space-y-2.5">
                    <div class="relative">
                        <input 
                            type="email" 
                            placeholder="Enter your email" 
                            class="w-full px-4 py-3 bg-white text-[#121212] placeholder-gray-500 rounded-[12px] text-xs font-medium focus:outline-none shadow-md"
                            required
                        >
                    </div>
                    <button 
                        type="submit" 
                        class="w-full py-3 px-4 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold uppercase tracking-wider rounded-[12px] shadow-md transition-all font-heading text-center cursor-pointer"
                    >
                        Receive Vedic Offer ➔
                    </button>
                </form>

                <div class="pt-2 text-[10px] text-white/70 text-center border-t border-white/10">
                    🚚 Free Pan-India Delivery on orders above ₹499
                </div>
            </div>

        </div>

        <!-- 3. BOTTOM ROW: Devotional Copyright, Policy Links & Social Links -->
        <div class="pt-8 border-t border-white/20 flex flex-col md:flex-row items-center justify-between gap-6 text-xs text-white/90">
            
            <div class="flex flex-wrap items-center justify-center md:justify-start gap-x-6 gap-y-2">
                <a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Privacy Policy</a>
                <a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-[#F6DAA8] transition-colors">Terms of Service</a>
                <a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Shipping Policy</a>
                <a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Return &amp; Refund</a>
            </div>

            <div class="text-center font-serif text-[13px] text-[#F6DAA8]">
                <span>© {{ date('Y') }} Aaradhna.co™ • ॐ शान्तिः शान्तिः शान्तिः • All Rights Reserved.</span>
            </div>

            <!-- Social Media Icons with Devotional Aura -->
            <div class="flex items-center space-x-3 text-white">
                <a href="https://instagram.com" target="_blank" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white hover:text-[#732B05] flex items-center justify-center transition-all p-1" aria-label="Instagram">
                    <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073z"/></svg>
                </a>
                <a href="https://facebook.com" target="_blank" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white hover:text-[#732B05] flex items-center justify-center transition-all p-1" aria-label="Facebook">
                    <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M9 8H6v4h3v12h5V12h3.642L18 8h-4V6.333C14 5.374 14.5 5 15.667 5H18V0h-3.808C10.595 0 9 1.582 9 4.615V8z"/></svg>
                </a>
                <a href="https://youtube.com" target="_blank" class="w-8 h-8 rounded-full bg-white/15 hover:bg-white hover:text-[#732B05] flex items-center justify-center transition-all p-1" aria-label="YouTube">
                    <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>

        </div>

    </div>
</footer>
