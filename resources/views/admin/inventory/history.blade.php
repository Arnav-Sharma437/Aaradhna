@extends('layouts.admin')

@section('title', 'Inventory Audit Log & History')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header & Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.inventory.index') }}" class="p-2 text-gray-500 hover:text-[#202223] hover:bg-white rounded-[8px] border border-transparent hover:border-[#E1E3E5] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                    Inventory Audit History
                </h1>
                <p class="text-xs text-gray-500 font-medium">Complete immutable log of all inventory movements, restocks and adjustments.</p>
            </div>
        </div>

        <a 
            href="{{ route('admin.inventory.index') }}" 
            class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] transition-colors font-heading"
        >
            ← Back to Inventory List
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.inventory.history') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="relative w-full sm:max-w-md">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search logs by SKU, reason, or product title..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                @if(request()->filled('search'))
                    <a href="{{ route('admin.inventory.history') }}" class="p-2 text-gray-500 hover:text-red-600 hover:bg-gray-100 rounded-[8px] text-xs font-bold" title="Reset Search">
                        Reset Filter
                    </a>
                @endif
            </div>
        </form>

        <!-- Audit Log Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F7F8F9] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#E1E3E5]">
                    <tr>
                        <th class="px-5 py-3">Date / Time</th>
                        <th class="px-4 py-3">Product / SKU</th>
                        <th class="px-4 py-3">Variant Pack</th>
                        <th class="px-4 py-3">Quantity Delta</th>
                        <th class="px-4 py-3">Old → New Stock</th>
                        <th class="px-4 py-3">Reason / Description</th>
                        <th class="px-4 py-3 text-right">Modified By</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($logs as $log)
                        <tr class="hover:bg-[#F9FAFB] transition-colors">
                            <!-- Date & Time -->
                            <td class="px-5 py-3.5 font-mono text-[11px] text-gray-500 whitespace-nowrap">
                                {{ $log->created_at->format('M d, Y • H:i:s') }}
                            </td>

                            <!-- Product & SKU -->
                            <td class="px-4 py-3.5">
                                <div class="font-bold text-[#202223]">
                                    {{ $log->product->title ?? 'Product #' . $log->product_id }}
                                </div>
                                <span class="font-mono text-[10px] text-gray-400">SKU: {{ $log->sku ?: '—' }}</span>
                            </td>

                            <!-- Variant -->
                            <td class="px-4 py-3.5 text-gray-500">
                                {{ $log->variant->title ?? '— Main / Default —' }}
                            </td>

                            <!-- Delta Change -->
                            <td class="px-4 py-3.5">
                                <span class="inline-flex items-center px-2 py-0.5 rounded font-mono font-bold text-xs {{ $log->quantity_change > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : ($log->quantity_change < 0 ? 'bg-rose-50 text-rose-700 border border-rose-200' : 'bg-gray-100 text-gray-600') }}">
                                    {{ $log->quantity_change > 0 ? '+' : '' }}{{ $log->quantity_change }}
                                </span>
                            </td>

                            <!-- Old vs New -->
                            <td class="px-4 py-3.5 font-mono text-[11px] text-gray-600">
                                {{ $log->previous_quantity }} <span class="text-gray-400">→</span> <strong class="text-gray-900">{{ $log->new_quantity }}</strong>
                            </td>

                            <!-- Reason -->
                            <td class="px-4 py-3.5 text-gray-600">
                                {{ $log->reason }}
                            </td>

                            <!-- User -->
                            <td class="px-4 py-3.5 text-right font-medium text-gray-500">
                                {{ $log->user->name ?? 'Admin System' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="text-3xl">📋</div>
                                    <h4 class="text-sm font-bold text-[#202223] font-heading">No audit logs found</h4>
                                    <p class="text-xs text-gray-400">Stock updates and adjustments will automatically be logged here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] flex items-center justify-between bg-[#FCFCFD]">
                <div class="text-xs text-gray-500">
                    Showing <strong class="text-[#202223]">{{ $logs->firstItem() }}</strong> to <strong class="text-[#202223]">{{ $logs->lastItem() }}</strong> of <strong class="text-[#202223]">{{ $logs->total() }}</strong> log entries
                </div>
                <div>{{ $logs->links() }}</div>
            </div>
        @endif

    </div>

</div>
@endsection
