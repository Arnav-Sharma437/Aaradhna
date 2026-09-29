<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InventoryLog;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InventoryController extends Controller
{
    /**
     * Threshold for low-stock warning.
     */
    public const LOW_STOCK_THRESHOLD = 30;

    /**
     * Display the inventory management screen.
     */
    public function index(Request $request): View
    {
        $query = Product::with(['category', 'primaryImage', 'variants']);

        // Search Filter (Product Title, Product SKU, Variant Title, Variant SKU)
        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('sku', 'LIKE', "%{$search}%")
                  ->orWhere('hindi_title', 'LIKE', "%{$search}%")
                  ->orWhereHas('variants', function ($vq) use ($search) {
                      $vq->where('title', 'LIKE', "%{$search}%")
                         ->orWhere('sku', 'LIKE', "%{$search}%");
                  });
            });
        }

        // Category Filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Tracking Filter
        if ($request->filled('track_inventory')) {
            $query->where('track_inventory', $request->track_inventory === '1');
        }

        // Stock Status Filter
        if ($request->filled('stock_status')) {
            switch ($request->stock_status) {
                case 'in_stock':
                    $query->where('stock_quantity', '>', self::LOW_STOCK_THRESHOLD);
                    break;
                case 'low_stock':
                    $query->where('stock_quantity', '>', 0)
                          ->where('stock_quantity', '<=', self::LOW_STOCK_THRESHOLD);
                    break;
                case 'out_of_stock':
                    $query->where('stock_quantity', '<=', 0);
                    break;
            }
        }

        // Sorting
        $sortBy = $request->get('sort', 'stock_asc');
        switch ($sortBy) {
            case 'stock_desc':
                $query->orderBy('stock_quantity', 'desc');
                break;
            case 'title_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'title_desc':
                $query->orderBy('title', 'desc');
                break;
            case 'sku_asc':
                $query->orderBy('sku', 'asc');
                break;
            case 'stock_asc':
            default:
                $query->orderBy('stock_quantity', 'asc');
                break;
        }

        $products = $query->paginate(20)->withQueryString();

        // Analytics / Inventory Summary
        $totalProducts = Product::count();
        $totalUnits = (int) Product::sum('stock_quantity');
        $lowStockCount = Product::where('stock_quantity', '>', 0)
            ->where('stock_quantity', '<=', self::LOW_STOCK_THRESHOLD)
            ->count();
        $outOfStockCount = Product::where('stock_quantity', '<=', 0)->count();
        $inStockCount = Product::where('stock_quantity', '>', self::LOW_STOCK_THRESHOLD)->count();
        
        $totalInventoryValue = Product::select(DB::raw('SUM(stock_quantity * base_price) as total_val'))
            ->value('total_val') ?? 0;

        // Low stock & out of stock alerts (top critical items)
        $criticalAlerts = Product::with('primaryImage')
            ->where('stock_quantity', '<=', self::LOW_STOCK_THRESHOLD)
            ->orderBy('stock_quantity', 'asc')
            ->take(6)
            ->get();

        // Recent inventory activity logs
        $recentLogs = InventoryLog::with(['product', 'variant', 'user'])
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::orderBy('name')->get();

        return view('admin.inventory.index', compact(
            'products',
            'totalProducts',
            'totalUnits',
            'lowStockCount',
            'outOfStockCount',
            'inStockCount',
            'totalInventoryValue',
            'criticalAlerts',
            'recentLogs',
            'categories'
        ));
    }

    /**
     * Adjust stock for a product or specific variant.
     */
    public function adjust(Request $request, Product $product)
    {
        $validated = $request->validate([
            'variant_id' => ['nullable', 'exists:product_variants,id'],
            'adjustment_type' => ['required', 'in:set,delta'],
            'quantity' => ['required', 'integer'],
            'reason' => ['nullable', 'string', 'max:255'],
        ]);

        $reason = $validated['reason'] ?: 'Manual Adjustment';
        $userId = Auth::id();

        if (!empty($validated['variant_id'])) {
            $variant = ProductVariant::where('product_id', $product->id)
                ->findOrFail($validated['variant_id']);

            $previousQty = $variant->stock_quantity;
            $newQty = $validated['adjustment_type'] === 'set' 
                ? max(0, $validated['quantity'])
                : max(0, $previousQty + $validated['quantity']);

            $delta = $newQty - $previousQty;

            $variant->update(['stock_quantity' => $newQty]);

            // Sync total to product
            $totalVariantStock = $product->variants()->sum('stock_quantity');
            $prevProdQty = $product->stock_quantity;
            $product->update(['stock_quantity' => $totalVariantStock]);

            // Record Log
            InventoryLog::create([
                'product_id' => $product->id,
                'product_variant_id' => $variant->id,
                'sku' => $variant->sku ?: $product->sku,
                'previous_quantity' => $previousQty,
                'new_quantity' => $newQty,
                'quantity_change' => $delta,
                'reason' => $reason . " (Variant: {$variant->title})",
                'user_id' => $userId,
            ]);

            if ($request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'variant_id' => $variant->id,
                    'new_variant_stock' => $newQty,
                    'product_id' => $product->id,
                    'new_product_stock' => $totalVariantStock,
                    'message' => "Stock for '{$variant->title}' updated to {$newQty}.",
                ]);
            }

            return back()->with('success', "Stock for '{$product->title} ({$variant->title})' updated to {$newQty}.");
        }

        // Adjust parent product directly
        $previousQty = $product->stock_quantity;
        $newQty = $validated['adjustment_type'] === 'set' 
            ? max(0, $validated['quantity'])
            : max(0, $previousQty + $validated['quantity']);

        $delta = $newQty - $previousQty;

        $product->update(['stock_quantity' => $newQty]);

        // If product has single default variant, sync default variant as well
        if ($product->variants()->count() === 1) {
            $product->variants()->first()->update(['stock_quantity' => $newQty]);
        }

        // Record Log
        InventoryLog::create([
            'product_id' => $product->id,
            'product_variant_id' => null,
            'sku' => $product->sku,
            'previous_quantity' => $previousQty,
            'new_quantity' => $newQty,
            'quantity_change' => $delta,
            'reason' => $reason,
            'user_id' => $userId,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'product_id' => $product->id,
                'new_product_stock' => $newQty,
                'message' => "Stock for '{$product->title}' updated to {$newQty}.",
            ]);
        }

        return back()->with('success', "Stock for '{$product->title}' updated to {$newQty}.");
    }

    /**
     * Toggle inventory tracking on a product.
     */
    public function toggleTracking(Request $request, Product $product)
    {
        $product->update(['track_inventory' => !$product->track_inventory]);
        $state = $product->track_inventory ? 'enabled' : 'disabled';

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'track_inventory' => $product->track_inventory,
                'message' => "Inventory tracking {$state} for '{$product->title}'.",
            ]);
        }

        return back()->with('success', "Inventory tracking {$state} for '{$product->title}'.");
    }

    /**
     * Bulk update inventory for multiple products.
     */
    public function bulkUpdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'selected_products' => ['required', 'array'],
            'selected_products.*' => ['exists:products,id'],
            'bulk_action' => ['required', 'in:set_stock,add_stock,reduce_stock,enable_tracking,disable_tracking'],
            'bulk_quantity' => ['nullable', 'integer', 'min:0'],
            'bulk_reason' => ['nullable', 'string', 'max:255'],
        ]);

        $productIds = $validated['selected_products'];
        $action = $validated['bulk_action'];
        $qty = (int) ($validated['bulk_quantity'] ?? 0);
        $reason = $validated['bulk_reason'] ?: 'Bulk Stock Update';
        $userId = Auth::id();

        $affectedCount = 0;

        DB::transaction(function () use ($productIds, $action, $qty, $reason, $userId, &$affectedCount) {
            $products = Product::with('variants')->whereIn('id', $productIds)->get();

            foreach ($products as $product) {
                $prev = $product->stock_quantity;

                if ($action === 'set_stock') {
                    $newQty = max(0, $qty);
                    $product->update(['stock_quantity' => $newQty]);
                    $product->variants()->update(['stock_quantity' => $newQty]);
                    $delta = $newQty - $prev;

                    InventoryLog::create([
                        'product_id' => $product->id,
                        'sku' => $product->sku,
                        'previous_quantity' => $prev,
                        'new_quantity' => $newQty,
                        'quantity_change' => $delta,
                        'reason' => "{$reason} (Set to {$newQty})",
                        'user_id' => $userId,
                    ]);
                    $affectedCount++;
                } elseif ($action === 'add_stock') {
                    $newQty = $prev + $qty;
                    $product->update(['stock_quantity' => $newQty]);
                    $delta = $qty;

                    // If has variants, add to first variant or default
                    foreach ($product->variants as $variant) {
                        $variant->increment('stock_quantity', $qty);
                    }

                    InventoryLog::create([
                        'product_id' => $product->id,
                        'sku' => $product->sku,
                        'previous_quantity' => $prev,
                        'new_quantity' => $newQty,
                        'quantity_change' => $delta,
                        'reason' => "{$reason} (Added +{$qty})",
                        'user_id' => $userId,
                    ]);
                    $affectedCount++;
                } elseif ($action === 'reduce_stock') {
                    $newQty = max(0, $prev - $qty);
                    $product->update(['stock_quantity' => $newQty]);
                    $delta = $newQty - $prev;

                    foreach ($product->variants as $variant) {
                        $variant->update(['stock_quantity' => max(0, $variant->stock_quantity - $qty)]);
                    }

                    InventoryLog::create([
                        'product_id' => $product->id,
                        'sku' => $product->sku,
                        'previous_quantity' => $prev,
                        'new_quantity' => $newQty,
                        'quantity_change' => $delta,
                        'reason' => "{$reason} (Reduced -{$qty})",
                        'user_id' => $userId,
                    ]);
                    $affectedCount++;
                } elseif ($action === 'enable_tracking') {
                    $product->update(['track_inventory' => true]);
                    $affectedCount++;
                } elseif ($action === 'disable_tracking') {
                    $product->update(['track_inventory' => false]);
                    $affectedCount++;
                }
            }
        });

        return back()->with('success', "Bulk inventory update applied to {$affectedCount} products.");
    }

    /**
     * Display complete inventory audit history log.
     */
    public function history(Request $request): View
    {
        $query = InventoryLog::with(['product', 'variant', 'user']);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('sku', 'LIKE', "%{$search}%")
                  ->orWhere('reason', 'LIKE', "%{$search}%")
                  ->orWhereHas('product', function ($pq) use ($search) {
                      $pq->where('title', 'LIKE', "%{$search}%");
                  });
            });
        }

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        $logs = $query->latest()->paginate(25)->withQueryString();

        return view('admin.inventory.history', compact('logs'));
    }
}
