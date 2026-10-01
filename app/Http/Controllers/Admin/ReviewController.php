<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    /**
     * Display a listing of product reviews.
     */
    public function index(Request $request): View
    {
        $query = Review::with('product')->latest();

        if ($search = $request->get('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('reviewer_name', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('review_text', 'LIKE', "%{$search}%")
                  ->orWhereHas('product', fn($pq) => $pq->where('title', 'LIKE', "%{$search}%"));
            });
        }

        if ($status = $request->get('status')) {
            if ($status !== 'all') {
                $query->where('status', $status);
            }
        }

        if ($rating = $request->get('rating')) {
            if ($rating !== 'all') {
                $query->where('rating', (int)$rating);
            }
        }

        $reviews = $query->paginate(15)->withQueryString();
        $totalReviews = Review::count();
        $approvedReviews = Review::where('status', 'approved')->count();
        $pendingReviews = Review::where('status', 'pending')->count();
        $avgRating = Review::avg('rating') ? round(Review::avg('rating'), 1) : 5.0;

        return view('admin.reviews.index', compact(
            'reviews',
            'totalReviews',
            'approvedReviews',
            'pendingReviews',
            'avgRating'
        ));
    }

    /**
     * Update review status (approve, reject, pending).
     */
    public function updateStatus(Request $request, Review $review)
    {
        $validated = $request->validate([
            'status' => 'required|in:approved,pending,rejected',
        ]);

        $review->update($validated);

        return back()->with('success', "Review from {$review->reviewer_name} marked as {$validated['status']}.");
    }

    /**
     * Delete a review.
     */
    public function destroy(Review $review)
    {
        $name = $review->reviewer_name;
        $review->delete();

        return back()->with('success', "Review by {$name} deleted successfully.");
    }
}
