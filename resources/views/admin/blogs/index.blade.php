@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-black font-heading text-[#1A1A1A] tracking-tight">
                Spiritual Blog Articles
            </h1>
            <p class="text-xs text-gray-500 font-medium">
                Publish aarti vidhi guides, festival stories, and temple incense purity articles.
            </p>
        </div>

        <div class="flex items-center space-x-3">
            <a 
                href="{{ route('admin.blogs.create') }}" 
                class="inline-flex items-center space-x-1.5 px-4 py-2 bg-[#D38928] hover:bg-[#B8741E] text-white text-xs font-bold rounded-[8px] shadow-xs hover:shadow-md transition-all font-heading cursor-pointer"
            >
                <span>+ Write Article</span>
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-bold">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-[14px] border border-[#E1E3E5] shadow-2xs overflow-hidden">
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="p-4 border-b border-[#E1E3E5] bg-[#FCFCFD]">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </span>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search articles by title, author, or keywords..." 
                    class="w-full pl-9 pr-4 py-2 bg-white border border-[#D2D5D8] rounded-[8px] text-xs text-[#202223] placeholder-gray-400 focus:outline-none focus:border-[#D38928]"
                >
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-[#FAFBFB] text-gray-500 uppercase tracking-wider text-[10px] font-mono border-b border-[#E1E3E5]">
                        <th class="py-3 px-4">Article Title</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4">Author</th>
                        <th class="py-3 px-4">Published Date</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E1E3E5] bg-white">
                    @forelse($blogs as $post)
                        <tr class="hover:bg-[#FAF7F2]/60 transition-colors">
                            <td class="py-3.5 px-4 font-bold text-[#1A1A1A] max-w-sm">
                                <a href="{{ route('admin.blogs.edit', $post->id) }}" class="font-bold font-heading text-sm text-[#1A1A1A] hover:text-[#D38928]">
                                    {{ $post->title }}
                                </a>
                                <div class="text-gray-400 text-[11px] line-clamp-1 mt-0.5">{{ $post->excerpt }}</div>
                            </td>
                            <td class="py-3.5 px-4 text-gray-600 font-mono text-[11px]">
                                {{ $post->category_slug }}
                            </td>
                            <td class="py-3.5 px-4 text-gray-700 font-medium">
                                {{ $post->author_name }}
                            </td>
                            <td class="py-3.5 px-4 text-gray-500 whitespace-nowrap text-[11px]">
                                {{ $post->published_at ? $post->published_at->format('d M, Y') : 'Draft' }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                <span class="px-2 py-0.5 rounded-full font-bold text-[10px] uppercase {{ $post->is_published ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-500' }}">
                                    {{ $post->is_published ? 'Published' : 'Draft' }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-center whitespace-nowrap space-x-1.5">
                                <a 
                                    href="{{ route('admin.blogs.edit', $post->id) }}" 
                                    class="px-2.5 py-1 bg-white hover:bg-gray-100 text-gray-700 border border-gray-200 rounded-[6px] font-bold text-xs"
                                >
                                    Edit
                                </a>
                                <form action="{{ route('admin.blogs.toggle-status', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-1 text-[11px] font-medium border border-gray-200 rounded-[6px] hover:bg-gray-100 text-gray-600">
                                        {{ $post->is_published ? 'Unpublish' : 'Publish' }}
                                    </button>
                                </form>
                                <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete article?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 text-rose-600 hover:bg-rose-50 rounded-[6px] text-[11px]">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-400">
                                No blog articles found. Click "+ Write Article" above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($blogs->hasPages())
            <div class="p-4 border-t border-[#E1E3E5] bg-[#FAFBFB]">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
