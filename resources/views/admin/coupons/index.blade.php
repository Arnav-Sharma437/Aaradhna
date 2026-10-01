@extends('layouts.admin')

@section('title', 'Discounts & Coupons')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Discounts &amp; Festive Coupons
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Create promotional discount codes and automatic GoKwik coupons for devotees.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.coupons.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                <span>+ Create Coupon</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- Metric Cards -->
    <div class="grid grid-cols-3 gap-4">
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-gray-500 font-medium">Total Coupons</span>
            <div class="text-xl font-black font-heading text-[#1A1A1A]">{{ $totalCoupons }}</div>
        </div>
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-emerald-700 font-medium">Active Codes</span>
            <div class="text-xl font-black font-heading text-emerald-700">{{ $activeCoupons }}</div>
        </div>
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-gray-500 font-medium">Times Redeemed</span>
            <div class="text-xl font-black font-heading text-[#D38928]">{{ $totalUsedCount }}</div>
        </div>
    </div>

    <!-- Coupons Table Card -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.coupons.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by Coupon Code..." 
                    class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                >
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4">Coupon Code</th>
                        <th class="py-3 px-4">Discount Value</th>
                        <th class="py-3 px-4">Min. Spend</th>
                        <th class="py-3 px-4">Usage Count</th>
                        <th class="py-3 px-4">Validity</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($coupons as $c)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-black font-mono text-sm text-[#1A1A1A]">
                                <span class="bg-[#FAF7F2] border border-[#EADBCC] px-2.5 py-1 rounded-[6px] text-[#D38928]">
                                    {{ $c->code }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A]">
                                @if($c->type === 'percentage')
                                    {{ $c->value }}% Off
                                @elseif($c->type === 'fixed_amount')
                                    ₹{{ number_format($c->value, 2) }} Flat Off
                                @else
                                    Free Sacred Shipping
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">
                                {{ $c->min_order_amount ? '₹' . number_format($c->min_order_amount, 2) : 'No min.' }}
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">
                                {{ $c->used_count }} / {{ $c->usage_limit ?? '∞' }}
                            </td>
                            <td class="py-3.5 px-4 text-gray-500 whitespace-nowrap text-[11px]">
                                {{ $c->valid_until ? 'Expires ' . $c->valid_until->format('d M, Y') : 'No Expiry' }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $c->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $c->is_active ? 'Active' : 'Disabled' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap space-x-1.5">
                                <a 
                                    href="{{ route('admin.coupons.edit', $c->id) }}" 
                                    class="px-2.5 py-1 bg-white hover:bg-gray-100 text-gray-700 border border-gray-200 rounded-[6px] font-bold text-xs"
                                >
                                    Edit
                                </a>
                                <form action="{{ route('admin.coupons.toggle-status', $c->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-1 text-[11px] font-medium border border-gray-200 rounded-[6px] hover:bg-gray-100 text-gray-600 cursor-pointer">
                                        {{ $c->is_active ? 'Disable' : 'Enable' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.coupons.destroy', $c->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete coupon?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-[11px] font-medium text-rose-600 hover:bg-rose-50 rounded-[6px] cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-gray-400">
                                No promotional coupons found. Click "+ Create Coupon" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($coupons->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $coupons->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
