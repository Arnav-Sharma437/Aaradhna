@extends('layouts.admin')

@section('title', 'Upload New Video Reel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Top Breadcrumb & Action -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2 text-xs text-gray-500 font-mono">
            <a href="{{ route('admin.reels.index') }}" class="hover:text-[#D38928]">← Video Reels</a>
            <span>/</span>
            <span class="text-[#1A1A1A] font-bold">New Video Reel</span>
        </div>

        <a href="{{ route('admin.reels.index') }}" class="text-xs text-gray-500 hover:text-gray-800 font-bold">
            Cancel
        </a>
    </div>

    <!-- Header -->
    <div>
        <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
            Upload Video Reel
        </h1>
        <p class="text-xs text-gray-500 font-medium">
            Upload an MP4/WebM video reel to display on the homepage "Experience Divine Fragrance" shoppable slider.
        </p>
    </div>

    @if($errors->any())
        <div class="p-4 rounded-[10px] bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium space-y-1">
            <div class="font-bold">Please correct the following errors:</div>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.reels.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- 1. Video Upload & Live Preview Card -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-6 shadow-2xs space-y-4">
            <h2 class="text-sm font-bold font-heading text-[#121212] uppercase tracking-wider border-b border-gray-100 pb-3 flex items-center justify-between">
                <span>1. Video Source (Reel Video) <span class="text-rose-500">*</span></span>
                <span class="text-[11px] font-mono font-normal text-gray-400 lowercase">mp4, webm, mov up to 50MB</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                <!-- Video File Upload Area (Left 8 cols) -->
                <div class="md:col-span-8 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">
                            Upload Video File
                        </label>
                        <div class="border-2 border-dashed border-[#D2D5D8] hover:border-[#D38928] rounded-[10px] p-6 text-center cursor-pointer transition-colors bg-[#FAFBFB]">
                            <input 
                                type="file" 
                                name="video_file" 
                                id="video_file" 
                                accept="video/mp4,video/webm,video/quicktime"
                                class="hidden" 
                                onchange="previewVideo(event)"
                            >
                            <label for="video_file" class="cursor-pointer flex flex-col items-center space-y-2">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span class="text-xs font-bold text-[#D38928]">Click to choose video file</span>
                                <span class="text-[11px] text-gray-400" id="video-filename">Supports MP4, WebM (Recommended: 9:16 vertical ratio)</span>
                            </label>
                        </div>
                    </div>

                    <!-- OR URL input -->
                    <div>
                        <label for="video_url" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Or Video URL / Asset Path
                        </label>
                        <input 
                            type="text" 
                            name="video_url" 
                            id="video_url" 
                            value="{{ old('video_url') }}"
                            placeholder="e.g. assets/videos/reel-video-1.mp4 or https://..."
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                            oninput="updateUrlPreview(this.value)"
                        >
                    </div>

                    <!-- Poster / Cover Image Upload -->
                    <div>
                        <label for="poster_file" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Optional Video Poster / Cover Image
                        </label>
                        <input 
                            type="file" 
                            name="poster_file" 
                            id="poster_file" 
                            accept="image/*"
                            class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                        >
                        <p class="text-[11px] text-gray-400 mt-1">Image displayed before video starts playing.</p>
                    </div>
                </div>

                <!-- Live Video Preview (Right 4 cols) -->
                <div class="md:col-span-4 flex flex-col items-center">
                    <span class="text-[10px] font-mono text-gray-400 uppercase tracking-wider mb-2">Live Preview (9:16)</span>
                    <div class="w-40 aspect-[9/16] rounded-[16px] overflow-hidden bg-black border-2 border-[#D2D5D8] relative shadow-md flex items-center justify-center">
                        <video 
                            id="preview-player" 
                            class="w-full h-full object-cover hidden" 
                            controls 
                            playsinline
                        ></video>
                        <div id="preview-placeholder" class="text-center p-3 text-white/50 text-[11px]">
                            <svg class="w-8 h-8 mx-auto mb-1 text-white/30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Select video to preview
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Product Linking & Details Card -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-6 shadow-2xs space-y-4">
            <h2 class="text-sm font-bold font-heading text-[#121212] uppercase tracking-wider border-b border-gray-100 pb-3">
                2. Linked Product &amp; Information
            </h2>

            <div class="space-y-4">
                <!-- Select Linked Product -->
                <div>
                    <label for="product_id" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Link Catalog Product (Optional — Auto-fills Price, MRP, and Add to Cart)
                    </label>
                    <select 
                        name="product_id" 
                        id="product_id" 
                        class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium text-gray-800 focus:outline-none focus:border-[#D38928]"
                        onchange="onProductSelect(this)"
                    >
                        <option value="">— No Product Linked (Custom Reel) —</option>
                        @foreach($products as $p)
                            <option 
                                value="{{ $p->id }}" 
                                data-title="{{ $p->title }}"
                                data-slug="{{ $p->slug }}"
                                data-price="{{ $p->active_price }}"
                                data-mrp="{{ $p->base_price }}"
                                data-img="{{ $p->primary_image_url }}"
                                {{ old('product_id') == $p->id ? 'selected' : '' }}
                            >
                                {{ $p->title }} (₹{{ number_format($p->active_price, 2) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Title & Subtitle -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="title" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Reel Title <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            value="{{ old('title') }}" 
                            required
                            placeholder="e.g. Sandalwood (चंदन)" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="subtitle" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Subtitle / Tagline
                        </label>
                        <input 
                            type="text" 
                            name="subtitle" 
                            id="subtitle" 
                            value="{{ old('subtitle') }}" 
                            placeholder="e.g. Sacred Mysore Sandalwood Dhoop" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- Pricing & Discount -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="price" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Sale Price (₹)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="price" 
                            id="price" 
                            value="{{ old('price') }}" 
                            placeholder="e.g. 289" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold font-heading focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="mrp" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            MRP / Compare At (₹)
                        </label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="mrp" 
                            id="mrp" 
                            value="{{ old('mrp') }}" 
                            placeholder="e.g. 375" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold font-heading text-gray-500 focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="discount" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Discount Label
                        </label>
                        <input 
                            type="text" 
                            name="discount" 
                            id="discount" 
                            value="{{ old('discount') }}" 
                            placeholder="e.g. 23% OFF" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold text-emerald-600 focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- Social Proof Metrics -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label for="views" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Views Badge
                        </label>
                        <input 
                            type="text" 
                            name="views" 
                            id="views" 
                            value="{{ old('views', '2.8k') }}" 
                            placeholder="e.g. 2.8k" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="likes" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Likes Text
                        </label>
                        <input 
                            type="text" 
                            name="likes" 
                            id="likes" 
                            value="{{ old('likes', '380 Likes') }}" 
                            placeholder="e.g. 380 Likes" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="rating" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Rating &amp; Reviews Text
                        </label>
                        <input 
                            type="text" 
                            name="rating" 
                            id="rating" 
                            value="{{ old('rating', '4.9 (1,240 Reviews)') }}" 
                            placeholder="e.g. 4.9 (1,240 Reviews)" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- Product Thumbnail file -->
                <div>
                    <label for="thumbnail_file" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Optional Product Thumbnail Image (Card Bottom Circle)
                    </label>
                    <input 
                        type="file" 
                        name="thumbnail_file" 
                        id="thumbnail_file" 
                        accept="image/*"
                        class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                    >
                    <p class="text-[11px] text-gray-400 mt-1">If empty, linked product's primary image will be automatically used.</p>
                </div>
            </div>
        </div>

        <!-- 3. Drawer Popup Details (Why Choose & Perfect For) -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-6 shadow-2xs space-y-4">
            <h2 class="text-sm font-bold font-heading text-[#121212] uppercase tracking-wider border-b border-gray-100 pb-3">
                3. Reel Drawer Features &amp; Ritual Points (Popup Drawer)
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="why_choose" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Why Choose (1 point per line)
                    </label>
                    <textarea 
                        name="why_choose" 
                        id="why_choose" 
                        rows="4" 
                        placeholder="100% Charcoal-Free & Bamboo-Less&#10;Pure Mysore Sandalwood & Natural Herbs&#10;45+ Mins Long Burning Time per Stick&#10;Zero Toxic Smoke, 100% Organic"
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                    >{{ old('why_choose') }}</textarea>
                </div>

                <div>
                    <label for="perfect_for" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Perfect For (1 point per line)
                    </label>
                    <textarea 
                        name="perfect_for" 
                        id="perfect_for" 
                        rows="4" 
                        placeholder="Daily Morning & Evening Puja&#10;Meditation, Yoga & Stress Relief&#10;Purifying Home Energy & Aura"
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                    >{{ old('perfect_for') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 4. Publishing & Organization -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-6 shadow-2xs space-y-4">
            <h2 class="text-sm font-bold font-heading text-[#121212] uppercase tracking-wider border-b border-gray-100 pb-3">
                4. Organization &amp; Visibility
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-center">
                <div>
                    <label for="sort_order" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Sort Order (Lower numbers appear first on homepage)
                    </label>
                    <input 
                        type="number" 
                        name="sort_order" 
                        id="sort_order" 
                        value="{{ old('sort_order', 0) }}" 
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono font-bold focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="pt-4">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', true) ? 'checked' : '' }}
                            class="w-4 h-4 text-[#D38928] rounded border-gray-300"
                        >
                        <span class="text-xs font-bold text-[#121212]">Active (Visible in Homepage Reel Slider)</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end space-x-3 pt-2">
            <a href="{{ route('admin.reels.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-[8px] text-xs transition-colors">
                Cancel
            </a>
            <button 
                type="submit" 
                class="px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] text-xs shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                Save &amp; Publish Video Reel
            </button>
        </div>
    </form>
</div>

<script>
function previewVideo(event) {
    const file = event.target.files[0];
    const player = document.getElementById('preview-player');
    const placeholder = document.getElementById('preview-placeholder');
    const filenameLabel = document.getElementById('video-filename');

    if (file) {
        filenameLabel.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(1) + ' MB)';
        const url = URL.createObjectURL(file);
        player.src = url;
        player.classList.remove('hidden');
        placeholder.classList.add('hidden');
        player.play().catch(() => {});
    }
}

function updateUrlPreview(url) {
    const player = document.getElementById('preview-player');
    const placeholder = document.getElementById('preview-placeholder');
    if (url && url.trim().length > 3) {
        player.src = url.trim();
        player.classList.remove('hidden');
        placeholder.classList.add('hidden');
    }
}

function onProductSelect(select) {
    const opt = select.options[select.selectedIndex];
    if (!opt || !opt.value) return;

    const titleInput = document.getElementById('title');
    const priceInput = document.getElementById('price');
    const mrpInput = document.getElementById('mrp');
    const discountInput = document.getElementById('discount');

    if (titleInput && (!titleInput.value || titleInput.value.trim() === '')) {
        titleInput.value = opt.getAttribute('data-title') || '';
    }
    if (priceInput && (!priceInput.value || priceInput.value.trim() === '')) {
        priceInput.value = opt.getAttribute('data-price') || '';
    }
    if (mrpInput && (!mrpInput.value || mrpInput.value.trim() === '')) {
        mrpInput.value = opt.getAttribute('data-mrp') || '';
    }
    if (discountInput && (!discountInput.value || discountInput.value.trim() === '')) {
        const p = parseFloat(opt.getAttribute('data-price') || '0');
        const m = parseFloat(opt.getAttribute('data-mrp') || '0');
        if (m > p && m > 0) {
            discountInput.value = Math.round(((m - p) / m) * 100) + '% OFF';
        }
    }
}
</script>
@endsection
