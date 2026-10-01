<!-- ========================================================================= -->
<!-- GOKWIK 1-CLICK FAST EXPRESS CHECKOUT MODAL (Dummy Interactive Mockup)     -->
<!-- ========================================================================= -->
<div 
    id="gokwik-checkout-modal" 
    class="fixed inset-0 z-[80] bg-black/70 backdrop-blur-sm hidden items-center justify-center p-3 sm:p-4 font-body select-none transition-all duration-300 opacity-0 pointer-events-none"
    aria-hidden="true"
>
    <!-- Modal Container -->
    <div 
        id="gokwik-modal-card"
        class="w-full max-w-lg bg-white rounded-[24px] shadow-2xl border border-gray-100 overflow-hidden flex flex-col max-h-[92vh] transform scale-95 transition-all duration-300"
    >
        
        <!-- 1. GoKwik Top Header Bar -->
        <div class="bg-[#1C1F26] text-white px-5 py-3.5 flex items-center justify-between shrink-0">
            <div class="flex items-center space-x-2.5">
                <!-- GoKwik Brand Logo -->
                <div class="flex items-center space-x-1.5 font-heading">
                    <span class="text-emerald-400 text-lg font-black tracking-tight">⚡ Go<span class="text-white">Kwik</span></span>
                    <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2 py-0.5 rounded-full font-bold uppercase tracking-wider">Fast Checkout</span>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="hidden sm:flex items-center space-x-1 text-[11px] text-gray-300">
                    <svg class="w-3.5 h-3.5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    <span>100% Safe &amp; Encrypted</span>
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

        <!-- 2. Green Promo Strip (Extra Discount on UPI) -->
        <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white px-4 py-2 text-center text-xs font-bold font-heading flex items-center justify-center space-x-2 shrink-0">
            <span>🎉 Instant ₹50 Flat Extra Discount applied via UPI</span>
            <span class="px-1.5 py-0.2 bg-white/20 rounded text-[10px]">AUTO-APPLIED</span>
        </div>

        <!-- 3. Scrollable Modal Body -->
        <div class="flex-1 overflow-y-auto p-4 sm:p-6 space-y-5">
            
            <!-- Order Quick Summary Box -->
            <div class="bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] p-3.5 space-y-2.5">
                <div class="flex items-center justify-between text-xs font-bold text-[#121212] font-heading">
                    <span class="flex items-center gap-1.5">
                        <img src="{{ asset('assets/images/mangalam-logo.png') }}" alt="Mangalam" class="h-4 w-auto object-contain inline">
                        <span>Order Summary</span>
                    </span>
                    <span id="gokwik-items-count" class="text-gray-500 font-normal">2 Items in Cart</span>
                </div>

                <div class="flex items-center justify-between pt-1 border-t border-[#EADBCC]/60 text-xs">
                    <div>
                        <span class="text-gray-500">Payable Amount:</span>
                        <span class="text-gray-400 line-through ml-1.5" id="gokwik-original-price">₹1,547.00</span>
                    </div>
                    <div class="text-right">
                        <span id="gokwik-payable-price" class="text-base font-black font-heading text-emerald-700">₹1,447.00</span>
                    </div>
                </div>
            </div>

            <!-- STEP 1: Phone Number & OTP / Quick Autofill -->
            <div id="gokwik-step-1" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider mb-1.5 font-heading">
                        Enter Mobile Number for 1-Click Checkout
                    </label>
                    <div class="relative flex items-center">
                        <span class="absolute left-3.5 text-xs font-bold text-gray-500 font-heading">+91</span>
                        <input 
                            type="tel" 
                            id="gokwik-phone-input"
                            maxlength="10"
                            placeholder="Enter 10-digit number" 
                            value="9876543210"
                            class="w-full pl-12 pr-28 py-3 text-sm font-bold bg-white border-2 border-gray-200 focus:border-emerald-600 rounded-[12px] focus:outline-none transition-all tracking-wide"
                        >
                        <button 
                            type="button" 
                            id="gokwik-send-otp-btn"
                            class="absolute right-2 px-3 py-1.5 bg-[#1C1F26] hover:bg-emerald-600 text-white text-[11px] font-bold rounded-[8px] font-heading transition-colors"
                        >
                            Verify ⚡
                        </button>
                    </div>
                    <p class="text-[11px] text-gray-500 mt-1.5 flex items-center gap-1">
                        <span class="text-emerald-600 font-bold">✓</span> GoKwik will auto-fetch your saved address securely.
                    </p>
                </div>

                <!-- OTP Input (Pre-filled for dummy experience) -->
                <div id="gokwik-otp-box" class="bg-emerald-50 border border-emerald-200 rounded-[14px] p-3.5 space-y-2">
                    <div class="flex items-center justify-between text-xs font-bold text-emerald-800 font-heading">
                        <span>⚡ Quick OTP Verified (Simulated)</span>
                        <span class="text-[10px] text-emerald-600 font-mono">Auto-Filled</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" value="7" readonly class="w-10 h-10 text-center font-black text-base bg-white border border-emerald-300 rounded-[8px] text-gray-800">
                        <input type="text" value="4" readonly class="w-10 h-10 text-center font-black text-base bg-white border border-emerald-300 rounded-[8px] text-gray-800">
                        <input type="text" value="9" readonly class="w-10 h-10 text-center font-black text-base bg-white border border-emerald-300 rounded-[8px] text-gray-800">
                        <input type="text" value="2" readonly class="w-10 h-10 text-center font-black text-base bg-white border border-emerald-300 rounded-[8px] text-gray-800">
                        <span class="text-xs text-emerald-700 font-semibold ml-2">✓ Verified User</span>
                    </div>
                </div>

                <!-- STEP 2: Delivery Address -->
                <div class="space-y-3 pt-2">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                            Delivery Address
                        </label>
                        <span class="text-[11px] text-emerald-700 font-bold">● Pre-Filled from GoKwik</span>
                    </div>

                    <!-- Address Card -->
                    <div class="p-3.5 bg-white rounded-[14px] border-2 border-emerald-600 shadow-xs relative space-y-1 text-xs">
                        <div class="flex items-center justify-between font-bold text-gray-900 font-heading">
                            <span>Rameshwar Sharma (Home)</span>
                            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full">Default</span>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            B-402, Vrindavan Dham Residency, Near ISKCON Temple Road, Sector 14, Mathura, Uttar Pradesh - 281001
                        </p>
                        <div class="text-[11px] text-gray-500 pt-1">
                            Phone: +91 98765 43210
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Payment Options (GoKwik Style) -->
                <div class="space-y-3 pt-2">
                    <label class="block text-xs font-bold text-gray-800 uppercase tracking-wider font-heading">
                        Select Payment Method
                    </label>

                    <div class="space-y-2">
                        
                        <!-- Option 1: UPI / GPay / PhonePe (Recommended with Discount) -->
                        <label class="gokwik-pay-option flex items-center justify-between p-3.5 rounded-[14px] border-2 border-emerald-600 bg-emerald-50/50 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="gokwik_payment" value="UPI" checked class="text-emerald-600 focus:ring-0">
                                <div>
                                    <div class="text-xs font-bold text-gray-900 font-heading flex items-center gap-1.5">
                                        <span>UPI (Google Pay / PhonePe / Paytm / QR)</span>
                                        <span class="px-1.5 py-0.5 bg-emerald-600 text-white text-[9px] font-black rounded-md uppercase">Save ₹50</span>
                                    </div>
                                    <div class="text-[11px] text-gray-500">Fastest payment without OTP hassle</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-1 shrink-0">
                                <span class="text-xs font-bold font-heading text-emerald-800">⚡ Instant</span>
                            </div>
                        </label>

                        <!-- Option 2: Cash on Delivery (COD) -->
                        <label class="gokwik-pay-option flex items-center justify-between p-3.5 rounded-[14px] border border-gray-200 bg-white hover:border-gray-300 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="gokwik_payment" value="COD" class="text-emerald-600 focus:ring-0">
                                <div>
                                    <div class="text-xs font-bold text-gray-900 font-heading">Cash on Delivery (COD)</div>
                                    <div class="text-[11px] text-gray-500">Pay cash upon sacred delivery</div>
                                </div>
                            </div>
                            <span class="text-[11px] text-gray-500 font-medium">Verified COD</span>
                        </label>

                        <!-- Option 3: Credit / Debit Card / NetBanking -->
                        <label class="gokwik-pay-option flex items-center justify-between p-3.5 rounded-[14px] border border-gray-200 bg-white hover:border-gray-300 cursor-pointer transition-all">
                            <div class="flex items-center space-x-3">
                                <input type="radio" name="gokwik_payment" value="CARD" class="text-emerald-600 focus:ring-0">
                                <div>
                                    <div class="text-xs font-bold text-gray-900 font-heading">Cards &amp; NetBanking</div>
                                    <div class="text-[11px] text-gray-500">Visa, MasterCard, RuPay &amp; NetBanking</div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-400">💳</span>
                        </label>

                    </div>
                </div>

                <!-- Complete Order Button -->
                <button 
                    type="button" 
                    id="gokwik-pay-btn"
                    class="w-full py-4 px-6 bg-[#00A86B] hover:bg-[#008f5b] active:bg-[#00784c] text-white text-sm sm:text-base font-black uppercase tracking-wider rounded-[14px] shadow-lg hover:shadow-xl transition-all duration-200 flex items-center justify-center space-x-2 font-heading cursor-pointer"
                >
                    <span>⚡ PAY &amp; PLACE SACRED ORDER</span>
                    <span id="gokwik-btn-price" class="bg-black/20 px-2 py-0.5 rounded-full text-xs font-mono">₹1,447.00</span>
                </button>

            </div>

            <!-- STEP 4: Success Screen (Hidden by default) -->
            <div id="gokwik-success-screen" class="hidden text-center py-6 space-y-4">
                <div class="w-16 h-16 mx-auto rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center text-3xl font-black animate-bounce shadow-md">
                    ✓
                </div>
                <div class="space-y-1">
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-widest font-heading">GoKwik Express Verified ⚡</span>
                    <h4 class="text-2xl font-black font-heading text-[#121212]">Order Confirmed!</h4>
                    <p class="text-xs sm:text-sm text-gray-600 max-w-sm mx-auto">
                        Your sacred Mangalam order <strong id="gokwik-order-num" class="font-mono text-[#D38928]">#GK-948214</strong> has been placed successfully.
                    </p>
                </div>

                <div class="bg-[#FAF7F2] p-4 rounded-[14px] border border-[#EADBCC] text-left text-xs space-y-1.5 max-w-sm mx-auto">
                    <div class="flex justify-between font-bold">
                        <span class="text-gray-600">Payment Status:</span>
                        <span class="text-emerald-700">✓ Paid / Confirmed</span>
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

        <!-- 4. GoKwik Trust Footer -->
        <div class="bg-gray-50 border-t border-gray-200 px-4 py-2.5 flex items-center justify-between text-[11px] text-gray-500 font-medium shrink-0">
            <span class="flex items-center gap-1">
                <span class="text-emerald-600 font-bold">🔒</span> Verified GoKwik Checkout
            </span>
            <span>256-Bit SSL Protection</span>
        </div>

    </div>
