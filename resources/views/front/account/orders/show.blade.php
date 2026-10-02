@extends('layouts.app')

@section('title', 'Order #' . $order->order_number . ' - Manglam')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-8 sm:py-12">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-[40px] max-w-5xl">
        
        <!-- Breadcrumbs & Back link -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-[#EADBCC] pb-4">
            <div>
                <div class="flex items-center space-x-2 text-xs text-gray-500 font-heading mb-1">
                    <a href="{{ route('home') }}" class="hover:text-[#D38928]">Home</a>
                    <span>/</span>
                    <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="hover:text-[#D38928]">My Orders</a>
                    <span>/</span>
                    <span class="text-[#D38928] font-bold">#{{ $order->order_number }}</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight flex items-center gap-3">
                    <span>Order #{{ $order->order_number }}</span>
                    @if($order->order_status === 'delivered')
                        <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs uppercase tracking-wider">✓ Delivered</span>
                    @elseif($order->order_status === 'shipped')
                        <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 font-bold text-xs uppercase tracking-wider">🚚 In Transit</span>
                    @else
                        <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 font-bold text-xs uppercase tracking-wider">⚡ Confirmed</span>
                    @endif
                </h1>
                <p class="text-xs text-gray-500 mt-1">Placed on {{ $order->created_at->format('d M, Y \a\t h:i A') }}</p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 border border-[#EADBCC] rounded-[10px] text-xs font-bold font-heading shadow-xs transition-colors">
                    ← Back to Orders
                </a>
                <button type="button" onclick="window.print();" class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white rounded-[10px] text-xs font-bold font-heading shadow-xs transition-colors cursor-pointer">
                    🖨️ Print Invoice
                </button>
            </div>
        </div>

        <div class="space-y-6">
            
            <!-- 1. VISUAL ORDER TRACKING TIMELINE / STEPPER -->
            <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 sm:p-8 shadow-sm space-y-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-base sm:text-lg font-bold text-[#121212] font-heading">Sacred Delivery Progress</h2>
                        @if($order->tracking_number)
                            <p class="text-xs text-gray-500 font-mono mt-0.5">Tracking No: <span class="text-[#D38928] font-bold">{{ $order->tracking_number }}</span> ({{ $order->courier_name ?? 'Express Delivery' }})</p>
                        @endif
                    </div>
                    <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full border border-emerald-200">
                        ⚡ Express Dispatch
                    </span>
                </div>

                @php
                    $isDelivered = $order->order_status === 'delivered';
                    $isShipped = in_array($order->order_status, ['shipped', 'delivered']);
                    $isConfirmed = true;
                @endphp

                <!-- Stepper Bar -->
                <div class="relative py-4">
                    <div class="absolute top-1/2 left-0 right-0 h-1 bg-gray-200 -translate-y-1/2 z-0"></div>
                    <div class="absolute top-1/2 left-0 h-1 bg-[#D38928] -translate-y-1/2 z-0 transition-all duration-500" style="width: {{ $isDelivered ? '100%' : ($isShipped ? '66%' : '33%') }};"></div>
                    
                    <div class="relative z-10 flex justify-between">
                        <!-- Step 1: Placed -->
                        <div class="flex flex-col items-center text-center space-y-1">
                            <div class="w-8 h-8 rounded-full bg-[#D38928] text-white flex items-center justify-center font-bold text-xs shadow-md">✓</div>
                            <span class="text-xs font-bold text-[#121212] font-heading">Order Placed</span>
                            <span class="text-[10px] text-gray-400">{{ $order->created_at->format('d M') }}</span>
                        </div>

                        <!-- Step 2: Packed -->
                        <div class="flex flex-col items-center text-center space-y-1">
                            <div class="w-8 h-8 rounded-full {{ $isConfirmed ? 'bg-[#D38928] text-white' : 'bg-gray-200 text-gray-500' }} flex items-center justify-center font-bold text-xs shadow-md">✓</div>
                            <span class="text-xs font-bold text-[#121212] font-heading">Vedic Packed</span>
                            <span class="text-[10px] text-gray-400">{{ $order->created_at->format('d M') }}</span>
                        </div>

                        <!-- Step 3: Shipped -->
                        <div class="flex flex-col items-center text-center space-y-1">
                            <div class="w-8 h-8 rounded-full {{ $isShipped ? 'bg-[#D38928] text-white' : 'bg-gray-200 text-gray-500' }} flex items-center justify-center font-bold text-xs shadow-md">
                                {{ $isShipped ? '✓' : '3' }}
                            </div>
                            <span class="text-xs font-bold text-[#121212] font-heading">In Transit</span>
                            <span class="text-[10px] text-gray-400">{{ $isShipped ? 'Dispatched' : 'Pending' }}</span>
                        </div>

                        <!-- Step 4: Delivered -->
                        <div class="flex flex-col items-center text-center space-y-1">
                            <div class="w-8 h-8 rounded-full {{ $isDelivered ? 'bg-emerald-600 text-white' : 'bg-gray-200 text-gray-500' }} flex items-center justify-center font-bold text-xs shadow-md">
                                {{ $isDelivered ? '✓' : '4' }}
                            </div>
                            <span class="text-xs font-bold text-[#121212] font-heading">Delivered</span>
                            <span class="text-[10px] text-gray-400">{{ $isDelivered ? 'Delivered' : 'Expected soon' }}</span>
                        </div>
                    </div>
                </div>

                @if($order->notes)
                    <div class="p-3 bg-[#FAF7F2] rounded-[12px] border border-[#EADBCC] text-xs text-gray-600 flex items-center gap-2">
                        <span class="text-[#D38928] font-bold">📜 Note:</span>
                        <span>{{ $order->notes }}</span>
                    </div>
                @endif
            </div>

            <!-- 2. ORDER ITEMS LIST -->
            <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 sm:p-8 shadow-sm space-y-4">
                <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading pb-3 border-b border-[#EADBCC]">
                    Ordered Sacred Items ({{ $order->items->count() }})
                </h3>

                <div class="divide-y divide-[#EADBCC]/60">
                    @foreach($order->items as $item)
                        <div class="py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <div class="flex items-center space-x-4">
                                <div class="w-14 h-14 rounded-[12px] bg-[#FAF7F2] border border-[#EADBCC] flex items-center justify-center text-2xl text-[#D38928] shrink-0 shadow-xs">
                                    🪔
                                </div>
                                <div class="space-y-0.5">
                                    <h4 class="text-sm sm:text-base font-bold text-[#121212] font-heading">{{ $item->product_name }}</h4>
                                    <div class="text-xs text-gray-500">
                                        {{ $item->variant_name }} • SKU: <span class="font-mono">{{ $item->sku }}</span>
                                    </div>
                                    <div class="text-xs text-gray-600 font-medium pt-0.5">
                                        ₹{{ number_format($item->unit_price, 2) }} × {{ $item->quantity }}
                                    </div>
                                </div>
                            </div>

                            <div class="text-right flex sm:flex-col items-center sm:items-end justify-between sm:justify-center">
                                <span class="text-base font-black font-heading text-[#C87A1E]">
                                    ₹{{ number_format($item->total_price, 2) }}
                                </span>
                                <a href="{{ route('collections.show', 'all') }}" class="text-[11px] text-[#D38928] hover:underline font-bold font-heading mt-1">
                                    Buy Again ➔
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 3. ADDRESS & PAYMENT GRID -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Shipping Address Card -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 shadow-sm space-y-3">
                    <h3 class="text-sm font-bold text-[#121212] uppercase tracking-wider font-heading pb-2 border-b border-[#EADBCC]">
                        📍 Delivery Address
                    </h3>
                    @php
                        $ship = is_array($order->shipping_address) ? $order->shipping_address : json_decode($order->shipping_address, true);
                    @endphp
                    <div class="text-xs sm:text-sm space-y-1 text-gray-700">
                        <div class="font-bold text-[#121212] font-heading">{{ $ship['name'] ?? $order->customer_name }}</div>
                        <p class="text-gray-600 leading-relaxed">{{ $ship['address'] ?? 'Devotee Address' }}</p>
                        @if(isset($ship['city']))
                            <p class="text-gray-600">{{ $ship['city'] }}, {{ $ship['state'] ?? '' }} - {{ $ship['pincode'] ?? '' }}</p>
                        @endif
                        <p class="text-gray-500 pt-1">Phone: {{ $ship['phone'] ?? $order->customer_phone }}</p>
                    </div>
                </div>

                <!-- Payment & Financial Summary -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 shadow-sm space-y-3">
                    <h3 class="text-sm font-bold text-[#121212] uppercase tracking-wider font-heading pb-2 border-b border-[#EADBCC]">
                        💳 Payment Summary
                    </h3>
                    <div class="space-y-2 text-xs">
                        <div class="flex justify-between text-gray-600">
                            <span>Payment Method:</span>
                            <span class="font-bold text-[#121212]">{{ $order->payment_method }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Payment Status:</span>
                            <span class="font-bold text-emerald-700 uppercase">✓ {{ $order->payment_status }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal:</span>
                            <span>₹{{ number_format($order->subtotal, 2) }}</span>
                        </div>
                        @if($order->discount_amount > 0)
                            <div class="flex justify-between text-emerald-700 font-medium">
                                <span>Sacred Discount ({{ $order->coupon_code }}):</span>
                                <span>-₹{{ number_format($order->discount_amount, 2) }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between text-gray-600">
                            <span>Sacred Shipping:</span>
                            <span class="text-emerald-700 font-bold">FREE</span>
                        </div>
                        <div class="flex justify-between text-sm font-black font-heading text-[#121212] pt-2 border-t border-[#EADBCC]">
                            <span>Grand Total Paid:</span>
                            <span class="text-[#C87A1E]">₹{{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
