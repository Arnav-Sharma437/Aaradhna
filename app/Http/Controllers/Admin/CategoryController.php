<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories with search and product counts.
     */
    public function index(Request $request): View
    {
        $query = Category::with(['parent'])->withCount('products');

        // Search
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('slug', 'LIKE', "%{$search}%")
                  ->orWhere('subtitle', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Sorting
        $sortBy = $request->get('sort', 'sort_order');
        switch ($sortBy) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'products_desc':
                $query->orderBy('products_count', 'desc');
                break;
            case 'sort_order':
            default:
                $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
                break;
        }

        $categories = $query->paginate(15)->withQueryString();

        $totalCount = Category::count();
        $activeCount = Category::where('is_active', true)->count();
        $inactiveCount = Category::where('is_active', false)->count();

        return view('admin.categories.index', compact(
            'categories',
            'totalCount',
            'activeCount',
            'inactiveCount'
        ));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        $parentCategories = Category::whereNull('parent_id')->orderBy('name')->get();
        return view('admin.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'banner_path' => ['nullable', 'string', 'max:500'],
            'icon_path' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;
        while (Category::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $imagePath = $validated['image_path'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('categories', 'public');
            $imagePath = 'storage/' . $path;
        }

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'parent_id' => $validated['parent_id'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'banner_path' => $validated['banner_path'] ?? null,
            'icon_path' => $validated['icon_path'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' created successfully!");
    }

    /**
     * Display the specified category (redirects to edit).
     */
    public function show(Category $category): RedirectResponse
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category): View
    {
        $category->loadCount('products');
        $parentCategories = Category::whereNull('parent_id')->where('id', '!=', $category->id)->orderBy('name')->get();

        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories,slug,' . $category->id],
            'parent_id' => ['nullable', 'exists:categories,id', 'not_in:' . $category->id],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'banner_path' => ['nullable', 'string', 'max:500'],
            'icon_path' => ['nullable', 'string', 'max:500'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
        ]);

        $imagePath = $category->image_path;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('categories', 'public');
            $imagePath = 'storage/' . $path;
        } elseif (!empty($validated['image_path'])) {
            $imagePath = $validated['image_path'];
        }

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['slug']),
            'parent_id' => $validated['parent_id'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'banner_path' => $validated['banner_path'] ?? null,
            'icon_path' => $validated['icon_path'] ?? null,
            'sort_order' => $validated['sort_order'] ?? $category->sort_order,
            'is_active' => $request->boolean('is_active', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Category '{$category->name}' updated successfully!");
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        $name = $category->name;
        // Unlink products before deletion
        $category->products()->update(['category_id' => null]);
        $category->children()->update(['parent_id' => null]);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', "Category '{$name}' deleted successfully.");
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(Category $category): RedirectResponse
    {
        $category->update(['is_active' => !$category->is_active]);
        $state = $category->is_active ? 'activated' : 'deactivated';

        return back()->with('success', "Category '{$category->name}' is now {$state}.");
    }
}
