@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header with Breadcrumbs & Action CTA -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Categories
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Organize your catalog into logical taxonomies, hierarchy and storefront menus.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.categories.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] active:bg-[#965A15] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading"
            >
                <span>+ Add Category</span>
            </a>
        </div>
    </div>

    <!-- Status Tabs -->
    <div class="flex items-center space-x-2 border-b border-[#E1E3E5] pb-3">
        <a 
            href="{{ route('admin.categories.index') }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors {{ !request('status') ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            All Categories <span class="ml-1 opacity-70">({{ $totalCount }})</span>
        </a>
        <a 
            href="{{ route('admin.categories.index', ['status' => 'active']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors {{ request('status') === 'active' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Active <span class="ml-1 opacity-70">({{ $activeCount }})</span>
        </a>
        <a 
            href="{{ route('admin.categories.index', ['status' => 'inactive']) }}" 
            class="px-3.5 py-1.5 rounded-[8px] text-xs font-semibold transition-colors {{ request('status') === 'inactive' ? 'bg-[#1A1A1A] text-white' : 'bg-white border border-[#E1E3E5] text-gray-700 hover:bg-gray-50' }}"
        >
            Inactive <span class="ml-1 opacity-70">({{ $inactiveCount }})</span>
        </a>
    </div>

    <!-- Search & Filter Card -->
    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        
        <form method="GET" action="{{ route('admin.categories.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="relative w-full sm:max-w-md">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </span>
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Search categories by name, slug or subtitle..." 
                        class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                    >
                </div>

                <div class="flex items-center space-x-2 w-full sm:w-auto">
                    <select 
                        name="sort" 
                        onchange="this.form.submit()"
                        class="w-full sm:w-auto px-3 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] focus:outline-none focus:border-[#D38928]"
                    >
                        <option value="sort_order" {{ request('sort') === 'sort_order' ? 'selected' : '' }}>Sort Order</option>
                        <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Name A-Z</option>
                        <option value="products_desc" {{ request('sort') === 'products_desc' ? 'selected' : '' }}>Most Products</option>
                    </select>

                    @if(request()->hasAny(['search', 'status', 'sort']))
                        <a href="{{ route('admin.categories.index') }}" class="p-2 text-gray-500 hover:text-red-600 hover:bg-gray-100 rounded-[8px]" title="Reset Filters">
                            ✕
                        </a>
                    @endif
                </div>
            </div>
        </form>

        <!-- Categories Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#F7F8F9] text-gray-500 uppercase tracking-wider text-[10px] font-heading border-b border-[#E1E3E5]">
                    <tr>
                        <th class="px-5 py-3">Category</th>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3">Parent</th>
                        <th class="px-4 py-3">Products</th>
                        <th class="px-4 py-3">Sort Order</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($categories as $category)
                        <tr class="hover:bg-[#F9FAFB] transition-colors group">
                            <!-- Category Name & Subtitle -->
                            <td class="px-5 py-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-[8px] bg-[#FAF8F5] border border-[#E1E3E5] flex items-center justify-center text-sm font-bold text-[#D38928] shrink-0 shadow-2xs">
                                        📁
                                    </div>
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="font-bold text-[#202223] hover:text-[#D38928] truncate block text-xs">
                                            {{ $category->name }}
                                        </a>
                                        @if($category->subtitle)
                                            <span class="text-[11px] text-gray-400 block truncate">{{ $category->subtitle }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Slug -->
                            <td class="px-4 py-3.5 text-gray-500 font-mono text-[11px]">
                                /collections/{{ $category->slug }}
                            </td>

                            <!-- Parent Category -->
                            <td class="px-4 py-3.5 text-gray-500">
                                {{ $category->parent->name ?? '— Top Level —' }}
                            </td>

                            <!-- Products Count -->
                            <td class="px-4 py-3.5">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold bg-[#FAF3EA] text-[#965A15] border border-[#EADBCC]">
                                    {{ $category->products_count }} {{ Str::plural('item', $category->products_count) }}
                                </span>
                            </td>

                            <!-- Sort Order -->
                            <td class="px-4 py-3.5 font-mono text-gray-600">
                                {{ $category->sort_order }}
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3.5">
                                @if($category->is_active)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-gray-100 text-gray-600">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                <div class="inline-flex items-center space-x-1.5">
                                    <a 
                                        href="{{ route('collections.show', $category->slug) }}" 
                                        target="_blank"
                                        class="p-1.5 text-gray-400 hover:text-[#D38928] hover:bg-gray-100 rounded-md transition-colors"
                                        title="View on Storefront"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <a 
                                        href="{{ route('admin.categories.edit', $category) }}" 
                                        class="p-1.5 text-gray-600 hover:text-[#202223] hover:bg-gray-100 rounded-md transition-colors"
                                        title="Edit Category"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form method="POST" action="{{ route('admin.categories.toggle-status', $category) }}" class="m-0 inline">
                                        @csrf
                                        @method('PATCH')
                                        <button 
                                            type="submit" 
                                            class="p-1.5 {{ $category->is_active ? 'text-amber-600 hover:text-amber-700' : 'text-emerald-600 hover:text-emerald-700' }} hover:bg-gray-100 rounded-md transition-colors"
                                            title="{{ $category->is_active ? 'Deactivate' : 'Activate' }}"
                                        >
                                            @if($category->is_active)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="m-0 inline" onsubmit="return confirm('Are you sure you want to delete category \'{{ addslashes($category->name) }}\'? Any attached products will become uncategorized.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors" title="Delete Category">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                                <div class="max-w-xs mx-auto space-y-3">
                                    <div class="text-3xl">📁</div>
                                    <h4 class="text-sm font-bold text-[#202223] font-heading">No categories found</h4>
                                    <p class="text-xs text-gray-400">Add your first category to group sacred products.</p>
                                    <a href="{{ route('admin.categories.create') }}" class="inline-block px-4 py-2 bg-[#D38928] text-white text-xs font-bold rounded-[8px]">
                                        Add Category
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] flex items-center justify-between bg-[#FCFCFD]">
                <div class="text-xs text-gray-500">
                    Showing <strong class="text-[#202223]">{{ $categories->firstItem() }}</strong> to <strong class="text-[#202223]">{{ $categories->lastItem() }}</strong> of <strong class="text-[#202223]">{{ $categories->total() }}</strong> categories
                </div>
                <div>{{ $categories->links() }}</div>
            </div>
        @endif

    </div>

</div>
@endsection
