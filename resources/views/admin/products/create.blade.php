@extends('layouts.admin')

@section('title', 'Add New Product')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Header with Back Button -->
    <div class="flex items-center justify-between pb-2">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.index') }}" class="p-2 rounded-[8px] bg-white border border-[#E1E3E5] hover:bg-gray-50 text-gray-600 transition-colors" title="Back to Products">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                    Add Product
                </h1>
                <p class="text-xs text-gray-500 font-medium">Create a new sacred item with pricing, variants, inventory, and images.</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-white border border-[#E1E3E5] hover:bg-gray-50 text-xs font-bold text-gray-700 rounded-[8px] transition-colors">
                Discard
            </a>
            <button type="submit" form="product-create-form" class="px-5 py-2 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer">
                Save Product
            </button>
        </div>
    </div>

    <!-- Product Create Form (Shopify Polaris 2-Column Split) -->
    <form id="product-create-form" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- LEFT 8 COLUMNS: Core Content, Pricing, Media, Variants, SEO -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Card 1: Title & Description -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3">
                        General Information
                    </h3>

                    <div class="space-y-1.5">
                        <label for="title" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Product Title <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="title" 
                            name="title" 
                            value="{{ old('title') }}" 
                            required 
                            placeholder="e.g. Camphor (कपूर) Bambooless Sticks"
                            class="w-full px-3.5 py-2.5 bg-white border {{ $errors->has('title') ? 'border-rose-500' : 'border-[#D2D5D8]' }} focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] placeholder-gray-400 focus:outline-none"
                        >
                        @error('title')
                            <p class="text-[11px] font-bold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label for="hindi_title" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Devanagari / Hindi Title (Optional)
                        </label>
                        <input 
                            type="text" 
                            id="hindi_title" 
                            name="hindi_title" 
                            value="{{ old('hindi_title') }}" 
                            placeholder="e.g. कपूर"
                            class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] placeholder-gray-400 focus:outline-none font-serif"
                        >
                    </div>

                    <div class="space-y-1.5">
                        <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Short Summary
                        </label>
                        <textarea 
                            id="short_description" 
                            name="short_description" 
                            rows="2" 
                            placeholder="Brief 1-2 line highlighted fragrance summary for catalog cards..."
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] placeholder-gray-400 focus:outline-none leading-relaxed"
                        >{{ old('short_description') }}</textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label for="description" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Full Spiritual Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4" 
                            placeholder="Detailed devotional background, temple craftsmanship, and fragrance notes..."
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] placeholder-gray-400 focus:outline-none leading-relaxed"
                        >{{ old('description') }}</textarea>
                    </div>
                </div>

                <!-- Card 2: Media Management -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3 flex items-center justify-between">
                        <span>Product Images</span>
                        <span class="text-xs font-normal text-gray-400">Upload high-res JPG/PNG/WebP</span>
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-700">Primary Product Image</label>
                            <input 
                                type="file" 
                                name="primary_image_file" 
                                accept="image/*"
                                class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-[6px] file:border-0 file:text-xs file:font-semibold file:bg-[#FAF3EA] file:text-[#965A15] hover:file:bg-[#D38928] hover:file:text-white cursor-pointer"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-700">Or Image Asset Path / URL</label>
                            <input 
                                type="text" 
                                name="image_url" 
                                value="{{ old('image_url', 'assets/images/devi-refill-pack-card.jpg') }}" 
                                placeholder="assets/images/camphor-refill-pack-card.jpg"
                                class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-mono text-[#202223] placeholder-gray-400 focus:outline-none"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5 pt-2 border-t border-gray-100">
                        <label class="block text-xs font-bold text-gray-700">Additional Gallery Images</label>
                        <input 
                            type="file" 
                            name="image_files[]" 
                            multiple 
                            accept="image/*"
                            class="w-full text-xs text-gray-500 file:mr-3 file:py-2 file:px-3 file:rounded-[6px] file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-[#D38928] hover:file:text-white cursor-pointer"
                        >
                    </div>
                </div>

                <!-- Card 3: Pricing & Inventory -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3">
                        Pricing &amp; Inventory
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div class="space-y-1.5">
                            <label for="base_price" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                MRP / Compare Price (₹) <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                step="0.01" 
                                id="base_price" 
                                name="base_price" 
                                value="{{ old('base_price', '375.00') }}" 
                                required
                                class="w-full px-3.5 py-2.5 bg-white border {{ $errors->has('base_price') ? 'border-rose-500' : 'border-[#D2D5D8]' }} focus:border-[#D38928] rounded-[8px] text-xs font-black text-[#202223] focus:outline-none font-heading"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label for="sale_price" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                Selling Price (₹)
                            </label>
                            <input 
                                type="number" 
                                step="0.01" 
                                id="sale_price" 
                                name="sale_price" 
                                value="{{ old('sale_price', '289.00') }}" 
                                placeholder="Discounted price"
                                class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-black text-[#C87A1E] focus:outline-none font-heading"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label for="sku" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                SKU Code <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="sku" 
                                name="sku" 
                                value="{{ old('sku', 'MANGLAM-' . strtoupper(Str::random(6))) }}" 
                                required
                                class="w-full px-3.5 py-2.5 bg-white border {{ $errors->has('sku') ? 'border-rose-500' : 'border-[#D2D5D8]' }} focus:border-[#D38928] rounded-[8px] text-xs font-mono font-bold text-[#202223] focus:outline-none uppercase"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label for="stock_quantity" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                Stock Quantity <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                id="stock_quantity" 
                                name="stock_quantity" 
                                value="{{ old('stock_quantity', '100') }}" 
                                required 
                                min="0"
                                class="w-full px-3.5 py-2.5 bg-white border {{ $errors->has('stock_quantity') ? 'border-rose-500' : 'border-[#D2D5D8]' }} focus:border-[#D38928] rounded-[8px] text-xs font-black text-[#202223] focus:outline-none font-heading"
                            >
                        </div>
                    </div>
                </div>

                <!-- Card 4: Sacred Attributes -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3">
                        Vedic Specifications &amp; Attributes
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="burn_time" class="block text-xs font-bold text-gray-700 font-heading uppercase">Burn Time</label>
                            <input type="text" id="burn_time" name="burn_time" value="{{ old('burn_time', '45 mins') }}" placeholder="e.g. 45 mins" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                        </div>

                        <div class="space-y-1.5">
                            <label for="ingredients" class="block text-xs font-bold text-gray-700 font-heading uppercase">Ingredients</label>
                            <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients', '100% Bhimseni Camphor, Pure Herbs, Natural Gums') }}" placeholder="Herbal ingredients list" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                        </div>
                    </div>
                </div>

                <!-- Card 5: Variants / Pack Sizes -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div>
                            <h3 class="text-sm font-bold text-[#202223] font-heading">
                                Variants &amp; Pack Sizes
                            </h3>
                            <p class="text-xs text-gray-400">Offer multiple pack options (e.g. Pack of 40, Pack of 100 Refill)</p>
                        </div>
                    </div>

                    <div class="space-y-3" id="variants-container">
                        <div class="p-3.5 rounded-[10px] bg-[#FAF8F5] border border-[#E1E3E5] grid grid-cols-1 sm:grid-cols-5 gap-3 items-center">
                            <div class="sm:col-span-2">
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Pack Option Title</label>
                                <input type="text" name="variants[0][title]" value="Pack of 40 Sticks" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-medium focus:outline-none">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Price (₹)</label>
                                <input type="number" step="0.01" name="variants[0][price]" value="289.00" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none font-heading">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Compare (₹)</label>
                                <input type="number" step="0.01" name="variants[0][compare_at_price]" value="375.00" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none font-heading">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Stock</label>
                                <input type="number" name="variants[0][stock]" value="60" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none">
                            </div>
                        </div>

                        <div class="p-3.5 rounded-[10px] bg-[#FAF8F5] border border-[#E1E3E5] grid grid-cols-1 sm:grid-cols-5 gap-3 items-center">
                            <div class="sm:col-span-2">
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Pack Option Title</label>
                                <input type="text" name="variants[1][title]" value="Pack of 100 Sticks Refill" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-medium focus:outline-none">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Price (₹)</label>
                                <input type="number" step="0.01" name="variants[1][price]" value="599.00" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none font-heading">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Compare (₹)</label>
                                <input type="number" step="0.01" name="variants[1][compare_at_price]" value="750.00" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none font-heading">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500 uppercase block">Stock</label>
                                <input type="number" name="variants[1][stock]" value="40" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 6: SEO & Meta -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3">
                        Search Engine Listing (SEO)
                    </h3>

                    <div class="space-y-1.5">
                        <label for="meta_title" class="block text-xs font-bold text-gray-700 uppercase">Page Title (Meta)</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title') }}" placeholder="e.g. Buy Pure Bhimseni Camphor Agarbatti Online | Manglam" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                    </div>

                    <div class="space-y-1.5">
                        <label for="meta_description" class="block text-xs font-bold text-gray-700 uppercase">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" placeholder="Summary for Google and social previews..." class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">{{ old('meta_description') }}</textarea>
                    </div>
                </div>

            </div>

            <!-- RIGHT 4 COLUMNS: Organization, Status, Visibility -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Status Card -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Product Status
                    </h3>
                    <select name="status" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold text-[#202223] focus:outline-none focus:border-[#D38928]">
                        <option value="active" {{ old('status', 'active') === 'active' ? 'selected' : '' }}>🟢 Active (Published in store)</option>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>⚪ Draft (Hidden from store)</option>
                        <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>🔴 Archived</option>
                    </select>
                </div>

                <!-- Badges & Highlight Toggles -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Storefront Badges
                    </h3>

                    <label class="flex items-center space-x-2.5 p-2 rounded-[8px] hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller', true) ? 'checked' : '' }} class="w-4 h-4 text-[#D38928] rounded border-gray-300">
                        <span class="text-xs font-semibold text-gray-800">★ Mark as Bestseller</span>
                    </label>

                    <label class="flex items-center space-x-2.5 p-2 rounded-[8px] hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }} class="w-4 h-4 text-[#D38928] rounded border-gray-300">
                        <span class="text-xs font-semibold text-gray-800">✦ Featured Product</span>
                    </label>
                </div>

                <!-- Product Organization: Category -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Primary Category
                    </h3>
                    <select name="category_id" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none focus:border-[#D38928]">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Collections Multi-Select -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Assign to Collections
                    </h3>
                    <div class="space-y-2 max-h-56 overflow-y-auto shopify-scrollbar p-1">
                        @foreach($collections as $col)
                            <label class="flex items-center space-x-2.5 text-xs text-gray-700 hover:text-[#121212] cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    name="collections[]" 
                                    value="{{ $col->id }}"
                                    {{ in_array($col->slug, ['all', 'incense-sticks']) ? 'checked' : '' }}
                                    class="w-4 h-4 text-[#D38928] rounded border-gray-300"
                                >
                                <span class="font-medium">{{ $col->title }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>
    </form>

</div>
@endsection
