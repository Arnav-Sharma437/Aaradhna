@extends('layouts.app')

@section('title', 'Buy Any 5 Trial Packs @ ₹799 — Mangalam.co™')
@section('meta_description', 'Choose any 5 sacred trial packs at just ₹799. 100% Bambooless & Charcoal Free Vedic Agarbatti.')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen pb-36 font-body">

    <!-- ========================================================================= -->
    <!-- 1. FULL-WIDTH HERO FESTIVE BANNER (No Breadcrumbs, Edge-to-Edge)           -->
    <!-- ========================================================================= -->
    <div class="w-full bg-[#FAF4EB]">
        <div class="w-full aspect-[21/9] sm:aspect-[24/8] lg:aspect-[32/9] max-h-[460px] overflow-hidden">
            <img 
                src="{{ asset('assets/images/banner-5-trial-packs.jpg') }}" 
                alt="5 Divine Essentials at just ₹799 - Mangalam" 
                class="w-full h-full object-cover object-center"
            >
        </div>

        <!-- Festive Notice Strip (Full Width) -->
        <div class="w-full py-3.5 px-4 bg-[#FFFDF9] border-y border-[#EADBCC]">
            <div class="max-w-5xl mx-auto rounded-[14px] border border-[#C27E27]/40 bg-[#FAF3EA] p-3.5 sm:p-4 flex flex-col sm:flex-row items-center justify-between gap-3 shadow-2xs">
                <div class="flex items-center space-x-3 text-center sm:text-left">
                    <div class="w-9 h-9 rounded-full bg-[#831F2E] text-white flex items-center justify-center font-bold text-base shrink-0 shadow-xs">
                        i
                    </div>
                    <div>
                        <h4 class="text-xs sm:text-sm font-black text-[#831F2E] font-heading leading-snug">
                            This is a Festive Offer – Best Price Already Applied!
                        </h4>
                        <p class="text-[11px] sm:text-xs text-gray-700 font-medium">
                            Festive items cannot be combined with any coupon codes, cart offers, or free gift eligibility.
                        </p>
                    </div>
                </div>
                <div class="shrink-0 flex items-center justify-center w-9 h-9 rounded-[8px] border border-[#C27E27]/40 bg-white/70 text-[#C27E27] font-bold text-base">
                    %
                </div>
            </div>
        </div>
    </div>

    <!-- Main Container -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] pt-8 space-y-8">

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
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-6">
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
<!-- 3. STICKY FLOATING BUNDLE BUILDER BAR (Exact Match to User Screenshot)   -->
<!-- ========================================================================= -->
<div class="fixed bottom-0 inset-x-0 z-40 bg-white/98 backdrop-blur-md border-t-2 border-[#D38928] shadow-2xl py-3.5 px-4 sm:px-8 font-body">
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
        
        <!-- Left: Status Header & 5 Slots Container -->
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 w-full sm:w-auto">
            <div class="text-center sm:text-left">
                <span id="bundle-status-msg" class="text-xs sm:text-sm font-bold text-[#1F1F1F] font-heading block">
                    Select 5 more item(s) to get the bundle at ₹799
                </span>
                <span class="text-[11px] text-gray-500 font-medium hidden sm:block">
                    Total: ₹799.00 <span class="line-through text-gray-400">₹1,375.00</span> (Save ₹576)
                </span>
            </div>

            <!-- 5 Slots Container -->
            <div class="flex items-center space-x-2" id="bundle-slots-container">
                @for($i = 0; $i < 5; $i++)
                    <div class="bundle-slot relative w-11 h-11 sm:w-12 sm:h-12 rounded-[10px] border-2 border-dashed border-gray-300 bg-[#FAF7F2] flex items-center justify-center text-gray-400 font-bold text-lg transition-all" data-slot="{{ $i }}">
                        <span class="slot-plus">+</span>
                        <div class="slot-content hidden w-full h-full relative rounded-[8px] overflow-hidden group">
                            <img src="" alt="" class="slot-img w-full h-full object-cover">
                            <button type="button" class="slot-remove-btn absolute -top-1 -right-1 w-4 h-4 rounded-full bg-[#831F2E] text-white text-[10px] font-bold flex items-center justify-center shadow-xs cursor-pointer leading-none">×</button>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Right: Add Bundle to Cart CTA Button -->
        <div class="w-full sm:w-auto shrink-0">
            <button 
                type="button" 
                id="add-bundle-to-cart-btn"
                disabled
                class="w-full sm:w-auto px-8 py-3.5 bg-gray-200 text-gray-400 text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-none"
            >
                <span id="bundle-btn-text">Add 5 More Item(s)</span>
            </button>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const MAX_ITEMS = 5;
        const BUNDLE_PRICE = 799;
        let selectedItems = [];

        const slots = document.querySelectorAll('.bundle-slot');
        const statusMsg = document.getElementById('bundle-status-msg');
        const addBundleBtn = document.getElementById('add-bundle-to-cart-btn');
        const bundleBtnText = document.getElementById('bundle-btn-text');

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

            // Update slots
            slots.forEach((slot, index) => {
                const plus = slot.querySelector('.slot-plus');
                const content = slot.querySelector('.slot-content');
                const img = slot.querySelector('.slot-img');
                const removeBtn = slot.querySelector('.slot-remove-btn');

                if (selectedItems[index]) {
                    slot.classList.remove('border-dashed', 'border-gray-300', 'bg-[#FAF7F2]');
                    slot.classList.add('border-solid', 'border-[#D38928]', 'bg-white');
                    plus.classList.add('hidden');
                    content.classList.remove('hidden');
                    img.src = selectedItems[index].image;
                    img.alt = selectedItems[index].title;

                    removeBtn.onclick = (e) => {
                        e.stopPropagation();
                        removeItem(index);
                    };
                } else {
                    slot.classList.add('border-dashed', 'border-gray-300', 'bg-[#FAF7F2]');
                    slot.classList.remove('border-solid', 'border-[#D38928]', 'bg-white');
                    plus.classList.remove('hidden');
                    content.classList.add('hidden');
                    img.src = '';
                }
            });

            // Update status text
            if (remaining > 0) {
                statusMsg.textContent = `Select ${remaining} more item(s) to get the bundle at ₹${BUNDLE_PRICE}`;
                bundleBtnText.textContent = `Add ${remaining} More Item(s)`;
                addBundleBtn.disabled = true;
                addBundleBtn.className = "w-full sm:w-auto px-8 py-3.5 bg-gray-200 text-gray-400 text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-none";
            } else {
                statusMsg.innerHTML = `🎉 <span class="text-emerald-700 font-bold">5 Sacred Trial Packs Selected! Ready at ₹${BUNDLE_PRICE}</span>`;
                bundleBtnText.textContent = `Proceed to Checkout @ ₹${BUNDLE_PRICE} ➔`;
                addBundleBtn.disabled = false;
                addBundleBtn.className = "w-full sm:w-auto px-8 py-3.5 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-lg hover:shadow-xl transition-all font-heading cursor-pointer transform hover:-translate-y-0.5 animate-pulse";
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
                image: '{{ asset("assets/images/banner-5-trial-packs.jpg") }}',
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