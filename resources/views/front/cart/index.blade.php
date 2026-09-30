@extends('layouts.app')

@section('title', 'Shopping Cart — Mangalam.co™')
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
                        <a href="{{ route('collections.show', 'bambooless') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                            Explore Pooja Shop
                        </a>
                    </div>
                </div>

                <!-- Back to Shop -->
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('collections.show', 'bambooless') }}" class="inline-flex items-center text-xs sm:text-sm font-bold text-[#D38928] hover:underline font-heading">
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
                            <input type="text" id="coupon-code-input" placeholder="Try: MANGALAM10" class="flex-1 px-3.5 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-xs font-medium focus:outline-none focus:border-[#D38928] uppercase">
                            <button type="button" id="apply-coupon-btn" class="px-4 py-2.5 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold rounded-[10px] transition-colors font-heading cursor-pointer">
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

                    <!-- Checkout CTA: GoKwik 1-Click Fast Checkout -->
                    <button 
                        type="button" 
                        onclick="window.openGoKwikCheckout()"
                        class="gokwik-checkout-trigger w-full py-4 px-6 bg-[#00A86B] hover:bg-[#008f5b] text-white text-sm sm:text-base font-black uppercase tracking-wider rounded-[10px] shadow-md hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 font-heading text-center cursor-pointer flex items-center justify-between"
                    >
                        <span class="flex items-center gap-2">
                            <span class="text-lg">⚡</span>
                            <span>1-CLICK GOKWIK CHECKOUT</span>
                        </span>
                        <span class="bg-black/20 px-2.5 py-1 rounded text-xs font-mono">UPI / COD ➔</span>
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

    </div>
</div>

<!-- ========================================================================= -->
<!-- INSTANT SECURE CHECKOUT MODAL                                             -->
<!-- ========================================================================= -->
<div id="checkout-modal-backdrop" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs hidden items-center justify-center p-4 font-body">
    <div class="bg-white rounded-[24px] border border-[#EADBCC] max-w-lg w-full max-h-[90vh] overflow-y-auto shadow-2xl p-6 sm:p-8 space-y-6 animate-scale-up">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between border-b border-[#EADBCC] pb-4">
            <div class="flex items-center space-x-2">
                <div class="w-7 h-7 rounded-full bg-[#FAF5EE] border border-[#D38928] flex items-center justify-center text-[#965A15] font-bold text-xs">
                    🕉
                </div>
                <h3 class="text-lg font-black font-heading text-[#121212]">
                    Secure Express Checkout
                </h3>
            </div>
            <button type="button" id="close-checkout-modal-btn" class="p-1.5 text-gray-400 hover:text-black rounded-full hover:bg-gray-100 cursor-pointer">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Checkout Form Content -->
        <div id="checkout-form-container" class="space-y-4">
            <!-- Order Total Pill -->
            <div class="bg-[#FAF7F2] rounded-[12px] p-3.5 border border-[#EADBCC] flex items-center justify-between text-xs font-bold font-heading">
                <span class="text-gray-600">Payable Amount:</span>
                <span id="modal-payable-total" class="text-base text-[#C87A1E]">₹0.00</span>
            </div>

            <!-- Customer Details Form -->
            <form id="express-checkout-form" class="space-y-3.5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1 font-heading">Full Name *</label>
                        <input type="text" required id="cust-name" placeholder="e.g. Ramesh Sharma" class="w-full px-3 py-2 text-xs rounded-[8px] border border-[#EADBCC] focus:border-[#D38928] focus:outline-none bg-[#FFFDF9]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1 font-heading">Phone Number *</label>
                        <input type="tel" required id="cust-phone" placeholder="10-digit mobile number" class="w-full px-3 py-2 text-xs rounded-[8px] border border-[#EADBCC] focus:border-[#D38928] focus:outline-none bg-[#FFFDF9]">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1 font-heading">Delivery Address *</label>
                    <textarea required id="cust-address" rows="2" placeholder="House/Flat No., Street, Landmark" class="w-full px-3 py-2 text-xs rounded-[8px] border border-[#EADBCC] focus:border-[#D38928] focus:outline-none bg-[#FFFDF9]"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1 font-heading">City *</label>
                        <input type="text" required id="cust-city" placeholder="e.g. Delhi / Mumbai" class="w-full px-3 py-2 text-xs rounded-[8px] border border-[#EADBCC] focus:border-[#D38928] focus:outline-none bg-[#FFFDF9]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 mb-1 font-heading">Pincode *</label>
                        <input type="text" required id="cust-pincode" placeholder="6-digit PIN" class="w-full px-3 py-2 text-xs rounded-[8px] border border-[#EADBCC] focus:border-[#D38928] focus:outline-none bg-[#FFFDF9]">
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="pt-2 space-y-2">
                    <label class="block text-[11px] font-bold uppercase tracking-wider text-gray-700 font-heading">Select Payment Method</label>
                    <div class="grid grid-cols-2 gap-2 text-xs font-bold">
                        <label class="flex items-center space-x-2 p-2.5 rounded-[8px] border border-[#D38928] bg-[#FAF7F2] cursor-pointer">
                            <input type="radio" name="payment_method" value="COD" checked class="text-[#D38928] focus:ring-0">
                            <span>Cash on Delivery (COD)</span>
                        </label>
                        <label class="flex items-center space-x-2 p-2.5 rounded-[8px] border border-[#EADBCC] hover:border-[#D38928] bg-white cursor-pointer">
                            <input type="radio" name="payment_method" value="UPI" class="text-[#D38928] focus:ring-0">
                            <span>UPI / GPay / QR</span>
                        </label>
                    </div>
                </div>

                <!-- Place Order Button -->
                <button type="submit" id="place-order-btn" class="w-full py-3.5 px-6 bg-[#D38928] hover:bg-[#B8741E] text-white text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md hover:shadow-xl transition-all font-heading cursor-pointer mt-4">
                    Confirm & Place Sacred Order ➔
                </button>
            </form>
        </div>

        <!-- Success Screen (Hidden initially) -->
        <div id="checkout-success-container" class="hidden text-center py-6 space-y-4">
            <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-3xl font-bold">
                ✓
            </div>
            <h4 class="text-2xl font-black font-heading text-[#121212]">Order Placed Successfully!</h4>
            <p class="text-xs sm:text-sm text-gray-600 max-w-sm mx-auto">
                Thank you for choosing <strong>Mangalam.co™</strong>. Your sacred pooja samagri order <span id="success-order-id" class="font-mono font-bold text-[#D38928]">#MGLM-78241</span> has been placed.
            </p>
            <div class="pt-4">
                <a href="{{ route('home') }}" class="inline-block px-8 py-3 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold uppercase tracking-wider rounded-[10px] transition-colors font-heading">
                    Return to Homepage
                </a>
            </div>
        </div>

    </div>
</div>
@endsection