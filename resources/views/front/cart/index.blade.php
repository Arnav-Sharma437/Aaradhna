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
                        <span id="free-shipping-msg" class="text-[#D38928]">Add ₹10.00 more to unlock FREE Standard Shipping!</span>
                        <span class="text-emerald-700">🚚 Pan-India Delivery</span>
                    </div>
                    <div class="w-full h-2.5 bg-gray-100 rounded-full overflow-hidden">
                        <div id="shipping-progress-bar" class="h-full bg-gradient-to-r from-[#D38928] to-[#965A15] transition-all duration-300" style="width: 85%;"></div>
                    </div>
                </div>

                <!-- Items Container (Populated by JS & default SSR fallback) -->
                <div id="cart-items-container" class="bg-white rounded-[20px] border border-[#EADBCC] divide-y divide-[#EADBCC] shadow-xs overflow-hidden">
                    
                    <!-- Item 1: Devi Refill Pack -->
                    <div class="cart-item-row p-5 sm:p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-id="1" data-price="489.00">
                        <div class="flex items-center space-x-4">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] overflow-hidden shrink-0">
                                <img src="{{ asset('assets/images/devi-refill-pack-card.jpg') }}" alt="Devi Refill Pack" class="w-full h-full object-cover">
                            </div>
                            <div class="space-y-1">
                                <span class="text-[10px] font-bold uppercase tracking-wider text-[#965A15] bg-[#FFFDF9] border border-[#D38928]/40 px-2 py-0.5 rounded-full font-heading">
                                    Pack of 100 Sticks
                                </span>
                                <h3 class="text-base sm:text-lg font-bold font-serif text-[#121212]">
                                    <a href="{{ route('products.show', 'devi-refill-pack') }}" class="hover:text-[#D38928] transition-colors">Devi Refill Pack</a>
                                </h3>
                                <div class="flex items-baseline space-x-2 text-xs">
                                    <span class="text-gray-400 line-through">₹999.00</span>
                                    <span class="text-[#C87A1E] font-bold font-heading text-sm">₹489.00</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end sm:space-x-6 pt-2 sm:pt-0 border-t sm:border-t-0 border-gray-100">
                            <!-- Stepper -->
                            <div class="flex items-center border border-[#EADBCC] rounded-[8px] bg-white overflow-hidden">
                                <button type="button" class="cart-qty-btn cart-qty-minus px-3 py-1.5 text-gray-500 hover:text-[#121212] font-bold text-sm">−</button>
                                <input type="number" class="cart-item-qty w-10 text-center text-xs font-bold border-none p-0 text-[#121212]" value="1" min="1" max="99" readonly>
                                <button type="button" class="cart-qty-btn cart-qty-plus px-3 py-1.5 text-gray-500 hover:text-[#121212] font-bold text-sm">+</button>
                            </div>

                            <div class="text-right min-w-[70px]">
                                <span class="cart-row-total text-base font-black font-heading text-[#121212]">₹489.00</span>
                            </div>

                            <button type="button" class="cart-remove-btn text-gray-400 hover:text-[#9B1C31] p-1.5 transition-colors" title="Remove item">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- Empty State (Hidden by default) -->
                <div id="cart-empty-state" class="hidden bg-white rounded-[20px] border border-[#EADBCC] p-12 text-center space-y-4">
                    <div class="w-16 h-16 mx-auto bg-[#FAF7F2] rounded-full flex items-center justify-center text-[#D38928]">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold font-heading text-[#121212]">Your Sacred Basket is Empty</h3>
                    <p class="text-xs sm:text-sm text-gray-500 max-w-sm mx-auto">
                        Explore our pure bambooless incense sticks, havan cups, and sacred temple samagri.
                    </p>
                    <a href="{{ route('collections.show', 'all') }}" class="inline-block px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-md transition-all font-heading">
                        Explore Pooja Shop
                    </a>
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
                            <span id="summary-subtotal" class="font-bold text-[#121212]">₹489.00</span>
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
                            <span id="summary-grand-total" class="text-[#C87A1E]">₹489.00</span>
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
        @if($featuredProducts->count() > 0)
            <div class="mt-20">
                <div class="text-center max-w-xl mx-auto mb-10 space-y-2">
                    <span class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ DEVOTEE FAVORITES ✦</span>
                    <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight">
                        Complete Your Sacred Pooja
                    </h2>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-7 lg:gap-8">
                    @foreach($featuredProducts as $fp)
                        <x-product-card :product="$fp" />
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let discountMultiplier = 0.0;

        const updateCartTotals = () => {
            let subtotal = 0;
            const rows = document.querySelectorAll('.cart-item-row');
            
            rows.forEach(row => {
                const price = parseFloat(row.dataset.price) || 0;
                const qtyInput = row.querySelector('.cart-item-qty');
                const qty = parseInt(qtyInput?.value) || 1;
                const rowTotal = price * qty;
                subtotal += rowTotal;
                
                const rowTotalEl = row.querySelector('.cart-row-total');
                if (rowTotalEl) rowTotalEl.textContent = '₹' + rowTotal.toFixed(2);
            });

            const discount = subtotal * discountMultiplier;
            const grandTotal = Math.max(0, subtotal - discount);

            const subEl = document.getElementById('summary-subtotal');
            const discEl = document.getElementById('summary-discount');
            const grandEl = document.getElementById('summary-grand-total');
            const shippingProgress = document.getElementById('shipping-progress-bar');
            const shippingMsg = document.getElementById('free-shipping-msg');

            if (subEl) subEl.textContent = '₹' + subtotal.toFixed(2);
            if (discEl) discEl.textContent = '-₹' + discount.toFixed(2);
            if (grandEl) grandEl.textContent = '₹' + grandTotal.toFixed(2);

            // Free shipping logic
            if (subtotal >= 499) {
                if (shippingProgress) shippingProgress.style.width = '100%';
                if (shippingMsg) shippingMsg.textContent = '🎉 You have unlocked FREE Standard Shipping!';
            } else {
                const diff = (499 - subtotal).toFixed(2);
                const pct = Math.min(100, Math.round((subtotal / 499) * 100));
                if (shippingProgress) shippingProgress.style.width = pct + '%';
                if (shippingMsg) shippingMsg.textContent = 'Add ₹' + diff + ' more to unlock FREE Standard Shipping!';
            }

            // Sync Header Badge
            let totalCount = 0;
            rows.forEach(r => totalCount += (parseInt(r.querySelector('.cart-item-qty')?.value) || 1));
            const badge = document.getElementById('header-cart-badge');
            if (badge) badge.textContent = totalCount;

            if (rows.length === 0) {
                document.getElementById('cart-items-container')?.classList.add('hidden');
                document.getElementById('cart-empty-state')?.classList.remove('hidden');
            }
        };

        // Stepper Handlers
        document.querySelectorAll('.cart-qty-plus').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const row = e.target.closest('.cart-item-row');
                const input = row.querySelector('.cart-item-qty');
                if (input) {
                    let val = parseInt(input.value) || 1;
                    if (val < 99) input.value = val + 1;
                    updateCartTotals();
                }
            });
        });

        document.querySelectorAll('.cart-qty-minus').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const row = e.target.closest('.cart-item-row');
                const input = row.querySelector('.cart-item-qty');
                if (input) {
                    let val = parseInt(input.value) || 1;
                    if (val > 1) {
                        input.value = val - 1;
                        updateCartTotals();
                    }
                }
            });
        });

        // Remove Row
        document.querySelectorAll('.cart-remove-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const row = e.target.closest('.cart-item-row');
                if (row) {
                    row.remove();
                    updateCartTotals();
                }
            });
        });

        // Coupon Code
        const couponBtn = document.getElementById('apply-coupon-btn');
        const couponInput = document.getElementById('coupon-code-input');
        const couponFeedback = document.getElementById('coupon-feedback');

        if (couponBtn && couponInput) {
            couponBtn.addEventListener('click', () => {
                const code = couponInput.value.trim().toUpperCase();
                if (code === 'AARADHNA10' || code === 'FESTIVE10' || code === 'VEDIC10') {
                    discountMultiplier = 0.10;
                    if (couponFeedback) {
                        couponFeedback.textContent = '✓ Extra 10% Festive Discount Applied!';
                        couponFeedback.classList.remove('hidden');
                    }
                    updateCartTotals();
                } else if (code) {
                    alert('Invalid Coupon Code. Try using AARADHNA10 for 10% OFF!');
                }
            });
        }

        // Checkout Button
        document.getElementById('checkout-trigger-btn')?.addEventListener('click', () => {
            alert('Redirecting to Aaradhna Secure 256-bit Encrypted Checkout Gateway...');
        });

        updateCartTotals();
    });
</script>
@endpush
@endsection
