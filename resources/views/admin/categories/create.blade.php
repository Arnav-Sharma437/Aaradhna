@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    <!-- Header & Breadcrumbs -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.categories.index') }}" class="p-2 text-gray-500 hover:text-[#202223] hover:bg-white rounded-[8px] border border-transparent hover:border-[#E1E3E5] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-xl font-black font-heading text-[#1A1A1A]">Add Category</h1>
                <p class="text-xs text-gray-500 font-medium">Create a category to structure your store catalog.</p>
            </div>
        </div>

        <div class="flex items-center space-x-2">
            <a href="{{ route('admin.categories.index') }}" class="px-3.5 py-2 border border-[#D2D5D8] hover:bg-gray-100 text-gray-700 text-xs font-bold rounded-[8px] transition-colors">
                Cancel
            </a>
            <button type="submit" form="category-form" class="px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading">
                Save Category
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

    <form id="category-form" method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Left Main Column (2 spans) -->
            <div class="lg:col-span-2 space-y-6">

                <!-- 1. Category Title & Description -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Category Details</h3>
                    
                    <div>
                        <label for="name" class="block text-xs font-bold text-[#202223] mb-1">
                            Category Name <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            required 
                            placeholder="e.g. Incense Sticks, Dhoop Cones, Puja Essentials" 
                            class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                            onkeyup="generateSlug(this.value)"
                        >
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-bold text-[#202223] mb-1">
                            URL Handle / Slug
                        </label>
                        <div class="flex items-center">
                            <span class="px-3 py-2.5 bg-gray-50 border border-r-0 border-[#D2D5D8] rounded-l-[8px] text-xs text-gray-400 font-mono">
                                /collections/
                            </span>
                            <input 
                                type="text" 
                                name="slug" 
                                id="slug" 
                                value="{{ old('slug') }}" 
                                placeholder="incense-sticks" 
                                class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-r-[8px] text-xs font-mono text-[#202223] focus:outline-none focus:border-[#D38928]"
                            >
                        </div>
                        <span class="text-[11px] text-gray-400 mt-1 block">Leave empty to auto-generate from category name.</span>
                    </div>

                    <div>
                        <label for="subtitle" class="block text-xs font-bold text-[#202223] mb-1">
                            Subtitle / Tagline
                        </label>
                        <input 
                            type="text" 
                            name="subtitle" 
                            id="subtitle" 
                            value="{{ old('subtitle') }}" 
                            placeholder="e.g. Pure Temple Fragrances & Handcrafted Aromas" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="description" class="block text-xs font-bold text-[#202223] mb-1">
                            Description
                        </label>
                        <textarea 
                            name="description" 
                            id="description" 
                            rows="4" 
                            placeholder="Describe this category for your shoppers..." 
                            class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- 2. Media / Images -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Category Media</h3>
                    
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-bold text-[#202223] mb-1">Upload Category Image</label>
                            <input 
                                type="file" 
                                name="image_file" 
                                accept="image/*" 
                                class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-[8px] file:border-0 file:text-xs file:font-semibold file:bg-[#FAF3EA] file:text-[#965A15] hover:file:bg-[#F3E5D4]"
                            >
                        </div>

                        <div class="relative flex py-1 items-center">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span class="flex-shrink mx-3 text-[11px] text-gray-400 uppercase font-mono">Or use existing asset path</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <div>
                            <label for="image_path" class="block text-xs font-bold text-[#202223] mb-1">Image Asset Path / URL</label>
                            <input 
                                type="text" 
                                name="image_path" 
                                id="image_path" 
                                value="{{ old('image_path') }}" 
                                placeholder="assets/images/incense.jpg or https://..." 
                                class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                            >
                        </div>

                        <div>
                            <label for="banner_path" class="block text-xs font-bold text-[#202223] mb-1">Hero Banner Path / URL (Optional)</label>
                            <input 
                                type="text" 
                                name="banner_path" 
                                id="banner_path" 
                                value="{{ old('banner_path') }}" 
                                placeholder="assets/images/banners/category-banner.jpg" 
                                class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                            >
                        </div>
                    </div>
                </div>

                <!-- 3. Search Engine Optimization (SEO) -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Search Engine Listing Preview</h3>
                    
                    <div>
                        <label for="meta_title" class="block text-xs font-bold text-[#202223] mb-1">Page Title</label>
                        <input 
                            type="text" 
                            name="meta_title" 
                            id="meta_title" 
                            value="{{ old('meta_title') }}" 
                            placeholder="Buy Handcrafted Incense Sticks Online | Aaradhna" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                        >
                    </div>

                    <div>
                        <label for="meta_description" class="block text-xs font-bold text-[#202223] mb-1">Meta Description</label>
                        <textarea 
                            name="meta_description" 
                            id="meta_description" 
                            rows="2" 
                            placeholder="Shop sacred, natural temple incense crafted in Vrindavan. Organic ingredients for everyday prayers and meditation." 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                        >{{ old('meta_description') }}</textarea>
                    </div>
                </div>

            </div>

            <!-- Right Sidebar Column (1 span) -->
            <div class="space-y-6">

                <!-- 1. Category Status & Hierarchy -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-black uppercase font-mono tracking-wider text-gray-500">Status &amp; Hierarchy</h3>

                    <div>
                        <label for="is_active" class="block text-xs font-bold text-[#202223] mb-1">Status</label>
                        <select 
                            name="is_active" 
                            id="is_active" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                            <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active (Visible on Store)</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive (Draft / Hidden)</option>
                        </select>
                    </div>

                    <div>
                        <label for="parent_id" class="block text-xs font-bold text-[#202223] mb-1">Parent Category</label>
                        <select 
                            name="parent_id" 
                            id="parent_id" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                            <option value="">— None (Top-Level Category) —</option>
                            @foreach($parentCategories as $parent)
                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-[11px] text-gray-400 mt-1 block">Nest this category under an existing main department.</span>
                    </div>

                    <div>
                        <label for="sort_order" class="block text-xs font-bold text-[#202223] mb-1">Sort Order</label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            id="sort_order" 
                            value="{{ old('sort_order', 0) }}" 
                            min="0" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                        >
                        <span class="text-[11px] text-gray-400 mt-1 block">Lower numbers appear first on storefront menus.</span>
                    </div>
                </div>

                <!-- 2. Action Card -->
                <div class="bg-[#FAF8F5] rounded-[14px] border border-[#EADBCC] p-5 space-y-3">
                    <h4 class="text-xs font-bold text-[#965A15] font-heading">Ready to publish?</h4>
                    <p class="text-[11px] text-[#7A4B13]">
                        Saving this category creates the route <span class="font-mono font-bold">/collections/{slug}</span> and makes it selectable for products.
                    </p>
                    <button type="submit" form="category-form" class="w-full py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs transition-all font-heading">
                        Save Category
                    </button>
                </div>

            </div>

        </div>
    </form>

</div>

<script>
    function generateSlug(text) {
        const slugInput = document.getElementById('slug');
        if (!slugInput.dataset.manual) {
            slugInput.value = text.toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
        }
    }

    document.getElementById('slug').addEventListener('input', function() {
        this.dataset.manual = 'true';
    });
</script>
@endsection
