<!-- ========================================================================= -->
<!-- LUXURY SACRED VEDIC FOOTER — ISHANAA™                                   -->
<!-- ========================================================================= -->
<footer class="text-white font-body relative overflow-hidden bg-[#BC7C1C] border-t-2 border-[#BC7C1C] select-none">
    
    <!-- Solid Announcement Bar Warm Gold Background -->
    <div class="absolute inset-0 bg-[#BC7C1C] pointer-events-none"></div>

    <!-- Soft Warm Amber Glow -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[700px] h-[300px] rounded-full bg-white/10 blur-[90px]"></div>
    </div>

    <!-- Main Footer Container (1440px) -->
    <div class="w-full max-w-[1440px] mx-auto pt-10 sm:pt-14 pb-8 px-5 sm:px-8 lg:px-[40px] relative z-10">
        
        <!-- ================================================================= -->
        <!-- 1. TOP SECTION: SACRED VEDIC MANTRA & 2 ELEGANT GOLDEN LINES       -->
        <!-- ================================================================= -->
        <div class="text-center relative z-10 space-y-3">
            <div class="text-white text-lg sm:text-2xl md:text-[27px] font-black font-bold font-serif tracking-wide sm:tracking-widest leading-relaxed sm:leading-relaxed drop-shadow-sm">
                <div>मङ्गलं भगवान् विष्णुः, मङ्गलम् गरुडध्वजः ।</div>
                <div>मङ्गलं पुण्डरी काक्षः, मङ्गलम् तनो हरिः ॥</div>
            </div>

            <!-- 2 Thin Golden Lines: One Long, One Short Below (Exact User Requirement) -->
            <div class="flex flex-col items-center justify-center space-y-1.5 pt-2">
                <div class="w-36 sm:w-64 h-[1.5px] bg-gradient-to-r from-transparent via-white/80 to-transparent"></div>
                <div class="w-18 sm:w-32 h-[1px] bg-gradient-to-r from-transparent via-white/50 to-transparent"></div>
            </div>
        </div>

        <!-- Horizontal Divider Line -->
        <div class="w-full h-[1px] bg-white/20 my-8 sm:my-10"></div>

        <!-- ================================================================= -->
        <!-- 2. MAIN 4-COLUMN GRID                                             -->
        <!-- ================================================================= -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10 pb-8">
            
            <!-- Col 1: Brand Logo, Tagline & Social Media (4.5 Cols) -->
            <div class="lg:col-span-4 space-y-5">
                @php
                    $footerLogoPath = !empty($storeSettings['footer_logo']) ? $storeSettings['footer_logo'] : 'assets/images/Ishanaa-logo.png';
                    $footerLogoSrc = asset($footerLogoPath);
                    $footerLogoInvert = ($storeSettings['footer_logo_invert'] ?? '1') === '1';
                    $storeBrandName = $storeSettings['store_name'] ?? 'ISHANAA';
                @endphp
                <a href="{{ route('home') }}" class="inline-block py-1" aria-label="{{ $storeBrandName }} Home">
                    <img 
                        src="{{ $footerLogoSrc }}" 
                        alt="{{ $storeBrandName }}" 
                        class="h-11 sm:h-13 w-auto max-w-[170px] object-contain {{ $footerLogoInvert ? 'brightness-0 invert' : '' }}"
                    >
                </a>
                
                <p class="text-[11px] sm:text-xs uppercase tracking-[0.24em] text-[#FFF2DC] font-bold font-heading">
                    PURE FRAGRANCE. DIVINE LIVING.
                </p>

                <!-- Social Icons in Rounded Circle Outlines -->
                <div class="flex items-center space-x-3 pt-2">
                    <!-- Instagram -->
                    <a 
                        href="https://www.instagram.com/ishanaa_shop/" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full border border-white/40 hover:border-white text-[#BC7C1C] bg-white hover:bg-[#FFF8EE] flex items-center justify-center transition-all transform hover:scale-105 shadow-2xs"
                        aria-label="Instagram"
                    >
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a 
                        href="https://www.facebook.com/profile.php?id=61594948600545" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full border border-white/40 hover:border-white text-[#BC7C1C] bg-white hover:bg-[#FFF8EE] flex items-center justify-center transition-all transform hover:scale-105 shadow-2xs"
                        aria-label="Facebook"
                    >
                        <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                        </svg>
                    </a>

                    <!-- YouTube -->
                    <a 
                        href="{{ $storeSettings['youtube_url'] ?? 'https://youtube.com' }}" 
                        target="_blank" 
                        rel="noopener noreferrer" 
                        class="w-10 h-10 rounded-full border border-white/40 hover:border-white text-[#BC7C1C] bg-white hover:bg-[#FFF8EE] flex items-center justify-center transition-all transform hover:scale-105 shadow-2xs"
                        aria-label="YouTube"
                    >
                        <svg class="w-4.5 h-4.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>

                <!-- Customer Support Contacts (WhatsApp & Email - Exact Reference Screenshot) -->
                @php
                    $waNumber = preg_replace('/[^0-9]/', '', $storeSettings['support_whatsapp'] ?? '917807211102');
                    $supportEmail = 'hello.ishanaa@gmail.com';
                @endphp
                <div class="space-y-2 pt-3 border-t border-white/20 text-xs sm:text-[13.5px] text-[#FFF8EE]">
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2.5 hover:text-white transition-colors group">
                        <svg class="w-4.5 h-4.5 text-[#25D366] group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.82 11.82 0 00-3.48-8.413z"/>
                        </svg>
                        <span class="font-medium text-white">Whatsapp Support</span>
                    </a>
                    <a href="mailto:{{ $supportEmail }}" class="flex items-center gap-2.5 hover:text-white transition-colors group">
                        <svg class="w-4.5 h-4.5 text-white group-hover:scale-110 transition-transform shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="M22 7l-10 7L2 7"/>
                        </svg>
                        <span class="font-medium text-white">{{ $supportEmail }}</span>
                    </a>
                </div>
            </div>

            <!-- Col 2: SHOP Menu (2.5 Cols) -->
            <div class="lg:col-span-2 md:border-l md:border-white/20 md:pl-6">
                <button type="button" class="footer-accordion-btn w-full flex items-center justify-between py-2 md:py-0 text-left focus:outline-none cursor-pointer md:cursor-default" data-target="footer-shop-menu">
                    <div>
                        <h4 class="text-sm sm:text-base font-bold uppercase tracking-[0.16em] text-white font-heading">
                            SHOP
                        </h4>
                        <div class="w-6 h-[2px] bg-white/70 mt-1.5 hidden md:block"></div>
                    </div>
                    <span class="footer-accordion-icon text-white text-xl font-bold md:hidden leading-none transition-transform duration-200">+</span>
                </button>
                <ul id="footer-shop-menu" class="footer-accordion-content hidden md:block space-y-2.5 text-sm sm:text-[14.5px] text-[#FFF8EE] pt-3 md:pt-4">
                    <li>
                        <a href="{{ route('collections.show', 'all') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Shop All
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'bambooless') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Bambooless
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'havan-cups') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Havan Cups
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('collections.show', 'dhoop-cones') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Dhoop Cones
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bundles.trial-packs') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Trial Pack
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bundles.buy2get1') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Buy 2 Get 1 Free
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.pitambara') }}" class="text-white font-bold hover:text-white hover:underline transition-colors inline-flex items-center gap-1.5 py-0.5">
                            <span class="text-[#FFF2DC]">✦</span>
                            <span>Pitambara Havan</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 3: ABOUT Menu (2.5 Cols) -->
            <div class="lg:col-span-2 md:border-l md:border-white/20 md:pl-6">
                <button type="button" class="footer-accordion-btn w-full flex items-center justify-between py-2 md:py-0 text-left focus:outline-none cursor-pointer md:cursor-default" data-target="footer-about-menu">
                    <div>
                        <h4 class="text-sm sm:text-base font-bold uppercase tracking-[0.16em] text-white font-heading">
                            ABOUT
                        </h4>
                        <div class="w-6 h-[2px] bg-white/70 mt-1.5 hidden md:block"></div>
                    </div>
                    <span class="footer-accordion-icon text-white text-xl font-bold md:hidden leading-none transition-transform duration-200">+</span>
                </button>
                <ul id="footer-about-menu" class="footer-accordion-content hidden md:block space-y-2.5 text-sm sm:text-[14.5px] text-[#FFF8EE] pt-3 md:pt-4">
                    <li>
                        <a href="{{ route('pages.about') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pages.contact') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('blogs.index', 'vedic-rituals') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            Blogs
                        </a>
                    </li>
                    <li>
                        <a href="{{ auth()->check() ? route('account.index') : route('account.login') }}" class="hover:text-white hover:underline transition-colors inline-block py-0.5">
                            My Account
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Col 4: STAY CONNECTED / NEWSLETTER (3.5 Cols - Click to Open 10% OFF Multi-step Flow) -->
            <div 
                class="lg:col-span-4 lg:border-l lg:border-white/20 lg:pl-8 space-y-3 cursor-pointer group/newsletter select-none"
                onclick="window.openDiscountSignupModal()"
            >
                <span class="text-[11px] sm:text-xs uppercase tracking-[0.22em] text-[#FFF2DC] font-bold block group-hover/newsletter:text-white transition-colors">
                    STAY CONNECTED
                </span>
                <h3 class="text-2xl sm:text-3xl font-serif text-white tracking-tight leading-none group-hover/newsletter:text-[#FFF2DC] transition-colors">
                    Get 10<span class="font-sans">%</span> OFF
                </h3>
                <p class="text-xs sm:text-sm text-[#FFF8EE] group-hover/newsletter:text-white transition-colors">
                    Subscribe to our newsletter for Vedic updates &amp; festive offerings.
                </p>

                <!-- Newsletter Clickable Interactive Bar (Opens Multi-step Modal) -->
                <div class="pt-2">
                    <div class="relative flex items-center w-full rounded-full border border-white/40 bg-white p-1 pl-4 hover:border-white group-hover/newsletter:border-white transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4.5 h-4.5 text-[#BC7C1C] mr-2.5 shrink-0 group-hover/newsletter:text-[#965A15] transition-colors" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <input 
                            type="text" 
                            readonly
                            placeholder="Click to get your 10% OFF coupon" 
                            class="footer-email-input bg-transparent text-[#2B1810] placeholder-[#554035]/70 text-xs sm:text-sm focus:outline-none flex-1 min-w-0 pr-2 font-body cursor-pointer pointer-events-none"
                        >
                        <div 
                            class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-[#BC7C1C] hover:bg-[#965A15] text-white flex items-center justify-center font-bold transition-all transform group-hover/newsletter:scale-105 shrink-0 shadow-xs cursor-pointer"
                            aria-label="Get 10% OFF"
                        >
                            <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Horizontal Divider Line -->
        <div class="w-full h-[1px] bg-white/20 mt-8 sm:mt-10 mb-6"></div>

        <!-- ================================================================= -->
        <!-- 3. BOTTOM ROW: POLICIES, EXACT CENTER COPYRIGHT & PAYMENT BADGES  -->
        <!-- ================================================================= -->
        <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-4 text-xs sm:text-[13px] text-[#FFF8EE] w-full">
            
            <!-- Left Column: Policies -->
            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-x-3 gap-y-1.5 sm:gap-x-3.5">
                <a href="{{ route('pages.show', 'refund-policy') }}" class="hover:text-white hover:underline transition-colors whitespace-nowrap">Return &amp; Refund Policy</a>
                <span class="text-white/30 hidden sm:inline">|</span>
                <a href="{{ route('pages.show', 'shipping-policy') }}" class="hover:text-white hover:underline transition-colors whitespace-nowrap">Shipping Policy</a>
                <span class="text-white/30 hidden sm:inline">|</span>
                <a href="{{ route('pages.show', 'terms-of-service') }}" class="hover:text-white hover:underline transition-colors whitespace-nowrap">Terms &amp; Conditions</a>
                <span class="text-white/30 hidden sm:inline">|</span>
                <a href="{{ route('pages.show', 'privacy-policy') }}" class="hover:text-white hover:underline transition-colors whitespace-nowrap">Privacy Policy</a>
            </div>

            <!-- Center Column: 100% Dead-Center Copyright -->
            <div class="text-center text-white font-body text-xs sm:text-sm font-medium whitespace-nowrap py-1 lg:py-0">
                <span>© {{ date('Y') }} ISHANAA. All Rights Reserved.</span>
            </div>

            <!-- Right Column: Authentic Payment Icons (Never Clipped) -->
            <div class="flex flex-wrap items-center justify-center lg:justify-end gap-1.5 shrink-0">
                <!-- VISA -->
                <div class="h-6 px-2.5 bg-white rounded flex items-center justify-center shadow-xs" title="Visa">
                    <svg class="h-3.5 w-auto" viewBox="0 0 54 18" fill="none">
                        <path d="M19.43 1.25L13.14 15.22H8.97L5.47 3.99C5.26 3.16 5.08 2.86 4.45 2.5C3.39 1.93 1.58 1.4 0 1.05L0.09 0.65H7.07C7.96 0.65 8.76 1.24 8.95 2.27L10.66 11.23L15.21 0.65H19.43V1.25ZM36.56 10.74C36.58 6.78 31.06 6.56 31.1 4.75C31.11 4.2 31.64 3.61 32.78 3.46C33.34 3.38 34.92 3.32 36.6 4.1L37.31 0.79C36.33 0.44 35.08 0.1 33.51 0.1C29.43 0.1 26.54 2.27 26.51 5.37C26.48 7.67 28.53 8.95 30.1 9.72C31.71 10.51 32.25 11.01 32.24 11.72C32.23 12.8 30.93 13.29 29.74 13.31C27.65 13.34 26.44 12.75 25.48 12.31L24.74 15.75C25.68 16.18 27.42 16.55 29.23 16.57C33.59 16.57 36.53 14.42 36.56 10.74ZM47.45 15.22H51.13L47.93 0.65H44.52C43.74 0.65 43.08 1.1 42.79 1.8L36.56 15.22H40.75L41.58 12.92H46.7L47.45 15.22ZM42.73 9.78L44.85 3.96L46.06 9.78H42.73ZM24.78 0.65L21.48 15.22H17.48L20.78 0.65H24.78Z" fill="#1A1F71"/>
                    </svg>
                </div>

                <!-- MasterCard -->
                <div class="h-6 px-1.5 bg-white rounded flex items-center justify-center shadow-xs" title="Mastercard">
                    <svg class="h-4 w-auto" viewBox="0 0 32 20" fill="none">
                        <circle cx="10" cy="10" r="10" fill="#EB001B"/>
                        <circle cx="22" cy="10" r="10" fill="#F79E1B"/>
                        <path d="M16 3.1A9.95 9.95 0 0 1 19.9 10 9.95 9.95 0 0 1 16 16.9 9.95 9.95 0 0 1 12.1 10 9.95 9.95 0 0 1 16 3.1Z" fill="#FF5F00"/>
                    </svg>
                </div>

                <!-- UPI -->
                <div class="h-6 px-2 bg-white rounded flex items-center justify-center gap-1 shadow-xs" title="UPI">
                    <svg class="h-3.5 w-auto" viewBox="0 0 18 16" fill="none">
                        <path d="M6 0L0 16H6L12 0H6Z" fill="#097939"/>
                        <path d="M12 0L6 16H12L18 0H12Z" fill="#ED752E"/>
                    </svg>
                    <span class="font-sans font-black text-[11px] text-[#1E2229] leading-none">UPI</span>
                </div>

                <!-- RuPay -->
                <div class="h-6 px-2 bg-white rounded flex items-center justify-center shadow-xs" title="RuPay">
                    <div class="flex items-center font-sans font-black text-[11px] italic tracking-tighter leading-none">
                        <span class="text-[#097939]">Ru</span><span class="text-[#00529C]">Pay</span>
                        <span class="inline-block w-1.5 h-3 bg-gradient-to-b from-[#ED752E] to-[#097939] transform skew-x-[-15deg] ml-0.5"></span>
                    </div>
                </div>

                <!-- Paytm -->
                <div class="h-6 px-2 bg-white rounded flex items-center justify-center shadow-xs" title="Paytm">
                    <span class="font-sans font-black text-[11px] tracking-tight leading-none">
                        <span class="text-[#002E6E]">Pay</span><span class="text-[#00BAF2]">tm</span>
                    </span>
                </div>

                <!-- Google Pay -->
                <div class="h-6 px-2 bg-white rounded flex items-center justify-center shadow-xs" title="Google Pay">
                    <span class="font-sans font-bold text-[11px] text-[#5F6368] flex items-center gap-0.5 leading-none">
                        <span class="font-black text-[#4285F4]">G</span>Pay
                    </span>
                </div>
            </div>

        </div>

    </div>
</footer>

<style>
    .footer-email-input:-webkit-autofill,
    .footer-email-input:-webkit-autofill:hover, 
    .footer-email-input:-webkit-autofill:focus,
    .footer-email-input:-webkit-autofill:active {
        -webkit-text-fill-color: #ffffff !important;
        -webkit-box-shadow: 0 0 0 1000px #3A060E inset !important;
        box-shadow: 0 0 0 1000px #3A060E inset !important;
        transition: background-color 5000s ease-in-out 0s;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const footerBtns = document.querySelectorAll('.footer-accordion-btn');
        footerBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (window.innerWidth >= 768) return; // Only mobile accordion
                const targetId = btn.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = btn.querySelector('.footer-accordion-icon');
                if (content) {
                    const isHidden = content.classList.contains('hidden');
                    if (isHidden) {
                        content.classList.remove('hidden');
                        if (icon) icon.textContent = '−';
                    } else {
                        content.classList.add('hidden');
                        if (icon) icon.textContent = '+';
                    }
                }
            });
        });
    });
</script>
