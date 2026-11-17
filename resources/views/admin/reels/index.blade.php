@extends('layouts.admin')

@section('title', 'Video Reels & Shoppable Videos')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Shoppable Video Reels ("Experience Divine Fragrance")
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Upload and manage videos, customer unboxings, and product reels displayed on the homepage slider.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.reels.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                <span>+ Upload New Reel</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs">
            <span class="text-[10px] font-mono text-gray-500 uppercase tracking-wider block">Total Reels</span>
            <span class="text-xl font-bold font-heading text-[#121212]">{{ $totalReels }}</span>
        </div>
        <div class="bg-white p-4 rounded-[12px] border border-[#E1E3E5] shadow-2xs">
            <span class="text-[10px] font-mono text-gray-500 uppercase tracking-wider block">Active On Homepage</span>
            <span class="text-xl font-bold font-heading text-emerald-600">{{ $activeReels }}</span>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4 w-28 text-center">Video Reel</th>
                        <th class="py-3 px-4">Title &amp; Subtitle</th>
                        <th class="py-3 px-4">Linked Product</th>
                        <th class="py-3 px-4 text-center">Metrics</th>
                        <th class="py-3 px-4 text-center">Sort Order</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($reels as $reel)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <!-- Video Thumbnail / Player Preview -->
                            <td class="py-3 px-4 text-center">
                                <div class="relative w-16 h-28 mx-auto rounded-[10px] overflow-hidden bg-black border border-[#E1E3E5] shadow-xs group">
                                    <video 
                                        src="{{ $reel->video_src }}" 
                                        poster="{{ $reel->poster_src }}" 
                                        class="w-full h-full object-cover" 
                                        muted 
                                        loop 
                                        playsinline 
                                        onmouseover="this.play()" 
                                        onmouseout="this.pause()"
                                    ></video>
                                    <div class="absolute bottom-1 right-1 px-1 py-0.5 rounded bg-black/60 text-[9px] text-white font-mono pointer-events-none">
                                        ▶
                                    </div>
                                </div>
                            </td>

                            <!-- Title & Subtitle -->
                            <td class="py-3 px-4 max-w-xs">
                                <div class="font-bold text-[#1A1A1A] font-heading text-sm">{{ $reel->title }}</div>
                                <div class="text-gray-500 text-[11px] line-clamp-1">{{ $reel->subtitle ?: 'Sacred Vedic Living' }}</div>
                                <div class="text-[10px] text-gray-400 font-mono mt-0.5 truncate">{{ $reel->video_url }}</div>
                            </td>

                            <!-- Linked Product & Price -->
                            <td class="py-3 px-4 max-w-xs">
                                @if($reel->product)
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full overflow-hidden bg-gray-50 border border-gray-200 shrink-0">
                                            <img src="{{ $reel->thumbnail_src }}" alt="{{ $reel->product->title }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <a href="{{ route('admin.products.edit', $reel->product) }}" class="font-bold text-[#121212] hover:text-[#C18129] block truncate max-w-[180px]">
                                                {{ $reel->product->title }}
                                            </a>
                                            <div class="text-[11px] text-gray-500">
                                                <span class="font-bold text-[#C87A1E]">₹{{ number_format($reel->display_price, 2) }}</span>
                                                @if($reel->display_mrp > $reel->display_price)
                                                    <span class="line-through text-gray-400 ml-1">₹{{ number_format($reel->display_mrp, 2) }}</span>
                                                    <span class="text-emerald-600 font-bold ml-1">{{ $reel->display_discount }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-gray-400 italic">No direct product linked</div>
                                    <div class="text-[11px] font-bold text-[#C87A1E]">₹{{ number_format($reel->display_price, 2) }}</div>
                                @endif
                            </td>

                            <!-- Metrics -->
                            <td class="py-3 px-4 text-center">
                                <div class="inline-flex flex-col items-center space-y-0.5">
                                    <span class="px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 text-[10px] font-mono font-bold">
                                        👁 {{ $reel->views ?: '2.5k' }}
                                    </span>
                                    <span class="text-[10px] text-gray-400 font-mono">
                                        ♥ {{ $reel->likes ?: '350' }}
                                    </span>
                                </div>
                            </td>

                            <!-- Sort Order -->
                            <td class="py-3 px-4 text-center">
                                <form method="POST" action="{{ route('admin.reels.update-sort-order', $reel) }}" class="inline-flex items-center space-x-1">
                                    @csrf
                                    <input 
                                        type="number" 
                                        name="sort_order" 
                                        value="{{ $reel->sort_order }}" 
                                        class="w-14 px-2 py-1 bg-white border border-[#D2D5D8] rounded-[6px] text-center text-xs font-mono font-bold focus:outline-none focus:border-[#D38928]"
                                        onchange="this.form.submit()"
                                    >
                                </form>
                            </td>

                            <!-- Status -->
                            <td class="py-3 px-4 text-center">
                                <form method="POST" action="{{ route('admin.reels.toggle-status', $reel) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button 
                                        type="submit" 
                                        class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider transition-colors cursor-pointer {{ $reel->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100' : 'bg-gray-100 text-gray-500 border border-gray-300 hover:bg-gray-200' }}"
                                    >
                                        {{ $reel->is_active ? 'Active' : 'Hidden' }}
                                    </button>
                                </form>
                            </td>

                            <!-- Actions -->
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <div class="inline-flex items-center space-x-2">
                                    <a 
                                        href="{{ route('admin.reels.edit', $reel) }}" 
                                        class="p-1.5 rounded-[6px] hover:bg-gray-100 text-gray-600 hover:text-[#D38928] transition-colors"
                                        title="Edit Video Reel"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form 
                                        method="POST" 
                                        action="{{ route('admin.reels.destroy', $reel) }}" 
                                        class="inline"
                                        onsubmit="return confirm('Are you sure you want to permanently delete reel \'{{ addslashes($reel->title) }}\'?');"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="submit" 
                                            class="p-1.5 rounded-[6px] hover:bg-rose-50 text-gray-400 hover:text-rose-600 transition-colors cursor-pointer"
                                            title="Delete Reel"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-400">
                                <div class="max-w-sm mx-auto space-y-2">
                                    <p class="font-bold text-gray-600">No video reels uploaded yet.</p>
                                    <p class="text-xs">Click "+ Upload New Reel" above to add your first video reel.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($reels->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $reels->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
