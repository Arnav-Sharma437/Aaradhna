@extends('layouts.admin')

@section('title', 'Edit Collection: ' . $collection->title)

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header & Breadcrumbs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.collections.index') }}" class="p-2 text-gray-500 hover:text-[#202223] hover:bg-white rounded-[8px] border border-transparent hover:border-[#E1E3E5] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <div class="flex items-center space-x-2">
                    <h1 class="text-xl font-black font-heading text-[#1A1A1A]">{{ $collection->title }}</h1>
                    @if($collection->is_active)
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                            Active
                        </span>
                    @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">
                            Inactive
                        </span>
                    @endif
                </div>
                <p class="text-xs text-gray-500 font-medium">Collection • {{ $collection->products->count() }} {{ Str::plural('product', $collection->products->count()) }} linked</p>
            </div>
        </div>

        <div class="flex items-center space-x-2">
            <a 
                href="{{ route('collections.show', $collection->slug) }}" 
                target="_blank" 
                class="px-3 py-2 border border-[#D2D5D8] hover:bg-gray-100 text-gray-700 text-xs font-bold rounded-[8px] transition-colors flex items-center space-x-1.5"
            >
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                <span>View on Store</span>
            </a>
            <button type="submit" form="collection-edit-form" class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading">
                Save Changes
            </button>
        </div>
    </div>

    <!-- Errors banner -->
    @if ($errors->any())
        <div class="p-4 bg-rose-50 border border-rose-200 rounded-[10px] text-xs text-rose-800 space-y-1">
            <div class="font-bold flex items-center space-x-1.5">
                <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <span>Please fix the following validation errors:</span>
            </div>
            <ul class="list-disc list-inside space-y-0.5 text-[11px] text-rose-700 pl-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="collection-edit-form" method="POST" action="{{ route('admin.collections.update', $collection) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Main Column (2 spans) -->
            <div class="lg:col-span-2 space-y-6">

                <!-- 1. Title & Description -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Collection Details</h3>
                    
                    <div>
                        <label for="title" class="block text-xs font-bold text-[#202223] mb-1">
                            Collection Title <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title" 
                            value="{{ old('title', $collection->title) }}" 
                            required 
                            placeholder="e.g. Festive Collection" 
                            class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-bold text-[#202223] mb-1">
                            URL Handle / Slug <span class="text-rose-500">*</span>
                        </label>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-gray-50 border border-r-0 border-[#D2D5D8] rounded-l-[8px] text-xs text-gray-400 font-mono">
                                /collections/
                            </span>
                            <input 
                                type="text" 
                                name="slug" 
                                id="slug" 
                                value="{{ old('slug', $collection->slug) }}" 
                                required
                                class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-r-[8px] text-xs font-mono text-[#202223] focus:outline-none focus:border-[#D38928]"
                            >
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-[#202223] mb-1">
                            Description
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            placeholder="Describe this collection for your customers..." 
                            class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >{{ old('description', $collection->description) }}</textarea>
                    </div>
                </div>

                <!-- 2. Products Assignment -->
                @php
                    $assignedIds = $collection->products->pluck('id')->toArray();
                @endphp
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Products in Collection</h3>
                            <p class="text-[11px] text-gray-400">Select products that belong to this curated collection.</p>
                        </div>
                        <span id="selected-count" class="text-xs font-bold text-[#D38928] bg-[#FAF3EA] px-2.5 py-1 rounded-full border border-[#EADBCC]">
                            {{ count($assignedIds) }} selected
                        </span>
                    </div>

                    <div class="relative">
                        <input 
                            type="text" 
                            id="product-search" 
                            placeholder="Search catalog products..." 
                            class="w-full px-3 py-2 bg-gray-50 border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                            oninput="filterProductList(this.value)"
                        >
                    </div>

                    <div class="border border-[#E1E3E5] rounded-[10px] max-h-72 overflow-y-auto divide-y divide-gray-100" id="product-checklist">
                        @forelse($allProducts as $prod)
                            @php
                                $isAttached = in_array($prod->id, old('products', $assignedIds));
                            @endphp
                            <label class="product-item flex items-center justify-between p-3 hover:bg-[#FAF8F5] cursor-pointer transition-colors {{ $isAttached ? 'bg-amber-50/30' : '' }}" data-title="{{ strtolower($prod->title) }}">
                                <div class="flex items-center space-x-3">
                                    <input 
                                        type="checkbox" 
                                        name="products[]" 
                                        value="{{ $prod->id }}" 
                                        {{ $isAttached ? 'checked' : '' }}
                                        class="w-4 h-4 text-[#D38928] rounded border-gray-300 focus:ring-[#D38928] product-checkbox"
                                        onchange="updateProductCount()"
                                    >
                                    <div class="w-8 h-8 rounded bg-gray-100 border border-gray-200 overflow-hidden flex items-center justify-center shrink-0">
                                        @if($prod->featured_image_url)
                                            <img src="{{ str_starts_with($prod->featured_image_url, 'http') ? $prod->featured_image_url : asset($prod->featured_image_url) }}" class="w-full h-full object-cover">
                                        @else
                                            <span class="text-[10px]">🪔</span>
                                        @endif
                                    </div>
                                    <div>
                                        <span class="text-xs font-bold text-[#202223] block">{{ $prod->title }}</span>
                                        <span class="text-[10px] text-gray-400">₹{{ number_format($prod->base_price, 2) }} • Stock: {{ $prod->inventory_count }}</span>
                                    </div>
                                </div>
                                <span class="text-[10px] text-gray-400 font-mono">ID: {{ $prod->id }}</span>
                            </label>
                        @empty
                            <div class="p-4 text-center text-xs text-gray-400">No active products found in catalog.</div>
                        @endforelse
                    </div>
                </div>

                <!-- 3. Collection Media -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Collection Media</h3>
                    
                    @if($collection->image_path)
                        <div class="p-3 bg-gray-50 rounded-[10px] border border-gray-200 flex items-center space-x-4">
                            <div class="w-16 h-16 rounded-[8px] bg-white border border-gray-200 overflow-hidden shrink-0 flex items-center justify-center">
                                <img 
                                    src="{{ str_starts_with($collection->image_path, 'http') ? $collection->image_path : asset($collection->image_path) }}" 
                                    alt="{{ $collection->title }}" 
                                    class="w-full h-full object-cover"
                                    onerror="this.src='https://placehold.co/100x100?text=Collection'"
                                >
                            </div>
                            <div class="min-w-0 flex-1">
                                <span class="text-xs font-bold text-[#202223] block">Current Image</span>
                                <span class="text-[11px] text-gray-400 font-mono truncate block">{{ $collection->image_path }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-[#202223] mb-1">Upload New Image</label>
                            <input 
                                type="file" 
                                name="image_file" 
                                accept="image/*" 
                                class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:text-xs file:font-semibold file:bg-[#FAF3EA] file:text-[#965A15] hover:file:bg-[#F3E5D4]"
                            >
                        </div>

                        <div class="relative flex py-1 items-center">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span class="flex-shrink mx-3 text-[11px] text-gray-400 uppercase font-mono">Or specify image asset path</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <div>
                            <label for="image_path" class="block text-xs font-bold text-[#202223] mb-1">Image Asset Path / URL</label>
                            <input 
                                type="text" 
                                name="image_path" 
                                id="image_path" 
                                value="{{ old('image_path', $collection->image_path) }}" 
                                placeholder="assets/images/collection-incense.jpg" 
                                class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                            >
                        </div>

                        <div>
                            <label for="banner_path" class="block text-xs font-bold text-[#202223] mb-1">Hero Banner Path / URL (Optional)</label>
                            <input 
                                type="text" 
                                name="banner_path" 
                                id="banner_path" 
                                value="{{ old('banner_path', $collection->banner_path) }}" 
                                placeholder="assets/images/banners/festive-banner.jpg" 
                                class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                            >
                        </div>
                    </div>
                </div>

                <!-- 4. Search Engine Optimization (SEO) -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Search Engine Listing Preview</h3>
                    
                    <div>
                        <label for="meta_title" class="block text-xs font-bold text-[#202223] mb-1">Page Title</label>
                        <input 
                            type="text" 
                            name="meta_title" 
                            id="meta_title" 
                            value="{{ old('meta_title', $collection->meta_title) }}" 
                            placeholder="{{ $collection->title }} | ISHANAA" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="meta_description" class="block text-xs font-bold text-[#202223] mb-1">Meta Description</label>
                        <textarea 
                            name="meta_description" 
                            id="meta_description" 
                            rows="2" 
                            placeholder="Explore our handpicked curation of sacred aromas and devotional products." 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >{{ old('meta_description', $collection->meta_description) }}</textarea>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Column (1 span) -->
            <div class="space-y-6">

                <!-- 1. Status & Sort -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Status &amp; Display</h3>

                    <div>
                        <label for="is_active" class="block text-xs font-bold text-[#202223] mb-1">Status</label>
                        <select 
                            name="is_active" 
                            id="is_active" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                            <option value="1" {{ old('is_active', $collection->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Active (Visible on Store)</option>
                            <option value="0" {{ old('is_active', $collection->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Inactive (Draft / Hidden)</option>
                        </select>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-xs font-bold text-[#202223] mb-1">Sort Order</label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            id="sort_order" 
                            value="{{ old('sort_order', $collection->sort_order) }}" 
                            min="0" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- 2. Promotional Discount Rule -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Promotion / Discount Rule</h3>

                    <div>
                        <label for="discount_rule_type" class="block text-xs font-bold text-[#202223] mb-1">Rule Type</label>
                        <select 
                            name="discount_rule_type" 
                            id="discount_rule_type" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                            <option value="">None (Standard Pricing)</option>
                            <option value="PERCENTAGE" {{ old('discount_rule_type', $collection->discount_rule_type) === 'PERCENTAGE' ? 'selected' : '' }}>Percentage Off</option>
                            <option value="FIXED_DISCOUNT" {{ old('discount_rule_type', $collection->discount_rule_type) === 'FIXED_DISCOUNT' ? 'selected' : '' }}>Fixed Amount Off</option>
                            <option value="BUY_X_GET_Y" {{ old('discount_rule_type', $collection->discount_rule_type) === 'BUY_X_GET_Y' ? 'selected' : '' }}>Buy X Get Y Free</option>
                            <option value="BUNDLE_DEAL" {{ old('discount_rule_type', $collection->discount_rule_type) === 'BUNDLE_DEAL' ? 'selected' : '' }}>Bundle Deal</option>
                        </select>
                    </div>

                    <div>
                        <label for="discount_value" class="block text-xs font-bold text-[#202223] mb-1">Discount Value</label>
                        <input 
                            type="number" 
                            step="0.01" 
                            name="discount_value" 
                            id="discount_value" 
                            value="{{ old('discount_value', $collection->discount_value) }}" 
                            placeholder="e.g. 15 for 15%" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                    </div>
                </div>

                <!-- 3. Danger Zone -->
                <div class="bg-white rounded-[14px] border border-rose-200 p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-rose-600">Delete Collection</h3>
                    <p class="text-[11px] text-gray-500">
                        Permanently delete this collection. Products in this collection will not be deleted from your store catalog.
                    </p>
                    <button 
                        type="button" 
                        onclick="if(confirm('Are you sure you want to permanently delete collection \'{{ addslashes($collection->title) }}\'?')) { document.getElementById('delete-collection-form').submit(); }"
                        class="w-full py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold rounded-[8px] border border-rose-300 transition-colors"
                    >
                        Delete Collection
                    </button>
                </div>

            </div>

        </div>
    </form>

    <form id="delete-collection-form" method="POST" action="{{ route('admin.collections.destroy', $collection) }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

<script>
    function filterProductList(query) {
        const q = query.toLowerCase().trim();
        document.querySelectorAll('.product-item').forEach(item => {
            const title = item.getAttribute('data-title');
            item.style.display = title.includes(q) ? 'flex' : 'none';
        });
    }

    function updateProductCount() {
        const count = document.querySelectorAll('.product-checkbox:checked').length;
        document.getElementById('selected-count').innerText = `${count} product${count === 1 ? '' : 's'} selected`;
    }
</script>
@endsection
