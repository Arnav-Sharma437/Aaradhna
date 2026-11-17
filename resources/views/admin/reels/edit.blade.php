@extends('layouts.admin')

@section('title', 'Edit Video Reel: ' . $reel->title)

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Top Breadcrumb & Actions -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-2 text-xs text-gray-500 font-mono">
            <a href="{{ route('admin.reels.index') }}" class="hover:text-[#D38928]">← Video Reels</a>
            <span>/</span>
            <span class="text-[#1A1A1A] font-bold">Edit: {{ $reel->title }}</span>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.reels.index') }}" class="text-xs text-gray-500 hover:text-gray-800 font-bold">
                Cancel
            </a>
            <form 
                method="POST" 
                action="{{ route('admin.reels.destroy', $reel) }}" 
                onsubmit="return confirm('Permanently delete this video reel?');" 
                class="inline"
            >
                @csrf
                @method('DELETE')
                <button type="submit" class="text-xs text-rose-600 hover:text-rose-800 font-bold cursor-pointer">
                    Delete Reel
                </button>
            </form>
        </div>
    </div>

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Edit Video Reel
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Update reel video, thumbnail, product link, or change homepage order.
            </p>
        </div>

        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider {{ $reel->is_active ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-gray-100 text-gray-500 border border-gray-300' }}">
            {{ $reel->is_active ? 'Active' : 'Hidden' }}
        </span>
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

    <form method="POST" action="{{ route('admin.reels.update', $reel) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- 1. Video Upload & Live Preview Card -->
        <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-6 shadow-2xs space-y-4">
            <h2 class="text-sm font-bold font-heading text-[#121212] uppercase tracking-wider border-b border-gray-100 pb-3 flex items-center justify-between">
                <span>1. Video Source</span>
                <span class="text-[11px] font-mono font-normal text-gray-400 lowercase">mp4, webm up to 50MB</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start">
                <!-- Video File Upload Area (Left 8 cols) -->
                <div class="md:col-span-8 space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1.5">
                            Upload Replacement Video File (Optional)
                        </label>
                        <div class="border-2 border-dashed border-[#D2D5D8] hover:border-[#D38928] rounded-[10px] p-5 text-center cursor-pointer transition-colors bg-[#FAFBFB]">
                            <input 
                                type="file" 
                                name="video_file" 
                                id="video_file" 
                                accept="video/mp4,video/webm,video/quicktime"
                                class="hidden" 
                                onchange="previewVideo(event)"
                            >
                            <label for="video_file" class="cursor-pointer flex flex-col items-center space-y-2">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <span class="text-xs font-bold text-[#D38928]">Click to choose replacement video</span>
                                <span class="text-[11px] text-gray-400" id="video-filename">Leave empty to keep existing video file</span>
                            </label>
                        </div>
                    </div>

                    <!-- Current Video Path / URL input -->
                    <div>
                        <label for="video_url" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Current Video Path / URL
                        </label>
                        <input 
                            type="text" 
                            name="video_url" 
                            id="video_url" 
                            value="{{ old('video_url', $reel->video_url) }}"
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                            oninput="updateUrlPreview(this.value)"
                        >
                    </div>

                    <!-- Poster Image Upload -->
                    <div>
                        <label for="poster_file" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                            Update Poster / Cover Image (Optional)
                        </label>
                        <div class="flex items-center space-x-3">
                            @if($reel->poster)
                                <div class="w-10 h-14 rounded overflow-hidden bg-gray-100 border border-gray-200 shrink-0">
                                    <img src="{{ $reel->poster_src }}" alt="Poster" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <input 
                                type="file" 
                                name="poster_file" 
                                id="poster_file" 
                                accept="image/*"
                                class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                            >
                        </div>
                    </div>
                </div>

                <!-- Live Video Preview (Right 4 cols) -->
                <div class="md:col-span-4 flex flex-col items-center">
                    <span class="text-[10px] font-mono text-gray-400 uppercase tracking-wider mb-2">Current Video Player</span>
                    <div class="w-40 aspect-[9/16] rounded-[16px] overflow-hidden bg-black border-2 border-[#D2D5D8] relative shadow-md flex items-center justify-center">
                        <video 
                            id="preview-player" 
                            src="{{ $reel->video_src }}" 
                            poster="{{ $reel->poster_src }}" 
                            class="w-full h-full object-cover" 
                            controls 
                            playsinline
                        ></video>
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
                        Link Catalog Product (Optional)
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
                                {{ old('product_id', $reel->product_id) == $p->id ? 'selected' : '' }}
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
                            value="{{ old('title', $reel->title) }}" 
                            required
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
                            value="{{ old('subtitle', $reel->subtitle) }}" 
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
                            value="{{ old('price', $reel->price) }}" 
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
                            value="{{ old('mrp', $reel->mrp) }}" 
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
                            value="{{ old('discount', $reel->discount) }}" 
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
                            value="{{ old('views', $reel->views) }}" 
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
                            value="{{ old('likes', $reel->likes) }}" 
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
                            value="{{ old('rating', $reel->rating) }}" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- Product Thumbnail file -->
                <div>
                    <label for="thumbnail_file" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Update Product Thumbnail Image (Card Bottom Circle)
                    </label>
                    <div class="flex items-center space-x-3">
                        @if($reel->thumbnail)
                            <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-100 border border-gray-200 shrink-0">
                                <img src="{{ $reel->thumbnail_src }}" alt="Thumb" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <input 
                            type="file" 
                            name="thumbnail_file" 
                            id="thumbnail_file" 
                            accept="image/*"
                            class="w-full px-3 py-1.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
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
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                    >{{ old('why_choose', is_array($reel->why_choose) ? implode("\n", $reel->why_choose) : (is_array(json_decode($reel->why_choose, true)) ? implode("\n", json_decode($reel->why_choose, true)) : $reel->why_choose)) }}</textarea>
                </div>

                <div>
                    <label for="perfect_for" class="block text-xs font-bold text-gray-700 uppercase mb-1">
                        Perfect For (1 point per line)
                    </label>
                    <textarea 
                        name="perfect_for" 
                        id="perfect_for" 
                        rows="4" 
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]"
                    >{{ old('perfect_for', is_array($reel->perfect_for) ? implode("\n", $reel->perfect_for) : (is_array(json_decode($reel->perfect_for, true)) ? implode("\n", json_decode($reel->perfect_for, true)) : $reel->perfect_for)) }}</textarea>
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
                        value="{{ old('sort_order', $reel->sort_order) }}" 
                        class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono font-bold focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="pt-4">
                    <label class="flex items-center space-x-3 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', $reel->is_active) ? 'checked' : '' }}
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
                Save Changes
            </button>
        </div>
    </form>
</div>

<script>
function previewVideo(event) {
    const file = event.target.files[0];
    const player = document.getElementById('preview-player');
    const filenameLabel = document.getElementById('video-filename');

    if (file) {
        filenameLabel.textContent = file.name + ' (' + (file.size / 1024 / 1024).toFixed(1) + ' MB)';
        const url = URL.createObjectURL(file);
        player.src = url;
        player.play().catch(() => {});
    }
}

function updateUrlPreview(url) {
    const player = document.getElementById('preview-player');
    if (url && url.trim().length > 3) {
        player.src = url.trim();
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
