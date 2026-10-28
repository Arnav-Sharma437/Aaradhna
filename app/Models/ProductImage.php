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
            return asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png');
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');
        $fileName = basename($cleanPath);

        // 1. Check if physically present in public/assets/images/products/
        if (file_exists(public_path('assets/images/products/' . $fileName))) {
            return asset('assets/images/products/' . $fileName);
        }

        // 2. Check if physically present in public/uploads/products/
        if (file_exists(public_path('uploads/products/' . $fileName))) {
            return asset('uploads/products/' . $fileName);
        }

        // 3. Check if physically present in public/storage/products/
        if (file_exists(public_path('storage/products/' . $fileName))) {
            return asset('storage/products/' . $fileName);
        }

        // 4. Direct match in public folder if it actually exists on disk
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // 5. If the file is missing or old, fall back to the 2 official packaging visuals
        return ($this->is_primary || $this->sort_order === 1)
            ? asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png')
            : asset('assets/images/products/ishanaa-incense-sticks-trio.jpg');
    }
}
