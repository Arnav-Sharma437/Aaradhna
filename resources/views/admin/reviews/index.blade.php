@extends('layouts.admin')

@section('title', 'Product Reviews')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Devotee Product Reviews
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Moderate, approve, and manage customer feedback across sacred collections.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-xs text-gray-600 bg-white border border-[#E1E3E5] px-3 py-1.5 rounded-[8px] font-bold font-mono">
                Avg Rating: {{ $avgRating }} ★ ({{ $approvedReviews }} Approved)
            </span>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <!-- Status Tabs -->
    <div class="flex items-center space-x-2 border-b border-[#E1E3E5] pb-3 overflow-x-auto shopify-scrollbar">
        <a 
            href="{{ route('admin.reviews.index') }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ !request('status') ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            All Reviews <span class="ml-1 opacity-70">({{ $totalReviews }})</span>
        </a>
        <a 
            href="{{ route('admin.reviews.index', ['status' => 'approved']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'approved' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Approved <span class="ml-1 opacity-70">({{ $approvedReviews }})</span>
        </a>
        <a 
            href="{{ route('admin.reviews.index', ['status' => 'pending']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors shrink-0 {{ request('status') === 'pending' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Pending <span class="ml-1 opacity-70">({{ $pendingReviews }})</span>
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.reviews.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                <div class="sm:col-span-8 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search by Reviewer Name, Title, Product or Comment..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="sm:col-span-4 flex gap-2">
                    <select 
                        name="rating" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="all">All Star Ratings</option>
                        <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 Stars ★★★★★</option>
                        <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 Stars ★★★★☆</option>
                        <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 Stars ★★★☆☆</option>
                    </select>

                    <button type="submit" class="px-4 py-2 bg-[#1A1A1A] hover:bg-[#D38928] text-white text-xs font-bold rounded-[8px] transition-colors font-heading">
                        Filter
                    </button>
                </div>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4">Reviewer</th>
                        <th class="py-3 px-4">Product</th>
                        <th class="py-3 px-4">Rating</th>
                        <th class="py-3 px-4">Review &amp; Feedback</th>
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($reviews as $rev)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A]">
                                <div>{{ $rev->reviewer_name }}</div>
                                <span class="text-[10px] text-emerald-700 bg-emerald-50 px-1.5 py-0.2 rounded font-bold uppercase">Verified Buyer</span>
                            </td>
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A]">
                                {{ $rev->product->title ?? 'Sacred Product' }}
                            </td>
                            <td class="py-3.5 px-4 text-[#D38928] font-bold">
                                @for($i = 1; $i <= 5; $i++)
                                    <span>{{ $i <= $rev->rating ? '★' : '☆' }}</span>
                                @endfor
                            </td>
                            <td class="py-3.5 px-4 max-w-sm">
                                @if($rev->title)
                                    <div class="font-bold text-[#1A1A1A]">{{ $rev->title }}</div>
                                @endif
                                <p class="text-gray-600 line-clamp-2 leading-relaxed">{{ $rev->review_text }}</p>
                            </td>
                            <td class="py-3.5 px-4 text-gray-400 whitespace-nowrap text-[11px]">
                                {{ $rev->created_at ? $rev->created_at->format('d M, Y') : 'N/A' }}
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $rev->status === 'approved' ? 'bg-emerald-100 text-emerald-800' : ($rev->status === 'rejected' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800') }}">
                                    {{ $rev->status }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap space-x-1">
                                @if($rev->status !== 'approved')
                                    <form action="{{ route('admin.reviews.update-status', $rev->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="approved">
                                        <button type="submit" class="px-2 py-1 bg-emerald-600 hover:bg-emerald-700 text-white rounded-[6px] font-bold text-[11px]">
                                            Approve
                                        </button>
                                    </form>
                                @endif
                                @if($rev->status !== 'rejected')
                                    <form action="{{ route('admin.reviews.update-status', $rev->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="submit" class="px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-[6px] font-bold text-[11px]">
                                            Reject
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.reviews.destroy', $rev->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete review?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-rose-600 hover:bg-rose-50 rounded-[6px] text-[11px]">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-gray-400">
                                No customer reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($reviews->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $reviews->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
