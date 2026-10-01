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
            'desktop_image_path' => 'required|string|max:255',
            'mobile_image_path' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        HomepageBanner::create($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Homepage banner created successfully.');
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
            'desktop_image_path' => 'required|string|max:255',
            'mobile_image_path' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', true);

        $banner->update($validated);

        return redirect()->route('admin.banners.index')
            ->with('success', 'Banner updated successfully.');
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
