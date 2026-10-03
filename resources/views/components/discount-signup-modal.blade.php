<!-- ========================================================================= -->
<!-- MANGLAM™ 10% OFF MULTI-STEP SIGNUP MODAL                                  -->
<!-- ========================================================================= -->
<div 
    id="discount-signup-modal" 
    class="fixed inset-0 z-[100] bg-black/80 backdrop-blur-md hidden items-center justify-center p-3 sm:p-5 font-body select-none transition-all duration-300 opacity-0 pointer-events-none"
    aria-hidden="true"
    role="dialog"
    aria-modal="true"
>
    <!-- Modal Card (Warm Spiritual Gold-Maroon Luxury Aesthetic) -->
    <div 
        id="discount-signup-card" 
        class="w-full max-w-xl bg-gradient-to-b from-[#6B1120] via-[#5C0D1B] to-[#420810] text-white rounded-[24px] sm:rounded-[28px] border-2 border-[#D38928]/60 shadow-[0_25px_60px_-15px_rgba(0,0,0,0.7),0_0_40px_rgba(211,137,40,0.2)] overflow-hidden flex flex-col max-h-[92vh] transform scale-95 transition-all duration-300 relative"
    >
        <!-- Background Sacred Glow -->
        <div class="absolute -top-24 -right-24 w-60 h-60 bg-[#D38928]/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -left-24 w-60 h-60 bg-[#D38928]/15 rounded-full blur-3xl pointer-events-none"></div>

        <!-- Header Bar -->
        <div class="p-4 sm:p-5 pb-3 border-b border-white/15 flex items-center justify-between relative z-10">
            <div class="flex items-center space-x-3">
                <img 
                    src="{{ asset('assets/images/mangalam-logo-white.png') }}" 
                    alt="Manglam" 
                    class="h-7 sm:h-8 w-auto object-contain"
                >
                <span class="text-xs font-bold uppercase tracking-widest text-[#F6DAA8] font-heading border-l border-white/20 pl-3">
                    Exclusive 10% OFF
                </span>
            </div>

            <!-- Close (✕) Button -->
            <button 
                type="button" 
                id="close-discount-modal-btn"
                onclick="window.closeDiscountSignupModal()"
                class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer focus:outline-none"
                aria-label="Close modal"
            >
                <svg class="w-4 h-4 sm:w-4.5 sm:h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Progress Bar Indicator (Visible during Steps 1, 2, 3) -->
        <div id="discount-progress-container" class="px-5 sm:px-7 pt-4 pb-1 relative z-10">
            <div class="flex items-center justify-between text-xs font-bold text-[#F6DAA8] font-heading mb-1.5">
                <span id="discount-step-label">Step 1 of 3</span>
                <span class="text-[11px] text-white/70">✦ Pure Vedic Rituals</span>
            </div>
            <div class="w-full h-1.5 bg-black/30 rounded-full overflow-hidden border border-white/10">
                <div 
                    id="discount-progress-bar" 
                    class="h-full bg-gradient-to-r from-[#F6DAA8] to-[#D38928] transition-all duration-300 rounded-full" 
                    style="width: 33.33%;"
                ></div>
            </div>
        </div>

        <!-- Modal Body (Scrollable Multi-Step Container) -->
        <div class="flex-1 overflow-y-auto p-5 sm:p-7 pt-3 space-y-5 shopify-scrollbar relative z-10">
            
            <form id="discount-signup-multistep-form" onsubmit="event.preventDefault();">
                @csrf

                <!-- ============================================================= -->
                <!-- STEP 1 — PRODUCT INTEREST & BLOCKER                           -->
                <!-- ============================================================= -->
                <div id="discount-step-1" class="space-y-5 animate-fade-in">
                    
                    <!-- Question 1: What are you looking to buy? -->
                    <div class="space-y-2.5">
                        <label class="block text-sm sm:text-base font-bold text-white font-heading tracking-wide">
                            1. What are you looking to buy?<span class="text-[#F6DAA8]">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2" id="group-product-interest">
                            @foreach([
                                'Bambooless Incense Sticks',
                                'Havan Cups',
                                'Dhoop Cones',
                                'Attar Sprays',
                                'Not sure yet — just exploring'
                            ] as $opt)
                                <label class="discount-pill-opt flex items-center gap-2.5 p-2.5 sm:p-3 rounded-xl sm:rounded-full border border-white/30 bg-white/5 hover:bg-white/15 hover:border-[#F6DAA8] transition-all cursor-pointer text-xs sm:text-sm text-white/90">
                                    <input 
                                        type="radio" 
                                        name="product_interest" 
                                        value="{{ $opt }}" 
                                        class="hidden"
                                    >
                                    <span class="w-4 h-4 rounded-full border border-white/50 flex items-center justify-center shrink-0 pill-indicator">
                                        <span class="w-2 h-2 rounded-full bg-transparent pill-dot"></span>
                                    </span>
                                    <span class="font-medium leading-tight">{{ $opt }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Question 2: What's stopping you from ordering today? -->
                    <div class="space-y-2.5 pt-2 border-t border-white/10">
                        <label class="block text-sm sm:text-base font-bold text-white font-heading tracking-wide">
                            2. What's stopping you from ordering today?<span class="text-[#F6DAA8]">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2" id="group-ordering-blocker">
                            @foreach([
                                'Price feels too high',
                                'Not sure about the fragrance quality',
                                'Don\'t know which product to choose',
                                'Don\'t trust ordering online from new brands',
                                'Just browsing, not ready yet',
                                'Need to check with family first',
                                'Website is not good'
                            ] as $opt)
                                <label class="discount-pill-opt flex items-center gap-2.5 p-2.5 sm:p-3 rounded-xl sm:rounded-full border border-white/30 bg-white/5 hover:bg-white/15 hover:border-[#F6DAA8] transition-all cursor-pointer text-xs sm:text-sm text-white/90">
                                    <input 
                                        type="radio" 
                                        name="ordering_blocker" 
                                        value="{{ $opt }}" 
                                        class="hidden"
                                    >
                                    <span class="w-4 h-4 rounded-full border border-white/50 flex items-center justify-center shrink-0 pill-indicator">
                                        <span class="w-2 h-2 rounded-full bg-transparent pill-dot"></span>
                                    </span>
                                    <span class="font-medium leading-tight">{{ $opt }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Step 1 Validation Error -->
                    <div id="step-1-error" class="hidden text-xs font-bold text-rose-300 bg-rose-900/50 p-2.5 rounded-lg border border-rose-500/50"></div>

                    <!-- Next Button -->
                    <div class="pt-2 flex justify-end">
                        <button 
                            type="button" 
                            id="step-1-next-btn"
                            onclick="window.goToDiscountStep(2)"
                            class="w-full sm:w-auto px-8 py-3 bg-[#F6DAA8] hover:bg-[#ffe3b5] text-[#5C0D1B] text-sm font-bold uppercase tracking-wider rounded-xl sm:rounded-full shadow-lg transition-all transform active:scale-95 cursor-pointer font-heading flex items-center justify-center gap-2"
                        >
                            <span>Next</span>
                            <span>➔</span>
                        </button>
                    </div>

                </div>

                <!-- ============================================================= -->
                <!-- STEP 2 — DISCOVERY SOURCE & PRIORITY                          -->
                <!-- ============================================================= -->
                <div id="discount-step-2" class="hidden space-y-5 animate-fade-in">
                    
                    <!-- Question 1: How did you find us? -->
                    <div class="space-y-2.5">
                        <label class="block text-sm sm:text-base font-bold text-white font-heading tracking-wide">
                            1. How did you find us?<span class="text-[#F6DAA8]">*</span>
                        </label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2" id="group-discovery-source">
                            @foreach([
                                'Facebook',
                                'Instagram',
                                'Google',
                                'Friends/Family',
                                'Others'
                            ] as $opt)
                                <label class="discount-pill-opt flex items-center gap-2.5 p-2.5 sm:p-3 rounded-xl sm:rounded-full border border-white/30 bg-white/5 hover:bg-white/15 hover:border-[#F6DAA8] transition-all cursor-pointer text-xs sm:text-sm text-white/90">
                                    <input 
                                        type="radio" 
                                        name="discovery_source" 
                                        value="{{ $opt }}" 
                                        class="hidden"
                                    >
                                    <span class="w-4 h-4 rounded-full border border-white/50 flex items-center justify-center shrink-0 pill-indicator">
                                        <span class="w-2 h-2 rounded-full bg-transparent pill-dot"></span>
                                    </span>
                                    <span class="font-medium leading-tight">{{ $opt }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Question 2: What matters most to you in incense/pooja products? -->
                    <div class="space-y-2.5 pt-2 border-t border-white/10">
                        <label class="block text-sm sm:text-base font-bold text-white font-heading tracking-wide">
                            2. What matters most to you in incense/pooja products?<span class="text-[#F6DAA8]">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2" id="group-product-priority">
                            @foreach([
                                'Natural / Chemical-free ingredients',
                                'Long-lasting fragrance',
                                'Low smoke / no irritation',
                                'Good value for money',
                                'Premium quality & packaging'
                            ] as $opt)
                                <label class="discount-pill-opt flex items-center gap-2.5 p-2.5 sm:p-3 rounded-xl sm:rounded-full border border-white/30 bg-white/5 hover:bg-white/15 hover:border-[#F6DAA8] transition-all cursor-pointer text-xs sm:text-sm text-white/90">
                                    <input 
                                        type="radio" 
                                        name="product_priority" 
                                        value="{{ $opt }}" 
                                        class="hidden"
                                    >
                                    <span class="w-4 h-4 rounded-full border border-white/50 flex items-center justify-center shrink-0 pill-indicator">
                                        <span class="w-2 h-2 rounded-full bg-transparent pill-dot"></span>
                                    </span>
                                    <span class="font-medium leading-tight">{{ $opt }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Step 2 Validation Error -->
                    <div id="step-2-error" class="hidden text-xs font-bold text-rose-300 bg-rose-900/50 p-2.5 rounded-lg border border-rose-500/50"></div>

                    <!-- Back / Next Buttons -->
                    <div class="pt-2 flex items-center justify-between gap-3">
                        <button 
                            type="button" 
                            onclick="window.goToDiscountStep(1)"
                            class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-semibold rounded-xl sm:rounded-full transition-colors cursor-pointer font-heading"
                        >
                            ← Back
                        </button>
                        <button 
                            type="button" 
                            id="step-2-next-btn"
                            onclick="window.goToDiscountStep(3)"
                            class="px-8 py-3 bg-[#F6DAA8] hover:bg-[#ffe3b5] text-[#5C0D1B] text-sm font-bold uppercase tracking-wider rounded-xl sm:rounded-full shadow-lg transition-all transform active:scale-95 cursor-pointer font-heading flex items-center gap-2"
                        >
                            <span>Next</span>
                            <span>➔</span>
                        </button>
                    </div>

                </div>

                <!-- ============================================================= -->
                <!-- STEP 3 — USER CONTACT DETAILS                                 -->
                <!-- ============================================================= -->
                <div id="discount-step-3" class="hidden space-y-4 animate-fade-in">
                    
                    <div class="text-center space-y-1 pb-1">
                        <h3 class="text-lg sm:text-xl font-black font-heading text-white tracking-tight">
                            Where should we send your 10% OFF?
                        </h3>
                        <p class="text-xs text-white/75">
                            Enter your details to generate your personal single-use coupon.
                        </p>
                    </div>

                    <!-- Field 1: Name -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#F6DAA8] mb-1.5 font-heading">
                            Name<span class="text-white">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="discount-input-name"
                            name="name" 
                            placeholder="Enter your Name"
                            required
                            class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/30 text-white placeholder-white/40 text-sm focus:outline-none focus:border-[#F6DAA8] focus:bg-white/15 transition-all"
                        >
                    </div>

                    <!-- Field 2: Phone -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#F6DAA8] mb-1.5 font-heading">
                            Phone<span class="text-white">*</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-4 text-xs font-bold text-[#F6DAA8] font-heading">+91</span>
                            <input 
                                type="tel" 
                                id="discount-input-phone"
                                name="phone" 
                                maxlength="10"
                                placeholder="Enter your phone (10 digits)"
                                required
                                class="w-full pl-12 pr-4 py-3 rounded-xl bg-white/10 border border-white/30 text-white placeholder-white/40 text-sm focus:outline-none focus:border-[#F6DAA8] focus:bg-white/15 transition-all tracking-wider"
                            >
                        </div>
                    </div>

                    <!-- Field 3: Email -->
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#F6DAA8] mb-1.5 font-heading">
                            Email<span class="text-white">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="discount-input-email"
                            name="email" 
                            placeholder="Enter your email"
                            required
                            class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/30 text-white placeholder-white/40 text-sm focus:outline-none focus:border-[#F6DAA8] focus:bg-white/15 transition-all"
                        >
                    </div>

                    <!-- Step 3 Validation Error -->
                    <div id="step-3-error" class="hidden text-xs font-bold text-rose-300 bg-rose-900/50 p-2.5 rounded-lg border border-rose-500/50"></div>

                    <!-- Submit / Back Action -->
                    <div class="pt-2 flex items-center justify-between gap-3">
                        <button 
                            type="button" 
                            onclick="window.goToDiscountStep(2)"
                            class="px-5 py-2.5 bg-white/10 hover:bg-white/20 text-white text-xs sm:text-sm font-semibold rounded-xl sm:rounded-full transition-colors cursor-pointer font-heading"
                        >
                            ← Back
                        </button>
                        <button 
                            type="button" 
                            id="discount-submit-btn"
                            onclick="window.submitDiscountSignupForm()"
                            class="flex-1 sm:flex-initial px-8 py-3.5 bg-gradient-to-r from-[#F6DAA8] via-[#E6B86C] to-[#D38928] hover:opacity-95 text-[#5C0D1B] text-sm font-bold uppercase tracking-wider rounded-xl sm:rounded-full shadow-xl transition-all transform active:scale-95 cursor-pointer font-heading flex items-center justify-center gap-2"
                        >
                            <span id="discount-submit-spinner" class="hidden animate-spin">⟳</span>
                            <span id="discount-submit-text">Get My 10% OFF</span>
                        </button>
                    </div>

                </div>

                <!-- ============================================================= -->
                <!-- STEP 4 — FINAL LUXURY SUCCESS SCREEN                          -->
                <!-- ============================================================= -->
                <div id="discount-step-success" class="hidden space-y-5 text-center py-2 animate-fade-in">
                    
                    <div class="w-16 h-16 mx-auto rounded-full bg-[#F6DAA8]/20 border-2 border-[#F6DAA8] text-[#F6DAA8] flex items-center justify-center text-3xl font-bold shadow-lg">
                        ✓
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-2xl sm:text-3xl font-black font-heading text-white tracking-tight">
                            Your 10% OFF is Ready!
                        </h3>
                        <p class="text-xs sm:text-sm text-[#F6DAA8] font-medium" id="discount-success-subtext">
                            Thank you for joining the Manglam family.
                        </p>
                    </div>

                    <!-- Premium Gold/Maroon Coupon Box (Shopify Luxury Polaris Card) -->
                    <div class="bg-[#420810]/90 border-2 border-dashed border-[#F6DAA8] rounded-[20px] p-5 sm:p-6 space-y-3.5 shadow-2xl relative">
                        <span class="text-[10px] uppercase tracking-[0.24em] text-[#F6DAA8]/80 font-bold block">
                            YOUR EXCLUSIVE PROMO CODE
                        </span>

                        <!-- Coupon Code Display -->
                        <div class="flex items-center justify-center">
                            <span 
                                id="discount-generated-code-display" 
                                class="text-2xl sm:text-3xl lg:text-4xl font-black font-mono tracking-widest text-[#F6DAA8] select-all bg-black/30 px-4 py-1.5 rounded-lg border border-[#F6DAA8]/30"
                            >
                                MANGLAM10A7K2
                            </span>
                        </div>

                        <!-- Copy Coupon Button -->
                        <div>
                            <button 
                                type="button" 
                                id="discount-copy-coupon-btn"
                                onclick="window.copyDiscountCouponCode()"
                                class="w-full sm:w-auto px-6 py-2.5 bg-[#F6DAA8] hover:bg-[#ffe3b5] text-[#5C0D1B] text-xs sm:text-sm font-bold uppercase tracking-wider rounded-full shadow-md transition-all transform active:scale-95 cursor-pointer font-heading inline-flex items-center justify-center gap-2"
                            >
                                <svg class="w-4 h-4 text-[#5C0D1B]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <span id="discount-copy-btn-text">COPY COUPON</span>
                            </button>
                        </div>

                        <div class="text-[11px] text-white/75 pt-1 space-y-0.5">
                            <p>Use this code at checkout to get <strong>10% OFF</strong> your order.</p>
                            <p class="text-[#F6DAA8]/90 font-semibold text-[10px]">One-time use only.</p>
                        </div>
                    </div>

                    <!-- Return / Shop Action -->
                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-3">
                        <a 
                            href="{{ route('collections.show', 'all') }}" 
                            onclick="window.closeDiscountSignupModal()"
                            class="w-full sm:w-auto px-8 py-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-full shadow-md transition-all font-heading"
                        >
                            Explore Sacred Products ➔
                        </a>
                        <button 
                            type="button" 
                            onclick="window.closeDiscountSignupModal()"
                            class="text-xs text-white/60 hover:text-white underline cursor-pointer py-1"
                        >
                            Close
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

<!-- Dynamic JavaScript Flow for Modal & Pill Selections -->
<script>
    (function() {
        let currentStep = 1;
        let generatedCouponCode = '';

        // Radio Pill Click Behavior
        document.querySelectorAll('.discount-pill-opt').forEach(pill => {
            pill.addEventListener('click', function(e) {
                const group = this.closest('div');
                const radio = this.querySelector('input[type="radio"]');
                if (!radio) return;

                radio.checked = true;

                // Reset all in same group
                group.querySelectorAll('.discount-pill-opt').forEach(p => {
                    p.classList.remove('bg-[#F6DAA8]', 'text-[#5C0D1B]', 'border-[#F6DAA8]', 'font-bold');
                    p.classList.add('bg-white/5', 'text-white/90', 'border-white/30');
                    const dot = p.querySelector('.pill-dot');
                    if (dot) dot.classList.add('bg-transparent');
                    if (dot) dot.classList.remove('bg-[#5C0D1B]');
                });

                // Set active
                this.classList.remove('bg-white/5', 'text-white/90', 'border-white/30');
                this.classList.add('bg-[#F6DAA8]', 'text-[#5C0D1B]', 'border-[#F6DAA8]', 'font-bold');
                const dot = this.querySelector('.pill-dot');
                if (dot) dot.classList.remove('bg-transparent');
                if (dot) dot.classList.add('bg-[#5C0D1B]');
            });
        });

        // Open Modal
        window.openDiscountSignupModal = function() {
            const modal = document.getElementById('discount-signup-modal');
            const card = document.getElementById('discount-signup-card');
            if (!modal || !card) return;

            modal.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
            modal.classList.add('flex', 'opacity-100', 'pointer-events-auto');
            setTimeout(() => {
                card.classList.remove('scale-95');
                card.classList.add('scale-100');
            }, 10);
            document.body.style.overflow = 'hidden';
        };

        // Close Modal
        window.closeDiscountSignupModal = function() {
            const modal = document.getElementById('discount-signup-modal');
            const card = document.getElementById('discount-signup-card');
            if (!modal || !card) return;

            card.classList.remove('scale-100');
            card.classList.add('scale-95');
            modal.classList.remove('opacity-100', 'pointer-events-auto');
            modal.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 250);
        };

        // Step Navigation with Validation
        window.goToDiscountStep = function(step) {
            const step1 = document.getElementById('discount-step-1');
            const step2 = document.getElementById('discount-step-2');
            const step3 = document.getElementById('discount-step-3');
            const stepSuccess = document.getElementById('discount-step-success');
            const progressContainer = document.getElementById('discount-progress-container');
            const stepLabel = document.getElementById('discount-step-label');
            const progressBar = document.getElementById('discount-progress-bar');

            // Validate Step 1
            if (currentStep === 1 && step > 1) {
                const interest = document.querySelector('input[name="product_interest"]:checked');
                const blocker = document.querySelector('input[name="ordering_blocker"]:checked');
                const err = document.getElementById('step-1-error');

                if (!interest || !blocker) {
                    err.textContent = 'Please select an option for both questions to proceed.';
                    err.classList.remove('hidden');
                    return;
                }
                err.classList.add('hidden');
            }

            // Validate Step 2
            if (currentStep === 2 && step > 2) {
                const source = document.querySelector('input[name="discovery_source"]:checked');
                const priority = document.querySelector('input[name="product_priority"]:checked');
                const err = document.getElementById('step-2-error');

                if (!source || !priority) {
                    err.textContent = 'Please select an option for both questions to proceed.';
                    err.classList.remove('hidden');
                    return;
                }
                err.classList.add('hidden');
            }

            // Hide all steps
            step1.classList.add('hidden');
            step2.classList.add('hidden');
            step3.classList.add('hidden');
            stepSuccess.classList.add('hidden');

            currentStep = step;

            if (step === 1) {
                step1.classList.remove('hidden');
                stepLabel.textContent = 'Step 1 of 3';
                progressBar.style.width = '33.33%';
                progressContainer.classList.remove('hidden');
            } else if (step === 2) {
                step2.classList.remove('hidden');
                stepLabel.textContent = 'Step 2 of 3';
                progressBar.style.width = '66.66%';
                progressContainer.classList.remove('hidden');
            } else if (step === 3) {
                step3.classList.remove('hidden');
                stepLabel.textContent = 'Step 3 of 3';
                progressBar.style.width = '100%';
                progressContainer.classList.remove('hidden');
            } else if (step === 4) {
                stepSuccess.classList.remove('hidden');
                progressContainer.classList.add('hidden');
            }
        };

        // Submit Form via AJAX
        window.submitDiscountSignupForm = function() {
            const name = document.getElementById('discount-input-name').value.trim();
            const phone = document.getElementById('discount-input-phone').value.trim();
            const email = document.getElementById('discount-input-email').value.trim();
            const interest = document.querySelector('input[name="product_interest"]:checked')?.value;
            const blocker = document.querySelector('input[name="ordering_blocker"]:checked')?.value;
            const source = document.querySelector('input[name="discovery_source"]:checked')?.value;
            const priority = document.querySelector('input[name="product_priority"]:checked')?.value;
            const err = document.getElementById('step-3-error');
            const submitBtn = document.getElementById('discount-submit-btn');
            const spinner = document.getElementById('discount-submit-spinner');
            const submitText = document.getElementById('discount-submit-text');

            // Client-side Validation
            if (!name) {
                err.textContent = 'Please enter your full name.';
                err.classList.remove('hidden');
                return;
            }

            const phoneRegex = /^[6-9]\d{9}$/;
            if (!phone || !phoneRegex.test(phone)) {
                err.textContent = 'Please enter a valid 10-digit Indian phone number (e.g. 9876543210).';
                err.classList.remove('hidden');
                return;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email || !emailRegex.test(email)) {
                err.textContent = 'Please enter a valid email address.';
                err.classList.remove('hidden');
                return;
            }

            err.classList.add('hidden');
            submitBtn.disabled = true;
            spinner.classList.remove('hidden');
            submitText.textContent = 'Generating Coupon...';

            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            fetch("{{ route('discount-signup.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken || ''
                },
                body: JSON.stringify({
                    name: name,
                    phone: phone,
                    email: email,
                    product_interest: interest,
                    ordering_blocker: blocker,
                    discovery_source: source,
                    product_priority: priority
                })
            })
            .then(res => res.json().then(data => ({ status: res.status, body: data })))
            .then(({ status, body }) => {
                submitBtn.disabled = false;
                spinner.classList.add('hidden');
                submitText.textContent = 'Get My 10% OFF';

                if (body.success && body.coupon_code) {
                    generatedCouponCode = body.coupon_code;
                    document.getElementById('discount-generated-code-display').textContent = body.coupon_code;
                    
                    if (body.message) {
                        document.getElementById('discount-success-subtext').textContent = body.message;
                    }

                    // Save coupon in localStorage so Cart / Checkout automatically autofills or applies it
                    try {
                        localStorage.setItem('manglam_applied_coupon', body.coupon_code);
                    } catch (e) {}

                    window.goToDiscountStep(4);
                } else {
                    err.textContent = body.message || 'An error occurred. Please try again.';
                    err.classList.remove('hidden');
                }
            })
            .catch(error => {
                submitBtn.disabled = false;
                spinner.classList.add('hidden');
                submitText.textContent = 'Get My 10% OFF';
                err.textContent = 'Connection error. Please check your internet and try again.';
                err.classList.remove('hidden');
            });
        };

        // Copy Coupon to Clipboard
        window.copyDiscountCouponCode = function() {
            const code = document.getElementById('discount-generated-code-display').textContent.trim();
            const btnText = document.getElementById('discount-copy-btn-text');

            if (navigator.clipboard) {
                navigator.clipboard.writeText(code).then(() => {
                    btnText.textContent = 'COPIED! ✓';
                    setTimeout(() => {
                        btnText.textContent = 'COPY COUPON';
                    }, 2500);
                });
            } else {
                // Fallback for older browsers
                const textArea = document.createElement('textarea');
                textArea.value = code;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
                btnText.textContent = 'COPIED! ✓';
                setTimeout(() => {
                    btnText.textContent = 'COPY COUPON';
                }, 2500);
            }
        };
    })();
</script>
