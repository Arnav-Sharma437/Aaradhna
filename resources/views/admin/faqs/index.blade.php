@extends('layouts.admin')

@section('title', 'FAQs Management')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Frequently Asked Questions (FAQs)
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Manage common devotee questions regarding purity, bambooless burning, and shipping.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <button 
                type="button" 
                onclick="document.getElementById('faq-add-modal').classList.remove('hidden'); document.getElementById('faq-add-modal').classList.add('flex');"
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                <span>+ Add FAQ</span>
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.faqs.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
                <div class="sm:col-span-8 relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search FAQ questions or answers..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="sm:col-span-4 flex gap-2">
                    <select 
                        name="category" 
                        onchange="this.form.submit()"
                        class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="all">All Categories</option>
                        <option value="general" {{ request('category') === 'general' ? 'selected' : '' }}>General Purity</option>
                        <option value="rituals" {{ request('category') === 'rituals' ? 'selected' : '' }}>Rituals &amp; Vidhi</option>
                        <option value="shipping" {{ request('category') === 'shipping' ? 'selected' : '' }}>Shipping &amp; Delivery</option>
                        <option value="returns" {{ request('category') === 'returns' ? 'selected' : '' }}>Damages &amp; Returns</option>
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
                        <th class="py-3 px-4">Question</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Answer Summary</th>
                        <th class="py-3 px-4 text-center">Order</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($faqs as $faq)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A] max-w-xs">
                                {{ $faq->question }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="bg-[#FAF7F2] border border-[#EADBCC] text-[#D38928] px-2 py-0.5 rounded text-[10px] uppercase font-mono font-bold">
                                    {{ $faq->category }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-gray-600 max-w-sm">
                                <p class="line-clamp-2 leading-relaxed">{{ $faq->answer }}</p>
                            </td>
                            <td class="py-3.5 px-4 text-center font-bold text-gray-500">
                                {{ $faq->sort_order }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $faq->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $faq->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap space-x-1.5">
                                <form action="{{ route('admin.faqs.toggle-status', $faq->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2.5 py-1 text-[11px] font-medium border border-gray-200 rounded-[6px] hover:bg-gray-100 text-gray-600">
                                        {{ $faq->is_active ? 'Hide' : 'Show' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete FAQ?');">
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
                            <td colspan="6" class="text-center py-12 text-gray-400">
                                No FAQs found. Click "+ Add FAQ" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($faqs->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $faqs->links() }}
            </div>
        @endif
    </div>

    <!-- ADD FAQ MODAL -->
    <div id="faq-add-modal" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-xs hidden items-center justify-center p-4">
        <div class="bg-white rounded-[14px] max-w-lg w-full p-6 space-y-4 shadow-2xl border border-[#E1E3E5]">
            <div class="flex items-center justify-between pb-3 border-b border-[#E1E3E5]">
                <h3 class="text-base font-bold text-[#1A1A1A] font-heading">Add New FAQ Question</h3>
                <button type="button" onclick="document.getElementById('faq-add-modal').classList.add('hidden'); document.getElementById('faq-add-modal').classList.remove('flex');" class="text-gray-400 hover:text-gray-700 text-xl font-bold">&times;</button>
            </div>

            <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Question *</label>
                    <input type="text" name="question" required placeholder="e.g. Why are sticks bambooless?" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] focus:border-[#D38928] focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Category *</label>
                    <select name="category" required class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] focus:border-[#D38928] focus:outline-none">
                        <option value="general">General Vedic Purity</option>
                        <option value="rituals">Rituals &amp; Vidhi</option>
                        <option value="shipping">Shipping &amp; Delivery</option>
                        <option value="returns">Damages &amp; Replacements</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-1">Detailed Answer *</label>
                    <textarea name="answer" rows="4" required placeholder="Enter clear, helpful answer..." class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] focus:border-[#D38928] focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block font-bold text-gray-700 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" value="0" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] focus:border-[#D38928] focus:outline-none">
                    </div>
                    <div class="flex items-center pt-5">
                        <label class="flex items-center gap-1.5 font-bold text-gray-700 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" checked class="text-[#D38928] rounded">
                            <span>Active / Visible</span>
                        </label>
                    </div>
                </div>

                <div class="pt-3 border-t border-[#E1E3E5] flex justify-end gap-2">
                    <button type="button" onclick="document.getElementById('faq-add-modal').classList.add('hidden'); document.getElementById('faq-add-modal').classList.remove('flex');" class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-[8px] font-bold">Cancel</button>
                    <button type="submit" class="px-5 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white rounded-[8px] font-bold font-heading">Save FAQ</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
