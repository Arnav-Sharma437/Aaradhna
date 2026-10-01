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
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf

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
                    <input type="text" name="store_name" value="{{ $settings['store_name'] ?? 'Mangalam Camphor & Puja Essentials' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]" placeholder="Mangalam.co">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Tagline / Slogan</label>
                    <input type="text" name="store_tagline" value="{{ $settings['store_tagline'] ?? '100% Pure Bhimseni Camphor & Sacred Devotional Goods' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Support Email</label>
                    <input type="email" name="support_email" value="{{ $settings['support_email'] ?? 'care@mangalamcamphor.com' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
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
                    <input type="url" name="instagram_url" value="{{ $settings['instagram_url'] ?? 'https://instagram.com/mangalamcamphor' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Facebook Page URL</label>
                    <input type="url" name="facebook_url" value="{{ $settings['facebook_url'] ?? 'https://facebook.com/mangalamcamphor' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">YouTube Channel URL</label>
                    <input type="url" name="youtube_url" value="{{ $settings['youtube_url'] ?? 'https://youtube.com/@mangalamcamphor' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-1">Twitter / X Profile URL</label>
                    <input type="url" name="twitter_url" value="{{ $settings['twitter_url'] ?? 'https://x.com/mangalamcamphor' }}" class="w-full px-3.5 py-2.5 rounded-[8px] border border-gray-300 text-xs focus:ring-[#D38928] focus:border-[#D38928]">
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
