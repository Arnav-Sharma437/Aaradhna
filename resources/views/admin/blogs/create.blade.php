@extends('layouts.admin')

@section('title', 'Write Article')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center space-x-2 text-xs text-gray-500 font-medium">
        <a href="{{ route('admin.blogs.index') }}" class="hover:text-[#D38928]">← Blog Posts</a>
        <span>/</span>
        <span class="text-[#1A1A1A] font-bold">New Article</span>
    </div>

    <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
        Write Spiritual Blog Article
    </h1>

    @if($errors->any())
        <div class="p-4 rounded-[10px] bg-rose-50 border border-rose-200 text-rose-800 text-xs font-bold space-y-1">
            @foreach($errors->all() as $error)
                <div>⚠ {{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs p-6 sm:p-8">
        <form action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-6 text-xs">
            @csrf

            <div class="space-y-4">
                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Article Title *</label>
                    <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. The Sacred Vidhi of Morning Aarti" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs font-bold font-heading focus:border-[#D38928] focus:outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Category *</label>
                        <select name="category_slug" required class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                            <option value="hindu-rituals" {{ old('category_slug') === 'hindu-rituals' ? 'selected' : '' }}>Hindu Rituals &amp; Vidhi</option>
                            <option value="fragrances" {{ old('category_slug') === 'fragrances' ? 'selected' : '' }}>Sacred Fragrances &amp; Herbs</option>
                            <option value="festivals-and-events" {{ old('category_slug') === 'festivals-and-events' ? 'selected' : '' }}>Festivals &amp; Havans</option>
                            <option value="news" {{ old('category_slug') === 'news' ? 'selected' : '' }}>Manglam Updates</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Author Name *</label>
                        <input type="text" name="author_name" required value="{{ old('author_name', 'Acharya Manglam Team') }}" class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Excerpt / Summary</label>
                    <textarea name="excerpt" rows="2" placeholder="Short description for preview cards..." class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">{{ old('excerpt') }}</textarea>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 uppercase tracking-wider mb-1 font-heading">Article Content (HTML / Text) *</label>
                    <textarea name="body_content" rows="8" required placeholder="Write full spiritual guide or blog post..." class="w-full px-3.5 py-2.5 bg-white border border-[#D2D5D8] rounded-[8px] text-xs focus:border-[#D38928] focus:outline-none">{{ old('body_content') }}</textarea>
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_published" value="1" id="blog_published" checked class="text-[#D38928] rounded focus:ring-0">
                    <label for="blog_published" class="text-xs text-gray-700 font-bold cursor-pointer">Publish immediately on Storefront</label>
                </div>
            </div>

            <div class="pt-4 border-t border-[#E1E3E5] flex justify-end gap-3">
                <a href="{{ route('admin.blogs.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold rounded-[8px] transition-colors">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-[#D38928] hover:bg-[#B8741E] text-white font-bold rounded-[8px] font-heading shadow-xs transition-colors cursor-pointer">
                    Save Article
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
