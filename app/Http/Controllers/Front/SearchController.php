<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle predictive / live AJAX search queries.
     */
    public function predictive(Request $request): JsonResponse
    {
        $query = trim($request->get('q', $request->get('query', '')));

        if (mb_strlen($query) < 1) {
            // Return popular/featured recommendations when query is empty
            $featured = Product::with(['primaryImage', 'category'])
                ->where('status', 'active')
                ->where('is_featured', true)
                ->take(4)
                ->get()
                ->map(fn($p) => $this->formatProduct($p));

            return response()->json([
                'query' => '',
                'total' => $featured->count(),
                'products' => $featured,
                'categories' => [],
            ]);
        }

        // Search active products
        $products = Product::with(['primaryImage', 'category', 'variants'])
            ->where('status', 'active')
            ->where(function ($q) use ($query) {
                $q->where('title', 'LIKE', "%{$query}%")
                  ->orWhere('hindi_title', 'LIKE', "%{$query}%")
                  ->orWhere('sku', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%")
                  ->orWhere('description', 'LIKE', "%{$query}%")
                  ->orWhere('ingredients', 'LIKE', "%{$query}%")
                  ->orWhereHas('category', function ($cq) use ($query) {
                      $cq->where('name', 'LIKE', "%{$query}%");
                  })
                  ->orWhereHas('variants', function ($vq) use ($query) {
                      $vq->where('title', 'LIKE', "%{$query}%")
                         ->orWhere('sku', 'LIKE', "%{$query}%");
                  });
            })
            ->take(8)
            ->get()
            ->map(fn($p) => $this->formatProduct($p));

        // Matching categories
        $categories = Category::where('is_active', true)
            ->where(function ($cq) use ($query) {
                $cq->where('name', 'LIKE', "%{$query}%")
                   ->orWhere('subtitle', 'LIKE', "%{$query}%");
            })
            ->take(3)
            ->get()
            ->map(fn($c) => [
                'id' => $c->id,
                'name' => $c->name,
                'slug' => $c->slug,
                'url' => route('collections.show', $c->slug),
            ]);

        return response()->json([
            'query' => $query,
            'total' => $products->count(),
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Full search page submission redirect.
     */
    public function index(Request $request): RedirectResponse
    {
        $q = trim($request->get('q', $request->get('query', '')));
        return redirect()->route('collections.show', ['slug' => 'all', 'search' => $q]);
    }

    /**
     * Format a product model for JSON response.
     */
    protected function formatProduct(Product $p): array
    {
        $imageUrl = '/assets/images/devi-refill-pack-card.jpg';
        if ($p->primaryImage && $p->primaryImage->image_path) {
            $imageUrl = str_starts_with($p->primaryImage->image_path, 'http') 
                ? $p->primaryImage->image_path 
                : asset($p->primaryImage->image_path);
        }

        $activePrice = (float) ($p->sale_price ?? $p->base_price);
        $comparePrice = $p->sale_price ? (float) $p->base_price : null;

        return [
            'id' => $p->id,
            'title' => $p->title,
            'hindi_title' => $p->hindi_title,
            'slug' => $p->slug,
            'url' => route('products.show', $p->slug),
            'price' => $activePrice,
            'formatted_price' => '₹' . number_format($activePrice, 2),
            'compare_price' => $comparePrice,
            'formatted_compare_price' => $comparePrice ? '₹' . number_format($comparePrice, 2) : null,
            'image' => $imageUrl,
            'category' => $p->category->name ?? 'Sacred Essentials',
            'is_in_stock' => $p->stock_quantity > 0,
            'stock_quantity' => $p->stock_quantity,
            'rating' => 5.0,
            'reviews_count' => 250,
        ];
    }
}
