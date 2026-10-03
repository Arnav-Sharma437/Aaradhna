<!-- ========================================================================= -->
<!-- MANGLAM.CO™ EXPRESS RAZORPAY CHECKOUT MODAL                               -->
<!-- ========================================================================= -->
<div 
    id="gokwik-checkout-modal" 
    class="fixed inset-0 z-[80] bg-black/75 backdrop-blur-xs hidden items-center justify-center p-3 sm:p-4 font-body select-none transition-all duration-300 opacity-0 pointer-events-none"
    aria-hidden="true"
>
    <!-- Modal Container -->
    <div 
        id="gokwik-modal-card"
        class="w-full max-w-lg bg-white rounded-[24px] shadow-2xl border border-[#EADBCC] overflow-hidden flex flex-col max-h-[94vh] transform scale-95 transition-all duration-300"
    >
        
        <!-- 1. Header Bar with Brand & Security -->
        <div class="bg-[#1C1F26] text-white px-5 py-3.5 flex items-center justify-between shrink-0">
            <div class="flex items-center space-x-2.5">
                <img src="{{ asset('assets/images/fac-icon.png') }}" alt="Manglam" class="w-6 h-6 object-contain">
                <div class="font-heading">
                    <span class="text-white text-base font-black tracking-tight">Manglam<span class="text-[#D38928]">.co™</span></span>
                    <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded-full font-bold uppercase tracking-wider ml-1.5">Express Checkout</span>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="hidden sm:flex items-center space-x-1 text-[11px] text-emerald-400 font-semibold">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>Razorpay Secured</span>
                </div>
                <button 
                    type="button" 
                    id="gokwik-close-btn"
                    class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-gray-300 hover:text-white flex items-center justify-center transition-colors focus:outline-none cursor-pointer"
                    aria-label="Close Checkout"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- 2. Promo Strip -->
        <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white px-4 py-2 text-center text-xs font-bold font-heading flex items-center justify-center space-x-2 shrink-0">
            <span>🎉 ₹50 Instant Extra Discount applied on Online Razorpay / UPI</span>
            <span class="px-1.5 py-0.2 bg-white/20 rounded text-[10px] uppercase font-mono">Auto-Applied</span>
        </div>

        <!-- 3. Scrollable Modal Body -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-5 space-y-4 font-body">
            
            <!-- Order Quick Summary Box -->
            <div class="bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] p-3.5 space-y-2">
                <div class="flex items-center justify-between text-xs font-bold text-[#121212] font-heading">
                    <span class="flex items-center gap-1.5">
                        <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Manglam" class="h-4 w-auto object-contain inline">
                        <span>Order Summary</span>
                    </span>
                    <span id="gokwik-items-count" class="text-gray-500 font-normal">2 Items in Cart</span>
                </div>

                <div class="flex items-center justify-between pt-1 border-t border-[#EADBCC]/60 text-xs">
                    <div>
                        <span class="text-gray-500">Total Payable:</span>
                        <span class="text-gray-400 line-through ml-1.5 hidden" id="gokwik-original-price">₹1,547.00</span>
                    </div>
                    <div class="text-right">
                        <span id="gokwik-payable-price" class="text-base font-black font-heading text-emerald-700">₹1,447.00</span>
                    </div>
                </div>
            </div>

            <!-- Coupon Code Section -->
            <div class="bg-[#FFFDF9] rounded-[14px] border border-[#EADBCC] p-3 space-y-2">
                <div class="flex items-center justify-between">
                    <label for="gokwik-coupon-input" class="text-xs font-bold text-gray-800 uppercase tracking-wider font-heading flex items-center gap-1.5">
                        <span>🎟️ Have a Coupon / Promo Code?</span>
                    </label>
                </div>
                <div class="flex space-x-2">
                    <input 
                        type="text" 
                        id="gokwik-coupon-input" 
                        placeholder="e.g. MANGLAM10XXXX" 
                        class="flex-1 px-3 py-2 text-xs font-semibold uppercase bg-white border border-[#EADBCC] focus:border-[#D38928] rounded-[8px] focus:outline-none tracking-wider"
                    >
                    <button 
                        type="button" 
                        id="gokwik-apply-coupon-btn" 
                        class="px-4 py-2 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold rounded-[8px] transition-colors font-heading cursor-pointer whitespace-nowrap"
                    >
                        Apply
                    </button>
                </div>
                <div id="gokwik-coupon-feedback" class="text-[11px] font-bold text-emerald-700 hidden"></div>
            </div>

            <!-- STEP 1: Customer Contact & Delivery Form -->
            <div id="gokwik-step-1" class="space-y-3.5">
                
                <!-- Contact Details -->
                <div class="space-y-2.5">
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                        1. Contact Information
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5">
                        <div>
                            <input 
                                type="text" 
                                id="gokwik-name-input"
                                placeholder="Full Name *" 
                                value="Ramesh Sharma"
                                class="w-full px-3 py-2 text-xs font-semibold bg-white border border-gray-200 focus:border-emerald-600 rounded-[8px] focus:outline-none"
                            >
                        </div>
                        <div>
                            <input 
                                type="tel" 
                                id="gokwik-phone-input"
                                maxlength="10"
                                placeholder="10-digit Mobile Number *" 
                                value="9876543210"
                                class="w-full px-3 py-2 text-xs font-bold bg-white border border-gray-200 focus:border-emerald-600 rounded-[8px] focus:outline-none"
                            >
                        </div>
                    </div>
                </div>

                <!-- Delivery Address Details -->
                <div class="space-y-2.5 pt-1">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                            2. Delivery Address
                        </label>
                        <span class="text-[11px] text-emerald-700 font-semibold">● Free Express Shipping</span>
                    </div>

                    <div class="space-y-2">
                        <textarea 
                            id="gokwik-address-input" 
                            rows="2" 
                            placeholder="House/Flat No., Street, Area, Landmark *" 
                            class="w-full px-3 py-2 text-xs font-medium bg-white border border-gray-200 focus:border-emerald-600 rounded-[8px] focus:outline-none"
                        >B-402, Vrindavan Dham Residency, Near ISKCON Temple Road</textarea>

                        <div class="grid grid-cols-2 gap-2.5">
                            <input 
                                type="text" 
                                id="gokwik-city-input" 
                                placeholder="City / District *" 
                                value="Mathura"
                                class="w-full px-3 py-2 text-xs font-medium bg-white border border-gray-200 focus:border-emerald-600 rounded-[8px] focus:outline-none"
                            >
                            <input 
                                type="text" 
                                id="gokwik-pincode-input" 
                                maxlength="6"
                                placeholder="Pincode *" 
                                value="281001"
                                class="w-full px-3 py-2 text-xs font-bold bg-white border border-gray-200 focus:border-emerald-600 rounded-[8px] focus:outline-none"
                            >
                        </div>
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="space-y-2 pt-1">
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                        3. Select Payment Method
                    </label>

                    <div class="space-y-2">
                        <!-- Option 1: Razorpay Online (UPI, Cards, NetBanking, Wallets) -->
                        <label class="gokwik-pay-option flex items-center justify-between p-3 rounded-[12px] border-2 border-emerald-600 bg-emerald-50/50 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="gokwik_payment" value="Razorpay" checked class="text-emerald-600 focus:ring-0">
                                <div>
                                    <div class="text-xs font-bold text-gray-900 font-heading flex items-center gap-1.5">
                                        <span>UPI / Cards / NetBanking (Razorpay)</span>
                                        <span class="px-1.5 py-0.5 bg-emerald-600 text-white text-[9px] font-black rounded-md uppercase">Save ₹50</span>
                                    </div>
                                    <div class="text-[10px] text-gray-500">Google Pay, PhonePe, Paytm, Cards &amp; NetBanking</div>
                                </div>
                            </div>
                            <span class="text-xs font-bold font-heading text-emerald-800">⚡ Instant</span>
                        </label>

                        <!-- Option 2: Cash on Delivery (COD) -->
                        <label class="gokwik-pay-option flex items-center justify-between p-3 rounded-[12px] border border-gray-200 bg-white hover:border-gray-300 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="gokwik_payment" value="COD" class="text-emerald-600 focus:ring-0">
                                <div>
                                    <div class="text-xs font-bold text-gray-900 font-heading">Cash on Delivery (COD)</div>
                                    <div class="text-[10px] text-gray-500">Pay upon delivery at your doorstep</div>
                                </div>
                            </div>
                            <span class="text-[11px] text-gray-500 font-medium">Verified</span>
                        </label>
                    </div>
                </div>

                <!-- Payment Status Feedback Notice -->
                <div id="gokwik-payment-feedback" class="hidden text-center text-xs p-2.5 rounded-[10px] bg-amber-50 border border-amber-200 text-amber-800 font-medium"></div>

                <!-- Complete Order Button -->
                <button 
                    type="button" 
                    id="gokwik-pay-btn"
                    class="w-full py-3.5 px-6 bg-[#00A86B] hover:bg-[#008f5b] active:bg-[#00784c] text-white text-sm sm:text-base font-black uppercase tracking-wider rounded-[12px] shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 font-heading cursor-pointer mt-3"
                >
                    <span id="gokwik-pay-btn-label">⚡ PAY VIA RAZORPAY</span>
                    <span id="gokwik-btn-price" class="bg-black/20 px-2.5 py-0.5 rounded-full text-xs font-mono">₹1,447.00</span>
                </button>

            </div>

            <!-- STEP 4: Success Screen -->
            <div id="gokwik-success-screen" class="hidden text-center py-6 space-y-4">
                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-3xl font-black animate-bounce shadow-md">
                    ✓
                </div>
                <div class="space-y-1">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest font-heading">Payment Verified ⚡</span>
                    <h4 class="text-2xl font-black font-heading text-[#121212]">Order Confirmed!</h4>
                    <p class="text-xs sm:text-sm text-gray-600 max-w-sm mx-auto">
                        Your sacred Manglam order <strong id="gokwik-order-num" class="font-mono text-[#D38928]">#MG-CONFIRMED</strong> has been placed successfully.
                    </p>
                </div>

                <div class="bg-[#FAF7F2] p-4 rounded-[14px] border border-[#EADBCC] text-left text-xs space-y-1.5 max-w-sm mx-auto">
                    <div class="flex justify-between font-bold">
                        <span class="text-gray-600">Payment Status:</span>
                        <span class="text-emerald-700" id="gokwik-success-payment-status">✓ Paid (Razorpay Verified)</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Expected Delivery:</span>
                        <span class="font-bold text-[#121212]">2-3 Days via Express Dispatch</span>
                    </div>
                </div>

                <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-2.5">
                    <a 
                        href="{{ route('account.index', ['tab' => 'orders']) }}" 
                        id="gokwik-view-order-btn"
                        class="w-full sm:w-auto px-6 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold uppercase tracking-wider rounded-[10px] transition-colors font-heading text-center shadow-xs"
                    >
                        View Order Details ➔
                    </a>
                    <button 
                        type="button" 
                        id="gokwik-done-btn"
                        class="w-full sm:w-auto px-6 py-3 bg-[#121212] hover:bg-gray-800 text-white text-xs font-bold uppercase tracking-wider rounded-[10px] transition-colors font-heading cursor-pointer"
                    >
                        Continue Shopping
                    </button>
                </div>
            </div>

        </div>

        <!-- 4. Trust Footer -->
        <div class="bg-gray-50 border-t border-gray-200 px-4 py-2.5 flex items-center justify-between text-[11px] text-gray-500 font-medium shrink-0">
            <span class="flex items-center gap-1">
                <span class="text-emerald-600 font-bold">🔒</span> 100% Secure Checkout
            </span>
            <span>256-Bit SSL • Razorpay Gateway</span>
        </div>

    </div>
