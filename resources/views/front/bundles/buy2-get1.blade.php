@extends('layouts.app')

@section('title', 'Buy 2, Get 1 FREE + Chandan Trial Pack FREE @ ₹999 — Manglam.co™')
@section('meta_description', 'Create your own festive bundle! Buy 2 Refill Packs & Get 1 FREE plus a Chandan Trial Pack FREE at just ₹999.')

@section('content')
<div class="bg-white min-h-screen pb-36 font-body">

    <!-- ========================================================================= -->
    <!-- 1. HERO FESTIVE BANNER & NOTICE STRIP (Inside 1440px Container)           -->
    <!-- ========================================================================= -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] pt-4 sm:pt-6 space-y-4">
        
        <!-- Festive Banner with Rounded Corners matching Home Standard -->
        <div class="w-full rounded-[16px] sm:rounded-[20px] overflow-hidden shadow-xs border border-[#EADBCC]">
            <img 
                src="{{ asset('assets/images/banner-buy2-get1-free.jpg') }}" 
                alt="Buy 2 Get 1 FREE + Chandan Pack FREE - Manglam" 
                class="w-full h-auto block object-contain"
            >
        </div>

        <!-- Festive Notice Strip inside Container (Modern Luxury Festive Card) -->
        <div class="rounded-2xl border border-[#D38928]/35 bg-gradient-to-r from-[#FFF9F2] via-[#FAF3EA] to-[#FFF9F2] p-3.5 sm:p-4 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3.5">
            <div class="flex items-center space-x-3.5 text-center sm:text-left">
                <div class="w-10 h-10 rounded-xl bg-[#831F2E] text-white flex items-center justify-center font-black text-base shrink-0 shadow-xs">
                    ✦
                </div>
                <div>
                    <div class="flex items-center justify-center sm:justify-start space-x-2">
                        <h4 class="text-xs sm:text-sm font-black text-[#831F2E] font-heading uppercase tracking-wide">
                            Festive Exclusive Bundle Offer
                        </h4>
                        <span class="px-2 py-0.5 bg-[#831F2E]/10 text-[#831F2E] text-[10px] font-bold rounded-full border border-[#831F2E]/20">Auto-Applied</span>
                    </div>
                    <p class="text-[11px] sm:text-xs text-gray-700 font-medium pt-0.5">
                        Special festival discount already unlocked on this box. Buy 2 Get 1 FREE + Chandan Trial Pack FREE!
                    </p>
                </div>
            </div>
            <div class="shrink-0 flex items-center space-x-1.5 px-3.5 py-1.5 rounded-xl bg-white/90 border border-[#D38928]/30 text-[#831F2E] font-bold text-xs shadow-2xs">
                <span>🏷️ Special Savings Active</span>
            </div>
        </div>

    </div>

    <!-- Main Container -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] pt-6 sm:pt-8 space-y-8">

        <!-- Step Indicator (Step 1 / Step 2) -->
        <div class="max-w-md mx-auto text-center space-y-2">
            <div class="flex items-center justify-center space-x-6 text-xs font-bold font-heading text-gray-400">
                <span class="text-[#D38928]">Step 1: Choose 3 Packs</span>
                <span>•</span>
                <span>Step 2: Free Gift Auto-Applied</span>
            </div>
            <div class="w-full h-1 bg-[#EADBCC] rounded-full overflow-hidden">
                <div class="w-1/2 h-full bg-[#D38928]"></div>
            </div>
            <h2 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading pt-2">
                Select Any 3 Refill Cylinders (100 Sticks Each)
            </h2>
            <p class="text-xs sm:text-sm text-gray-600">
                Buy 2 at ₹999, Get the 3rd Pack <strong>100% FREE</strong> + Chandan Trial Pack <strong>FREE</strong>.
            </p>
        </div>

        <!-- ========================================================================= -->
        <!-- 2. PRODUCT CARDS GRID (Exact Replica of 100-Stick Cylinder Grid)          -->
        <!-- ========================================================================= -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-6">
            @foreach($products as $prod)
                <div class="bundle-item-card bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] hover:border-[#D38928] p-3 sm:p-4 flex flex-col justify-between shadow-xs hover:shadow-xl transition-all duration-300 group" data-id="{{ $prod['id'] }}" data-title="{{ $prod['title'] }}" data-price="{{ $prod['price'] }}" data-mrp="{{ $prod['mrp'] }}" data-image="{{ asset($prod['image']) }}">
                    
                    <!-- Top Image & Pack Badge -->
                    <div class="relative aspect-square rounded-[14px] bg-[#FAF7F2] overflow-hidden mb-3">
                        <img src="{{ asset($prod['image']) }}" alt="{{ $prod['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-2 right-2 text-right pointer-events-none select-none leading-none bg-white/95 px-2 py-1 rounded-[6px] border border-[#EADBCC] shadow-2xs">
                            <span class="text-[8px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xs font-black font-heading text-[#831F2E] block">100</span>
                            <span class="text-[8px] uppercase font-semibold text-gray-500 block">sticks</span>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="space-y-1.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xs sm:text-sm font-bold font-serif text-[#1F1F1F] group-hover:text-[#D38928] transition-colors line-clamp-1">
                                {{ $prod['title'] }}
                            </h3>
                            <div class="flex items-center space-x-1 text-[11px] text-[#D38928]">
                                <span class="font-bold">★ {{ $prod['rating'] }}</span>
                                <span class="text-gray-400 font-normal">({{ $prod['reviews'] }} reviews)</span>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-baseline space-x-2 pt-1 pb-2.5">
                                <span class="text-xs sm:text-sm font-black font-heading text-[#C87A1E]">₹{{ $prod['price'] }}</span>
                                <span class="text-[11px] text-gray-400 line-through">₹{{ $prod['mrp'] }}</span>
                            </div>

                            <!-- Add to Box Button (Persistent Green on Selection) -->
                            <button 
                                type="button" 
                                class="add-to-box-btn w-full py-2 sm:py-2.5 px-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer flex items-center justify-center space-x-1"
                            >
                                <span class="btn-text">Add to Box</span>
                            </button>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>

