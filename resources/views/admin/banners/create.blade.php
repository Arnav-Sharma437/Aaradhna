@extends('layouts.admin')

@section('title', 'Add Banner')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center space-x-2 text-xs text-gray-500 font-medium">
        <a href="{{ route('admin.banners.index') }}" class="hover:text-[#D38928]">← Banners &amp; Slider</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">New Banner</span>
    </div>

    <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
        Add Homepage Banner
    </h1>

    @if($errors->any())
        <div class="p-4 rounded-[10px] bg-rose-50 border border-rose-200 text-rose-800 text-xs font-bold space-y-1">
            @foreach($errors->all() as $error)
                <div>⚠ {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-6 sm:p-8">
        <form action="{{ route('admin.banners.store') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Banner Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Pure Vedic Bambooless Agarbatti" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium focus:border-[#D38928] focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Subtitle / Tagline</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g. 100% Charcoal-Free Temple Grade Fragrances for Morning Sadhna" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Desktop Image Asset Path *</label>
                        <input type="text" name="desktop_image_path" required value="{{ old('desktop_image_path', 'assets/images/banner1.jpg') }}" placeholder="assets/images/banner1.jpg" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Mobile Image Asset Path</label>
                        <input type="text" name="mobile_image_path" value="{{ old('mobile_image_path', 'assets/images/banner1.jpg') }}" placeholder="assets/images/banner1.jpg" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">CTA Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', 'Shop Sacred Collection') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Button Target Link</label>
                        <input type="text" name="button_link" value="{{ old('button_link', '/collections/all') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" value="1" id="banner_active" checked class="text-[#D38928] rounded focus:ring-0">
                    <label for="banner_active" class="text-xs text-gray-700 font-bold cursor-pointer">Visible on Storefront</label>
                </div>
            </div>

            <div class="pt-4 border-t border-[#E1E3E5] flex justify-end gap-3">
                <a href="{{ route('admin.banners.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-[8px] transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] font-heading shadow-xs transition-colors cursor-pointer">
                    Save Banner
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
