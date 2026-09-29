<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CollectionController extends Controller
{
    /**
     * Display a listing of collections with search and product counts.
     */
    public function index(Request $request): View
    {
        $query = Collection::withCount('products');

        // Search
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('slug', 'LIKE', "%{$search}%")
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
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'products_desc':
                $query->orderBy('products_count', 'desc');
                break;
            case 'sort_order':
            default:
                $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
                break;
        }

        $collections = $query->paginate(15)->withQueryString();

        $totalCount = Collection::count();
        $activeCount = Collection::where('is_active', true)->count();
        $inactiveCount = Collection::where('is_active', false)->count();

        return view('admin.collections.index', compact(
            'collections',
            'totalCount',
            'activeCount',
            'inactiveCount'
        ));
    }

    /**
     * Show the form for creating a new collection.
     */
    public function create(): View
    {
        $products = Product::where('status', 'active')->orderBy('title')->get();
        return view('admin.collections.create', compact('products'));
    }

    /**
     * Store a newly created collection in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:collections,slug'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'banner_path' => ['nullable', 'string', 'max:500'],
            'discount_rule_type' => ['nullable', 'string', 'max:50'],
            'discount_value' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'products' => ['nullable', 'array'],
            'products.*' => ['exists:products,id'],
        ]);

        $slug = !empty($validated['slug']) ? Str::slug($validated['slug']) : Str::slug($validated['title']);
        $originalSlug = $slug;
        $counter = 1;
        while (Collection::where('slug', $slug)->exists()) {
            $slug = "{$originalSlug}-{$counter}";
            $counter++;
        }

        $imagePath = $validated['image_path'] ?? null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('collections', 'public');
            $imagePath = 'storage/' . $path;
        }

        $collection = Collection::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'banner_path' => $validated['banner_path'] ?? null,
            'discount_rule_type' => $validated['discount_rule_type'] ?? null,
            'discount_value' => $validated['discount_value'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        if (!empty($validated['products'])) {
            $syncData = [];
            foreach ($validated['products'] as $order => $prodId) {
                $syncData[$prodId] = ['sort_order' => $order];
            }
            $collection->products()->sync($syncData);
        }

        return redirect()->route('admin.collections.index')->with('success', "Collection '{$collection->title}' created successfully!");
    }

    /**
     * Show the form for editing the specified collection.
     */
    public function edit(Collection $collection): View
    {
        $collection->load(['products' => function ($q) {
            $q->orderByPivot('sort_order', 'asc');
        }]);

        $allProducts = Product::where('status', 'active')->orderBy('title')->get();

        return view('admin.collections.edit', compact('collection', 'allProducts'));
    }

    /**
     * Update the specified collection in storage.
     */
    public function update(Request $request, Collection $collection): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:collections,slug,' . $collection->id],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'image_path' => ['nullable', 'string', 'max:500'],
            'banner_path' => ['nullable', 'string', 'max:500'],
            'discount_rule_type' => ['nullable', 'string', 'max:50'],
            'discount_value' => ['nullable', 'numeric', 'min:0'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'products' => ['nullable', 'array'],
            'products.*' => ['exists:products,id'],
        ]);

        $imagePath = $collection->image_path;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('collections', 'public');
            $imagePath = 'storage/' . $path;
        } elseif (!empty($validated['image_path'])) {
            $imagePath = $validated['image_path'];
        }

        $collection->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['slug']),
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'banner_path' => $validated['banner_path'] ?? null,
            'discount_rule_type' => $validated['discount_rule_type'] ?? null,
            'discount_value' => $validated['discount_value'] ?? null,
            'sort_order' => $validated['sort_order'] ?? $collection->sort_order,
            'is_active' => $request->boolean('is_active', true),
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        $syncData = [];
        if (!empty($validated['products'])) {
            foreach ($validated['products'] as $order => $prodId) {
                $syncData[$prodId] = ['sort_order' => $order];
            }
        }
        $collection->products()->sync($syncData);

        return redirect()->route('admin.collections.index')->with('success', "Collection '{$collection->title}' updated successfully!");
    }

    /**
     * Remove the specified collection from storage.
     */
    public function destroy(Collection $collection): RedirectResponse
    {
        $title = $collection->title;
        $collection->products()->detach();
        $collection->delete();

        return redirect()->route('admin.collections.index')->with('success', "Collection '{$title}' deleted successfully.");
    }

    /**
     * Toggle active/inactive status.
     */
    public function toggleStatus(Collection $collection): RedirectResponse
    {
        $collection->update(['is_active' => !$collection->is_active]);
        $state = $collection->is_active ? 'activated' : 'deactivated';

        return back()->with('success', "Collection '{$collection->title}' is now {$state}.");
    }
}
