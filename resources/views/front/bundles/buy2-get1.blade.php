@extends('layouts.app')

@section('title', 'Buy 2, Get 1 FREE + Chandan Trial Pack FREE @ ₹999 — Mangalam.co™')
@section('meta_description', 'Create your own festive bundle! Buy 2 Refill Packs & Get 1 FREE plus a Chandan Trial Pack FREE at just ₹999.')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-6 sm:py-10 pb-36 font-body">
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-8 lg:px-[40px] space-y-8">
        
        <!-- Breadcrumb Navigation -->
        <nav class="flex items-center text-xs text-gray-500 space-x-2 font-medium" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#D38928] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#D38928] font-bold">Super Save Offers</span>
            <span>/</span>
            <span class="text-[#121212] font-bold">Buy 2 get 1 free</span>
        </nav>

        <!-- ========================================================================= -->
        <!-- 1. HERO FESTIVE BANNER (Exact Match to User Screenshot)                   -->
        <!-- ========================================================================= -->
        <div class="bg-white rounded-[24px] border border-[#EADBCC] shadow-xs overflow-hidden">
            <div class="relative w-full aspect-[16/9] sm:aspect-[21/9] lg:aspect-[24/9] bg-[#FAF4EB]">
                <img 
                    src="{{ asset('assets/images/banner-buy2-get1-free.jpg') }}" 
                    alt="Buy 2 Get 1 FREE + Chandan Pack FREE - Mangalam" 
                    class="w-full h-full object-cover object-center"
                >
            </div>
        </div>

        <!-- Step Indicator (Step 1 / Step 2) matching screenshot -->
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
                <div class="bundle-item-card bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] hover:border-[#D38928] p-3 sm:p-4 flex flex-col justify-between shadow-xs hover:shadow-xl transition-all duration-300 group" data-id="{{ $prod['id'] }}" data-title="{{ $prod['title'] }}" data-price="{{ $prod['price'] }}" data-image="{{ asset($prod['image']) }}">
                    
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

                            <!-- Add to Box Button -->
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
<!-- 3. STICKY FLOATING BUNDLE BUILDER BAR (Free Gift + 3 Slots)               -->
<!-- ========================================================================= -->
<div class="fixed bottom-0 inset-x-0 z-40 bg-white/98 backdrop-blur-md border-t-2 border-[#D38928] shadow-2xl py-3.5 px-4 sm:px-8 font-body">
    <div class="max-w-5xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
        
        <!-- Left: Status Header & 4 Slots (1 Locked Gift + 3 Selectable Slots) -->
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 w-full sm:w-auto">
            <div class="text-center sm:text-left">
                <span id="bundle-status-msg" class="text-xs sm:text-sm font-bold text-[#1F1F1F] font-heading block">
                    Select 3 more item(s) to complete bundle at ₹999
                </span>
                <span class="text-[11px] text-gray-500 font-medium hidden sm:block">
                    Bundle Price: ₹999.00 <span class="line-through text-gray-400">₹1,467.00</span> (Buy 2 Get 1 Free + Gift)
                </span>
            </div>

            <!-- Slots Container: 1 Free Gift + 3 Selectable Slots -->
            <div class="flex items-center space-x-2">
                <!-- Locked Free Gift Slot -->
                <div class="relative w-11 h-11 sm:w-12 sm:h-12 rounded-[10px] border-2 border-emerald-500 bg-emerald-50 flex items-center justify-center overflow-hidden shadow-xs" title="Free Chandan Trial Pack">
                    <img src="{{ asset('assets/images/mangalam-agarbatti-box.jpg') }}" alt="Free Gift" class="w-full h-full object-cover">
                    <span class="absolute bottom-0 inset-x-0 bg-emerald-700 text-white text-[7px] font-black uppercase text-center py-0.5">FREE</span>
                </div>

                <span class="text-gray-400 font-bold text-sm">+</span>

                <!-- 3 Selectable Slots -->
                <div class="flex items-center space-x-2" id="bundle-slots-container">
                    @for($i = 0; $i < 3; $i++)
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
        </div>

        <!-- Right: Add Bundle to Cart CTA Button -->
        <div class="w-full sm:w-auto shrink-0">
            <button 
                type="button" 
                id="add-bundle-to-cart-btn"
                disabled
                class="w-full sm:w-auto px-8 py-3.5 bg-gray-200 text-gray-400 text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-none"
            >
                <span id="bundle-btn-text">Add 3 More Item(s)</span>
            </button>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const MAX_ITEMS = 3;
        const BUNDLE_PRICE = 999;
        let selectedItems = [];

        const slots = document.querySelectorAll('.bundle-slot');
        const statusMsg = document.getElementById('bundle-status-msg');
        const addBundleBtn = document.getElementById('add-bundle-to-cart-btn');
        const bundleBtnText = document.getElementById('bundle-btn-text');

        const updateUI = () => {
            const count = selectedItems.length;
            const remaining = MAX_ITEMS - count;

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

            if (remaining > 0) {
                statusMsg.textContent = `Select ${remaining} more item(s) to complete bundle at ₹${BUNDLE_PRICE}`;
                bundleBtnText.textContent = `Add ${remaining} More Item(s)`;
                addBundleBtn.disabled = true;
                addBundleBtn.className = "w-full sm:w-auto px-8 py-3.5 bg-gray-200 text-gray-400 text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] transition-all font-heading cursor-not-allowed shadow-none";
            } else {
                statusMsg.innerHTML = `🎉 <span class="text-emerald-700">Buy 2 Get 1 FREE Bundle Complete (+ Free Gift)!</span>`;
                bundleBtnText.textContent = `Add Bundle to Cart @ ₹${BUNDLE_PRICE}`;
                addBundleBtn.disabled = false;
                addBundleBtn.className = "w-full sm:w-auto px-8 py-3.5 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs sm:text-sm font-bold uppercase tracking-wider rounded-[10px] shadow-lg hover:shadow-xl transition-all font-heading cursor-pointer transform hover:-translate-y-0.5 animate-pulse";
            }
        };

        const addItem = (item) => {
            if (selectedItems.length >= MAX_ITEMS) {
                alert('You have already selected 3 packs! Remove an item to change selection.');
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
                const origText = btn.innerHTML;
                btn.innerHTML = '<span>Added ✓</span>';
                btn.classList.add('bg-emerald-700');
                setTimeout(() => {
                    btn.innerHTML = origText;
                    btn.classList.remove('bg-emerald-700');
                }, 1000);
            });
        });

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
                subtitle: `Included: ${bundleTitles} + Free Gift`
            };

            if (window.CartStore) {
                window.CartStore.addItem(bundleItem);
            }

            const cartTrigger = document.getElementById('cart-drawer-trigger');
            if (cartTrigger) {
                cartTrigger.click();
            } else {
                window.location.href = "{{ route('cart.index') }}";
            }
        });
    });
</script>
@endpush