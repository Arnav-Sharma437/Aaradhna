@extends('layouts.admin')

@section('title', 'Order #' . $order->order_number)

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="space-y-1">
            <div class="flex items-center space-x-2 text-xs text-gray-500 font-medium">
                <a href="{{ route('admin.orders.index') }}" class="hover:text-[#D38928]">← Orders</a>
                <span>/</span>
                <span class="font-mono text-[#1A1A1A]">#{{ $order->order_number }}</span>
            </div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight flex items-center gap-3">
                <span>Order #{{ $order->order_number }}</span>
                @if($order->order_status === 'delivered')
                    <span class="px-3 py-1 rounded-full font-bold text-xs uppercase bg-emerald-100 text-emerald-800">✓ Delivered</span>
                @elseif($order->order_status === 'shipped')
                    <span class="px-3 py-1 rounded-full font-bold text-xs uppercase bg-amber-100 text-amber-800">🚚 In Transit</span>
                @else
                    <span class="px-3 py-1 rounded-full font-bold text-xs uppercase bg-blue-100 text-blue-800">⚡ Confirmed</span>
                @endif
            </h1>
            <p class="text-xs text-gray-400">Placed on {{ $order->created_at->format('d M Y \a\t h:i A') }}</p>
        </div>

        <div class="flex items-center space-x-3">
            <button type="button" onclick="window.print()" class="px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 border border-[#E1E3E5] rounded-[8px] text-xs font-bold font-heading shadow-xs">
                🖨️ Print Packing Slip
            </button>
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Permanently delete this order?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-3 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-[8px] text-xs font-bold font-heading transition-colors">
                    Delete Order
                </button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- LEFT: Items & Customer Details (8 Cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Items Box -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
                <div class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                        Order Items ({{ $order->items->count() }})
                    </h2>
                </div>

                <div class="divide-y divide-[#E1E3E5]">
                    @foreach($order->items as $item)
                        <div class="p-4 flex items-center justify-between gap-4 hover:bg-[#FAF7F2]/40 transition-colors">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 rounded-[8px] bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center text-xl text-[#D38928] shrink-0 font-heading shadow-2xs">
                                    🪔
                                </div>
                                <div class="space-y-0.5">
                                    <div class="font-bold text-xs sm:text-sm text-[#1A1A1A] font-heading">{{ $item->product_name }}</div>
                                    <div class="text-[11px] text-gray-500">{{ $item->variant_name }} • SKU: <span class="font-mono">{{ $item->sku }}</span></div>
                                    <div class="text-[11px] text-gray-400">₹{{ number_format($item->unit_price, 2) }} × {{ $item->quantity }}</div>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-sm font-black font-heading text-[#1A1A1A]">₹{{ number_format($item->total_price, 2) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Financial Breakdown Footer -->
                <div class="p-4 bg-[#FAFBFB] border-t border-[#E1E3E5] space-y-2 text-xs">
                    <div class="flex justify-between text-gray-600">
                        <span>Items Subtotal:</span>
                        <span>₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    @if($order->discount_amount > 0)
                        <div class="flex justify-between text-emerald-700 font-medium">
                            <span>Coupon Discount ({{ $order->coupon_code }}):</span>
                            <span>-₹{{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between text-gray-600">
                        <span>Shipping Charges:</span>
                        <span class="text-emerald-700 font-bold">FREE</span>
                    </div>
                    <div class="flex justify-between text-sm font-black font-heading text-[#1A1A1A] pt-2 border-t border-[#E1E3E5]">
                        <span>Total Paid Amount:</span>
                        <span class="text-[#D38928]">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            <!-- Customer & Delivery Address Card -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-5 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading pb-2 border-b border-[#E1E3E5]">
                    Devotee &amp; Delivery Destination
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="space-y-1">
                        <span class="text-gray-400 block font-mono">CUSTOMER DETAILS</span>
                        <div class="font-bold text-[#1A1A1A]">{{ $order->customer_name }}</div>
                        <div class="text-gray-600">Email: {{ $order->customer_email }}</div>
                        <div class="text-gray-600">Phone: {{ $order->customer_phone }}</div>
                    </div>

                    @php
                        $addr = is_array($order->shipping_address) ? $order->shipping_address : json_decode($order->shipping_address, true);
                    @endphp
                    <div class="space-y-1">
                        <span class="text-gray-400 block font-mono">SHIPPING ADDRESS</span>
                        <div class="text-gray-800 leading-relaxed font-medium">{{ $addr['address'] ?? 'Devotee Address' }}</div>
                        @if(isset($addr['city']))
                            <div class="text-gray-600">{{ $addr['city'] }}, {{ $addr['state'] ?? '' }} - {{ $addr['pincode'] ?? '' }}</div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT: Fulfillment & Status Controller (4 Cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Update Status Box -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-5 space-y-4">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading pb-2 border-b border-[#E1E3E5]">
                    Fulfillment Management
                </h3>

                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="space-y-4 text-xs">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Order Status</label>
                        <select name="order_status" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] font-medium text-xs focus:border-[#D38928] focus:outline-none">
                            <option value="confirmed" {{ $order->order_status === 'confirmed' ? 'selected' : '' }}>Confirmed (Received)</option>
                            <option value="processing" {{ $order->order_status === 'processing' ? 'selected' : '' }}>Processing / Packing</option>
                            <option value="shipped" {{ $order->order_status === 'shipped' ? 'selected' : '' }}>Shipped / In Transit</option>
                            <option value="delivered" {{ $order->order_status === 'delivered' ? 'selected' : '' }}>Delivered (Completed)</option>
                            <option value="cancelled" {{ $order->order_status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Payment Status</label>
                        <select name="payment_status" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] font-medium text-xs focus:border-[#D38928] focus:outline-none">
                            <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="refunded" {{ $order->payment_status === 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Courier Partner</label>
                        <input type="text" name="courier_name" value="{{ old('courier_name', $order->courier_name ?? 'Bluedart Express') }}" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 mb-1">AWB Tracking Number</label>
                        <input type="text" name="tracking_number" value="{{ old('tracking_number', $order->tracking_number) }}" placeholder="e.g. AWB-BLD8492019" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] font-mono text-xs focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Internal Notes / Instructions</label>
                        <textarea name="notes" rows="3" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">{{ old('notes', $order->notes) }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] font-heading shadow-xs transition-colors cursor-pointer">
                        Update Order Fulfillment
                    </button>
                </form>
            </div>

            <!-- Payment Details Box -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-5 space-y-2 text-xs">
                <span class="text-gray-400 font-mono block">PAYMENT INFORMATION</span>
                <div class="flex justify-between">
                    <span class="text-gray-500">Method:</span>
                    <span class="font-bold text-[#1A1A1A]">{{ $order->payment_method }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Transaction ID:</span>
                    <span class="font-mono text-gray-700">{{ $order->payment_id ?? 'N/A' }}</span>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
