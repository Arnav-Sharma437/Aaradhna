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
        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-xs font-body">
            @csrf

            <div class="space-y-5">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Banner Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Pure Vedic Bambooless Agarbatti" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium focus:border-[#D38928] focus:outline-none">
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Subtitle / Tagline</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle') }}" placeholder="e.g. 100% Charcoal-Free Temple Grade Fragrances for Morning Sadhna" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                </div>

                <!-- Banner Image Upload Section (Desktop & Mobile) -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 p-4 rounded-xl bg-[#FAF8F5] border border-[#EADBCC]">
                    
                    <!-- Desktop Banner File Upload -->
                    <div class="space-y-2">
                        <label class="block font-bold text-gray-800 uppercase tracking-wider font-heading">
                            Desktop Banner Image *
                        </label>
                        <p class="text-[11px] text-gray-500">Recommended: 1920×800px (JPG, PNG, WebP)</p>
                        
                        <div class="relative border-2 border-dashed border-[#D2D5D8] hover:border-[#D38928] rounded-xl p-4 bg-white text-center transition-colors cursor-pointer group">
                            <input 
                                type="file" 
                                name="desktop_image_file" 
                                id="desktop_image_file" 
                                accept="image/*" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                onchange="previewBanner(this, 'desktop-preview')"
                            >
                            <div id="desktop-preview" class="hidden mb-2 rounded-lg overflow-hidden max-h-36 bg-stone-100 flex items-center justify-center">
                                <img src="" alt="Preview" class="max-h-36 w-full object-cover">
                            </div>
                            <div class="space-y-1 py-2">
                                <svg class="w-8 h-8 mx-auto text-gray-400 group-hover:text-[#D38928] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-xs font-bold text-[#D38928] block">Click to Upload Desktop Image</span>
                                <span class="text-[10px] text-gray-400 block">or drag & drop here</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-semibold text-gray-500 uppercase mt-2 mb-0.5">Or Existing Asset Path</label>
                            <input type="text" name="desktop_image_path" value="{{ old('desktop_image_path', 'assets/images/hero-sacred.jpg') }}" placeholder="assets/images/hero-sacred.jpg" class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
                        </div>
                    </div>

                    <!-- Mobile Banner File Upload -->
                    <div class="space-y-2">
                        <label class="block font-bold text-gray-800 uppercase tracking-wider font-heading">
                            Mobile Banner Image (Optional)
                        </label>
                        <p class="text-[11px] text-gray-500">Recommended: 768×900px (JPG, PNG, WebP)</p>
                        
                        <div class="relative border-2 border-dashed border-[#D2D5D8] hover:border-[#D38928] rounded-xl p-4 bg-white text-center transition-colors cursor-pointer group">
                            <input 
                                type="file" 
                                name="mobile_image_file" 
                                id="mobile_image_file" 
                                accept="image/*" 
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                onchange="previewBanner(this, 'mobile-preview')"
                            >
                            <div id="mobile-preview" class="hidden mb-2 rounded-lg overflow-hidden max-h-36 bg-stone-100 flex items-center justify-center">
                                <img src="" alt="Preview" class="max-h-36 w-full object-cover">
                            </div>
                            <div class="space-y-1 py-2">
                                <svg class="w-8 h-8 mx-auto text-gray-400 group-hover:text-[#D38928] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-xs font-bold text-[#D38928] block">Click to Upload Mobile Image</span>
                                <span class="text-[10px] text-gray-400 block">or drag & drop here</span>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-semibold text-gray-500 uppercase mt-2 mb-0.5">Or Existing Mobile Asset Path</label>
                            <input type="text" name="mobile_image_path" value="{{ old('mobile_image_path') }}" placeholder="assets/images/hero-sacred-mobile.jpg" class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">CTA Button Text</label>
                        <input type="text" name="button_text" value="{{ old('button_text', 'Shop Sacred Collection') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Button Target Link</label>
                        <input type="text" name="button_link" value="{{ old('button_link', '/collections/bambooless') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:border-[#D38928] focus:outline-none">
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

<script>
    function previewBanner(input, previewId) {
        const previewContainer = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewContainer.classList.remove('hidden');
                previewContainer.querySelector('img').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
