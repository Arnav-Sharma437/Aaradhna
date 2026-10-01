@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Sacred Orders
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Manage, fulfill, and track incoming devotee orders across India.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-xs text-gray-600 bg-white border border-[#E1E3E5] px-3 py-1.5 rounded-[8px] font-bold font-mono">
                Total Revenue: ₹{{ number_format($totalRevenue, 2) }}
            </span>
        </div>
    </div>

    <!-- Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-gray-500 font-medium">All Orders</span>
            <div class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A]">{{ $totalOrders }}</div>
        </div>
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-emerald-700 font-medium">Delivered</span>
            <div class="text-xl sm:text-2xl font-black font-heading text-emerald-700">{{ $deliveredOrders }}</div>
        </div>
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-amber-700 font-medium">In Transit / Shipped</span>
            <div class="text-xl sm:text-2xl font-black font-heading text-amber-700">{{ $inTransitOrders }}</div>
        </div>
        <div class="p-4 bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs space-y-1">
            <span class="text-xs text-blue-700 font-medium">Confirmed / Processing</span>
            <div class="text-xl sm:text-2xl font-black font-heading text-blue-700">{{ $confirmedOrders }}</div>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="flex items-center space-x-2 border-b border-[#E1E3E5] pb-3 overflow-x-auto shopify-scrollbar">
        <a 
            href="{{ route('admin.orders.index') }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ !request('status') ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            All <span class="ml-1 opacity-70">({{ $totalOrders }})</span>
        </a>
        <a 
            href="{{ route('admin.orders.index', ['status' => 'confirmed']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'confirmed' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Confirmed <span class="ml-1 opacity-70">({{ $confirmedOrders }})</span>
        </a>
        <a 
            href="{{ route('admin.orders.index', ['status' => 'shipped']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'shipped' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            In Transit <span class="ml-1 opacity-70">({{ $inTransitOrders }})</span>
        </a>
        <a 
            href="{{ route('admin.orders.index', ['status' => 'delivered']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'delivered' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Delivered <span class="ml-1 opacity-70">({{ $deliveredOrders }})</span>
        </a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.orders.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                <div class="sm:col-span-8 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by Order #, Customer Name, Mobile or Email..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="sm:col-span-4 flex gap-2">
                    <select 
                        name="payment_status" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="all">All Payment Statuses</option>
                        <option value="paid" {{ request('payment_status') === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="pending" {{ request('payment_status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-[#1A1A1A] hover:bg-[#D38928] text-white text-xs font-bold rounded-[8px] transition-colors font-heading">
                        Search
                    </button>
                </div>
            </div>
        </form>

        <!-- Orders Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4">Order #</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4">Customer</th>
                        <th class="py-3 px-4">Payment</th>
                        <th class="py-3 px-4">Fulfillment Status</th>
                        <th class="py-3 px-4">Items</th>
                        <th class="py-3 px-4 text-right">Total</th>
                        <th class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($orders as $order)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-bold font-mono text-[#1A1A1A]">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-[#D38928] hover:underline font-bold">
                                    #{{ $order->order_number }}
                                </a>
                            </td>
                            <td class="py-3.5 px-4 text-gray-500 whitespace-nowrap">
                                {{ $order->created_at->format('d M Y, h:i A') }}
                            </td>
                            <td class="py-3.5 px-4">
                                <div class="font-bold text-[#1A1A1A]">{{ $order->customer_name }}</div>
                                <div class="text-[11px] text-gray-400">{{ $order->customer_phone }}</div>
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $order->payment_status === 'paid' ? 'bg-emerald-100 text-emerald-800' : 'bg-amber-100 text-amber-800' }}">
                                    {{ $order->payment_status }}
                                </span>
                                <div class="text-[10px] text-gray-400 pt-0.5">{{ $order->payment_method }}</div>
                            </td>
                            <td class="py-3.5 px-4">
                                @if($order->order_status === 'delivered')
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[10px] uppercase bg-emerald-100 text-emerald-800">✓ Delivered</span>
                                @elseif($order->order_status === 'shipped')
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[10px] uppercase bg-amber-100 text-amber-800">🚚 In Transit</span>
                                @elseif($order->order_status === 'processing')
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[10px] uppercase bg-blue-100 text-blue-800">⚙️ Packing</span>
                                @else
                                    <span class="px-2.5 py-0.5 rounded-full font-bold text-[10px] uppercase bg-purple-100 text-purple-800">⚡ Confirmed</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">
                                {{ $order->items->count() }} item(s)
                            </td>
                            <td class="py-3.5 px-4 text-right font-black font-heading text-[#1A1A1A] whitespace-nowrap">
                                ₹{{ number_format($order->total_amount, 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <a 
                                    href="{{ route('admin.orders.show', $order->id) }}" 
                                    class="px-3 py-1.5 bg-[#FAF7F2] hover:bg-[#D38928] text-[#1A1A1A] hover:text-white border border-[#EADBCC] rounded-[6px] font-bold text-xs transition-colors"
                                >
                                    View ➔
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-gray-400">
                                No orders found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($orders->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $orders->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
