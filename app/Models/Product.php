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
        'tagline',
        'description',
        'ingredients',
        'benefits',
        'how_to_use',
        'burn_time',
        'video_url',
        'video_thumbnail',
        'base_price',
        'sale_price',
        'stock_quantity',
        'track_inventory',
        'is_featured',
        'is_bestseller',
        'show_in_trial_bundle',
        'show_in_buy2get1_bundle',
        'badge_text',
        'badge_color',
        'sort_order',
        'status',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'sort_order' => 'integer',
        'track_inventory' => 'boolean',
        'is_featured' => 'boolean',
        'is_bestseller' => 'boolean',
        'show_in_trial_bundle' => 'boolean',
        'show_in_buy2get1_bundle' => 'boolean',
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
            if ($val !== '' && !in_array(strtolower($val), ['none', 'null', '0', 'no badge', 'no tag', 'no', 'false'])) {
                return $val;
            }
        }

        // If tag is empty, return null so nothing is shown
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

    public function getRealFallbackImage(bool $isSecondary = false): string
    {
        $text = strtolower($this->title . ' ' . $this->slug);

        // Rose
        if (str_contains($text, 'rose') || str_contains($text, 'gulab')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794308785_rq0RDfCRyHCI.jpeg')
                : asset('uploads/products/prod_1794313158_AWN4KevDUcRa.jpeg');
        }

        // Chandan / Sandalwood
        if (str_contains($text, 'chandan') || str_contains($text, 'sandalwood')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794307727_i93xqOgtbOKa.jpeg')
                : asset('uploads/products/prod_1794313421_amkJS4wtc3nl.jpeg');
        }

        // Jasmine / Mogra
        if (str_contains($text, 'jasmine') || str_contains($text, 'mogra')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794313272_pfSvm1eFbPMi.jpeg')
                : asset('uploads/products/prod_1794313272_bFMpxnVli3LU.jpeg');
        }

        // Marigold / Swarna Pushpa / Kesar
        if (str_contains($text, 'marigold') || str_contains($text, 'swarna') || str_contains($text, 'kesar')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794313407_fxxJ8kF21ZNe.jpeg')
                : asset('uploads/products/prod_1794313376_1Dmaqv2A1qeU.jpeg');
        }

        // Tulsi
        if (str_contains($text, 'tulsi') || str_contains($text, 'तुलसी')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794313496_z0gliGRrigwQ.jpeg')
                : asset('uploads/products/prod_1794313496_tfnHcumvI7W9.jpeg');
        }

        // Combo / Packs / Six
        if (str_contains($text, 'combo') || str_contains($text, 'pack') || str_contains($text, 'six')) {
            return $isSecondary 
                ? asset('uploads/products/prod_1794315199_fSBpekR09kj3.jpeg')
                : asset('uploads/products/prod_1794314582_BlWthCxnC7E7.jpeg');
        }

        // Havan Cup
        if (str_contains($text, 'havan') || str_contains($text, 'cup') || str_contains($text, 'loban')) {
            return asset('assets/images/single-havan-cup.png');
        }

        // Dhoop Cones
        if (str_contains($text, 'cone') || str_contains($text, 'dhoop')) {
            return asset('assets/images/single-dhoop-cone.png');
        }

        // Default: Oudh Mystique real photography
        return $isSecondary 
            ? asset('uploads/products/prod_1793877582_07A5tn8leT3e.jpeg')
            : asset('uploads/products/prod_1794313187_WMXp0FXgW4ND.jpeg');
    }

    public function getPrimaryImageUrlAttribute(): string
    {
        $primary = $this->primaryImage ?: $this->images->first();
        if ($primary && !empty($primary->url)) {
            if (!str_contains($primary->url, 'ishanaa-oudh-incense-sticks-100') && !str_contains($primary->url, 'ishanaa-incense-sticks-trio')) {
                return $primary->url;
            }
        }
        return $this->getRealFallbackImage(false);
    }

    public function getSecondaryImageUrlAttribute(): string
    {
        if ($this->images && $this->images->count() > 1) {
            $second = $this->images->get(1);
            if (!empty($second->url) && !str_contains($second->url, 'ishanaa-incense-sticks-trio') && !str_contains($second->url, 'ishanaa-oudh-incense-sticks-100')) {
                return $second->url;
            }
        }
        if ($this->primaryImage && !empty($this->primaryImage->url) && !str_contains($this->primaryImage->url, 'ishanaa-oudh-incense-sticks-100') && !str_contains($this->primaryImage->url, 'ishanaa-incense-sticks-trio')) {
            return $this->primaryImage->url;
        }
        return $this->getRealFallbackImage(true);
    }

    public function getHasVideoAttribute(): bool
    {
        return !empty($this->video_url);
    }

    public function getVideoAssetUrlAttribute(): ?string
    {
        $path = $this->video_url;
        if (empty($path)) return null;

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');
        $fileName = basename($cleanPath);

        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }
        if (file_exists(public_path('uploads/products/videos/' . $fileName))) {
            return asset('uploads/products/videos/' . $fileName);
        }
        if (file_exists(public_path('storage/products/videos/' . $fileName))) {
            return asset('storage/products/videos/' . $fileName);
        }
        if (file_exists(public_path('assets/videos/' . $fileName))) {
            return asset('assets/videos/' . $fileName);
        }

        return asset($cleanPath);
    }

    public function getIsYoutubeVideoAttribute(): bool
    {
        if (empty($this->video_url)) return false;
        return str_contains($this->video_url, 'youtube.com') || str_contains($this->video_url, 'youtu.be');
    }

    public function getYoutubeEmbedUrlAttribute(): ?string
    {
        if (!$this->is_youtube_video) return null;
        $url = $this->video_url;

        // https://youtu.be/ID
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1&mute=1&loop=1&playlist=' . $matches[1];
        }

        // https://www.youtube.com/watch?v=ID
        if (preg_match('/[?&]v=([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1&mute=1&loop=1&playlist=' . $matches[1];
        }

        // https://www.youtube.com/embed/ID
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }

        return $url;
    }
}
