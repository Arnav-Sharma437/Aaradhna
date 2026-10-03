@extends('layouts.app')

@section('title', 'Buy Any 5 Trial Packs @ ₹799 — Manglam.co™')
@section('meta_description', 'Choose any 5 sacred trial packs at just ₹799. 100% Bambooless & Charcoal Free Vedic Agarbatti.')

@section('content')
<div class="bg-white min-h-screen pb-36 font-body">

    <!-- ========================================================================= -->
    <!-- 1. HERO FESTIVE BANNER (Full-Width Edge-to-Edge)                          -->
    <!-- ========================================================================= -->
    <div class="w-full">
        <picture class="block w-full">
            <source media="(max-width: 640px)" srcset="{{ asset('assets/images/trial-pack-mobile.jpg') }}">
            <img 
                src="{{ asset('assets/images/trial-pack-desktop.jpg') }}" 
                alt="5 Divine Essentials at just ₹799 - Manglam" 
                class="w-full h-auto block object-cover"
            >
        </picture>
    </div>

    <!-- Festive Notice Strip inside Container (Modern Luxury Festive Card) -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] pt-4 sm:pt-6">
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
                        Special festival discount already unlocked on this box. No extra coupons needed!
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

        <!-- Section Title -->
        <div class="text-center space-y-1">
            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#D38928] font-heading">✦ STEP 1: CREATE YOUR CUSTOM BOX ✦</span>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#121212] font-heading">
                Select Any 5 Sacred Trial Packs
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 max-w-lg mx-auto">
                Mix and match your favorite divine aromas. Click <strong>"Add to Box"</strong> to fill your bundle slots.
            </p>
        </div>

        <!-- ========================================================================= -->
        <!-- 2. PRODUCT CARDS GRID (Exact Replica of 24-Stick Pack Grid)               -->
        <!-- ========================================================================= -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-[10px]">
            @foreach($products as $prod)
                <div class="bundle-item-card bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] hover:border-[#D38928] p-3 sm:p-4 flex flex-col justify-between shadow-xs hover:shadow-xl transition-all duration-300 group" data-id="{{ $prod['id'] }}" data-title="{{ $prod['title'] }}" data-price="{{ $prod['price'] }}" data-image="{{ asset($prod['image']) }}">
                    
                    <!-- Top Image & Pack Badge -->
                    <div class="relative aspect-square rounded-[14px] bg-[#FAF7F2] overflow-hidden mb-3">
                        <img src="{{ asset($prod['image']) }}" alt="{{ $prod['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-2 right-2 text-right pointer-events-none select-none leading-none bg-white/95 px-2 py-1 rounded-[6px] border border-[#EADBCC] shadow-2xs">
                            <span class="text-[8px] uppercase font-semibold text-gray-500 block">pack of</span>
                            <span class="text-xs font-black font-heading text-[#831F2E] block">24</span>
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
<!-- 3. STICKY FLOATING BUNDLE BUILDER BAR (Exact Match to Image 2 Reference)  -->
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
                Select 5 more item(s) to get the bundle at ₹799
            </span>
        </div>

        <!-- Bottom Row: Slots on Left | Subtotal & CTA Button on Right -->
        <div class="w-full flex items-center justify-between gap-3 sm:gap-6">
            <!-- Left: 5 Slots -->
            <div class="flex items-center space-x-2.5 sm:space-x-3.5" id="bundle-slots-container">
                @for($i = 0; $i < 5; $i++)
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
                    <span id="bundle-btn-text">Add 5 More Item(s)</span>
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
        const MAX_ITEMS = 5;
        const BUNDLE_PRICE = 799;
        const SINGLE_PRICE = 229;
        const SINGLE_MRP = 275;
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

            // Progress bar
            progressFill.style.width = ((count / MAX_ITEMS) * 100) + '%';

            // Update slots
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

            // Calculate Subtotal & Savings
            if (count === 0) {
                saveBadge.textContent = 'Save: ₹0';
                totalPriceEl.textContent = '₹0';
                mrpPriceEl.textContent = '₹0';
            } else if (count < MAX_ITEMS) {
                const currentPrice = count * SINGLE_PRICE;
                const currentMrp = count * SINGLE_MRP;
                const savings = currentMrp - currentPrice;
                saveBadge.textContent = `Save: ₹${savings}`;
                totalPriceEl.textContent = `₹${currentPrice}`;
                mrpPriceEl.textContent = `₹${currentMrp}`;
            } else {
                // Complete 5-pack bundle
                const fullMrp = 1375;
                const savings = fullMrp - BUNDLE_PRICE;
                saveBadge.textContent = `Save: ₹${savings}`;
                totalPriceEl.textContent = `₹${BUNDLE_PRICE}`;
                mrpPriceEl.textContent = `₹${fullMrp}`;
            }

            // Update status text & button
            if (remaining > 0) {
                hasCelebrated = false;
                statusMsg.textContent = `Select ${remaining} more item(s) to get the bundle at ₹${BUNDLE_PRICE}`;
                bundleBtnText.textContent = `Add ${remaining} More Item(s)`;
                addBundleBtn.disabled = true;
                addBundleBtn.className = "px-5 sm:px-8 py-2.5 sm:py-3 bg-[#FAF5EE] border border-[#EADBCC] text-[#8C6239] text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-2xs whitespace-nowrap";
            } else {
                statusMsg.innerHTML = `🎉 <span class="text-emerald-700 font-black">5 Sacred Trial Packs Selected! Ready at ₹${BUNDLE_PRICE}</span>`;
                bundleBtnText.textContent = `Proceed to Checkout @ ₹${BUNDLE_PRICE} ➔`;
                addBundleBtn.disabled = false;
                addBundleBtn.className = "px-5 sm:px-8 py-2.5 sm:py-3 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-lg hover:shadow-xl transition-all font-heading cursor-pointer transform hover:-translate-y-0.5 animate-pulse whitespace-nowrap";

                if (!hasCelebrated) {
                    hasCelebrated = true;
                    triggerCelebration();
                }
            }

            updateCardButtonStates();
        };

        const addItem = (item) => {
            if (selectedItems.length >= MAX_ITEMS) {
                alert('You have already added 5 trial packs! Click "Proceed to Checkout" or remove a pack to change.');
                return;
            }
            selectedItems.push(item);
            updateUI();
        };

        const removeItem = (index) => {
            selectedItems.splice(index, 1);
            updateUI();
        };

        // Attach click handlers to product card buttons
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

        // Add Entire Bundle to Cart & Direct Checkout Redirect
        addBundleBtn.addEventListener('click', () => {
            if (selectedItems.length !== MAX_ITEMS) return;

            const bundleTitles = selectedItems.map(i => i.title).join(', ');
            const bundleItem = {
                id: 'bundle-5-trial-packs-' + Date.now(),
                title: `5 Divine Essentials Bundle (Custom Box)`,
                slug: 'super-save-offers',
                price: BUNDLE_PRICE,
                image: '{{ asset("assets/images/trial-pack-desktop.jpg") }}',
                quantity: 1,
                packInfo: `5 Trial Packs @ ₹799 (${bundleTitles})`,
                subtitle: `Included: ${bundleTitles}`
            };

            if (window.CartStore) {
                window.CartStore.addItem(bundleItem);
            }

            // Direct checkout navigation with exact ₹799 calculation
            window.location.href = "{{ route('cart.index') }}";
        });
    });
</script>
@endpush