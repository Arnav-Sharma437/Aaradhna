@extends('layouts.app')

@section('title', 'My Devotee Account - Mangalam')

@section('content')
<div class="bg-[#FAF7F2] min-h-screen py-8 sm:py-12">
    <div class="w-full mx-auto px-4 sm:px-6 lg:px-[40px] max-w-7xl">
        
        <!-- Top Breadcrumb & Sacred Welcome Bar -->
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-[#EADBCC] pb-4">
            <div>
                <div class="flex items-center space-x-2 text-xs text-gray-500 font-heading mb-1">
                    <a href="{{ route('home') }}" class="hover:text-[#D38928]">Home</a>
                    <span>/</span>
                    <span class="text-[#D38928] font-bold">Devotee Portal</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-black text-[#121212] font-heading tracking-tight flex items-center gap-2">
                    <span>Namaste, {{ $user->name }}</span>
                    <span class="text-base text-[#D38928]">🪔</span>
                </h1>
            </div>

            <!-- Quick Logout Form -->
            <form action="{{ route('account.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="px-4 py-2 bg-white hover:bg-rose-50 text-gray-700 hover:text-rose-700 border border-[#EADBCC] hover:border-rose-300 rounded-[10px] text-xs font-bold font-heading transition-all shadow-xs flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Sign Out</span>
                </button>
            </form>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-[12px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm font-medium flex items-center gap-2 shadow-xs">
                <span class="font-bold text-base">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="mb-6 p-4 rounded-[12px] bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm font-medium space-y-1 shadow-xs">
                @foreach($errors->all() as $error)
                    <div class="flex items-center gap-1.5">
                        <span class="font-bold">⚠</span>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8 items-start">
            
            <!-- LEFT SIDEBAR: Navigation Tabs & Profile Badge -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Devotee Identity Card -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] p-6 shadow-sm space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-[#D38928] to-[#965A15] text-white flex items-center justify-center text-xl font-black font-heading shadow-md shrink-0">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                        <div class="truncate min-w-0">
                            <div class="text-base font-bold text-[#121212] font-heading truncate">{{ $user->name }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ $user->email }}</div>
                            <div class="mt-1 inline-flex items-center gap-1 bg-[#FFF8EE] text-[#C87A1E] border border-[#F0D5AA] px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider font-heading">
                                <span>✦ Blessed Devotee</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats Micro Grid -->
                    <div class="grid grid-cols-2 gap-2 pt-3 border-t border-[#EADBCC]/70 text-center">
                        <div class="p-2.5 bg-[#FAF7F2] rounded-[12px] border border-[#EADBCC]/60">
                            <span class="text-xs text-gray-500 block">Total Orders</span>
                            <span class="text-lg font-black font-heading text-[#121212]">{{ $totalOrdersCount }}</span>
                        </div>
                        <div class="p-2.5 bg-[#FAF7F2] rounded-[12px] border border-[#EADBCC]/60">
                            <span class="text-xs text-gray-500 block">Pooja Coins</span>
                            <span class="text-lg font-black font-heading text-[#D38928]">250 🪙</span>
                        </div>
                    </div>
                </div>

                <!-- Navigation Links List -->
                <div class="bg-white rounded-[20px] border border-[#EADBCC] shadow-sm overflow-hidden p-2 space-y-1 font-heading text-xs sm:text-sm">
                    <a 
                        href="{{ route('account.index', ['tab' => 'dashboard']) }}" 
                        class="flex items-center justify-between px-4 py-3 rounded-[12px] font-bold transition-all {{ ($activeTab === 'dashboard') ? 'bg-[#D38928] text-white shadow-sm' : 'text-gray-700 hover:bg-[#FAF7F2] hover:text-[#D38928]' }}"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            <span>Dashboard Overview</span>
                        </div>
                        <span>➔</span>
                    </a>

                    <a 
                        href="{{ route('account.index', ['tab' => 'orders']) }}" 
                        class="flex items-center justify-between px-4 py-3 rounded-[12px] font-bold transition-all {{ ($activeTab === 'orders') ? 'bg-[#D38928] text-white shadow-sm' : 'text-gray-700 hover:bg-[#FAF7F2] hover:text-[#D38928]' }}"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            <span>My Sacred Orders</span>
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full {{ ($activeTab === 'orders') ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-700' }}">{{ $totalOrdersCount }}</span>
                    </a>

                    <a 
                        href="{{ route('account.index', ['tab' => 'addresses']) }}" 
                        class="flex items-center justify-between px-4 py-3 rounded-[12px] font-bold transition-all {{ ($activeTab === 'addresses') ? 'bg-[#D38928] text-white shadow-sm' : 'text-gray-700 hover:bg-[#FAF7F2] hover:text-[#D38928]' }}"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Saved Addresses</span>
                        </div>
                        <span class="text-xs px-2 py-0.5 rounded-full {{ ($activeTab === 'addresses') ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-700' }}">{{ $addresses->count() }}</span>
                    </a>

                    <a 
                        href="{{ route('account.index', ['tab' => 'profile']) }}" 
                        class="flex items-center justify-between px-4 py-3 rounded-[12px] font-bold transition-all {{ ($activeTab === 'profile') ? 'bg-[#D38928] text-white shadow-sm' : 'text-gray-700 hover:bg-[#FAF7F2] hover:text-[#D38928]' }}"
                    >
                        <div class="flex items-center space-x-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Profile & Security</span>
                        </div>
                        <span>➔</span>
                    </a>

                </div>

                <!-- Vedic Help Box -->
                <div class="bg-gradient-to-br from-[#FFFDF9] to-[#FAF7F2] rounded-[20px] border border-[#EADBCC] p-5 space-y-2 text-xs">
                    <span class="font-bold text-[#D38928] uppercase tracking-wider block font-heading">Need Assistance?</span>
                    <p class="text-gray-600 leading-relaxed">
                        For ritual queries, order dispatch status or bulk mandir samagri orders, connect directly with our Seva Kendra team.
                    </p>
                    <a href="{{ route('pages.contact') }}" class="inline-block font-bold text-[#121212] hover:text-[#D38928] underline pt-1">
                        Contact Mangalam Support ➔
                    </a>
                </div>

            </div>

            <!-- RIGHT CONTENT AREA: Dynamic Tab Panes -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- TAB 1: DASHBOARD OVERVIEW -->
                @if($activeTab === 'dashboard')
                    
                    <!-- Welcome Hero Banner -->
                    <div class="relative overflow-hidden bg-gradient-to-r from-[#2B1810] to-[#45271A] text-white rounded-[24px] p-6 sm:p-8 shadow-lg border border-[#EADBCC]/30">
                        <div class="relative z-10 space-y-2 max-w-xl">
                            <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#F6DAA8] font-heading">✦ SHUBH AARADHNA ✦</span>
                            <h2 class="text-xl sm:text-2xl font-black font-heading leading-tight">
                                Pure Vedic Blends for Your Daily Auspicious Hours
                            </h2>
                            <p class="text-xs sm:text-sm text-gray-300">
                                You have completed {{ $totalOrdersCount }} sacred deliveries. Free standard delivery applies to all devotee orders.
                            </p>
                            <div class="pt-2 flex flex-wrap gap-2">
                                <a href="{{ route('collections.show', 'all') }}" class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] font-heading shadow-sm transition-colors">
                                    Shop New Collections ➔
                                </a>
                                <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white text-xs font-bold rounded-[8px] font-heading transition-colors">
                                    View Past Orders
                                </a>
                            </div>
                        </div>
                        <div class="absolute right-[-20px] bottom-[-20px] text-8xl text-white/5 pointer-events-none select-none">
                            🪔
                        </div>
                    </div>

                    <!-- Active Recent Orders Preview -->
                    <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-7 shadow-sm space-y-5">
                        <div class="flex items-center justify-between pb-3 border-b border-[#EADBCC]">
                            <div>
                                <h3 class="text-base sm:text-lg font-bold text-[#121212] font-heading">Recent Sacred Orders</h3>
                                <p class="text-xs text-gray-500">Track and manage your recent deliveries</p>
                            </div>
                            <a href="{{ route('account.index', ['tab' => 'orders']) }}" class="text-xs font-bold text-[#D38928] hover:underline font-heading">
                                View All ({{ $totalOrdersCount }}) ➔
                            </a>
                        </div>

                        @if($recentOrders->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentOrders as $order)
                                    <div class="p-4 bg-[#FAF7F2] rounded-[16px] border border-[#EADBCC] space-y-3">
                                        <div class="flex flex-wrap items-center justify-between gap-2 text-xs pb-2 border-b border-[#EADBCC]/60">
                                            <div class="space-x-2">
                                                <span class="font-bold text-[#121212] font-heading">#{{ $order->order_number }}</span>
                                                <span class="text-gray-400">|</span>
                                                <span class="text-gray-500">{{ $order->created_at->format('d M, Y') }}</span>
                                            </div>
                                            <div>
                                                @if($order->order_status === 'delivered')
                                                    <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-bold text-[10px] uppercase tracking-wider">✓ Delivered</span>
                                                @elseif($order->order_status === 'shipped')
                                                    <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 font-bold text-[10px] uppercase tracking-wider">🚚 In Transit</span>
                                                @else
                                                    <span class="px-2.5 py-0.5 rounded-full bg-blue-100 text-blue-800 font-bold text-[10px] uppercase tracking-wider">⚡ Confirmed</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Order Items Micro List -->
                                        <div class="space-y-2">
                                            @foreach($order->items as $item)
                                                <div class="flex items-center justify-between text-xs">
                                                    <div class="flex items-center space-x-3">
                                                        <div class="w-8 h-8 rounded-lg bg-white border border-[#EADBCC] flex items-center justify-center font-bold text-xs text-[#D38928] shrink-0">
                                                            🪔
                                                        </div>
                                                        <div>
                                                            <div class="font-bold text-[#121212] font-heading line-clamp-1">{{ $item->product_name }}</div>
                                                            <div class="text-[10px] text-gray-500">Qty: {{ $item->quantity }} • {{ $item->variant_name }}</div>
                                                        </div>
                                                    </div>
                                                    <span class="font-black font-heading text-[#C87A1E]">₹{{ number_format($item->total_price, 2) }}</span>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="flex items-center justify-between pt-2 border-t border-[#EADBCC]/60 text-xs">
                                            <div class="text-gray-500">
                                                Total: <strong class="text-[#121212] font-heading">₹{{ number_format($order->total_amount, 2) }}</strong>
                                            </div>
                                            <a href="{{ route('account.orders.show', $order->order_number) }}" class="px-3 py-1.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[6px] text-xs font-heading transition-colors">
                                                View Details &amp; Tracking ➔
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8 space-y-3">
                                <div class="text-3xl text-gray-300">📦</div>
                                <p class="text-xs sm:text-sm text-gray-500">No sacred orders placed yet.</p>
                                <a href="{{ route('collections.show', 'all') }}" class="inline-block px-5 py-2.5 bg-[#D38928] text-white text-xs font-bold rounded-[8px] font-heading">
                                    Start Sacred Journey ➔
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Default Address Snapshot -->
                    <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-7 shadow-sm space-y-3">
                        <div class="flex items-center justify-between pb-2 border-b border-[#EADBCC]">
                            <h3 class="text-base font-bold text-[#121212] font-heading">Primary Delivery Address</h3>
                            <a href="{{ route('account.index', ['tab' => 'addresses']) }}" class="text-xs font-bold text-[#D38928] hover:underline font-heading">
                                Manage Addresses ➔
                            </a>
                        </div>
                        @if($defaultAddress)
                            <div class="text-xs sm:text-sm space-y-1 text-gray-700">
                                <div class="font-bold text-[#121212] font-heading flex items-center gap-2">
                                    <span>{{ $defaultAddress->first_name }} {{ $defaultAddress->last_name }}</span>
                                    <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold rounded-full uppercase">{{ $defaultAddress->address_type }}</span>
                                </div>
                                <p class="text-gray-600 leading-relaxed">{{ $defaultAddress->address_line1 }}, {{ $defaultAddress->address_line2 }}</p>
                                <p class="text-gray-600">{{ $defaultAddress->city }}, {{ $defaultAddress->state }} - {{ $defaultAddress->postal_code }}</p>
                                <p class="text-gray-500">Phone: {{ $defaultAddress->phone }}</p>
                            </div>
                        @else
                            <p class="text-xs text-gray-500">No primary address saved yet.</p>
                        @endif
                    </div>

                <!-- TAB 2: MY SACRED ORDERS -->
                @elseif($activeTab === 'orders')
                    
                    <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-8 shadow-sm space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b border-[#EADBCC]">
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-[#121212] font-heading">My Sacred Orders</h2>
                                <p class="text-xs text-gray-500">Full order history and tracking information</p>
                            </div>
                            <span class="text-xs font-bold bg-[#FAF7F2] border border-[#EADBCC] px-3 py-1 rounded-full text-gray-700 font-heading">
                                {{ $orders->count() }} Orders Found
                            </span>
                        </div>

                        @if($orders->count() > 0)
                            <div class="space-y-6">
                                @foreach($orders as $order)
                                    <div class="bg-[#FFFDF9] rounded-[18px] border border-[#EADBCC] p-5 sm:p-6 space-y-4 shadow-xs">
                                        
                                        <!-- Header Row -->
                                        <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-[#EADBCC]">
                                            <div class="space-y-0.5">
                                                <div class="flex items-center gap-2 font-heading font-black text-sm sm:text-base text-[#121212]">
                                                    <span>Order #{{ $order->order_number }}</span>
                                                </div>
                                                <div class="text-[11px] text-gray-500">
                                                    Placed on {{ $order->created_at->format('d M, Y \a\t h:i A') }}
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                @if($order->order_status === 'delivered')
                                                    <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-bold text-xs uppercase tracking-wider">✓ Delivered</span>
                                                @elseif($order->order_status === 'shipped')
                                                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 font-bold text-xs uppercase tracking-wider">🚚 In Transit</span>
                                                @else
                                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 font-bold text-xs uppercase tracking-wider">⚡ Confirmed</span>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Items Breakdown -->
                                        <div class="space-y-3">
                                            @foreach($order->items as $item)
                                                <div class="flex items-center justify-between gap-3 py-1">
                                                    <div class="flex items-center space-x-3.5">
                                                        <div class="w-12 h-12 rounded-[10px] bg-white border border-[#EADBCC] flex items-center justify-center font-bold text-xl text-[#D38928] shrink-0 shadow-xs">
                                                            🪔
                                                        </div>
                                                        <div>
                                                            <h4 class="text-xs sm:text-sm font-bold text-[#121212] font-heading line-clamp-1">
                                                                {{ $item->product_name }}
                                                            </h4>
                                                            <p class="text-[11px] text-gray-500">
                                                                Qty: {{ $item->quantity }} • {{ $item->variant_name }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="text-right shrink-0">
                                                        <span class="text-xs sm:text-sm font-black font-heading text-[#C87A1E]">
                                                            ₹{{ number_format($item->total_price, 2) }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- Footer Actions & Total -->
                                        <div class="flex flex-wrap items-center justify-between gap-3 pt-3 border-t border-[#EADBCC] text-xs">
                                            <div class="space-y-0.5">
                                                <span class="text-gray-500">Payment Method: <strong>{{ $order->payment_method }}</strong></span>
                                                <div class="text-sm font-black font-heading text-[#121212]">
                                                    Grand Total: ₹{{ number_format($order->total_amount, 2) }}
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-2">
                                                <a href="{{ route('account.orders.show', $order->order_number) }}" class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] font-heading shadow-xs transition-colors">
                                                    Order Details &amp; Tracking ➔
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12 space-y-4">
                                <div class="text-4xl">🪔</div>
                                <h3 class="text-lg font-bold text-[#121212] font-heading">No sacred orders placed yet</h3>
                                <p class="text-xs sm:text-sm text-gray-500 max-w-sm mx-auto">
                                    Explore our charcoal-free bambooless sticks, organic havan cups, and super-saver combos.
                                </p>
                                <a href="{{ route('collections.show', 'all') }}" class="inline-block px-6 py-3 bg-[#D38928] text-white text-xs font-bold uppercase tracking-wider rounded-[10px] font-heading">
                                    Explore Sacred Catalog ➔
                                </a>
                            </div>
                        @endif

                    </div>

                <!-- TAB 3: SAVED ADDRESSES -->
                @elseif($activeTab === 'addresses')
                    
                    <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-8 shadow-sm space-y-6">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#EADBCC]">
                            <div>
                                <h2 class="text-xl sm:text-2xl font-black text-[#121212] font-heading">Saved Delivery Addresses</h2>
                                <p class="text-xs text-gray-500">Manage delivery locations for home, mandir or office</p>
                            </div>
                            <button 
                                type="button" 
                                onclick="document.getElementById('add-address-modal').classList.remove('hidden');"
                                class="px-4 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[10px] font-heading shadow-sm transition-colors flex items-center gap-1.5 cursor-pointer"
                            >
                                <span>+ Add New Address</span>
                            </button>
                        </div>

                        <!-- Address Cards Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @forelse($addresses as $addr)
                                <div class="p-5 rounded-[16px] border-2 {{ $addr->is_default ? 'border-[#D38928] bg-[#FFFDF9]' : 'border-[#EADBCC] bg-white' }} space-y-3 relative shadow-xs flex flex-col justify-between">
                                    <div class="space-y-2">
                                        <div class="flex items-center justify-between">
                                            <span class="font-bold text-[#121212] font-heading text-sm">
                                                {{ $addr->first_name }} {{ $addr->last_name }}
                                            </span>
                                            @if($addr->is_default)
                                                <span class="px-2 py-0.5 bg-[#D38928] text-white text-[10px] font-bold rounded-full uppercase font-heading">Primary Default</span>
                                            @else
                                                <span class="px-2 py-0.5 bg-gray-100 text-gray-700 text-[10px] font-bold rounded-full uppercase font-heading">{{ $addr->address_type }}</span>
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-600 space-y-0.5 leading-relaxed">
                                            <p>{{ $addr->address_line1 }}</p>
                                            @if($addr->address_line2)<p>{{ $addr->address_line2 }}</p>@endif
                                            @if($addr->landmark)<p class="text-gray-400">Landmark: {{ $addr->landmark }}</p>@endif
                                            <p class="font-medium text-[#121212]">{{ $addr->city }}, {{ $addr->state }} - {{ $addr->postal_code }}</p>
                                            <p class="text-gray-500">Phone: {{ $addr->phone }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-between pt-3 border-t border-[#EADBCC] text-xs">
                                        @if(!$addr->is_default)
                                            <form action="{{ route('account.addresses.default', $addr->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="text-xs font-bold text-[#D38928] hover:underline font-heading cursor-pointer">
                                                    Set as Default
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-emerald-700 font-bold text-xs">✓ Default</span>
                                        @endif

                                        <form action="{{ route('account.addresses.destroy', $addr->id) }}" method="POST" onsubmit="return confirm('Remove this address?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-bold text-rose-600 hover:text-rose-800 hover:underline font-heading cursor-pointer">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-2 text-center py-8 text-gray-500 text-xs">
                                    No delivery addresses saved yet. Click above to add your first address.
                                </div>
                            @endforelse
                        </div>

                    </div>

                    <!-- ADD ADDRESS MODAL -->
                    <div id="add-address-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs hidden items-center justify-center p-4">
                        <div class="bg-white rounded-[20px] max-w-lg w-full p-6 sm:p-8 space-y-4 shadow-2xl border border-[#EADBCC] max-h-[90vh] overflow-y-auto">
                            <div class="flex items-center justify-between pb-3 border-b border-[#EADBCC]">
                                <h3 class="text-lg font-black text-[#121212] font-heading">Add New Delivery Address</h3>
                                <button type="button" onclick="document.getElementById('add-address-modal').classList.add('hidden');" class="text-gray-400 hover:text-gray-700 text-xl font-bold">&times;</button>
                            </div>

                            <form action="{{ route('account.addresses.store') }}" method="POST" class="space-y-4">
                                @csrf
                                
                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Address Type</label>
                                    <div class="flex gap-4 text-xs font-heading">
                                        <label class="flex items-center gap-1.5 cursor-pointer">
                                            <input type="radio" name="address_type" value="home" checked class="text-[#D38928] focus:ring-0">
                                            <span>Home</span>
                                        </label>
                                        <label class="flex items-center gap-1.5 cursor-pointer">
                                            <input type="radio" name="address_type" value="temple" class="text-[#D38928] focus:ring-0">
                                            <span>Temple / Ashram</span>
                                        </label>
                                        <label class="flex items-center gap-1.5 cursor-pointer">
                                            <input type="radio" name="address_type" value="office" class="text-[#D38928] focus:ring-0">
                                            <span>Office / Workplace</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">First Name *</label>
                                        <input type="text" name="first_name" required value="{{ old('first_name', $user->name) }}" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Last Name</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Contact Phone Number *</label>
                                    <input type="tel" name="phone" required value="{{ old('phone', $user->phone) }}" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Address Line 1 (Flat, House No., Building) *</label>
                                    <input type="text" name="address_line1" required placeholder="e.g. Flat 402, Vrindavan Dham" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Address Line 2 (Street, Area, Colony)</label>
                                    <input type="text" name="address_line2" placeholder="e.g. Near ISKCON Mandir Road" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                </div>

                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">City *</label>
                                        <input type="text" name="city" required value="Mathura" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">State *</label>
                                        <input type="text" name="state" required value="Uttar Pradesh" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Pincode *</label>
                                        <input type="text" name="postal_code" required value="281001" class="w-full px-3 py-2 bg-[#FAF7F2] border border-[#EADBCC] rounded-[8px] text-xs focus:bg-white focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 pt-2">
                                    <input type="checkbox" name="is_default" value="1" id="is_default_check" class="text-[#D38928] rounded focus:ring-0">
                                    <label for="is_default_check" class="text-xs text-gray-700 font-medium cursor-pointer">Make this my primary default delivery address</label>
                                </div>

                                <div class="pt-3 flex gap-3">
                                    <button type="button" onclick="document.getElementById('add-address-modal').classList.add('hidden');" class="w-1/2 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold rounded-[8px] text-xs font-heading">Cancel</button>
                                    <button type="submit" class="w-1/2 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] text-xs font-heading">Save Address</button>
                                </div>
                            </form>
                        </div>
                    </div>

                <!-- TAB 4: PROFILE & SECURITY -->
                @elseif($activeTab === 'profile')
                    
                    <div class="space-y-6">
                        
                        <!-- Personal Info Update Form -->
                        <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-8 shadow-sm space-y-6">
                            <div class="pb-3 border-b border-[#EADBCC]">
                                <h2 class="text-xl font-black text-[#121212] font-heading">Devotee Information</h2>
                                <p class="text-xs text-gray-500">Update your name, email address, and WhatsApp mobile number</p>
                            </div>

                            <form action="{{ route('account.profile.update') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="prof_name" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Full Name</label>
                                    <input type="text" name="name" id="prof_name" required value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="prof_email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Email Address</label>
                                        <input type="email" name="email" id="prof_email" required value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                    </div>
                                    <div>
                                        <label for="prof_phone" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Mobile / WhatsApp</label>
                                        <input type="tel" name="phone" id="prof_phone" required value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                    </div>
                                </div>

                                <button type="submit" class="py-2.5 px-6 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] font-heading shadow-sm transition-colors cursor-pointer">
                                    Save Profile Changes
                                </button>
                            </form>
                        </div>

                        <!-- Password Security Form -->
                        <div class="bg-white rounded-[20px] border border-[#EADBCC] p-5 sm:p-8 shadow-sm space-y-6">
                            <div class="pb-3 border-b border-[#EADBCC]">
                                <h2 class="text-xl font-black text-[#121212] font-heading">Account Security</h2>
                                <p class="text-xs text-gray-500">Change your password to keep your sacred portal secure</p>
                            </div>

                            <form action="{{ route('account.password.update') }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="current_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Current Password</label>
                                    <input type="password" name="current_password" id="current_password" required placeholder="••••••••" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="new_password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">New Password</label>
                                        <input type="password" name="password" id="new_password" required placeholder="Min. 6 characters" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                    </div>
                                    <div>
                                        <label for="password_conf" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Confirm New Password</label>
                                        <input type="password" name="password_confirmation" id="password_conf" required placeholder="Re-enter new password" class="w-full px-4 py-2.5 bg-[#FAF7F2] border border-[#EADBCC] rounded-[10px] text-sm focus:bg-white focus:outline-none focus:border-[#D38928]">
                                    </div>
                                </div>

                                <button type="submit" class="py-2.5 px-6 bg-[#121212] hover:bg-[#D38928] text-white text-xs font-bold rounded-[8px] font-heading shadow-sm transition-colors cursor-pointer">
                                    Update Password
                                </button>
                            </form>
                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>
</div>
@endsection
