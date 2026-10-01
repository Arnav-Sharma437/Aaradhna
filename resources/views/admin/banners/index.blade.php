@extends('layouts.admin')

@section('title', 'Banners & Slider')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Homepage Banners &amp; Slider
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Manage hero sliders, festival promotion cards, and mobile storefront banners.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.banners.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                <span>+ Add Banner</span>
            </a>
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
                        <th class="py-3 px-4">Preview</th>
                        <th class="py-3 px-4">Banner Heading &amp; Subtitle</th>
                        <th class="py-3 px-4">CTA Button &amp; Link</th>
                        <th class="py-3 px-4 text-center">Sort Order</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($banners as $banner)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3 px-4">
                                <div class="w-20 h-12 rounded-[8px] overflow-hidden bg-gray-100 border border-[#E1E3E5]">
                                    <img src="{{ asset($banner->desktop_image_path) }}" alt="{{ $banner->title }}" class="w-full h-full object-cover">
                                </div>
                            </td>
                            <td class="py-3 px-4 max-w-sm">
                                <div class="font-bold text-[#1A1A1A] font-heading text-sm">{{ $banner->title }}</div>
                                <div class="text-gray-500 text-[11px] line-clamp-1">{{ $banner->subtitle }}</div>
                            </td>
                            <td class="py-3 px-4 text-gray-600">
                                <div class="font-bold text-[#1A1A1A]">{{ $banner->button_text ?? 'Shop Now' }}</div>
                                <div class="text-[11px] text-gray-400 font-mono">{{ $banner->button_link ?? '/' }}</div>
                            </td>
                            <td class="py-3 px-4 text-center font-bold text-gray-600">
                                {{ $banner->sort_order }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $banner->is_active ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $banner->is_active ? 'Active' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap space-x-1.5">
                                <a 
                                    href="{{ route('admin.banners.edit', $banner->id) }}" 
                                    class="px-2.5 py-1 bg-white hover:bg-gray-100 text-gray-700 border border-gray-200 rounded-[6px] font-bold text-xs"
                                >
                                    Edit
                                </a>
                                <form action="{{ route('admin.banners.toggle-status', $banner->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-1 text-[11px] font-medium border border-gray-200 rounded-[6px] hover:bg-gray-100 text-gray-600">
                                        {{ $banner->is_active ? 'Hide' : 'Show' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete banner?');">
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
                                No banners found. Click "+ Add Banner" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