</div>

<!-- ========================================================================= -->
<!-- SCRIPT: GOKWIK FAST CHECKOUT TRIGGER & SIMULATED FLOW                     -->
<!-- ========================================================================= -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('gokwik-checkout-modal');
        const card = document.getElementById('gokwik-modal-card');
        const closeBtn = document.getElementById('gokwik-close-btn');
        const payBtn = document.getElementById('gokwik-pay-btn');
        const doneBtn = document.getElementById('gokwik-done-btn');
        const step1 = document.getElementById('gokwik-step-1');
        const successScreen = document.getElementById('gokwik-success-screen');
        const payablePriceEl = document.getElementById('gokwik-payable-price');
        const originalPriceEl = document.getElementById('gokwik-original-price');
        const btnPriceEl = document.getElementById('gokwik-btn-price');
        const itemsCountEl = document.getElementById('gokwik-items-count');

        window.openGoKwikCheckout = (price = null, count = null) => {
            // Close cart drawer if open
            if (window.closeCartDrawer) window.closeCartDrawer();

            // Calculate active cart summary
            let total = 1497;
            if (price) {
                total = parseFloat(price);
            } else if (window.cartItems && window.cartItems.length > 0) {
                total = window.cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            }

            const discountedPrice = Math.max(0, total - 50); // Flat 50 UPI discount

            if (originalPriceEl) originalPriceEl.textContent = '₹' + total.toFixed(2);
            if (payablePriceEl) payablePriceEl.textContent = '₹' + discountedPrice.toFixed(2);
            if (btnPriceEl) btnPriceEl.textContent = '₹' + discountedPrice.toFixed(2);
            if (itemsCountEl) {
                const totalItems = window.cartItems ? window.cartItems.reduce((sum, item) => sum + item.quantity, 0) : 2;
                itemsCountEl.textContent = `${totalItems} Item${totalItems > 1 ? 's' : ''} in Cart`;
            }

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

        // Handle Pay button click (Simulate instant GoKwik payment & save order to DB)
        if (payBtn) {
            payBtn.addEventListener('click', async () => {
                payBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Processing with GoKwik...</span>
                `;
                payBtn.disabled = true;

                const phoneInput = document.getElementById('gokwik-phone-input');
                const phone = phoneInput ? phoneInput.value : '9876543210';
                const selectedPayment = document.querySelector('input[name="gokwik_payment"]:checked')?.value || 'UPI';

                let orderTotal = 1447;
                if (payablePriceEl) {
                    const parsed = parseFloat(payablePriceEl.textContent.replace(/[^0-9.]/g, ''));
                    if (!isNaN(parsed) && parsed > 0) orderTotal = parsed;
                }

                try {
                    const response = await fetch("{{ route('checkout.create-order') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            phone: phone,
                            payment_method: selectedPayment === 'UPI' ? 'UPI (GoKwik Fast 1-Click)' : (selectedPayment === 'COD' ? 'Cash on Delivery (COD)' : 'Card / NetBanking'),
                            items: window.cartItems || [],
                            total_amount: orderTotal
                        })
                    });

                    const data = await response.json();

                    if (step1) step1.classList.add('hidden');
                    if (successScreen) successScreen.classList.remove('hidden');

                    // Clear cart in storage
                    localStorage.removeItem('mangalam_cart');
                    if (window.cartItems) window.cartItems = [];
                    if (window.updateCartBadges) window.updateCartBadges();

                    const orderIdEl = document.getElementById('gokwik-order-num');
                    const viewOrderBtn = document.getElementById('gokwik-view-order-btn');

                    if (data.success && data.order_number) {
                        if (orderIdEl) orderIdEl.textContent = '#' + data.order_number;
                        if (viewOrderBtn && data.redirect_url) viewOrderBtn.href = data.redirect_url;
                    } else {
                        if (orderIdEl) orderIdEl.textContent = '#MG-GK-' + Math.floor(100000 + Math.random() * 900000);
                    }
                } catch (e) {
                    if (step1) step1.classList.add('hidden');
                    if (successScreen) successScreen.classList.remove('hidden');

                    localStorage.removeItem('mangalam_cart');
                    if (window.cartItems) window.cartItems = [];
                    if (window.updateCartBadges) window.updateCartBadges();

                    const orderIdEl = document.getElementById('gokwik-order-num');
                    if (orderIdEl) orderIdEl.textContent = '#MG-GK-' + Math.floor(100000 + Math.random() * 900000);
                }
            });
        }

        if (doneBtn) {
            doneBtn.addEventListener('click', () => {
                window.closeGoKwikCheckout();
                window.location.href = "{{ route('home') }}";
            });
        }

        // Attach GoKwik opener to all checkout triggers across the site
        document.querySelectorAll('.gokwik-checkout-trigger').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                window.openGoKwikCheckout();
            });
        });
    });
</script>
