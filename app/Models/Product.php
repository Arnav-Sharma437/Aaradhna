<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'hindi_title',
        'slug',
        'sku',
        'short_description',
        'description',
        'ingredients',
        'benefits',
        'how_to_use',
        'burn_time',
        'base_price',
        'sale_price',
        'stock_quantity',
        'track_inventory',
        'is_featured',
        'is_bestseller',
        'badge_text',
        'badge_color',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'track_inventory' => 'boolean',
        'is_featured' => 'boolean',
        'is_bestseller' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_product')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class)->orderBy('sort_order');
    }

    public function defaultVariant(): HasOne
    {
        return $this->hasOne(ProductVariant::class)->where('is_default', true);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_primary', true);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function approvedReviews(): HasMany
    {
        return $this->hasMany(Review::class)->where('status', 'approved');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function wishlists(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(Faq::class)->orderBy('sort_order');
    }

    public function inventoryLogs(): HasMany
    {
        return $this->hasMany(InventoryLog::class)->latest();
    }

    public function getActivePriceAttribute(): float
    {
        return (float) ($this->sale_price ?? $this->base_price);
    }

    public function getDiscountPercentageAttribute(): ?int
    {
        if ($this->sale_price && $this->base_price > $this->sale_price) {
            return (int) round((($this->base_price - $this->sale_price) / $this->base_price) * 100);
        }
        return null;
    }

    public function getCleanTitleAttribute(): string
    {
        $clean = preg_replace('/\s*\(\s*Pack\s*of\s*[^)]+\)/i', '', $this->title);
        return trim($clean ?: $this->title);
    }

    public function getFormattedTitleAttribute(): string
    {
        $base = $this->clean_title;
        if (!empty($this->hindi_title)) {
            $hindi = trim($this->hindi_title);
            if (!str_contains($base, $hindi)) {
                return "{$base} ({$hindi})";
            }
        }
        return $base;
    }

    public function getPackTagAttribute(): ?string
    {
        // 1. Explicit badge_text set by admin
        if (!empty($this->badge_text)) {
            $val = trim($this->badge_text);
            if (!in_array(strtolower($val), ['none', 'null', '0', 'no badge', 'no tag', 'no'])) {
                return $val;
            }
        }

        // 2. Look for "Pack of X" in title or variants if not explicitly set
        if (preg_match('/Pack\s*of\s*\d+(\s*[a-zA-Z]+)?/i', $this->title, $matches)) {
            return trim($matches[0]);
        }

        if ($this->relationLoaded('variants') || $this->variants()->exists()) {
            foreach ($this->variants as $variant) {
                if (preg_match('/Pack\s*of\s*\d+(\s*[a-zA-Z]+)?/i', $variant->title, $matches)) {
                    return trim($matches[0]);
                }
            }
        }

        return null;
    }

    /**
     * Parse pack tag into structured 3-part layout (prefix, big number, suffix)
     * e.g. "pack of 100 sticks" -> ['prefix' => 'pack of', 'number' => '100', 'suffix' => 'sticks']
     */
    public function getPackTagPartsAttribute(): ?array
    {
        $raw = $this->pack_tag;
        if (empty($raw)) {
            return null;
        }

        $trimmed = trim($raw);

        // Match pattern: (optional prefix) (digits) (optional suffix)
        // e.g. "pack of 100 sticks", "Pack of 40", "100 sticks", "Pack of 100 Refill"
        if (preg_match('/^(.*?)\s*(\d+)\s*(.*?)$/i', $trimmed, $m)) {
            $prefix = trim($m[1]);
            $number = trim($m[2]);
            $suffix = trim($m[3]);

            // If prefix is empty or generic, default to "pack of"
            if (empty($prefix) || strtolower($prefix) === 'pack' || strtolower($prefix) === 'pack of') {
                $prefix = 'pack of';
            }
            // If suffix is empty, default to "sticks" (or keep Refill if present)
            if (empty($suffix)) {
                $suffix = 'sticks';
            }

            return [
                'prefix' => strtolower($prefix),
                'number' => $number,
                'suffix' => strtolower($suffix),
            ];
        }

        // If no number found (e.g. "BESTSELLER"), return as custom text
        return [
            'prefix' => '',
            'number' => '',
            'suffix' => $trimmed,
        ];
    }

    /**
     * Get the badge / tag color, defaulting to deep maroon (#8B1E1E) as shown in reference.
     */
    public function getBadgeColorAttribute(?string $value): string
    {
        if (!empty($value)) {
            $val = trim($value);
            if (!str_starts_with($val, '#') && preg_match('/^[a-f0-9]{3,8}$/i', $val)) {
                $val = '#' . $val;
            }
            return $val;
        }
        return '#8B1E1E';
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $primary = $this->primaryImage ?: $this->images->first();
        if ($primary && !empty($primary->url)) {
            return $primary->url;
        }
        return asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png');
    }

    public function getSecondaryImageUrlAttribute(): string
    {
        if ($this->images && $this->images->count() > 1) {
            return $this->images->get(1)->url;
        }
        if ($this->primaryImage && !empty($this->primaryImage->url)) {
            return $this->primaryImage->url;
        }
        if ($this->images && $this->images->count() === 1) {
            return $this->images->first()->url;
        }
        return asset('assets/images/products/ishanaa-incense-sticks-trio.jpg');
    }
}
