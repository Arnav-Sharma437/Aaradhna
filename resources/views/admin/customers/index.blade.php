@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Devotees &amp; Customers
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                View registered devotees, their order counts, and lifetime pooja expenditures.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-xs text-gray-600 bg-white border border-[#E1E3E5] px-3 py-1.5 rounded-[8px] font-bold font-mono">
                Total Customers: {{ $totalCustomers }} (Active: {{ $activeCustomers }})
            </span>
        </div>
    </div>

    <!-- Flash message -->
    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- Search & Table Card -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.customers.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by Devotee Name, Email, or Mobile Phone..." 
                    class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                >
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4">Devotee Name</th>
                        <th class="py-3 px-4">Contact Details</th>
                        <th class="py-3 px-4">Orders Placed</th>
                        <th class="py-3 px-4">Total Spent</th>
                        <th class="py-3 px-4">Joined Date</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($customers as $customer)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A]">
                                <div class="flex items-center space-x-2.5">
                                    <div class="w-8 h-8 rounded-full bg-[#FAF7F2] border border-[#EADBCC] text-[#D38928] font-black flex items-center justify-center font-heading text-xs">
                                        {{ strtoupper(substr($customer->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.customers.show', $customer->id) }}" class="font-bold text-[#1A1A1A] hover:text-[#D38928]">
                                            {{ $customer->name }}
                                        </a>
                                        <span class="text-[10px] text-[#D38928] block">✦ Devotee Member</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-gray-600">
                                <div>{{ $customer->email }}</div>
                                <div class="text-[11px] text-gray-400">{{ $customer->phone ?? 'No phone' }}</div>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A]">
                                {{ $customer->orders_count }} order(s)
                            </td>
                            <td class="py-3.5 px-4 font-black font-heading text-[#C87A1E]">
                                ₹{{ number_format($customer->orders_sum_total_amount ?? 0, 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-gray-500 whitespace-nowrap">
                                {{ $customer->created_at->format('d M, Y') }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $customer->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $customer->is_active ? 'Active' : 'Disabled' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap space-x-1.5">
                                <a 
                                    href="{{ route('admin.customers.show', $customer->id) }}" 
                                    class="px-3 py-1 bg-[#FAF7F2] hover:bg-[#D38928] text-[#1A1A1A] hover:text-white border border-[#EADBCC] rounded-[6px] font-bold text-xs transition-colors"
                                >
                                    Profile ➔
                                </a>
                                <form action="{{ route('admin.customers.toggle-status', $customer->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2.5 py-1 text-[11px] font-medium border border-gray-200 rounded-[6px] hover:bg-gray-100 text-gray-600">
                                        {{ $customer->is_active ? 'Disable' : 'Enable' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-gray-400">
                                No registered devotees found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($customers->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $customers->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
