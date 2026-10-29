@extends('layouts.admin')

@section('title', 'Edit ' . $product->title)

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Header with Back Button, Storefront Preview & Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.products.index') }}" class="p-2 rounded-[8px] bg-white border border-[#E1E3E5] hover:bg-gray-50 text-gray-600 transition-colors" title="Back to Products">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight flex items-center space-x-2">
                    <span>{{ $product->title }}</span>
                    @if($product->status === 'active')
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 font-sans">Active</span>
                    @else
                        <span class="text-[11px] font-bold px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 font-sans">Draft</span>
                    @endif
                </h1>
                <p class="text-xs text-gray-500 font-medium font-mono">SKU: {{ $product->sku }} • Slug: /products/{{ $product->slug }}</p>
            </div>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('products.show', $product->slug) }}" 
                target="_blank"
                class="inline-flex items-center space-x-1 px-3.5 py-2 bg-white border border-[#E1E3E5] hover:bg-gray-50 text-xs font-semibold text-gray-700 rounded-[8px] transition-colors"
            >
                <span>Preview Storefront</span>
                <svg class="w-3.5 h-3.5 text-[#D38928]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>

            <button type="submit" form="product-edit-form" class="px-5 py-2 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer">
                Save Changes
            </button>
        </div>
    </div>

    <!-- Product Edit Form (Shopify Polaris 2-Column Split) -->
    <form id="product-edit-form" method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            
            <!-- LEFT 8 COLUMNS: General Details, Images, Pricing, Variants, SEO -->
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
                            value="{{ old('title', $product->title) }}" 
                            required 
                            class="w-full px-3.5 py-2.5 bg-white border {{ $errors->has('title') ? 'border-rose-500' : 'border-[#D2D5D8]' }} focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none"
                        >
                        @error('title')
                            <p class="text-[11px] font-bold text-rose-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label for="hindi_title" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                Hindi / Devanagari Title
                            </label>
                            <input 
                                type="text" 
                                id="hindi_title" 
                                name="hindi_title" 
                                value="{{ old('hindi_title', $product->hindi_title) }}" 
                                class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none font-serif"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                URL Handle (Slug) <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="slug" 
                                name="slug" 
                                value="{{ old('slug', $product->slug) }}" 
                                required
                                class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-mono text-gray-600 focus:outline-none"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="short_description" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Short Summary
                        </label>
                        <textarea 
                            id="short_description" 
                            name="short_description" 
                            rows="2" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none leading-relaxed"
                        >{{ old('short_description', $product->short_description) }}</textarea>
                    </div>

                    <div class="space-y-1.5">
                        <label for="description" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                            Full Spiritual Description
                        </label>
                        <textarea 
                            id="description" 
                            name="description" 
                            rows="4" 
                            class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none leading-relaxed"
                        >{{ old('description', $product->description) }}</textarea>
                    </div>
                </div>

                <!-- Card 2: Image Gallery Manager -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3 flex items-center justify-between">
                        <span>Product Media &amp; Images</span>
                        <span class="text-xs font-normal text-gray-400">Manage primary thumbnail and gallery images</span>
                    </h3>

                    <!-- Existing Images List -->
                    @if($product->images->count() > 0)
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                            @foreach($product->images as $img)
                                <div class="relative p-2 rounded-[10px] bg-[#FAF8F5] border {{ $img->is_primary ? 'border-[#D38928] shadow-xs' : 'border-[#E1E3E5]' }} group">
                                    <div class="w-full aspect-square rounded-[6px] overflow-hidden bg-white mb-2">
                                        <img src="{{ asset($img->image_path) }}" alt="{{ $img->alt_text }}" class="w-full h-full object-cover">
                                    </div>
                                    
                                    <div class="space-y-1">
                                        <label class="flex items-center space-x-1.5 text-[11px] text-gray-700 cursor-pointer font-medium">
                                            <input type="radio" name="primary_image_id" value="{{ $img->id }}" {{ $img->is_primary ? 'checked' : '' }} class="text-[#D38928]">
                                            <span>Primary</span>
                                        </label>

                                        <label class="flex items-center space-x-1.5 text-[11px] text-rose-600 cursor-pointer">
                                            <input type="checkbox" name="delete_images[]" value="{{ $img->id }}" class="text-rose-600 rounded">
                                            <span>Delete</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Upload New Images -->
                    <div class="pt-3 border-t border-gray-100 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-700">Upload New Primary Image</label>
                            <input 
                                type="file" 
                                name="new_primary_file" 
                                accept="image/*"
                                class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-[6px] file:border-0 file:text-xs file:font-semibold file:bg-[#FAF3EA] file:text-[#965A15] hover:file:bg-[#D38928] hover:file:text-white cursor-pointer"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-700">Or Set Primary Asset Path / URL</label>
                            <input 
                                type="text" 
                                name="new_image_url" 
                                placeholder="assets/images/products/ishanaa-oudh-incense-sticks-100.png"
                                class="w-full px-3.5 py-1.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-mono text-[#202223] focus:outline-none"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5 pt-2">
                        <label class="block text-xs font-bold text-gray-700">Add More Gallery Images</label>
                        <input 
                            type="file" 
                            name="new_gallery_files[]" 
                            multiple 
                            accept="image/*"
                            class="w-full text-xs text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-[6px] file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700 hover:file:bg-[#D38928] hover:file:text-white cursor-pointer"
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
                                Compare Price / MRP (₹) <span class="text-rose-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                step="0.01" 
                                id="base_price" 
                                name="base_price" 
                                value="{{ old('base_price', $product->base_price) }}" 
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
                                value="{{ old('sale_price', $product->sale_price) }}" 
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
                                value="{{ old('sku', $product->sku) }}" 
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
                                value="{{ old('stock_quantity', $product->stock_quantity) }}" 
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
                            <input type="text" id="burn_time" name="burn_time" value="{{ old('burn_time', $product->burn_time) }}" placeholder="e.g. 45 mins" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                        </div>

                        <div class="space-y-1.5">
                            <label for="ingredients" class="block text-xs font-bold text-gray-700 font-heading uppercase">Ingredients</label>
                            <input type="text" id="ingredients" name="ingredients" value="{{ old('ingredients', $product->ingredients) }}" placeholder="Ingredients" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                        </div>
                    </div>
                </div>

                <!-- Card 5: Variants / Pack Sizes (Dynamic Multi-Variant System) -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div>
                            <h3 class="text-sm font-bold text-[#202223] font-heading">
                                Variants &amp; Pack Sizes
                            </h3>
                            <p class="text-xs text-gray-400">Configured pack sizes (e.g. Pack of 40, Pack of 100 Refill, Combos)</p>
                        </div>
                        <button 
                            type="button" 
                            id="add-variant-btn"
                            class="inline-flex items-center space-x-1.5 px-3 py-1.5 bg-[#FAF3EA] hover:bg-[#D38928] text-[#965A15] hover:text-white rounded-[8px] text-xs font-bold transition-all duration-200 cursor-pointer font-heading border border-[#EADBCC]"
                        >
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                            <span>Add Variant</span>
                        </button>
                    </div>

                    <div class="space-y-3" id="variants-container">
                        @forelse($product->variants as $idx => $variant)
                            <div class="variant-row p-3.5 rounded-[10px] bg-[#FAF8F5] border border-[#E1E3E5] grid grid-cols-1 sm:grid-cols-12 gap-3 items-center transition-all">
                                <input type="hidden" name="variants[{{ $idx }}][id]" value="{{ $variant->id }}">
                                
                                <div class="sm:col-span-5">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Pack Title / Option Name <span class="text-rose-500">*</span></label>
                                    <input type="text" name="variants[{{ $idx }}][title]" value="{{ $variant->title }}" required placeholder="e.g. Pack of 40 Sticks" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-medium focus:outline-none focus:border-[#D38928]">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Price (₹)</label>
                                    <input type="number" step="0.01" name="variants[{{ $idx }}][price]" value="{{ $variant->price }}" placeholder="Price" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">MRP (₹)</label>
                                    <input type="number" step="0.01" name="variants[{{ $idx }}][compare_at_price]" value="{{ $variant->compare_at_price }}" placeholder="MRP" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading text-gray-500">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Stock</label>
                                    <input type="number" name="variants[{{ $idx }}][stock]" value="{{ $variant->stock_quantity }}" min="0" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928]">
                                </div>
                                <div class="sm:col-span-1 text-right sm:pt-4">
                                    <label class="text-[11px] font-semibold text-rose-600 cursor-pointer inline-flex items-center space-x-1" title="Mark for removal">
                                        <input type="checkbox" name="delete_variants[]" value="{{ $variant->id }}" class="text-rose-600 rounded">
                                        <span class="hidden sm:inline">Del</span>
                                    </label>
                                </div>
                            </div>
                        @empty
                            <div class="variant-row p-3.5 rounded-[10px] bg-[#FAF8F5] border border-[#E1E3E5] grid grid-cols-1 sm:grid-cols-12 gap-3 items-center transition-all">
                                <div class="sm:col-span-5">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Pack Title / Option Name <span class="text-rose-500">*</span></label>
                                    <input type="text" name="variants[0][title]" value="Standard Pack" required class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-medium focus:outline-none focus:border-[#D38928]">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Price (₹)</label>
                                    <input type="number" step="0.01" name="variants[0][price]" value="{{ $product->sale_price ?? $product->base_price }}" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">MRP (₹)</label>
                                    <input type="number" step="0.01" name="variants[0][compare_at_price]" value="{{ $product->base_price }}" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading text-gray-500">
                                </div>
                                <div class="sm:col-span-2">
                                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Stock</label>
                                    <input type="number" name="variants[0][stock]" value="{{ $product->stock_quantity }}" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928]">
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Card 6: SEO & Meta -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 sm:p-6 shadow-2xs space-y-4">
                    <h3 class="text-sm font-bold text-[#202223] font-heading border-b border-gray-100 pb-3">
                        Search Engine Listing (SEO)
                    </h3>

                    <div class="space-y-1.5">
                        <label for="meta_title" class="block text-xs font-bold text-gray-700 uppercase">Page Title (Meta)</label>
                        <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $product->meta_title) }}" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">
                    </div>

                    <div class="space-y-1.5">
                        <label for="meta_description" class="block text-xs font-bold text-gray-700 uppercase">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" rows="2" class="w-full px-3.5 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:outline-none focus:border-[#D38928]">{{ old('meta_description', $product->meta_description) }}</textarea>
                    </div>
                </div>

            </div>

            <!-- RIGHT 4 COLUMNS: Organization, Status, Delete Action -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Status Card -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Product Status
                    </h3>
                    <select name="status" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold text-[#202223] focus:outline-none focus:border-[#D38928]">
                        <option value="active" {{ old('status', $product->status) === 'active' ? 'selected' : '' }}>🟢 Active (Published in store)</option>
                        <option value="draft" {{ old('status', $product->status) === 'draft' ? 'selected' : '' }}>⚪ Draft (Hidden from store)</option>
                        <option value="archived" {{ old('status', $product->status) === 'archived' ? 'selected' : '' }}>🔴 Archived</option>
                    </select>
                </div>

                <!-- Badges & Highlight Toggles -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-4">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Storefront Badges &amp; Tags
                    </h3>

                    <label class="flex items-center space-x-2.5 p-2 rounded-[8px] hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_bestseller" value="1" {{ old('is_bestseller', $product->is_bestseller) ? 'checked' : '' }} class="w-4 h-4 text-[#D38928] rounded border-gray-300">
                        <span class="text-xs font-semibold text-gray-800">★ Mark as Bestseller (Show on Homepage)</span>
                    </label>

                    <label class="flex items-center space-x-2.5 p-2 rounded-[8px] hover:bg-gray-50 cursor-pointer">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="w-4 h-4 text-[#D38928] rounded border-gray-300">
                        <span class="text-xs font-semibold text-gray-800">✦ Featured Product</span>
                    </label>

                    <!-- Product Image Tag / Pack Size Badge (Top-Right) -->
                    <div class="pt-3 border-t border-gray-100 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="badge_text" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                Product Image Tag (Top-Right)
                            </label>
                            <span class="text-[10px] text-[#C18129] font-bold">Pack of 40, 60, 100, etc.</span>
                        </div>
                        <input 
                            type="text" 
                            id="badge_text" 
                            name="badge_text" 
                            value="{{ old('badge_text', $product->badge_text) }}" 
                            placeholder="e.g. Pack of 40, Pack of 60, Pack of 100, Pack of 20"
                            class="w-full px-3 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-bold text-[#965A15] placeholder-gray-400 focus:outline-none"
                            oninput="updateTagLivePreview();"
                        >
                        <p class="text-[11px] text-gray-400 leading-tight">Shown as a stylish 3-line tag in the top-right corner of the product image.</p>
                        
                        <!-- Quick Tag Presets -->
                        <div class="flex flex-wrap gap-1.5 pt-1">
                            <button type="button" onclick="setTagText('Pack of 20')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">Pack of 20</button>
                            <button type="button" onclick="setTagText('Pack of 40')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">Pack of 40</button>
                            <button type="button" onclick="setTagText('Pack of 60')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">Pack of 60</button>
                            <button type="button" onclick="setTagText('Pack of 100')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">Pack of 100</button>
                            <button type="button" onclick="setTagText('Pack of 100 Refill')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">Pack of 100 Refill</button>
                            <button type="button" onclick="setTagText('BUY 2 GET 1 FREE')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">BUY 2 GET 1</button>
                            <button type="button" onclick="setTagText('BESTSELLER')" class="px-2 py-0.5 bg-amber-50 hover:bg-amber-100 text-[#965A15] text-[10px] font-bold rounded border border-amber-200 cursor-pointer">BESTSELLER</button>
                            <button type="button" onclick="setTagText('')" class="px-2 py-0.5 bg-gray-100 hover:bg-gray-200 text-gray-600 text-[10px] font-bold rounded border border-gray-300 cursor-pointer">✕ No Tag</button>
                        </div>
                    </div>

                    <!-- Tag Color Code Picker & Swatches -->
                    <div class="pt-3 border-t border-gray-100 space-y-2">
                        <div class="flex items-center justify-between">
                            <label for="badge_color" class="block text-xs font-bold uppercase tracking-wider text-gray-700 font-heading">
                                Tag Color Code
                            </label>
                            <span class="text-[10px] text-gray-400">Hex code (e.g. #8B1E1E)</span>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <!-- Native Color Picker Input -->
                            <input 
                                type="color" 
                                id="badge_color_picker" 
                                value="{{ old('badge_color', $product->badge_color ?? '#8B1E1E') }}" 
                                class="w-9 h-9 p-0.5 rounded-[6px] border border-[#D2D5D8] cursor-pointer bg-white shrink-0"
                                oninput="document.getElementById('badge_color').value = this.value; updateTagLivePreview();"
                            >
                            <!-- Text Hex Code Input -->
                            <input 
                                type="text" 
                                id="badge_color" 
                                name="badge_color" 
                                value="{{ old('badge_color', $product->badge_color ?? '#8B1E1E') }}" 
                                placeholder="#8B1E1E"
                                class="flex-1 px-3 py-2 bg-white border border-[#D2D5D8] focus:border-[#D38928] rounded-[8px] text-xs font-mono font-bold text-[#202223] placeholder-gray-400 focus:outline-none uppercase"
                                oninput="document.getElementById('badge_color_picker').value = this.value; updateTagLivePreview();"
                            >
                        </div>

                        <!-- Color Preset Swatches -->
                        <div class="flex flex-wrap items-center gap-1.5 pt-1">
                            <span class="text-[10px] text-gray-400 font-medium">Presets:</span>
                            <button type="button" onclick="setTagColor('#8B1E1E')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#FFF5F5; color:#8B1E1E; border-color:#8B1E1E40;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#8B1E1E;"></span>
                                <span>Maroon</span>
                            </button>
                            <button type="button" onclick="setTagColor('#C18129')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#FFF9F0; color:#C18129; border-color:#C1812940;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#C18129;"></span>
                                <span>Vedic Gold</span>
                            </button>
                            <button type="button" onclick="setTagColor('#065F46')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#F0FDF4; color:#065F46; border-color:#065F4640;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#065F46;"></span>
                                <span>Green</span>
                            </button>
                            <button type="button" onclick="setTagColor('#1E3A8A')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#EFF6FF; color:#1E3A8A; border-color:#1E3A8A40;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#1E3A8A;"></span>
                                <span>Royal Blue</span>
                            </button>
                            <button type="button" onclick="setTagColor('#581C87')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#FAF5FF; color:#581C87; border-color:#581C8740;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#581C87;"></span>
                                <span>Purple</span>
                            </button>
                            <button type="button" onclick="setTagColor('#18181B')" class="inline-flex items-center space-x-1 px-2 py-0.5 rounded text-[10px] font-bold border cursor-pointer" style="background:#F4F4F5; color:#18181B; border-color:#18181B40;">
                                <span class="w-2 h-2 rounded-full inline-block" style="background:#18181B;"></span>
                                <span>Black</span>
                            </button>
                        </div>

                        <!-- Live Visual Tag Preview Matching Reference Image -->
                        <div class="mt-2.5 p-3 rounded-[8px] bg-[#FAF8F5] border border-[#EADBCC] flex items-center justify-between">
                            <span class="text-[11px] font-bold text-gray-500">Live Tag Preview:</span>
                            <div id="tag-live-preview-box" class="p-1 min-w-[70px] flex items-center justify-center">
                                <div id="tag-preview-content" class="pack-tag-badge flex flex-col items-center justify-center text-center leading-none" style="color: {{ old('badge_color', $product->badge_color ?? '#8B1E1E') }}; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;">
                                    <span class="pack-tag-prefix text-[10px] font-black lowercase tracking-tight leading-none" id="preview-prefix" style="font-weight: 900 !important;">pack of</span>
                                    <span class="pack-tag-number text-[24px] font-black leading-none my-0.5 tracking-tighter" id="preview-number" style="font-weight: 900 !important; line-height: 0.86;">100</span>
                                    <span class="pack-tag-suffix text-[10px] font-black lowercase tracking-tight leading-none" id="preview-suffix" style="font-weight: 900 !important;">sticks</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Organization: Category -->
                <div class="bg-white rounded-[14px] border border-[#E1E3E5] p-5 shadow-2xs space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 font-heading">
                        Primary Category
                    </h3>
                    <select name="category_id" class="w-full px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-medium text-[#202223] focus:outline-none focus:border-[#D38928]">
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
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
                        @php
                            $assignedCollectionIds = $product->collections->pluck('id')->toArray();
                        @endphp
                        @foreach($collections as $col)
                            <label class="flex items-center space-x-2.5 text-xs text-gray-700 hover:text-[#121212] cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    name="collections[]" 
                                    value="{{ $col->id }}"
                                    {{ in_array($col->id, old('collections', $assignedCollectionIds)) ? 'checked' : '' }}
                                    class="w-4 h-4 text-[#D38928] rounded border-gray-300"
                                >
                                <span class="font-medium">{{ $col->title }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Delete Product Card (Dangerous Action) -->
                <div class="bg-rose-50/70 rounded-[14px] border border-rose-200 p-5 shadow-2xs space-y-2 text-rose-900">
                    <h3 class="text-xs font-bold uppercase tracking-wider font-heading text-rose-800">
                        Delete Product
                    </h3>
                    <p class="text-xs text-rose-700/80">Permanently delete this product and its variants from the database.</p>
                    <button 
                        type="button" 
                        onclick="if(confirm('Are you sure you want to permanently delete this product? This action cannot be undone.')) { document.getElementById('delete-product-form').submit(); }"
                        class="w-full py-2 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-[8px] transition-colors cursor-pointer"
                    >
                        Delete Product
                    </button>
                </div>

            </div>

        </div>
    </form>

    <!-- Hidden Delete Form -->
    <form id="delete-product-form" method="POST" action="{{ route('admin.products.destroy', $product) }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('variants-container');
    const addBtn = document.getElementById('add-variant-btn');
    let nextIndex = container ? container.querySelectorAll('.variant-row').length + 10 : 10;

    if (addBtn && container) {
        addBtn.addEventListener('click', function () {
            const basePrice = document.getElementById('sale_price')?.value || document.getElementById('base_price')?.value || '';
            const mrpPrice = document.getElementById('base_price')?.value || '';
            const row = document.createElement('div');
            row.className = 'variant-row p-3.5 rounded-[10px] bg-[#FAF8F5] border border-[#E1E3E5] grid grid-cols-1 sm:grid-cols-12 gap-3 items-center transition-all animate-fadeIn';
            row.innerHTML = `
                <div class="sm:col-span-5">
                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Pack Title / Option Name <span class="text-rose-500">*</span></label>
                    <input type="text" name="variants[${nextIndex}][title]" required placeholder="e.g. Pack of 2 Combos" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-medium focus:outline-none focus:border-[#D38928]">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Price (₹)</label>
                    <input type="number" step="0.01" name="variants[${nextIndex}][price]" value="${basePrice}" placeholder="Price" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">MRP (₹)</label>
                    <input type="number" step="0.01" name="variants[${nextIndex}][compare_at_price]" value="${mrpPrice}" placeholder="MRP" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928] font-heading text-gray-500">
                </div>
                <div class="sm:col-span-2">
                    <label class="text-[10px] font-bold text-gray-500 uppercase block mb-1">Stock</label>
                    <input type="number" name="variants[${nextIndex}][stock]" value="50" min="0" class="w-full p-2 bg-white border border-[#D2D5D8] rounded-[6px] text-xs font-bold focus:outline-none focus:border-[#D38928]">
                </div>
                <div class="sm:col-span-1 text-right sm:pt-4">
                    <button type="button" class="remove-new-variant-btn text-gray-400 hover:text-rose-600 p-1.5 rounded hover:bg-rose-50 transition-colors cursor-pointer" title="Remove variant">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    </button>
                </div>
            `;
            container.appendChild(row);
            nextIndex++;
        });

        container.addEventListener('click', function (e) {
            const btn = e.target.closest('.remove-new-variant-btn');
            if (btn) {
                btn.closest('.variant-row').remove();
            }
        });
    }

    // Live Tag & Color Preview Handlers
    window.setTagColor = function(color) {
        const textIn = document.getElementById('badge_color');
        const pickIn = document.getElementById('badge_color_picker');
        if (textIn) textIn.value = color;
        if (pickIn) pickIn.value = color;
        window.updateTagLivePreview();
    };

    window.setTagText = function(text) {
        const textIn = document.getElementById('badge_text');
        if (textIn) textIn.value = text;
        window.updateTagLivePreview();
    };

    window.updateTagLivePreview = function() {
        const textInput = document.getElementById('badge_text');
        const colorInput = document.getElementById('badge_color');
        const contentBox = document.getElementById('tag-preview-content');
        if (!contentBox) return;

        const rawText = (textInput ? textInput.value : '').trim();
        const color = (colorInput && colorInput.value ? colorInput.value : '#8B1E1E').trim();

        contentBox.style.color = color;

        const displayText = rawText || 'Pack of 100 sticks';
        const m = displayText.match(/^(.*?)\s*(\d+)\s*(.*?)$/i);
        const preEl = document.getElementById('preview-prefix');
        const numEl = document.getElementById('preview-number');
        const sufEl = document.getElementById('preview-suffix');

        if (m) {
            let prefix = m[1].trim() || 'pack of';
            if (prefix.toLowerCase() === 'pack' || prefix.toLowerCase() === 'pack of') prefix = 'pack of';
            let number = m[2].trim();
            let suffix = m[3].trim() || 'sticks';

            if (preEl) { preEl.style.display = 'block'; preEl.textContent = prefix.toLowerCase(); }
            if (numEl) { numEl.style.display = 'block'; numEl.textContent = number; }
            if (sufEl) { sufEl.textContent = suffix.toLowerCase(); }
        } else {
            if (preEl) { preEl.style.display = 'none'; }
            if (numEl) { numEl.style.display = 'none'; }
            if (sufEl) { sufEl.textContent = displayText; }
        }
    };

    window.updateTagLivePreview();
});
</script>
@endsection