<!-- ========================================================================= -->
<!-- 3. STICKY FLOATING BUNDLE BUILDER BAR (Exact Match to Reference)          -->
<!-- ========================================================================= -->
<div class="fixed bottom-0 inset-x-0 z-40 bg-white shadow-[0_-12px_40px_rgba(0,0,0,0.16)] border-t border-[#EADBCC] font-body">
    <!-- Top Progress Bar -->
    <div class="w-full bg-gray-200 h-1.5 overflow-hidden">
        <div id="bundle-progress-fill" class="h-full bg-[#D38928] transition-all duration-300" style="width: 0%;"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-8 py-3.5 flex flex-col items-center">
        <!-- Top Status Message -->
        <div class="text-center pb-2.5">
            <span id="bundle-status-msg" class="text-xs sm:text-sm font-black text-[#121212] font-heading">
                Select 3 more item(s) to get the bundle at ₹999
            </span>
        </div>

        <!-- Bottom Row: Slots on Left | Subtotal & CTA Button on Right -->
        <div class="w-full flex items-center justify-between gap-3 sm:gap-6">
            <!-- Left: 1 Free Gift Slot + 3 Selectable Slots -->
            <div class="flex items-center space-x-2 sm:space-x-3">
                <!-- Locked Free Gift Slot -->
                <div class="relative w-12 h-12 sm:w-14 sm:h-14 rounded-[12px] border-2 border-emerald-600 bg-emerald-50 flex items-center justify-center overflow-hidden shadow-2xs ring-2 ring-emerald-400/30 shrink-0" title="Free Chandan Trial Pack">
                    <img src="{{ asset('assets/images/mangalam-agarbatti-box.jpg') }}" alt="Free Gift" class="w-full h-full object-cover">
                    <span class="absolute bottom-0 inset-x-0 bg-emerald-700 text-white text-[7px] sm:text-[7.5px] font-black uppercase text-center py-0.5 tracking-wider leading-none">FREE GIFT</span>
                </div>

                <span class="text-[#D38928] font-black text-base sm:text-lg select-none">+</span>

                <!-- 3 Selectable Slots -->
                <div class="flex items-center space-x-2 sm:space-x-3" id="bundle-slots-container">
                    @for($i = 0; $i < 3; $i++)
                        <div class="bundle-slot relative w-12 h-12 sm:w-14 sm:h-14 rounded-[12px] border-2 border-gray-300 bg-white flex items-center justify-center text-gray-400 font-bold text-xl transition-all shadow-2xs" data-slot="{{ $i }}">
                            <span class="slot-plus text-gray-400 font-bold text-xl select-none">+</span>
                            <div class="slot-content hidden w-full h-full relative rounded-[10px] overflow-visible group">
                                <img src="" alt="" class="slot-img w-full h-full object-cover rounded-[10px]">
                                <!-- Bigger Minus Badge in Top Right Corner -->
                                <button type="button" class="slot-remove-btn absolute -top-1.5 -right-1.5 w-5 h-5 rounded-md bg-black text-white text-xs font-black flex items-center justify-center shadow-md cursor-pointer hover:bg-[#831F2E] transition-colors leading-none select-none z-10" title="Remove pack">−</button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Right: Subtotal with Red Save Badge & CTA Button -->
            <div class="flex items-center space-x-3 sm:space-x-6 shrink-0">
                <div class="text-right">
                    <div class="flex items-center justify-end space-x-1.5">
                        <span class="text-xs sm:text-sm font-bold text-[#121212] font-heading">Subtotal</span>
                        <span id="bundle-save-badge" class="px-2 py-0.5 bg-[#D31F2E] text-white text-[10px] sm:text-[11px] font-black rounded-[4px] uppercase tracking-wide">
                            Save: ₹0
                        </span>
                    </div>
                    <div class="flex items-baseline justify-end space-x-1.5 pt-0.5">
                        <span id="bundle-total-price" class="text-sm sm:text-base font-black font-heading text-[#121212]">₹0</span>
                        <span id="bundle-mrp-price" class="text-xs text-gray-400 line-through">₹0</span>
                    </div>
                </div>

                <!-- CTA Button -->
                <button 
                    type="button" 
                    id="add-bundle-to-cart-btn"
                    disabled
                    class="px-5 sm:px-8 py-2.5 sm:py-3 bg-[#FAF5EE] border border-[#EADBCC] text-[#8C6239] text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-2xs whitespace-nowrap"
                >
                    <span id="bundle-btn-text">Add 3 More Item(s)</span>
                </button>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const MAX_ITEMS = 3;
        const BUNDLE_PRICE = 999;
        const SINGLE_PRICE = 499;
        const SINGLE_MRP = 489; // MRP of cylinder pack
        const FREE_GIFT_MRP = 229;
        let selectedItems = [];
        let hasCelebrated = false;

        const slots = document.querySelectorAll('.bundle-slot');
        const statusMsg = document.getElementById('bundle-status-msg');
        const progressFill = document.getElementById('bundle-progress-fill');
        const addBundleBtn = document.getElementById('add-bundle-to-cart-btn');
        const bundleBtnText = document.getElementById('bundle-btn-text');
        const saveBadge = document.getElementById('bundle-save-badge');
        const totalPriceEl = document.getElementById('bundle-total-price');
        const mrpPriceEl = document.getElementById('bundle-mrp-price');

        // Confetti Celebration Trigger
        const triggerCelebration = () => {
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 120,
                    spread: 80,
                    origin: { y: 0.8 },
                    colors: ['#D38928', '#831F2E', '#F6DAA8', '#10B981', '#E63946', '#FFD700']
                });
                setTimeout(() => {
                    confetti({
                        particleCount: 70,
                        angle: 60,
                        spread: 60,
                        origin: { x: 0.1, y: 0.8 },
                        colors: ['#D38928', '#831F2E', '#F6DAA8', '#FFD700']
                    });
                    confetti({
                        particleCount: 70,
                        angle: 120,
                        spread: 60,
                        origin: { x: 0.9, y: 0.8 },
                        colors: ['#D38928', '#831F2E', '#F6DAA8', '#FFD700']
                    });
                }, 200);
            }
        };

        // Update card button states so green persists
        const updateCardButtonStates = () => {
            const countsById = {};
            selectedItems.forEach(item => {
                countsById[item.id] = (countsById[item.id] || 0) + 1;
            });

            document.querySelectorAll('.bundle-item-card').forEach(card => {
                const id = card.dataset.id;
                const btn = card.querySelector('.add-to-box-btn');
                const btnText = btn.querySelector('.btn-text');
                const count = countsById[id] || 0;

                if (count > 0) {
                    btn.className = "add-to-box-btn w-full py-2 sm:py-2.5 px-3 bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-bold uppercase tracking-wider rounded-[8px] shadow-xs font-heading cursor-pointer flex items-center justify-center space-x-1";
                    btnText.textContent = `✓ In Box (${count})`;
                } else {
                    btn.className = "add-to-box-btn w-full py-2 sm:py-2.5 px-3 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer flex items-center justify-center space-x-1";
                    btnText.textContent = "Add to Box";
                }
            });
        };

        const updateUI = () => {
            const count = selectedItems.length;
            const remaining = MAX_ITEMS - count;

            // Update Progress Bar
            const progressPercent = (count / MAX_ITEMS) * 100;
            if (progressFill) {
                progressFill.style.width = `${progressPercent}%`;
            }

            // Update Slots
            slots.forEach((slot, index) => {
                const plus = slot.querySelector('.slot-plus');
                const content = slot.querySelector('.slot-content');
                const img = slot.querySelector('.slot-img');
                const removeBtn = slot.querySelector('.slot-remove-btn');

                if (selectedItems[index]) {
                    slot.classList.remove('border-gray-300', 'bg-white');
                    slot.classList.add('border-[#D38928]', 'bg-white', 'shadow-xs');
                    plus.classList.add('hidden');
                    content.classList.remove('hidden');
                    img.src = selectedItems[index].image;
                    img.alt = selectedItems[index].title;

                    removeBtn.onclick = (e) => {
                        e.stopPropagation();
                        removeItem(index);
                    };
                } else {
                    slot.classList.add('border-gray-300', 'bg-white');
                    slot.classList.remove('border-[#D38928]', 'shadow-xs');
                    plus.classList.remove('hidden');
                    content.classList.add('hidden');
                    img.src = '';
                }
            });

            // Calculate Subtotal and Savings
            let currentPrice = 0;
            let currentMrp = 0;
            let currentSavings = 0;

            if (count === 0) {
                currentPrice = 0;
                currentMrp = 0;
                currentSavings = 0;
            } else if (count === MAX_ITEMS) {
                currentPrice = BUNDLE_PRICE;
                currentMrp = (MAX_ITEMS * SINGLE_PRICE) + FREE_GIFT_MRP;
                currentSavings = currentMrp - currentPrice;
            } else {
                currentPrice = count * SINGLE_PRICE;
                currentMrp = (count * SINGLE_PRICE) + FREE_GIFT_MRP;
                currentSavings = FREE_GIFT_MRP;
            }

            if (totalPriceEl) totalPriceEl.textContent = `₹${currentPrice.toLocaleString('en-IN')}`;
            if (mrpPriceEl) mrpPriceEl.textContent = currentMrp > 0 ? `₹${currentMrp.toLocaleString('en-IN')}` : '₹0';
            if (saveBadge) saveBadge.textContent = `Save: ₹${currentSavings.toLocaleString('en-IN')}`;

            if (remaining > 0) {
                hasCelebrated = false;
                statusMsg.textContent = `Select ${remaining} more item(s) to get the bundle at ₹${BUNDLE_PRICE}`;
                bundleBtnText.textContent = `Add ${remaining} More Item(s)`;
                addBundleBtn.disabled = true;
                addBundleBtn.className = "px-5 sm:px-8 py-2.5 sm:py-3 bg-[#FAF5EE] border border-[#EADBCC] text-[#8C6239] text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-2xs whitespace-nowrap";
            } else {
                statusMsg.innerHTML = `🎉 <span class="text-emerald-700 font-bold">Buy 2 Get 1 FREE Bundle Complete (+ Free Gift)!</span>`;
                bundleBtnText.textContent = `Proceed to Checkout @ ₹${BUNDLE_PRICE} ➔`;
                addBundleBtn.disabled = false;
                addBundleBtn.className = "px-5 sm:px-8 py-2.5 sm:py-3 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-lg hover:shadow-xl transition-all font-heading cursor-pointer transform hover:-translate-y-0.5 whitespace-nowrap";

                // Trigger celebration burst once on completion
                if (!hasCelebrated) {
                    hasCelebrated = true;
                    triggerCelebration();
                }
            }

            updateCardButtonStates();
        };

        const addItem = (item) => {
            if (selectedItems.length >= MAX_ITEMS) {
                alert('You have already selected 3 packs! Click "Proceed to Checkout" or remove a pack to change.');
                return;
            }
            selectedItems.push(item);
            updateUI();
        };

        const removeItem = (index) => {
            selectedItems.splice(index, 1);
            updateUI();
        };

        document.querySelectorAll('.bundle-item-card').forEach(card => {
            const btn = card.querySelector('.add-to-box-btn');
            const item = {
                id: card.dataset.id,
                title: card.dataset.title,
                price: parseFloat(card.dataset.price),
                image: card.dataset.image
            };

            btn.addEventListener('click', () => {
                addItem(item);
            });
        });

        // Add Bundle to Cart & Direct Checkout Redirect
        addBundleBtn.addEventListener('click', () => {
            if (selectedItems.length !== MAX_ITEMS) return;

            const bundleTitles = selectedItems.map(i => i.title).join(', ');
            const bundleItem = {
                id: 'bundle-buy2-get1-' + Date.now(),
                title: `Buy 2 Get 1 FREE Festive Bundle (+ Free Chandan Pack)`,
                slug: 'super-save-offers',
                price: BUNDLE_PRICE,
                image: '{{ asset("assets/images/banner-buy2-get1-free.jpg") }}',
                quantity: 1,
                packInfo: `Buy 2 Get 1 FREE (${bundleTitles}) + Free Gift`,
                subtitle: `Included: ${bundleTitles} + Free Gift`
            };

            if (window.CartStore) {
                window.CartStore.addItem(bundleItem);
            }

            // Direct checkout navigation with exact ₹999 calculation
            window.location.href = "{{ route('cart.index') }}";
        });

        // Initial run
        updateUI();
    });
</script>
@endpush