<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of FAQs.
     */
    public function index(Request $request): View
    {
        $query = Faq::with('product')->orderBy('sort_order', 'asc');

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('question', 'LIKE', "%{$search}%")
                  ->orWhere('answer', 'LIKE', "%{$search}%");
            });
        }

        if ($category = $request->get('category')) {
            if ($category !== 'all') {
                $query->where('category', $category);
            }
        }

        $faqs = $query->paginate(15)->withQueryString();
        $totalFaqs = Faq::count();
        $activeFaqs = Faq::where('is_active', true)->count();
        $products = Product::where('status', 'active')->select('id', 'title')->get();

        return view('admin.faqs.index', compact('faqs', 'totalFaqs', 'activeFaqs', 'products'));
    }

    /**
     * Store new FAQ.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'product_id' => 'nullable|exists:products,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        Faq::create($validated);

        return back()->with('success', 'FAQ question added successfully.');
    }

    /**
     * Update FAQ details.
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|string|max:100',
            'product_id' => 'nullable|exists:products,id',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        $faq->update($validated);

        return back()->with('success', 'FAQ updated successfully.');
    }

    /**
     * Toggle FAQ active status.
     */
    public function toggleStatus(Faq $faq)
    {
        $faq->update(['is_active' => !$faq->is_active]);
        $status = $faq->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "FAQ has been {$status}.");
    }

    /**
     * Delete a FAQ.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back()->with('success', 'FAQ deleted successfully.');
    }
}
