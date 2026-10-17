@extends('layouts.admin')

@section('title', 'Store Settings & Configuration — Admin')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-[#121212] font-heading">Store Settings &amp; Configuration</h1>
            <p class="text-xs sm:text-sm text-gray-500 mt-0.5">Manage branding, customer contact points, GoKwik checkout preferences, and shipping rules.</p>
        </div>
    </div>

    <!-- Main Settings Form -->
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- 0. Store Logos & Favicon (Branding Assets) -->
        <div class="bg-white rounded-[16px] border border-[#E1E3E5] shadow-xs p-6 space-y-6">
            <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-[#FAF5EE] text-[#D38928] flex items-center justify-center font-bold text-base shadow-xs">
                        🎨
                    </div>
                    <div>
                        <h2 class="text-sm sm:text-base font-bold text-gray-900 font-heading">Store Logos &amp; Favicon</h2>
                        <p class="text-xs text-gray-500">Upload and manage brand visuals for the website header, footer, and browser tab.</p>
                    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/60">
                    Live Dynamic Sync
                </span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- A. Header Logo Card -->
                <div class="flex flex-col justify-between p-4 rounded-xl border border-gray-200 bg-stone-50/50 hover:border-[#D38928]/40 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-gray-800 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-[#D38928]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                Header Logo
                            </span>
                            <span class="text-[10px] text-gray-400 font-medium">Desktop &amp; Mobile Nav</span>
                        </div>
                        <p class="text-[11px] text-gray-500 mb-3">Visible at top header navbar &amp; mobile drawer menu.</p>

                        <!-- Preview Box -->
                        <div class="h-24 w-full rounded-lg bg-white border border-gray-200 flex items-center justify-center p-3 relative overflow-hidden shadow-2xs">
                            @php
                                $headerLogoPreview = !empty($settings['header_logo']) ? asset($settings['header_logo']) : asset('assets/images/ishanaa-header-logo.png');
                            @endphp
                            <img id="header-logo-preview" src="{{ $headerLogoPreview }}" alt="Header Logo" class="max-h-16 max-w-full object-contain">
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label class="block">
                            <span class="sr-only">Choose Header Logo File</span>
                            <input 
                                type="file" 
                                name="header_logo_file" 
                                id="header_logo_input" 
                                accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                class="block w-full text-xs text-gray-600 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#121212] file:text-white hover:file:bg-[#2A2A2A] file:cursor-pointer cursor-pointer"
                            >
                        </label>
                        <p class="text-[10px] text-gray-400">PNG, SVG, WEBP, or JPG (Max 5MB). Transparent recommended.</p>

                        @if(!empty($settings['header_logo']))
                        <div class="pt-1 flex items-center">
                            <label class="flex items-center space-x-1.5 text-[11px] text-rose-600 cursor-pointer hover:text-rose-700">
                                <input type="checkbox" name="remove_header_logo" value="1" class="rounded text-rose-600 focus:ring-rose-500 text-xs">
                                <span>Reset to Default Header Logo</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- B. Footer Logo Card -->
                <div class="flex flex-col justify-between p-4 rounded-xl border border-gray-200 bg-stone-50/50 hover:border-[#D38928]/40 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-gray-800 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-[#BC7C1C]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                Footer Logo
                            </span>
                            <span class="text-[10px] text-gray-400 font-medium">Footer Section</span>
                        </div>
                        <p class="text-[11px] text-gray-500 mb-3">Visible at bottom footer on background (#BC7C1C).</p>

                        <!-- Preview Box on real footer color -->
                        <div class="h-24 w-full rounded-lg bg-[#BC7C1C] border border-[#a66a14] flex items-center justify-center p-3 relative overflow-hidden shadow-inner">
                            @php
                                $footerLogoPreview = !empty($settings['footer_logo']) ? asset($settings['footer_logo']) : asset('assets/images/Ishanaa-logo.png');
                                $footerInvert = ($settings['footer_logo_invert'] ?? '1') === '1';
                            @endphp
                            <img id="footer-logo-preview" src="{{ $footerLogoPreview }}" alt="Footer Logo" class="max-h-16 max-w-full object-contain {{ $footerInvert ? 'brightness-0 invert' : '' }}">
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label class="block">
                            <span class="sr-only">Choose Footer Logo File</span>
                            <input 
                                type="file" 
                                name="footer_logo_file" 
                                id="footer_logo_input" 
                                accept="image/png,image/jpeg,image/webp,image/svg+xml"
                                class="block w-full text-xs text-gray-600 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#121212] file:text-white hover:file:bg-[#2A2A2A] file:cursor-pointer cursor-pointer"
                            >
                        </label>
                        <p class="text-[10px] text-gray-400">PNG, SVG, WEBP, or JPG (Max 5MB).</p>

                        <div class="pt-1 space-y-1">
                            <label class="flex items-center space-x-1.5 text-[11px] text-gray-700 cursor-pointer">
                                <input type="checkbox" name="footer_logo_invert" id="footer_logo_invert" value="1" {{ $footerInvert ? 'checked' : '' }} class="rounded text-[#D38928] focus:ring-[#D38928]">
                                <span class="font-medium">Auto-White Filter (for dark footer)</span>
                            </label>

                            @if(!empty($settings['footer_logo']))
                            <label class="flex items-center space-x-1.5 text-[11px] text-rose-600 cursor-pointer hover:text-rose-700">
                                <input type="checkbox" name="remove_footer_logo" value="1" class="rounded text-rose-600 focus:ring-rose-500 text-xs">
                                <span>Reset to Default Footer Logo</span>
                            </label>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- C. Favicon Card -->
                <div class="flex flex-col justify-between p-4 rounded-xl border border-gray-200 bg-stone-50/50 hover:border-[#D38928]/40 transition-colors">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-gray-800 uppercase tracking-wider flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                Website Favicon
                            </span>
                            <span class="text-[10px] text-gray-400 font-medium">Browser Tab Icon</span>
                        </div>
                        <p class="text-[11px] text-gray-500 mb-3">Visible on browser tabs, bookmarks &amp; mobile shortcuts.</p>

                        <!-- Simulated Browser Tab Preview -->
                        <div class="h-24 w-full rounded-lg bg-gray-200/70 border border-gray-300 flex items-center justify-center p-3 relative overflow-hidden">
                            <div class="w-full max-w-[220px] bg-white rounded-t-md shadow-xs px-2.5 py-1.5 flex items-center space-x-2 border-t border-x border-gray-300">
                                @php
                                    $favPreview = !empty($settings['favicon']) ? asset($settings['favicon']) : asset('assets/images/Ishana-fav-icon.jpeg');
                                @endphp
                                <img id="favicon-preview" src="{{ $favPreview }}" alt="Favicon" class="w-4 h-4 rounded-xs object-cover shrink-0">
                                <span class="text-[11px] font-medium text-gray-700 truncate">ISHANAA | Pure Sacred Rituals</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        <label class="block">
                            <span class="sr-only">Choose Favicon File</span>
                            <input 
                                type="file" 
                                name="favicon_file" 
                                id="favicon_input" 
                                accept="image/x-icon,image/png,image/jpeg,image/svg+xml,image/webp"
                                class="block w-full text-xs text-gray-600 file:mr-2.5 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:text-[11px] file:font-bold file:bg-[#121212] file:text-white hover:file:bg-[#2A2A2A] file:cursor-pointer cursor-pointer"
                            >
                        </label>
                        <p class="text-[10px] text-gray-400">ICO, PNG, SVG or JPG (Square 32x32 / 64x64, max 2MB).</p>

                        @if(!empty($settings['favicon']))
                        <div class="pt-1 flex items-center">
                            <label class="flex items-center space-x-1.5 text-[11px] text-rose-600 cursor-pointer hover:text-rose-700">
                                <input type="checkbox" name="remove_favicon" value="1" class="rounded text-rose-600 focus:ring-rose-500 text-xs">
                                <span>Reset to Default Favicon</span>
                            </label>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <!-- 1. General Branding & Store Information -->
        <div class="bg-white rounded-[16px] border border-[#E1E3E5] shadow-xs p-6 space-y-5">
            <div class="flex items-center space-x-3 pb-3 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-[#FAF5EE] text-[#D38928] flex items-center justify-center font-bold">
                    🏛️
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 font-heading">Store Identity &amp; Customer Support</h2>
                    <p class="text-xs text-gray-500">Essential contact details and brand information visible on invoices and footer.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Store Name</label>
                    <input type="text" name="store_name" value="{{ $settings['store_name'] ?? 'ISHANAA Camphor & Puja Essentials' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="ISHANAA">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Tagline / Slogan</label>
                    <input type="text" name="store_tagline" value="{{ $settings['store_tagline'] ?? '100% Pure Bhimseni Camphor & Sacred Devotional Goods' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Support Email</label>
                    <input type="email" name="support_email" value="{{ $settings['support_email'] ?? 'hello.ishanaa@gmail.com' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Support Phone / Helpline</label>
                    <input type="text" name="support_phone" value="{{ $settings['support_phone'] ?? '+91 98765 43210' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">WhatsApp Support Number</label>
                    <input type="text" name="support_whatsapp" value="{{ $settings['support_whatsapp'] ?? '919876543210' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Store Address / Headquarters</label>
                    <input type="text" name="store_address" value="{{ $settings['store_address'] ?? 'Plot 42, Industrial Area, Varanasi, Uttar Pradesh 221001' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Top Announcement Bar Text</label>
                <input type="text" name="announcement_text" value="{{ $settings['announcement_text'] ?? '✨ Special Festive Offer: Free Shipping across India on orders above ₹499 | Extra 5% OFF on UPI' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
            </div>
        </div>

        <!-- 2. Shipping & Delivery Rules -->
        <div class="bg-white rounded-[16px] border border-[#E1E3E5] shadow-xs p-6 space-y-5">
            <div class="flex items-center space-x-3 pb-3 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-bold">
                    🚚
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 font-heading">Shipping &amp; Delivery Policies</h2>
                    <p class="text-xs text-gray-500">Configure free shipping thresholds and default flat delivery rates.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Free Shipping Threshold (₹)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 text-xs">₹</span>
                        <input type="number" step="1" name="free_shipping_threshold" value="{{ $settings['free_shipping_threshold'] ?? '499' }}" class="w-full pl-8 pr-3 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                    </div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Orders above this amount get free delivery.</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Standard Delivery Fee (₹)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 text-xs">₹</span>
                        <input type="number" step="1" name="standard_shipping_fee" value="{{ $settings['standard_shipping_fee'] ?? '49' }}" class="w-full pl-8 pr-3 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                    </div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Applied when order is below threshold.</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Estimated Dispatch Time</label>
                    <input type="text" name="estimated_dispatch" value="{{ $settings['estimated_dispatch'] ?? 'Dispatched within 24-48 Hours' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                    <span class="text-[10px] text-gray-400 mt-1 block">Shown on product pages and checkout.</span>
                </div>
            </div>
        </div>

        <!-- 3. GoKwik & Payment Gateway Settings -->
        <div class="bg-white rounded-[16px] border border-[#E1E3E5] shadow-xs p-6 space-y-5">
            <div class="flex items-center space-x-3 pb-3 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold">
                    ⚡
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 font-heading">GoKwik KwikCheckout &amp; Payment Options</h2>
                    <p class="text-xs text-gray-500">Enable one-click checkout, UPI incentives, and Cash on Delivery rules.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="flex items-start space-x-3 p-3.5 rounded-[10px] bg-gray-50 border border-gray-200">
                    <input type="checkbox" name="gokwik_enabled" id="gokwik_enabled" value="1" {{ ($settings['gokwik_enabled'] ?? '1') == '1' ? 'checked' : '' }} class="mt-0.5 rounded text-[#D38928] focus:ring-[#D38928]">
                    <label for="gokwik_enabled" class="text-xs text-gray-800">
                        <strong class="block font-bold">Enable GoKwik One-Click Checkout</strong>
                        Provides high-converting checkout modal with OTP login and saved addresses.
                    </label>
                </div>

                <div class="flex items-start space-x-3 p-3.5 rounded-[10px] bg-gray-50 border border-gray-200">
                    <input type="checkbox" name="cod_enabled" id="cod_enabled" value="1" {{ ($settings['cod_enabled'] ?? '1') == '1' ? 'checked' : '' }} class="mt-0.5 rounded text-[#D38928] focus:ring-[#D38928]">
                    <label for="cod_enabled" class="text-xs text-gray-800">
                        <strong class="block font-bold">Accept Cash on Delivery (COD)</strong>
                        Allows customers to pay with cash upon doorstep package delivery.
                    </label>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Instant Prepaid / UPI Discount (%)</label>
                    <div class="relative">
                        <input type="number" step="0.5" name="gokwik_upi_discount" value="{{ $settings['gokwik_upi_discount'] ?? '5' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 text-xs">%</span>
                    </div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Incentivizes direct online payments over COD.</span>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">COD Handling Surcharge (₹)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 text-xs">₹</span>
                        <input type="number" step="1" name="cod_handling_fee" value="{{ $settings['cod_handling_fee'] ?? '0' }}" class="w-full pl-8 pr-3 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                    </div>
                    <span class="text-[10px] text-gray-400 mt-1 block">Extra fee charged if customer chooses COD (0 for Free COD).</span>
                </div>
            </div>
        </div>

        <!-- 4. Social Media & External Links -->
        <div class="bg-white rounded-[16px] border border-[#E1E3E5] shadow-xs p-6 space-y-5">
            <div class="flex items-center space-x-3 pb-3 border-b border-gray-100">
                <div class="w-8 h-8 rounded-lg bg-pink-50 text-pink-600 flex items-center justify-center font-bold">
                    🌐
                </div>
                <div>
                    <h2 class="text-sm font-bold text-gray-900 font-heading">Social Media Links</h2>
                    <p class="text-xs text-gray-500">Connected social channels in website header and footer.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Instagram Profile URL</label>
                    <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? 'https://www.instagram.com/ishanaa_shop/' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Facebook Page URL</label>
                    <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? 'https://www.facebook.com/profile.php?id=61594948600545' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">YouTube Channel URL</label>
                    <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? 'https://youtube.com/@ishanaa' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Twitter / X Profile URL</label>
                    <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? 'https://x.com/ishanaa' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>
            </div>
        </div>

        <!-- Sticky Save Action Bar -->
        <div class="flex items-center justify-end space-x-3 pt-4 border-t border-gray-200">
            <button type="submit" class="px-6 py-2.5 rounded-[8px] bg-[#121212] hover:bg-[#252525] text-white text-xs font-bold shadow-md transition-all flex items-center space-x-2">
                <svg class="w-4 h-4 text-[#D38928]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>Save All Settings</span>
            </button>
        </div>

    </form>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function setupLivePreview(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            if (!input || !preview) return;

            input.addEventListener('change', function (e) {
                const file = e.target.files && e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (evt) {
                        preview.src = evt.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        setupLivePreview('header_logo_input', 'header-logo-preview');
        setupLivePreview('footer_logo_input', 'footer-logo-preview');
        setupLivePreview('favicon_input', 'favicon-preview');

        // Toggle footer logo invert preview live
        const invertCheckbox = document.getElementById('footer_logo_invert');
        const footerPreview = document.getElementById('footer-logo-preview');
        if (invertCheckbox && footerPreview) {
            invertCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    footerPreview.classList.add('brightness-0', 'invert');
                } else {
                    footerPreview.classList.remove('brightness-0', 'invert');
                }
            });
        }
    });
</script>
@endpush
