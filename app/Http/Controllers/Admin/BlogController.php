<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of blog articles.
     */
    public function index(Request $request): View
    {
        $query = BlogPost::latest();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('excerpt', 'LIKE', "%{$search}%")
                  ->orWhere('author_name', 'LIKE', "%{$search}%");
            });
        }

        $blogs = $query->paginate(15)->withQueryString();
        $totalBlogs = BlogPost::count();
        $publishedBlogs = BlogPost::where('is_published', true)->count();

        return view('admin.blogs.index', compact('blogs', 'totalBlogs', 'publishedBlogs'));
    }

    /**
     * Show blog creation form.
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store new blog article.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_slug' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:500',
            'body_content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'author_name' => 'required|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published', false);
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        BlogPost::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Sacred blog article created successfully.');
    }

    /**
     * Show blog edit form.
     */
    public function edit(BlogPost $blog): View
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update blog article.
     */
    public function update(Request $request, BlogPost $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_slug' => 'required|string|max:100',
            'excerpt' => 'nullable|string|max:500',
            'body_content' => 'required|string',
            'featured_image' => 'nullable|string|max:255',
            'author_name' => 'required|string|max:100',
            'is_published' => 'nullable|boolean',
        ]);

        $validated['is_published'] = $request->boolean('is_published', false);
        if ($validated['is_published'] && !$blog->published_at) {
            $validated['published_at'] = now();
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog article updated successfully.');
    }

    /**
     * Toggle blog publish status.
     */
    public function toggleStatus(BlogPost $blog)
    {
        $newStatus = !$blog->is_published;
        $blog->update([
            'is_published' => $newStatus,
            'published_at' => $newStatus ? ($blog->published_at ?? now()) : $blog->published_at,
        ]);

        $statusText = $newStatus ? 'published' : 'moved to drafts';
        return back()->with('success', "Article '{$blog->title}' {$statusText}.");
    }

    /**
     * Delete blog article.
     */
    public function destroy(BlogPost $blog)
    {
        $title = $blog->title;
        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', "Article '{$title}' deleted.");
    }
}
