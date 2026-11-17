<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VideoReel;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class VideoReelController extends Controller
{
    /**
     * Display a listing of video reels.
     */
    public function index(): View
    {
        $reels = VideoReel::with('product')
            ->orderBy('sort_order', 'asc')
            ->paginate(20);

        $totalReels = VideoReel::count();
        $activeReels = VideoReel::where('is_active', true)->count();

        return view('admin.reels.index', compact('reels', 'totalReels', 'activeReels'));
    }

    /**
     * Show video reel creation form.
     */
    public function create(): View
    {
        $products = Product::where('status', 'active')
            ->orderBy('title')
            ->get();

        return view('admin.reels.create', compact('products'));
    }

    /**
     * Store new video reel.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:51200',
            'video_url' => 'nullable|string|max:500',
            'poster_file' => 'nullable|image|max:5120',
            'thumbnail_file' => 'nullable|image|max:5120',
            'views' => 'nullable|string|max:50',
            'likes' => 'nullable|string|max:50',
            'rating' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'mrp' => 'nullable|numeric|min:0',
            'discount' => 'nullable|string|max:50',
            'why_choose' => 'nullable|string',
            'perfect_for' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $uploadVideoDir = public_path('uploads/videos/reels');
        $uploadImgDir = public_path('uploads/videos/reels/posters');
        if (!file_exists($uploadVideoDir)) {
            @mkdir($uploadVideoDir, 0755, true);
        }
        if (!file_exists($uploadImgDir)) {
            @mkdir($uploadImgDir, 0755, true);
        }

        // Handle Video File Upload or URL
        $finalVideoUrl = $validated['video_url'] ?? '';
        if ($request->hasFile('video_file')) {
            $file = $request->file('video_file');
            $filename = 'reel-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadVideoDir, $filename);
            $finalVideoUrl = 'uploads/videos/reels/' . $filename;
        }

        if (empty($finalVideoUrl)) {
            $finalVideoUrl = 'assets/videos/reel-video-1.mp4';
        }

        // Handle Poster File Upload
        $finalPoster = null;
        if ($request->hasFile('poster_file')) {
            $file = $request->file('poster_file');
            $filename = 'poster-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadImgDir, $filename);
            $finalPoster = 'uploads/videos/reels/posters/' . $filename;
        }

        // Handle Thumbnail File Upload
        $finalThumbnail = null;
        if ($request->hasFile('thumbnail_file')) {
            $file = $request->file('thumbnail_file');
            $filename = 'thumb-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadImgDir, $filename);
            $finalThumbnail = 'uploads/videos/reels/posters/' . $filename;
        }

        // Parse Why Choose & Perfect For (newline separated or array)
        $whyChooseArray = null;
        if (!empty($validated['why_choose'])) {
            $whyChooseArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['why_choose'])))));
        }

        $perfectForArray = null;
        if (!empty($validated['perfect_for'])) {
            $perfectForArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['perfect_for'])))));
        }

        // Auto-fill from selected product if fields were left blank
        $product = !empty($validated['product_id']) ? Product::find($validated['product_id']) : null;
        $slug = $product ? $product->slug : Str::slug($validated['title']);
        $price = $validated['price'] ?? ($product ? $product->active_price : null);
        $mrp = $validated['mrp'] ?? ($product ? $product->base_price : null);

        $discount = $validated['discount'] ?? null;
        if (empty($discount) && $mrp && $price && $mrp > $price) {
            $discount = round((($mrp - $price) / $mrp) * 100) . '% OFF';
        }

        VideoReel::create([
            'product_id' => $validated['product_id'] ?? null,
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? ($product?->category?->name ?? 'Sacred Vedic Living'),
            'slug' => $slug,
            'price' => $price,
            'mrp' => $mrp,
            'discount' => $discount,
            'views' => $validated['views'] ?: '2.5k',
            'likes' => $validated['likes'] ?: '350 Likes',
            'rating' => $validated['rating'] ?: '4.9 (1,200 Reviews)',
            'thumbnail' => $finalThumbnail,
            'poster' => $finalPoster,
            'video_url' => $finalVideoUrl,
            'why_choose' => $whyChooseArray ? json_encode($whyChooseArray) : null,
            'perfect_for' => $perfectForArray ? json_encode($perfectForArray) : null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.reels.index')
            ->with('success', "Video reel '{$validated['title']}' created successfully!");
    }

    /**
     * Show video reel edit form.
     */
    public function edit(VideoReel $reel): View
    {
        $products = Product::where('status', 'active')
            ->orderBy('title')
            ->get();

        return view('admin.reels.edit', compact('reel', 'products'));
    }

    /**
     * Update existing video reel.
     */
    public function update(Request $request, VideoReel $reel): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'product_id' => 'nullable|exists:products,id',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg,video/quicktime|max:51200',
            'video_url' => 'nullable|string|max:500',
            'poster_file' => 'nullable|image|max:5120',
            'thumbnail_file' => 'nullable|image|max:5120',
            'views' => 'nullable|string|max:50',
            'likes' => 'nullable|string|max:50',
            'rating' => 'nullable|string|max:100',
            'price' => 'nullable|numeric|min:0',
            'mrp' => 'nullable|numeric|min:0',
            'discount' => 'nullable|string|max:50',
            'why_choose' => 'nullable|string',
            'perfect_for' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $uploadVideoDir = public_path('uploads/videos/reels');
        $uploadImgDir = public_path('uploads/videos/reels/posters');
        if (!file_exists($uploadVideoDir)) {
            @mkdir($uploadVideoDir, 0755, true);
        }
        if (!file_exists($uploadImgDir)) {
            @mkdir($uploadImgDir, 0755, true);
        }

        // Handle Video File Replacement or URL update
        $finalVideoUrl = $reel->video_url;
        if ($request->hasFile('video_file')) {
            // Delete old uploaded video if it was in uploads/
            if ($reel->video_url && str_starts_with($reel->video_url, 'uploads/')) {
                $oldPath = public_path($reel->video_url);
                if (file_exists($oldPath)) @unlink($oldPath);
            }

            $file = $request->file('video_file');
            $filename = 'reel-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadVideoDir, $filename);
            $finalVideoUrl = 'uploads/videos/reels/' . $filename;
        } elseif ($request->filled('video_url')) {
            $finalVideoUrl = $validated['video_url'];
        }

        // Handle Poster File Replacement
        $finalPoster = $reel->poster;
        if ($request->hasFile('poster_file')) {
            if ($reel->poster && str_starts_with($reel->poster, 'uploads/')) {
                $oldPath = public_path($reel->poster);
                if (file_exists($oldPath)) @unlink($oldPath);
            }

            $file = $request->file('poster_file');
            $filename = 'poster-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadImgDir, $filename);
            $finalPoster = 'uploads/videos/reels/posters/' . $filename;
        }

        // Handle Thumbnail File Replacement
        $finalThumbnail = $reel->thumbnail;
        if ($request->hasFile('thumbnail_file')) {
            if ($reel->thumbnail && str_starts_with($reel->thumbnail, 'uploads/')) {
                $oldPath = public_path($reel->thumbnail);
                if (file_exists($oldPath)) @unlink($oldPath);
            }

            $file = $request->file('thumbnail_file');
            $filename = 'thumb-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $file->move($uploadImgDir, $filename);
            $finalThumbnail = 'uploads/videos/reels/posters/' . $filename;
        }

        // Parse Why Choose & Perfect For
        $whyChooseArray = null;
        if (!empty($validated['why_choose'])) {
            $whyChooseArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['why_choose'])))));
        }

        $perfectForArray = null;
        if (!empty($validated['perfect_for'])) {
            $perfectForArray = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $validated['perfect_for'])))));
        }

        $product = !empty($validated['product_id']) ? Product::find($validated['product_id']) : null;
        $slug = $product ? $product->slug : ($reel->slug ?: Str::slug($validated['title']));
        $price = $validated['price'] ?? ($product ? $product->active_price : $reel->price);
        $mrp = $validated['mrp'] ?? ($product ? $product->base_price : $reel->mrp);

        $discount = $validated['discount'] ?? $reel->discount;
        if (empty($discount) && $mrp && $price && $mrp > $price) {
            $discount = round((($mrp - $price) / $mrp) * 100) . '% OFF';
        }

        $reel->update([
            'product_id' => $validated['product_id'] ?? null,
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'] ?? ($product?->category?->name ?? $reel->subtitle),
            'slug' => $slug,
            'price' => $price,
            'mrp' => $mrp,
            'discount' => $discount,
            'views' => $validated['views'] ?: ($reel->views ?: '2.5k'),
            'likes' => $validated['likes'] ?: ($reel->likes ?: '350 Likes'),
            'rating' => $validated['rating'] ?: ($reel->rating ?: '4.9 (1,200 Reviews)'),
            'thumbnail' => $finalThumbnail,
            'poster' => $finalPoster,
            'video_url' => $finalVideoUrl,
            'why_choose' => $whyChooseArray ? json_encode($whyChooseArray) : $reel->why_choose,
            'perfect_for' => $perfectForArray ? json_encode($perfectForArray) : $reel->perfect_for,
            'sort_order' => $validated['sort_order'] ?? $reel->sort_order,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.reels.index')
            ->with('success', "Video reel '{$reel->title}' updated successfully!");
    }

    /**
     * Delete existing video reel.
     */
    public function destroy(VideoReel $reel): RedirectResponse
    {
        $title = $reel->title;

        // Clean local video file
        if ($reel->video_url && str_starts_with($reel->video_url, 'uploads/')) {
            $path = public_path($reel->video_url);
            if (file_exists($path)) @unlink($path);
        }

        // Clean local poster
        if ($reel->poster && str_starts_with($reel->poster, 'uploads/')) {
            $path = public_path($reel->poster);
            if (file_exists($path)) @unlink($path);
        }

        $reel->delete();

        return redirect()->route('admin.reels.index')
            ->with('success', "Video reel '{$title}' deleted successfully!");
    }

    /**
     * Quick toggle active status.
     */
    public function toggleStatus(VideoReel $reel): RedirectResponse
    {
        $reel->update(['is_active' => !$reel->is_active]);
        $state = $reel->is_active ? 'activated' : 'deactivated';

        return back()->with('success', "Video reel '{$reel->title}' is now {$state}.");
    }

    /**
     * Quick update sort order.
     */
    public function updateSortOrder(Request $request, VideoReel $reel): RedirectResponse
    {
        $validated = $request->validate([
            'sort_order' => 'required|integer|min:0',
        ]);

        $reel->update(['sort_order' => $validated['sort_order']]);

        return back()->with('success', "Sort order updated for '{$reel->title}'.");
    }
}
