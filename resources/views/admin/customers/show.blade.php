@extends('layouts.admin')

@section('title', 'Customer - ' . $customer->name)

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <div class="flex items-center space-x-2 text-xs text-gray-500 font-medium">
                <a href="{{ route('admin.customers.index') }}" class="hover:text-[#D38928]">← Devotees</a>
                <span>/</span>
                <span class="text-[#1A1A1A] font-bold">{{ $customer->name }}</span>
            </div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                {{ $customer->name }}
            </h1>
            <p class="text-xs text-gray-400">Devotee Member since {{ $customer->created_at->format('M Y') }}</p>
        </div>

        <form action="{{ route('admin.customers.toggle-status', $customer->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="px-4 py-2 bg-white hover:bg-gray-50 border border-[#E1E3E5] rounded-[8px] text-xs font-bold font-heading shadow-xs">
                {{ $customer->is_active ? 'Disable Account' : 'Activate Account' }}
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
        
        <!-- LEFT: Orders History (8 Cols) -->
        <div class="lg:col-span-8 space-y-6">
            
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
                <div class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD] flex items-center justify-between">
                    <h2 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                        Sacred Order History ({{ $customer->orders->count() }})
                    </h2>
                    <span class="text-xs font-black font-heading text-[#D38928]">
                        Lifetime Total: ₹{{ number_format($totalSpent, 2) }}
                    </span>
                </div>

                <div class="divide-y divide-[#E1E3E5]">
                    @forelse($customer->orders as $order)
                        <div class="p-4 flex items-center justify-between gap-4 hover:bg-[#FAF7F2]/40 transition-colors text-xs">
                            <div class="space-y-1">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="font-bold text-[#D38928] hover:underline font-mono">
                                    #{{ $order->order_number }}
                                </a>
                                <div class="text-[11px] text-gray-400">Placed on {{ $order->created_at->format('d M, Y') }}</div>
                                <div class="text-[11px] text-gray-600">{{ $order->items->count() }} item(s) • {{ $order->payment_method }}</div>
                            </div>

                            <div class="text-right space-y-1">
                                <div class="font-black font-heading text-sm text-[#1A1A1A]">₹{{ number_format($order->total_amount, 2) }}</div>
                                @if($order->order_status === 'delivered')
                                    <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase bg-emerald-100 text-emerald-800">✓ Delivered</span>
                                @elseif($order->order_status === 'shipped')
                                    <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase bg-amber-100 text-amber-800">🚚 In Transit</span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase bg-blue-100 text-blue-800">⚡ Confirmed</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="p-8 text-center text-gray-400 text-xs">
                            No orders placed by this devotee yet.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- RIGHT: Devotee Profile Details & Addresses (4 Cols) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Contact Card -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-5 space-y-3 text-xs">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading pb-2 border-b border-[#E1E3E5]">
                    Devotee Profile
                </h3>

                <div class="space-y-2 text-gray-600">
                    <div>
                        <span class="text-gray-400 block font-mono text-[10px]">FULL NAME</span>
                        <div class="font-bold text-[#1A1A1A]">{{ $customer->name }}</div>
                    </div>
                    <div>
                        <span class="text-gray-400 block font-mono text-[10px]">EMAIL ADDRESS</span>
                        <div class="text-[#1A1A1A]">{{ $customer->email }}</div>
                    </div>
                    <div>
                        <span class="text-gray-400 block font-mono text-[10px]">PHONE / WHATSAPP</span>
                        <div class="text-[#1A1A1A]">{{ $customer->phone ?? 'Not provided' }}</div>
                    </div>
                </div>
            </div>

            <!-- Saved Addresses Card -->
            <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-5 space-y-3 text-xs">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-700 font-heading pb-2 border-b border-[#E1E3E5]">
                    Saved Delivery Addresses ({{ $customer->addresses->count() }})
                </h3>

                @forelse($customer->addresses as $addr)
                    <div class="p-3 bg-[#FAF7F2] rounded-[10px] border border-[#EADBCC] space-y-1">
                        <div class="flex justify-between font-bold text-[#1A1A1A]">
                            <span>{{ $addr->first_name }} {{ $addr->last_name }}</span>
                            <span class="px-1.5 py-0.2 bg-white text-[9px] uppercase rounded border border-gray-200">{{ $addr->address_type }}</span>
                        </div>
                        <p class="text-gray-600 leading-relaxed">{{ $addr->address_line1 }}, {{ $addr->address_line2 }}</p>
                        <p class="text-gray-500">{{ $addr->city }}, {{ $addr->state }} - {{ $addr->postal_code }}</p>
                    </div>
                @empty
                    <p class="text-gray-400 text-xs">No saved delivery addresses.</p>
                @endforelse
            </div>

        </div>

    </div>

</div>
@endsection
