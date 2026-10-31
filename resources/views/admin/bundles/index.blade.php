@extends('layouts.admin')

@section('title', 'Festive Bundle Offers Management')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 font-body">

    <!-- Header & Info -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Festive Bundle Offers
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Choose which products should be visible in <strong>Buy Any 5 Trial Packs @ ₹799</strong> and <strong>Buy 2 Get 1 FREE</strong> storefront offers.
            </p>
        </div>

        <div class="flex items-center space-x-2">
            <a 
                href="{{ route('bundles.trial-packs') }}" 
                target="_blank"
                class="px-3 py-1.5 bg-white border border-[#D2D5D8] hover:border-[#D38928] text-xs font-bold text-gray-700 hover:text-[#D38928] rounded-[8px] transition-colors inline-flex items-center space-x-1.5"
            >
                <span>Preview Buy 5 Box ↗</span>
            </a>
            <a 
                href="{{ route('bundles.buy2get1') }}" 
                target="_blank"
                class="px-3 py-1.5 bg-white border border-[#D2D5D8] hover:border-[#D38928] text-xs font-bold text-gray-700 hover:text-[#D38928] rounded-[8px] transition-colors inline-flex items-center space-x-1.5"
            >
                <span>Preview Buy 2 Get 1 ↗</span>
            </a>
        </div>
    </div>

    <!-- Main Form -->
    <form method="POST" action="{{ route('admin.bundles.update') }}" class="space-y-6">
        @csrf

        <!-- Quick Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <!-- Trial 5 Card Summary -->
            <div class="bg-gradient-to-br from-[#FFF9F2] to-white rounded-[14px] border border-[#EADBCC] p-4 flex items-center justify-between">
                <div>
                    <span class="text-xs font-black uppercase tracking-wider text-[#A86911] font-heading block">Offer 1</span>
                    <h3 class="text-base font-bold text-[#1F1F1F]">Buy Any 5 Trial Packs @ ₹799</h3>
                    <p class="text-[11px] text-gray-500 mt-0.5">Custom box builder for 5 trial packs</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 rounded-full bg-[#D38928]/15 text-[#965A15] text-xs font-bold" id="trial-count-badge">
                        {{ count($trialProductIds) }} Products Selected
                    </span>
                </div>
            </div>

            <!-- Buy 2 Get 1 Summary -->
            <div class="bg-gradient-to-br from-[#FFF9F2] to-white rounded-[14px] border border-[#EADBCC] p-4 flex items-center justify-between">
                <div>
                    <span class="text-xs font-black uppercase tracking-wider text-[#831F2E] font-heading block">Offer 2</span>
                    <h3 class="text-base font-bold text-[#1F1F1F]">Buy 2 Get 1 FREE Offer</h3>
                    <p class="text-[11px] text-gray-500 mt-0.5">Refill cylinders / 100 sticks combo</p>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 rounded-full bg-[#831F2E]/10 text-[#831F2E] text-xs font-bold" id="b2g1-count-badge">
                        {{ count($buy2get1ProductIds) }} Products Selected
                    </span>
                </div>
            </div>

        </div>

        <!-- Products Table -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
            
            <div class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD] flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <span class="text-xs font-bold uppercase tracking-wider text-gray-600 font-heading">
                    Active Products Catalog ({{ $products->count() }})
                </span>

                <div class="flex items-center space-x-3 text-xs">
                    <button type="button" onclick="toggleAll('trial', true)" class="text-[#D38928] hover:underline font-semibold cursor-pointer">
                        Select All for Buy 5
                    </button>
                    <span class="text-gray-300">|</span>
                    <button type="button" onclick="toggleAll('buy2get1', true)" class="text-[#831F2E] hover:underline font-semibold cursor-pointer">
                        Select All for Buy 2 Get 1
                    </button>
                    <span class="text-gray-300">|</span>
                    <button type="button" onclick="toggleAll('both', false)" class="text-gray-500 hover:underline cursor-pointer">
                        Clear All
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#E1E3E5] bg-[#F7F8F9] text-[11px] font-bold text-gray-500 uppercase tracking-wider font-heading">
                            <th class="py-3 px-4">Product</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Price</th>
                            <th class="py-3 px-4 text-center bg-[#FFFBF5]">
                                🎁 Show in Buy 5 @ ₹799
                            </th>
                            <th class="py-3 px-4 text-center bg-[#FFF8F8]">
                                ✨ Show in Buy 2 Get 1 FREE
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E1E3E5] text-xs font-medium">
                        @forelse($products as $prod)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <!-- Product Info -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-[8px] bg-gray-100 overflow-hidden shrink-0 border border-gray-200">
                                            <img 
                                                src="{{ $prod->primary_image_url }}" 
                                                alt="{{ $prod->title }}" 
                                                class="w-full h-full object-cover"
                                                onerror="this.onerror=null; this.src='{{ asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png') }}';"
                                            >
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.products.edit', $prod->id) }}" class="font-bold text-gray-900 hover:text-[#D38928] transition-colors block">
                                                {{ $prod->title }}
                                            </a>
                                            <span class="text-[11px] text-gray-400 font-mono">{{ $prod->sku }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- Category -->
                                <td class="py-3 px-4 text-gray-600">
                                    {{ $prod->category ? $prod->category->name : 'Uncategorized' }}
                                </td>

                                <!-- Price -->
                                <td class="py-3 px-4">
                                    <span class="font-bold text-gray-900">₹{{ number_format($prod->active_price, 0) }}</span>
                                    @if($prod->base_price > $prod->active_price)
                                        <span class="text-[10px] text-gray-400 line-through ml-1">₹{{ number_format($prod->base_price, 0) }}</span>
                                    @endif
                                </td>

                                <!-- Checkbox 1: Buy 5 @ 799 -->
                                <td class="py-3 px-4 text-center bg-[#FFFBF5]/60">
                                    <label class="inline-flex items-center justify-center cursor-pointer p-1">
                                        <input 
                                            type="checkbox" 
                                            name="trial_products[]" 
                                            value="{{ $prod->id }}"
                                            class="trial-checkbox w-4 h-4 text-[#D38928] rounded border-gray-300 focus:ring-[#D38928] cursor-pointer"
                                            {{ in_array($prod->id, $trialProductIds) ? 'checked' : '' }}
                                            onchange="updateCounts()"
                                        >
                                    </label>
                                </td>

                                <!-- Checkbox 2: Buy 2 Get 1 FREE -->
                                <td class="py-3 px-4 text-center bg-[#FFF8F8]/60">
                                    <label class="inline-flex items-center justify-center cursor-pointer p-1">
                                        <input 
                                            type="checkbox" 
                                            name="buy2get1_products[]" 
                                            value="{{ $prod->id }}"
                                            class="buy2get1-checkbox w-4 h-4 text-[#831F2E] rounded border-gray-300 focus:ring-[#831F2E] cursor-pointer"
                                            {{ in_array($prod->id, $buy2get1ProductIds) ? 'checked' : '' }}
                                            onchange="updateCounts()"
                                        >
                                    </label>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-gray-400">
                                    No active products found in catalog.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Sticky Save Footer Bar -->
            <div class="p-4 bg-[#FAF7F2] border-t border-[#E1E3E5] flex items-center justify-between">
                <span class="text-xs text-gray-500 font-medium">
                    Changes take effect immediately on storefront bundle pages.
                </span>

                <button 
                    type="submit" 
                    class="px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold uppercase tracking-wider rounded-[8px] shadow-sm hover:shadow-md transition-all font-heading cursor-pointer"
                >
                    Save Bundle Offers Selection
                </button>
            </div>

        </div>

    </form>

</div>

@push('scripts')
<script>
    function updateCounts() {
        const trialCount = document.querySelectorAll('.trial-checkbox:checked').length;
        const b2g1Count = document.querySelectorAll('.buy2get1-checkbox:checked').length;
        
        const trialBadge = document.getElementById('trial-count-badge');
        const b2g1Badge = document.getElementById('b2g1-count-badge');
        
        if (trialBadge) trialBadge.textContent = `${trialCount} Products Selected`;
        if (b2g1Badge) b2g1Badge.textContent = `${b2g1Count} Products Selected`;
    }

    function toggleAll(type, checked) {
        if (type === 'trial' || type === 'both') {
            document.querySelectorAll('.trial-checkbox').forEach(cb => cb.checked = checked);
        }
        if (type === 'buy2get1' || type === 'both') {
            document.querySelectorAll('.buy2get1-checkbox').forEach(cb => cb.checked = checked);
        }
        updateCounts();
    }
</script>
@endpush
@endsection
