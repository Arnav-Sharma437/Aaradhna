<!-- ========================================================================= -->
<!-- LUXURY SPIRITUAL FOOTER — MANGALAM.CO™                                    -->
<!-- ========================================================================= -->
<footer class="text-white font-body relative overflow-hidden bg-[#6B2404] border-t border-[#F6DAA8]/30 select-none">
    
    <!-- Warm Kesariya/Amber Radiant Gradient Background -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#7A2E05] via-[#611F02] to-[#451400] pointer-events-none"></div>

    <!-- ========================================================================= -->
    <!-- CONTINUOUS BOTTOM DHOOP SMOKE WAVES & PARTICLES LAYER                     -->
    <!-- ========================================================================= -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <!-- Multi-origin Floating Smoke Plumes rising continuously from bottom -->
        <div class="absolute -bottom-10 left-[8%] w-[280px] h-[280px] rounded-full bg-white/10 blur-[45px] animate-smoke-1"></div>
        <div class="absolute -bottom-12 left-[32%] w-[320px] h-[320px] rounded-full bg-[#FFF5E5]/12 blur-[50px] animate-smoke-2"></div>
        <div class="absolute -bottom-10 left-[55%] w-[300px] h-[300px] rounded-full bg-white/10 blur-[45px] animate-smoke-3"></div>
        <div class="absolute -bottom-12 right-[18%] w-[340px] h-[340px] rounded-full bg-[#F6DAA8]/12 blur-[52px] animate-smoke-1"></div>
        <div class="absolute -bottom-8 right-[4%] w-[240px] h-[240px] rounded-full bg-white/10 blur-[40px] animate-smoke-2"></div>

        <!-- Continuous Mystical Dhoop Base Mist -->
        <div class="absolute bottom-0 inset-x-0 h-28 bg-gradient-to-t from-white/15 via-white/5 to-transparent blur-md animate-smoke-wave"></div>
    </div>

    <!-- Main Footer Container -->
    <div class="w-full max-w-[1440px] mx-auto pt-14 sm:pt-16 pb-8 px-5 sm:px-8 lg:px-[40px] relative z-10">
        
        <!-- Top Main Grid (4 Balanced Columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10 pb-12 border-b border-white/15">
            
            <!-- Col 1: Brand Info & Devotional Mission (5 Cols) -->
            <div class="lg:col-span-5 space-y-4">
                <a href="{{ route('home') }}" class="inline-block bg-white p-2.5 sm:p-3 rounded-2xl shadow-sm hover:shadow-md transition-all">
                    <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Mangalam" class="h-10 sm:h-12 w-auto max-w-[160px] object-contain">
                </a>
                
                <div class="space-y-2 max-w-sm">
                    <p class="text-xs uppercase tracking-[0.25em] text-[#F6DAA8] font-heading font-bold">
                        शुद्धं समर्पयामि • 100% Bamboo-Free
                    </p>
                    <p class="text-xs sm:text-[13px] text-white/80 leading-relaxed font-normal">
                        Handcrafted with sacred temple flowers and pure herbal ingredients for serene daily morning and evening pooja rituals. Free from toxic charcoal & synthetic chemicals.
                    </p>
                </div>

                </div>
            </div>

            <!-- Col 2: Sacred Collections (2.5 Cols) -->
            <div class="lg:col-span-3 space-y-3.5">
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#F6DAA8] font-heading font-bold">
                    Sacred Collections
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-[13px] text-white/85">
                    <li>
                        <a href="{{ route('collections.show', 'bambooless') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Bambooless Incense
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'havan-cups') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Sacred Havan Cups
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'dhoop-cones') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Organic Dhoop Cones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'super-save-offers') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Super Save Offers
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.pitambara') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5 font-medium text-[#F6DAA8]">
                            Pitambara Havan Pack
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 3: Quick Devotee Links (2 Cols) -->
            <div class="lg:col-span-2 space-y-3.5">
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#F6DAA8] font-heading font-bold">
                    Devotee Care
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-[13px] text-white/85">
                    <li>
                        <a href="{{ route('pages.about') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            About Mangalam
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.contact') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('wishlist.index') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            My Wishlist
                        </a>
                    </li>
                    <li>
                        <a href="{{ auth()->check() ? route('account.index') : route('account.login') }}" class="hover:text-[#F6DAA8] transition-colors inline-block py-0.5">
                            Devotee Account
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 4: Mandir Desk Direct Support (2.5 Cols) -->
            <div class="lg:col-span-2 space-y-3.5">
                <h4 class="text-xs uppercase tracking-[0.2em] text-[#F6DAA8] font-heading font-bold">
                    Mandir Desk
                </h4>
                <p class="text-xs text-white/75 leading-relaxed">
                    Have questions about Vedic pooja vidhi or orders? We are here to assist.
                </p>
                <div class="pt-1">
                    <a 
                        href="https://wa.me/919999999999" 
                        target="_blank" 
                        class="inline-flex items-center space-x-2 px-4 py-2 rounded-xl bg-emerald-700/80 hover:bg-emerald-600 border border-emerald-400/30 text-white text-xs font-bold transition-all shadow-sm font-heading"
                    >
                        <svg class="w-4 h-4 fill-currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        <span>WhatsApp Help</span>
                    </a>
                </div>
                <div class="text-[11px] text-[#F6DAA8]/80 pt-1">
                    Mon - Sun: 9:00 AM - 8:00 PM
                </div>
            </div>

        </div>

        <!-- Bottom Row: Policies & Devotional Copyright -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 text-[11px] sm:text-xs text-white/75">
            
            <!-- Policy Links -->
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-x-4 sm:gap-x-6 gap-y-1">
                <a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Privacy Policy</a>
                <span class="text-white/30">•</span>
                <a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-[#F6DAA8] transition-colors">Terms of Service</a>
                <span class="text-white/30">•</span>
                <a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Shipping Policy</a>
                <span class="text-white/30">•</span>
                <a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-[#F6DAA8] transition-colors">Refund Policy</a>
            </div>

            <!-- Devotional Chant & Copyright -->
            <div class="text-center text-[#F6DAA8] font-serif">
                <span>© {{ date('Y') }} Mangalam.co™ • ॐ शान्तिः शान्तिः शान्तिः</span>
            </div>

        </div>

    </div>
</footer>

