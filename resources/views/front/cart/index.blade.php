@extends('layouts.app')

@section('title', 'Shopping Cart — Aaradhna.co™')
@section('meta_description', 'Review your sacred pooja samagri essentials before secure checkout.')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-10 sm:py-16 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-5 sm:px-8 lg:px-[40px]">
        
        <!-- Header -->
        <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
            <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ SACRED BASKET ✦</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-[#121212] font-heading tracking-tight">
                Your Shopping Cart
            </h1>
            <p class="text-xs sm:text-sm text-gray-500">
                Free shipping automatically applies on all sacred orders above ₹499.
            </p>
        </div>

        <!-- Dynamic Cart Container -->
        <div id="cart-page-wrapper" class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left: Cart Items List (8 Cols) -->
            <div class="lg:col-span-8 space-y-4">
                
                <!-- Free Shipping Progress Meter -->
                <div class="bg-white rounded-[16px] border border-[#EADBCC] p-5 shadow-xs space-y-2">
                    <div class="flex items-center justify-between text-xs font-bold font-heading">
                        <span id="free-shipping-msg" class="text-[#D38928]">Add items worth ₹499 to unlock FREE Standard Shipping!</span>
                        <span class="text-emerald-700">🚚 Pan-India Delivery</span>
                    </div>
                    <div class="w-full h-2.5 bg-gray-100 rounded-full overflow-hidden">
                        <div id="shipping-progress-bar" class="h-full bg-gradient-to-r from-[#D38928] to-[#965A15] transition-all duration-300" style="width: 0%;"></div>
                    </div>
                </div>

                <!-- Items Container (Populated dynamically by JavaScript store) -->
                <div id="cart-items-container" class="bg-white rounded-[20px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden"></div>

                <!-- Empty State (Hidden when items present) -->
                <div id="cart-empty-state" class="hidden bg-white rounded-[20px] border border-[#EADBCC] p-12 text-center space-y-4">
                    <div class="w-16 h-16 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-[#D38928] text-3xl">
                        🛍️
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold font-heading text-[#121212]">Your Sacred Basket is Empty</h3>
                    <p class="text-xs sm:text-sm text-gray-500 max-w-sm mx-auto">
                        Explore our pure bambooless incense sticks, havan cups, and sacred temple samagri.
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('collections.show', 'all') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                            Explore Pooja Shop
                        </a>
                    </div>
                </div>

                <!-- Back to Shop -->
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('collections.show', 'all') }}" class="inline-flex items-center text-xs sm:text-sm font-bold text-[#D38928] hover:underline font-heading">
                        ← Continue Shopping
                    </a>
                </div>

            </div>

            <!-- Right: Order Summary (4 Cols) -->
            <div class="lg:col-span-4 space-y-5">
                
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 sm:p-7 shadow-xs space-y-5">
                    <h2 class="text-xl font-black font-heading text-[#121212] pb-3 border-b border-[#EADBCC]">
                        Order Summary
                    </h2>

                    <!-- Coupon Box -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold uppercase tracking-wider text-gray-600 font-heading">
                            Promo / Festive Coupon
                        </label>
                        <div class="flex space-x-2">
                            <input type="text" id="coupon-code-input" placeholder="Try: AARADHNA10" class="flex-1 px-3.5 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-xs font-medium focus:outline-none focus:border-[#D38928] uppercase">
                            <button type="button" id="apply-coupon-btn" class="px-4 py-2.5 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold rounded-[10px] transition-colors font-heading">
                                Apply
                            </button>
                        </div>
                        <div id="coupon-feedback" class="text-[11px] font-bold text-emerald-700 hidden">✓ Extra 10% Festive Discount Applied!</div>
                    </div>

                    <!-- Price Calculations -->
                    <div class="space-y-2.5 text-xs sm:text-sm pt-3 border-t border-[#EADBCC] text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span id="summary-subtotal" class="font-bold text-[#121212]">₹0.00</span>
                        </div>
                        <div class="flex justify-between text-emerald-700 font-semibold" id="summary-discount-row">
                            <span>Discount</span>
                            <span id="summary-discount">-₹0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Estimated Shipping</span>
                            <span id="summary-shipping" class="text-emerald-700 font-bold">FREE</span>
                        </div>
                        <div class="flex justify-between text-base sm:text-lg font-black font-heading text-[#121212] pt-3 border-t border-[#EADBCC]">
                            <span>Grand Total</span>
                            <span id="summary-grand-total" class="text-[#C87A1E]">₹0.00</span>
                        </div>
                        <p class="text-[10px] text-gray-400 text-right">Inclusive of all Vedic Samagri GST taxes.</p>
                    </div>

                    <!-- Checkout CTA -->
                    <button type="button" id="checkout-trigger-btn" class="w-full py-4 px-6 bg-[#D38928] hover:bg-[#B8741E] text-white text-sm sm:text-base font-bold rounded-[10px] shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading text-center cursor-pointer">
                        Proceed to Secure Checkout 🔒
                    </button>

                    <!-- Trust Badges -->
                    <div class="grid grid-cols-3 gap-2 pt-3 border-t border-gray-100 text-center text-[10px] text-gray-500">
                        <div class="p-2 bg-[#FAF7F2] rounded-[8px]">
                            <strong class="text-[#121212] block">100%</strong>
                            Pure Vedic
                        </div>
                        <div class="p-2 bg-[#FAF7F2] rounded-[8px]">
                            <strong class="text-[#121212] block">Safe</strong>
                            256-Bit SSL
                        </div>
                        <div class="p-2 bg-[#FAF7F2] rounded-[8px]">
                            <strong class="text-[#121212] block">Express</strong>
                            Fast Dispatch
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- You May Also Like Section -->
        @if(isset($featuredProducts) && $featuredProducts->count() > 0)
            <div class="mt-20">
                <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DEVOTEE FAVORITES ✦</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                        Complete Your Sacred Pooja
                    </h2>
                </div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6 lg:gap-8">
                    @foreach($featuredProducts as $fp)
                        <x-product-card :product="$fp" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>
@endsection
