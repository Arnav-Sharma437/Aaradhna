<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of devotee testimonials.
     */
    public function index(Request $request): View
    {
        $query = Testimonial::orderBy('sort_order', 'asc');

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%")
                  ->orWhere('review_text', 'LIKE', "%{$search}%");
            });
        }

        $testimonials = $query->paginate(15)->withQueryString();
        $totalTestimonials = Testimonial::count();
        $activeTestimonials = Testimonial::where('is_active', true)->count();

        return view('admin.testimonials.index', compact('testimonials', 'totalTestimonials', 'activeTestimonials'));
    }

    /**
     * Store new testimonial.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'location' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'product_tag' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        Testimonial::create($validated);

        return back()->with('success', 'Devotee testimonial added successfully.');
    }

    /**
     * Update testimonial details.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:100',
            'location' => 'nullable|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'review_text' => 'required|string',
            'product_tag' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        $testimonial->update($validated);

        return back()->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Toggle testimonial active status.
     */
    public function toggleStatus(Testimonial $testimonial)
    {
        $testimonial->update(['is_active' => !$testimonial->is_active]);
        $status = $testimonial->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Testimonial has been {$status}.");
    }

    /**
     * Delete testimonial.
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully.');
    }
}
