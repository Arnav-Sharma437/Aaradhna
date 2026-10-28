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
            return ($this->is_primary || $this->sort_order === 1)
                ? asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png')
                : asset('assets/images/products/ishanaa-incense-sticks-trio.jpg');
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');
        $fileName = basename($cleanPath);

        // 1. Direct match in public folder if it actually exists on disk
        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        // 2. Check if physically present in public/uploads/products/
        if (file_exists(public_path('uploads/products/' . $fileName))) {
            return asset('uploads/products/' . $fileName);
        }

        // 3. Check if physically present in public/storage/products/
        if (file_exists(public_path('storage/products/' . $fileName))) {
            return asset('storage/products/' . $fileName);
        }

        // 4. Check if physically present in public/assets/images/products/
        if (file_exists(public_path('assets/images/products/' . $fileName))) {
            return asset('assets/images/products/' . $fileName);
        }

        // 5. If the path was explicitly saved in the database (e.g. uploads/products/..., storage/..., etc.),
        // ALWAYS respect and return the saved path! Never overwrite or mask admin-uploaded images with defaults.
        return asset($cleanPath);
    }
}
