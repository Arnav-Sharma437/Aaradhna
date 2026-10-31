<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class BundleController extends Controller
{
    /**
     * Display the bundle offers management screen.
     */
    public function index(): View
    {
        $products = Product::with(['primaryImage', 'images', 'category'])
            ->where('status', 'active')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        $trialCollection = Collection::where('slug', 'trial-packs')->first();
        $buy2get1Collection = Collection::where('slug', 'buy2get1')->first();

        $trialProductIds = [];
        $buy2get1ProductIds = [];

        foreach ($products as $p) {
            $inTrial = false;
            $inBuy2Get1 = false;

            if (Schema::hasColumn('products', 'show_in_trial_bundle') && $p->show_in_trial_bundle) {
                $inTrial = true;
            } elseif ($trialCollection && $p->collections()->where('collections.id', $trialCollection->id)->exists()) {
                $inTrial = true;
            }

            if (Schema::hasColumn('products', 'show_in_buy2get1_bundle') && $p->show_in_buy2get1_bundle) {
                $inBuy2Get1 = true;
            } elseif ($buy2get1Collection && $p->collections()->where('collections.id', $buy2get1Collection->id)->exists()) {
                $inBuy2Get1 = true;
            }

            if ($inTrial) {
                $trialProductIds[] = $p->id;
            }
            if ($inBuy2Get1) {
                $buy2get1ProductIds[] = $p->id;
            }
        }

        return view('admin.bundles.index', compact('products', 'trialProductIds', 'buy2get1ProductIds'));
    }

    /**
     * Update product inclusions for both bundles.
     */
    public function update(Request $request): RedirectResponse
    {
        $trialIds = array_map('intval', $request->input('trial_products', []));
        $buy2get1Ids = array_map('intval', $request->input('buy2get1_products', []));

        // 1. Update columns on products table
        if (Schema::hasColumn('products', 'show_in_trial_bundle')) {
            Product::whereIn('id', $trialIds)->update(['show_in_trial_bundle' => true]);
            Product::whereNotIn('id', $trialIds)->update(['show_in_trial_bundle' => false]);
        }

        if (Schema::hasColumn('products', 'show_in_buy2get1_bundle')) {
            Product::whereIn('id', $buy2get1Ids)->update(['show_in_buy2get1_bundle' => true]);
            Product::whereNotIn('id', $buy2get1Ids)->update(['show_in_buy2get1_bundle' => false]);
        }

        // 2. Sync Collections
        $trialCollection = Collection::firstOrCreate(['slug' => 'trial-packs'], [
            'title' => 'Buy 5 Trial Packs @ ₹799',
            'description' => 'Festive bundle offer',
            'is_active' => true,
        ]);
        $buy2get1Collection = Collection::firstOrCreate(['slug' => 'buy2get1'], [
            'title' => 'Buy 2 Get 1 FREE',
            'description' => 'Festive refill pack offer',
            'is_active' => true,
        ]);

        $trialCollection->products()->sync($trialIds);
        $buy2get1Collection->products()->sync($buy2get1Ids);

        return redirect()->route('admin.bundles.index')->with('success', 'Bundle products updated successfully! Your selections are now live in both bundle offers.');
    }
}
