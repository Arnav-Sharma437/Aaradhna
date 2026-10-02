<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageBanner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BannerController extends Controller
{
    /**
     * Display a listing of homepage banners.
     */
    public function index(): View
    {
        $banners = HomepageBanner::orderBy('sort_order', 'asc')->paginate(15);
        $totalBanners = HomepageBanner::count();
        $activeBanners = HomepageBanner::where('is_active', true)->count();

        return view('admin.banners.index', compact('banners', 'totalBanners', 'activeBanners'));
    }

    /**
     * Show banner creation form.
     */
    public function create(): View
    {
        return view('admin.banners.create');
    }

    /**
     * Store new homepage banner.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'desktop_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:5120',
            'mobile_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:5120',
            'desktop_image_path' => 'nullable|string|max:255',
            'mobile_image_path' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('assets/images/banners');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Process Desktop Image Upload
        if ($request->hasFile('desktop_image_file')) {
            $file = $request->file('desktop_image_file');
            $filename = 'banner-desktop-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['desktop_image_path'] = 'assets/images/banners/' . $filename;
        } elseif (empty($validated['desktop_image_path'])) {
            $validated['desktop_image_path'] = 'assets/images/hero-sacred.jpg';
        }

        // Process Mobile Image Upload
        if ($request->hasFile('mobile_image_file')) {
            $file = $request->file('mobile_image_file');
            $filename = 'banner-mobile-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['mobile_image_path'] = 'assets/images/banners/' . $filename;
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        unset($validated['desktop_image_file'], $validated['mobile_image_file']);

        HomepageBanner::create($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Homepage banner created and uploaded successfully.');
    }

    /**
     * Display the specified banner (redirects to edit).
     */
    public function show(HomepageBanner $banner)
    {
        return redirect()->route('admin.banners.edit', $banner);
    }

    /**
     * Show banner edit form.
     */
    public function edit(HomepageBanner $banner): View
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update banner details.
     */
    public function update(Request $request, HomepageBanner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'desktop_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:5120',
            'mobile_image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,gif|max:5120',
            'desktop_image_path' => 'nullable|string|max:255',
            'mobile_image_path' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $uploadDir = public_path('assets/images/banners');
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Process Desktop Image Upload
        if ($request->hasFile('desktop_image_file')) {
            $file = $request->file('desktop_image_file');
            $filename = 'banner-desktop-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['desktop_image_path'] = 'assets/images/banners/' . $filename;
        }

        // Process Mobile Image Upload
        if ($request->hasFile('mobile_image_file')) {
            $file = $request->file('mobile_image_file');
            $filename = 'banner-mobile-' . time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            $validated['mobile_image_path'] = 'assets/images/banners/' . $filename;
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        unset($validated['desktop_image_file'], $validated['mobile_image_file']);

        $banner->update($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated and image saved successfully.');
    }

    /**
     * Toggle banner active status.
     */
    public function toggleStatus(HomepageBanner $banner)
    {
        $banner->update(['is_active' => !$banner->is_active]);
        $status = $banner->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Banner has been {$status}.");
    }

    /**
     * Delete a banner.
     */
    public function destroy(HomepageBanner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
