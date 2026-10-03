@extends('layouts.admin')

@section('title', 'Discount Signups')

@section('content')
<div class="space-y-6 pb-12">
    
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black font-heading text-[#121212] tracking-tight">
                Discount Signups
            </h1>
            <p class="text-xs sm:text-sm text-gray-500 mt-0.5">
                Monitor multi-step customer survey responses and track 10% promotional coupon redemptions.
            </p>
        </div>
    </div>

    <!-- 4 Stats Summary Cards (Shopify Polaris Style) -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Total Signups -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Total Signups</span>
                <div class="w-8 h-8 rounded-full bg-amber-50 text-[#D38928] flex items-center justify-center font-bold text-sm">
                    👥
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-[#121212] font-heading">
                {{ number_format($totalSignups) }}
            </div>
            <p class="text-[11px] text-gray-400">All registered devotees</p>
        </div>

        <!-- Coupons Issued -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Coupons Issued</span>
                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-sm">
                    🎟️
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-blue-700 font-heading">
                {{ number_format($couponsIssued) }}
            </div>
            <p class="text-[11px] text-gray-400">Active unused coupons</p>
        </div>

        <!-- Coupons Used -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Coupons Used</span>
                <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-sm">
                    ✓
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-emerald-700 font-heading">
                {{ number_format($couponsUsed) }}
            </div>
            <p class="text-[11px] text-gray-400">Successfully redeemed at checkout</p>
        </div>

        <!-- Coupons Available -->
        <div class="bg-white rounded-[14px] p-4 sm:p-5 border border-[#E5E7EB] shadow-2xs space-y-2">
            <div class="flex items-center justify-between">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Active Promo Pool</span>
                <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-sm">
                    ⚡
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-black text-purple-700 font-heading">
                {{ number_format($couponsAvailable) }}
            </div>
            <p class="text-[11px] text-gray-400">Active 10% coupon codes</p>
        </div>

    </div>

    <!-- Search & Filter Bar Card -->
    <div class="bg-white rounded-[14px] border border-[#E5E7EB] p-4 shadow-2xs">
        <form method="GET" action="{{ route('admin.discount-signups.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3">
            
            <!-- Search Query (5 Cols) -->
            <div class="lg:col-span-4 relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by name, email, phone, coupon..." 
                    class="w-full pl-9 pr-3 py-2 text-xs rounded-[8px] border border-gray-300 focus:border-[#D38928] focus:outline-none bg-gray-50/50"
                >
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Status Filter (2 Cols) -->
            <div class="lg:col-span-2">
                <select name="status" onchange="this.form.submit()" class="w-full px-3 py-2 text-xs rounded-[8px] border border-gray-300 focus:border-[#D38928] focus:outline-none bg-gray-50/50">
                    <option value="">All Statuses</option>
                    <option value="issued" {{ request('status') === 'issued' ? 'selected' : '' }}>Issued (Unused)</option>
                    <option value="used" {{ request('status') === 'used' ? 'selected' : '' }}>Used (Redeemed)</option>
                </select>
            </div>

            <!-- Product Interest Filter (3 Cols) -->
            <div class="lg:col-span-3">
                <select name="product_interest" onchange="this.form.submit()" class="w-full px-3 py-2 text-xs rounded-[8px] border border-gray-300 focus:border-[#D38928] focus:outline-none bg-gray-50/50">
                    <option value="">All Interests</option>
                    @foreach($interestsList as $interest)
                        <option value="{{ $interest }}" {{ request('product_interest') === $interest ? 'selected' : '' }}>{{ $interest }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Actions (3 Cols) -->
            <div class="lg:col-span-3 flex items-center gap-2 justify-end">
                <button type="submit" class="px-4 py-2 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold rounded-[8px] transition-colors cursor-pointer">
                    Filter
                </button>
                @if(request()->hasAny(['search', 'status', 'product_interest', 'discovery_source']))
                    <a href="{{ route('admin.discount-signups.index') }}" class="px-3 py-2 text-xs font-semibold text-gray-500 hover:text-black transition-colors underline">
                        Reset
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Signups Data Table Card -->
    <div class="bg-white rounded-[14px] border border-[#E5E7EB] shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#FAF7F2] text-gray-700 font-bold uppercase tracking-wider text-[10px] border-b border-[#E5E7EB]">
                    <tr>
                        <th class="py-3 px-4">Devotee Name &amp; Contact</th>
                        <th class="py-3 px-4">Coupon Code</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Product Interest</th>
                        <th class="py-3 px-4">Ordering Blocker</th>
                        <th class="py-3 px-4">Discovery Source</th>
                        <th class="py-3 px-4">Product Priority</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E5E7EB]">
                    @forelse($signups as $item)
                        <tr class="hover:bg-amber-50/20 transition-colors">
                            <!-- Name & Contact -->
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-[#121212] text-xs sm:text-sm">{{ $item->name }}</div>
                                <div class="text-[11px] text-gray-500 flex items-center gap-1.5 mt-0.5">
                                    <span>✉ {{ $item->email }}</span>
                                    <span>•</span>
                                    <span>📞 {{ $item->phone }}</span>
                                </div>
                            </td>

                            <!-- Coupon Code -->
                            <td class="py-3.5 px-4 font-mono font-bold">
                                <span class="px-2.5 py-1 bg-amber-50 border border-[#D38928]/40 text-[#965A15] rounded-[6px] text-xs">
                                    {{ $item->generated_coupon_code }}
                                </span>
                            </td>

                            <!-- Status Badge -->
                            <td class="py-3.5 px-4">
                                @if($item->coupon_status === 'used')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">
                                        ✓ Used
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-100 text-blue-800">
                                        ● Issued
                                    </span>
                                @endif
                            </td>

                            <!-- Product Interest -->
                            <td class="py-3.5 px-4 text-gray-700">
                                <span class="font-medium">{{ $item->product_interest }}</span>
                            </td>

                            <!-- Ordering Blocker -->
                            <td class="py-3.5 px-4 text-gray-600">
                                {{ $item->ordering_blocker }}
                            </td>

                            <!-- Discovery Source -->
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 bg-gray-100 rounded text-[11px] text-gray-700 font-medium">
                                    {{ $item->discovery_source }}
                                </span>
                            </td>

                            <!-- Product Priority -->
                            <td class="py-3.5 px-4 text-gray-600">
                                {{ $item->product_priority }}
                            </td>

                            <!-- Created Date -->
                            <td class="py-3.5 px-4 text-gray-500 whitespace-nowrap text-[11px]">
                                {{ $item->created_at ? $item->created_at->format('M d, Y • h:i A') : '—' }}
                            </td>

                            <!-- Actions -->
                            <td class="py-3.5 px-4 text-right">
                                <form action="{{ route('admin.discount-signups.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this signup entry?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-gray-400 hover:text-rose-600 transition-colors" title="Delete record">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="py-12 text-center text-gray-400">
                                <div class="w-12 h-12 mx-auto bg-gray-50 rounded-full flex items-center justify-center text-xl mb-2">
                                    🎟️
                                </div>
                                <p class="text-sm font-medium text-gray-600">No discount signups found.</p>
                                <p class="text-xs text-gray-400 mt-0.5">When customers complete the 10% discount survey, their responses will appear here.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($signups->hasPages())
            <div class="p-4 border-t border-[#E5E7EB] bg-[#FAF7F2]">
                {{ $signups->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