</div>

<!-- Razorpay Standard Checkout SDK -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- ========================================================================= -->
<!-- SCRIPT: RAZORPAY CHECKOUT TRIGGER & SIGNATURE VERIFICATION               -->
<!-- ========================================================================= -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('gokwik-checkout-modal');
        const card = document.getElementById('gokwik-modal-card');
        const closeBtn = document.getElementById('gokwik-close-btn');
        const payBtn = document.getElementById('gokwik-pay-btn');
        const payBtnLabel = document.getElementById('gokwik-pay-btn-label');
        const doneBtn = document.getElementById('gokwik-done-btn');
        const step1 = document.getElementById('gokwik-step-1');
        const successScreen = document.getElementById('gokwik-success-screen');
        const payablePriceEl = document.getElementById('gokwik-payable-price');
        const originalPriceEl = document.getElementById('gokwik-original-price');
        const btnPriceEl = document.getElementById('gokwik-btn-price');
        const itemsCountEl = document.getElementById('gokwik-items-count');
        const paymentFeedback = document.getElementById('gokwik-payment-feedback');

        let currentCheckoutCoupon = '';
        let currentCheckoutCouponDiscount = 0; // decimal fraction (e.g. 0.10)

        const gokwikCouponInput = document.getElementById('gokwik-coupon-input');
        const gokwikApplyCouponBtn = document.getElementById('gokwik-apply-coupon-btn');
        const gokwikCouponFeedback = document.getElementById('gokwik-coupon-feedback');

        const gokwikNameInput = document.getElementById('gokwik-name-input');
        const gokwikPhoneInput = document.getElementById('gokwik-phone-input');
        const gokwikAddressInput = document.getElementById('gokwik-address-input');
        const gokwikCityInput = document.getElementById('gokwik-city-input');
        const gokwikPincodeInput = document.getElementById('gokwik-pincode-input');

        // Toggle Pay Button Label depending on chosen payment method
        document.querySelectorAll('input[name="gokwik_payment"]').forEach(radio => {
            radio.addEventListener('change', (e) => {
                if (e.target.value === 'COD') {
                    if (payBtnLabel) payBtnLabel.textContent = 'PLACE CASH ON DELIVERY ORDER';
                } else {
                    if (payBtnLabel) payBtnLabel.textContent = '⚡ PAY VIA RAZORPAY';
                }
            });
        });

        const recalculateGokwikTotals = () => {
            let baseSubtotal = 1497;
            if (window.CartStore && typeof window.CartStore.getCart === 'function') {
                const cart = window.CartStore.getCart();
                if (cart.length > 0) {
                    baseSubtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                }
            } else if (window.cartItems && window.cartItems.length > 0) {
                baseSubtotal = window.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            }

            let discount = 0;
            if (currentCheckoutCouponDiscount > 0) {
                discount = baseSubtotal * currentCheckoutCouponDiscount;
            } else {
                // Flat 50 UPI default discount
                discount = 50;
            }

            const finalPayable = Math.max(0, baseSubtotal - discount);

            if (originalPriceEl) {
                originalPriceEl.textContent = '₹' + baseSubtotal.toFixed(2);
                if (discount > 0) originalPriceEl.classList.remove('hidden');
                else originalPriceEl.classList.add('hidden');
            }
            if (payablePriceEl) payablePriceEl.textContent = '₹' + finalPayable.toFixed(2);
            if (btnPriceEl) btnPriceEl.textContent = '₹' + finalPayable.toFixed(2);
        };

        if (gokwikApplyCouponBtn && gokwikCouponInput) {
            // Live reset when user clears coupon code input
            gokwikCouponInput.addEventListener('input', () => {
                if (!gokwikCouponInput.value.trim()) {
                    currentCheckoutCoupon = '';
                    currentCheckoutCouponDiscount = 0;
                    if (gokwikCouponFeedback) {
                        gokwikCouponFeedback.textContent = '';
                        gokwikCouponFeedback.classList.add('hidden');
                    }
                    recalculateGokwikTotals();
                }
            });

            gokwikApplyCouponBtn.addEventListener('click', async () => {
                const code = gokwikCouponInput.value.trim().toUpperCase();
                if (!code) {
                    currentCheckoutCoupon = '';
                    currentCheckoutCouponDiscount = 0;
                    if (gokwikCouponFeedback) {
                        gokwikCouponFeedback.textContent = 'Please enter a coupon code.';
                        gokwikCouponFeedback.classList.remove('hidden', 'text-emerald-700');
                        gokwikCouponFeedback.classList.add('text-rose-600');
                    }
                    recalculateGokwikTotals();
                    return;
                }

                let subtotal = 1497;
                if (window.CartStore && typeof window.CartStore.getCart === 'function') {
                    const cart = window.CartStore.getCart();
                    if (cart.length > 0) {
                        subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    }
                }

                gokwikApplyCouponBtn.disabled = true;
                gokwikApplyCouponBtn.textContent = 'Checking...';

                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const response = await fetch('/api/coupons/validate', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken || ''
                        },
                        body: JSON.stringify({
                            code: code,
                            subtotal: subtotal
                        })
                    });

                    const data = await response.json();

                    if (response.ok && data.valid) {
                        currentCheckoutCoupon = code;
                        if (data.type === 'percentage') {
                            currentCheckoutCouponDiscount = (data.value || 10) / 100;
                        } else if (data.type === 'fixed_amount' && subtotal > 0) {
                            currentCheckoutCouponDiscount = (data.discount_amount || 0) / subtotal;
                        } else {
                            currentCheckoutCouponDiscount = 0.10;
                        }

                        if (gokwikCouponFeedback) {
                            gokwikCouponFeedback.textContent = `✓ ${data.message || 'Coupon code applied: 10% OFF!'}`;
                            gokwikCouponFeedback.classList.remove('hidden', 'text-rose-600');
                            gokwikCouponFeedback.classList.add('text-emerald-700');
                        }
                    } else {
                        currentCheckoutCoupon = '';
                        currentCheckoutCouponDiscount = 0;
                        if (gokwikCouponFeedback) {
                            gokwikCouponFeedback.textContent = `✕ ${data.message || 'Invalid or unknown coupon code.'}`;
                            gokwikCouponFeedback.classList.remove('hidden', 'text-emerald-700');
                            gokwikCouponFeedback.classList.add('text-rose-600');
                        }
                    }
                } catch (e) {
                    currentCheckoutCoupon = '';
                    currentCheckoutCouponDiscount = 0;
                    if (gokwikCouponFeedback) {
                        gokwikCouponFeedback.textContent = `✕ Invalid or expired coupon code.`;
                        gokwikCouponFeedback.classList.remove('hidden', 'text-emerald-700');
                        gokwikCouponFeedback.classList.add('text-rose-600');
                    }
                } finally {
                    gokwikApplyCouponBtn.disabled = false;
                    gokwikApplyCouponBtn.textContent = 'Apply';
                    recalculateGokwikTotals();
                }
            });
        }

        window.openGoKwikCheckout = (price = null, count = null) => {
            // Close cart drawer if open
            if (window.closeCartDrawer) window.closeCartDrawer();

            // Calculate active cart summary
            let total = 1497;
            let totalItems = 2;

            if (window.CartStore && typeof window.CartStore.getCart === 'function') {
                const cart = window.CartStore.getCart();
                if (cart.length > 0) {
                    total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                    totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
                }
            } else if (window.cartItems && window.cartItems.length > 0) {
                total = window.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                totalItems = window.cartItems.reduce((sum, item) => sum + item.quantity, 0);
            }

            if (itemsCountEl) {
                itemsCountEl.textContent = `${totalItems} Item${totalItems > 1 ? 's' : ''} in Cart`;
            }

            if (paymentFeedback) {
                paymentFeedback.textContent = '';
                paymentFeedback.classList.add('hidden');
            }

            recalculateGokwikTotals();

            // Reset modal state
            if (step1) step1.classList.remove('hidden');
            if (successScreen) successScreen.classList.add('hidden');

            // Open modal
            if (modal) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                requestAnimationFrame(() => {
                    modal.classList.remove('opacity-0', 'pointer-events-none');
                    modal.classList.add('opacity-100', 'pointer-events-auto');
                    if (card) card.classList.remove('scale-95');
                    if (card) card.classList.add('scale-100');
                });
                document.body.style.overflow = 'hidden';
            }
        };

        window.closeGoKwikCheckout = () => {
            if (modal) {
                modal.classList.add('opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
                if (card) card.classList.add('scale-95');
                if (card) card.classList.remove('scale-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 300);
                document.body.style.overflow = '';
            }
        };

        if (closeBtn) closeBtn.addEventListener('click', window.closeGoKwikCheckout);
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) window.closeGoKwikCheckout();
            });
        }

        const restorePayButton = () => {
            if (!payBtn) return;
            payBtn.disabled = false;
            let currentPriceText = '₹1,447.00';
            if (payablePriceEl) currentPriceText = payablePriceEl.textContent;
            const selectedPayment = document.querySelector('input[name="gokwik_payment"]:checked')?.value || 'Razorpay';
            const labelText = selectedPayment === 'COD' ? 'PLACE CASH ON DELIVERY ORDER' : '⚡ PAY VIA RAZORPAY';
            payBtn.innerHTML = `
                <span id="gokwik-pay-btn-label">${labelText}</span>
                <span id="gokwik-btn-price" class="bg-black/20 px-2.5 py-0.5 rounded-full text-xs font-mono">${currentPriceText}</span>
            `;
        };

        // Handle Pay button click (Direct Razorpay Standard Checkout & COD flow)
        if (payBtn) {
            payBtn.addEventListener('click', async () => {
                const name = gokwikNameInput ? gokwikNameInput.value.trim() : 'Customer';
                const phone = gokwikPhoneInput ? gokwikPhoneInput.value.trim() : '';
                const address = gokwikAddressInput ? gokwikAddressInput.value.trim() : '';
                const city = gokwikCityInput ? gokwikCityInput.value.trim() : '';
                const pincode = gokwikPincodeInput ? gokwikPincodeInput.value.trim() : '';
                const selectedPayment = document.querySelector('input[name="gokwik_payment"]:checked')?.value || 'Razorpay';

                if (paymentFeedback) {
                    paymentFeedback.textContent = '';
                    paymentFeedback.classList.add('hidden');
                }

                // Form validation
                if (!phone || !/^[6-9]\d{9}$/.test(phone)) {
                    if (paymentFeedback) {
                        paymentFeedback.innerHTML = '<span class="text-rose-600 font-bold">✕ Please enter a valid 10-digit mobile number.</span>';
                        paymentFeedback.classList.remove('hidden');
                    }
                    if (gokwikPhoneInput) gokwikPhoneInput.focus();
                    return;
                }

                if (!address || address.length < 5) {
                    if (paymentFeedback) {
                        paymentFeedback.innerHTML = '<span class="text-rose-600 font-bold">✕ Please enter your complete delivery address.</span>';
                        paymentFeedback.classList.remove('hidden');
                    }
                    if (gokwikAddressInput) gokwikAddressInput.focus();
                    return;
                }

                payBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Initializing Razorpay...</span>
                `;
                payBtn.disabled = true;

                const cartItemsList = (window.CartStore && typeof window.CartStore.getCart === 'function')
                    ? window.CartStore.getCart()
                    : (window.cartItems || []);

                const fullAddressString = `${address}, ${city} - ${pincode}`;

                try {
                    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    const response = await fetch("{{ route('checkout.create-order') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken || "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            name: name,
                            phone: phone,
                            address: fullAddressString,
                            coupon_code: currentCheckoutCoupon,
                            payment_method: selectedPayment,
                            items: cartItemsList,
                        })
                    });

                    const data = await response.json();

                    if (!response.ok || !data.success) {
                        throw new Error(data.message || 'Failed to initialize order.');
                    }

                    // 1. CASH ON DELIVERY FLOW
                    if (!data.requires_payment || selectedPayment === 'COD') {
                        if (step1) step1.classList.add('hidden');
                        if (successScreen) successScreen.classList.remove('hidden');

                        const statusEl = document.getElementById('gokwik-success-payment-status');
                        if (statusEl) statusEl.textContent = '✓ Cash on Delivery (Pay at Doorstep)';

                        // Clear cart
                        if (window.CartStore && typeof window.CartStore.clearCart === 'function') {
                            window.CartStore.clearCart();
                        } else {
                            localStorage.removeItem('mangalam_cart');
                            if (window.cartItems) window.cartItems = [];
                        }

                        const orderIdEl = document.getElementById('gokwik-order-num');
                        const viewOrderBtn = document.getElementById('gokwik-view-order-btn');
                        if (orderIdEl) orderIdEl.textContent = '#' + (data.order_number || 'MG-CONFIRMED');
                        if (viewOrderBtn && data.redirect_url) viewOrderBtn.href = data.redirect_url;
                        return;
                    }

                    // 2. OFFICIAL RAZORPAY STANDARD CHECKOUT POPUP
                    if (typeof window.Razorpay === 'undefined') {
                        throw new Error('Razorpay payment gateway failed to load. Please check your network.');
                    }

                    const rzpOptions = {
                        key: data.razorpay_key,
                        amount: data.amount,
                        currency: data.currency || 'INR',
                        name: 'Manglam.co™',
                        description: 'Order #' + data.order_number + ' - Sacred Pooja Items',
                        image: '{{ asset("assets/images/fac-icon.png") }}',
                        order_id: data.razorpay_order_id,
                        prefill: {
                            name: data.customer?.name || name,
                            email: data.customer?.email || 'devotee@mangalam.co',
                            contact: data.customer?.phone || phone
                        },
                        theme: {
                            color: '#00A86B'
                        },
                        handler: async function (rzpResponse) {
                            payBtn.innerHTML = `
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Verifying Sacred Payment...</span>
                            `;

                            try {
                                const verifyRes = await fetch("{{ route('checkout.verify-payment') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken || "{{ csrf_token() }}",
                                        'Accept': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        razorpay_payment_id: rzpResponse.razorpay_payment_id,
                                        razorpay_order_id: rzpResponse.razorpay_order_id,
                                        razorpay_signature: rzpResponse.razorpay_signature,
                                        order_number: data.order_number
                                    })
                                });

                                const verifyData = await verifyRes.json();

                                if (verifyRes.ok && verifyData.success) {
                                    if (step1) step1.classList.add('hidden');
                                    if (successScreen) successScreen.classList.remove('hidden');

                                    const statusEl = document.getElementById('gokwik-success-payment-status');
                                    if (statusEl) statusEl.textContent = '✓ Paid (Razorpay Verified)';

                                    // Clear cart only after verified successful payment
                                    if (window.CartStore && typeof window.CartStore.clearCart === 'function') {
                                        window.CartStore.clearCart();
                                    } else {
                                        localStorage.removeItem('mangalam_cart');
                                        if (window.cartItems) window.cartItems = [];
                                    }

                                    const orderIdEl = document.getElementById('gokwik-order-num');
                                    const viewOrderBtn = document.getElementById('gokwik-view-order-btn');
                                    if (orderIdEl) orderIdEl.textContent = '#' + (verifyData.order_number || data.order_number);
                                    if (viewOrderBtn && verifyData.redirect_url) viewOrderBtn.href = verifyData.redirect_url;
                                } else {
                                    restorePayButton();
                                    if (paymentFeedback) {
                                        paymentFeedback.innerHTML = `<span class="text-rose-600 font-bold">✕ ${verifyData.message || 'Payment signature verification failed.'}</span>`;
                                        paymentFeedback.classList.remove('hidden');
                                    }
                                }
                            } catch (vErr) {
                                restorePayButton();
                                if (paymentFeedback) {
                                    paymentFeedback.innerHTML = `<span class="text-rose-600 font-bold">✕ Verification error. Please check connection.</span>`;
                                    paymentFeedback.classList.remove('hidden');
                                }
                            }
                        },
                        modal: {
                            ondismiss: function () {
                                restorePayButton();
                                if (paymentFeedback) {
                                    paymentFeedback.innerHTML = '<span class="text-amber-800 font-medium">⚡ Razorpay payment window was closed. Your cart is preserved and you can retry anytime.</span>';
                                    paymentFeedback.classList.remove('hidden');
                                }
                            }
                        }
                    };

                    const rzp = new window.Razorpay(rzpOptions);
                    rzp.on('payment.failed', function (resp) {
                        restorePayButton();
                        if (paymentFeedback) {
                            paymentFeedback.innerHTML = `<span class="text-rose-600 font-bold">✕ Payment Failed: ${resp.error?.description || 'Transaction declined'}</span>`;
                            paymentFeedback.classList.remove('hidden');
                        }
                    });
                    rzp.open();

                } catch (e) {
                    restorePayButton();
                    if (paymentFeedback) {
                        paymentFeedback.innerHTML = `<span class="text-rose-600 font-bold">✕ ${e.message || 'An error occurred while placing your order.'}</span>`;
                        paymentFeedback.classList.remove('hidden');
                    }
                }
            });
        }

        if (doneBtn) {
            doneBtn.addEventListener('click', () => {
                window.closeGoKwikCheckout();
                window.location.href = "{{ route('home') }}";
            });
        }

        // Attach Checkout opener to all checkout triggers across the site
        document.querySelectorAll('.gokwik-checkout-trigger').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                window.openGoKwikCheckout();
            });
        });
    });
</script>
