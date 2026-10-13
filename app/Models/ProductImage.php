<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'image_path',
        'alt_text',
        'sort_order',
        'is_primary',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_primary' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute(): string
    {
        $path = $this->image_path;
        if (empty($path)) {
            return asset('assets/images/incense-pack.jpg');
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');
        $fileName = basename($cleanPath);

        // 1. Check if physically present in public/uploads/products/
        if (file_exists(public_path('uploads/products/' . $fileName))) {
            return asset('uploads/products/' . $fileName);
        }

        // 2. Check if physically present in public/storage/products/
        if (file_exists(public_path('storage/products/' . $fileName))) {
            return asset('storage/products/' . $fileName);
        }

        // 3. Direct match in public folder
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // 4. If path starts with assets/ (static design asset)
        if (str_starts_with($cleanPath, 'assets/')) {
            return asset($cleanPath);
        }

        // 5. Default to uploads/products if path is clean filename or starts with uploads/
        if (str_starts_with($cleanPath, 'uploads/')) {
            return asset($cleanPath);
        }

        // 6. Otherwise serve via storage/
        return asset($cleanPath);
    }
}
