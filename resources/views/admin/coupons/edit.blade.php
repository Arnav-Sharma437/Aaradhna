@extends('layouts.admin')

@section('title', 'Edit Coupon - ' . $coupon->code)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center space-x-2 text-xs text-gray-500 font-medium">
        <a href="{{ route('admin.coupons.index') }}" class="hover:text-[#D38928]">← Discounts &amp; Coupons</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">Edit {{ $coupon->code }}</span>
    </div>

    <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
        Edit Discount Coupon ({{ $coupon->code }})
    </h1>

    @if($errors->any())
        <div class="p-4 rounded-[10px] bg-rose-50 border border-rose-200 text-rose-800 text-xs font-bold space-y-1">
            @foreach($errors->all() as $error)
                <div>⚠ {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-6 sm:p-8">
        <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST" class="space-y-6 text-xs">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Coupon Code *</label>
                    <input type="text" name="code" required value="{{ old('code', $coupon->code) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-sm uppercase font-mono font-bold focus:border-[#D38928] focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Discount Type *</label>
                    <select name="type" required class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium focus:border-[#D38928] focus:outline-none">
                        <option value="percentage" {{ old('type', $coupon->type) === 'percentage' ? 'selected' : '' }}>Percentage Discount (%)</option>
                        <option value="fixed_amount" {{ old('type', $coupon->type) === 'fixed_amount' ? 'selected' : '' }}>Fixed Amount Off (₹)</option>
                        <option value="free_shipping" {{ old('type', $coupon->type) === 'free_shipping' ? 'selected' : '' }}>Free Shipping</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Discount Value *</label>
                    <input type="number" step="0.01" name="value" required value="{{ old('value', $coupon->value) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none font-mono font-bold">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Min. Order Spend (₹)</label>
                    <input type="number" step="0.01" name="min_order_amount" value="{{ old('min_order_amount', $coupon->min_order_amount) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none font-mono">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Usage Limit</label>
                    <input type="number" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none font-mono">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Valid From</label>
                    <input type="date" name="valid_from" value="{{ old('valid_from', $coupon->valid_from ? $coupon->valid_from->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Valid Until (Expiry)</label>
                    <input type="date" name="valid_until" value="{{ old('valid_until', $coupon->valid_until ? $coupon->valid_until->format('Y-m-d') : '') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                </div>
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_active" value="1" id="is_active_coupon_edit" {{ $coupon->is_active ? 'checked' : '' }} class="text-[#D38928] rounded focus:ring-0">
                <label for="is_active_coupon_edit" class="text-xs text-gray-700 font-bold cursor-pointer">Active &amp; Available for Devotees</label>
            </div>

            <div class="pt-4 border-t border-[#E1E3E5] flex justify-end gap-3">
                <a href="{{ route('admin.coupons.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-[8px] transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] font-heading shadow-xs transition-colors cursor-pointer">
                    Update Coupon
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
