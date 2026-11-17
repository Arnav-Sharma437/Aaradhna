<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VideoReel extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'subtitle',
        'slug',
        'price',
        'mrp',
        'discount',
        'views',
        'likes',
        'rating',
        'thumbnail',
        'poster',
        'video_url',
        'why_choose',
        'perfect_for',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'mrp' => 'decimal:2',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getVideoSrcAttribute(): string
    {
        if (empty($this->video_url)) {
            return asset('assets/videos/reel-video-1.mp4');
        }
        if (str_starts_with($this->video_url, 'http://') || str_starts_with($this->video_url, 'https://') || str_starts_with($this->video_url, '//')) {
            return $this->video_url;
        }
        return asset(ltrim($this->video_url, '/'));
    }

    public function getPosterSrcAttribute(): string
    {
        if (!empty($this->poster)) {
            if (str_starts_with($this->poster, 'http://') || str_starts_with($this->poster, 'https://')) {
                return $this->poster;
            }
            return asset(ltrim($this->poster, '/'));
        }

        if ($this->product && $this->product->primary_image_url) {
            return $this->product->primary_image_url;
        }

        if (!empty($this->thumbnail)) {
            return asset(ltrim($this->thumbnail, '/'));
        }

        return asset('assets/images/products/ishanaa-oudh-incense-sticks-100.png');
    }

    public function getThumbnailSrcAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            if (str_starts_with($this->thumbnail, 'http://') || str_starts_with($this->thumbnail, 'https://')) {
                return $this->thumbnail;
            }
            return asset(ltrim($this->thumbnail, '/'));
        }

        if ($this->product && $this->product->primary_image_url) {
            return $this->product->primary_image_url;
        }

        return $this->poster_src;
    }

    public function getDisplayTitleAttribute(): string
    {
        if (!empty($this->title)) {
            return $this->title;
        }
        return $this->product ? ($this->product->clean_title ?? $this->product->title) : 'Sacred Fragrance';
    }

    public function getDisplaySubtitleAttribute(): string
    {
        if (!empty($this->subtitle)) {
            return $this->subtitle;
        }
        return $this->product?->category?->name ?? 'Sacred Vedic Living';
    }

    public function getDisplaySlugAttribute(): string
    {
        if (!empty($this->slug)) {
            return $this->slug;
        }
        return $this->product?->slug ?? 'all';
    }

    public function getDisplayPriceAttribute(): float
    {
        if ($this->price !== null && $this->price > 0) {
            return (float) $this->price;
        }
        return (float) ($this->product?->active_price ?? 399);
    }

    public function getDisplayMrpAttribute(): float
    {
        if ($this->mrp !== null && $this->mrp > 0) {
            return (float) $this->mrp;
        }
        return (float) ($this->product?->base_price ?? 499);
    }

    public function getDisplayDiscountAttribute(): string
    {
        if (!empty($this->discount)) {
            return $this->discount;
        }
        $mrp = $this->display_mrp;
        $price = $this->display_price;
        if ($mrp > $price && $mrp > 0) {
            return round((($mrp - $price) / $mrp) * 100) . '% OFF';
        }
        return '';
    }

    public function getWhyChooseListAttribute(): array
    {
        if (empty($this->why_choose)) {
            return [
                '100% Charcoal-Free & Bamboo-Less',
                'Pure Vedic Herbs & Resins',
                '45+ Mins Long Burning Time per Stick',
                'Zero Toxic Smoke, 100% Organic',
            ];
        }

        if (is_array($this->why_choose)) {
            return $this->why_choose;
        }

        $decoded = json_decode($this->why_choose, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        return array_values(array_filter(array_map('trim', explode("\n", $this->why_choose))));
    }

    public function getPerfectForListAttribute(): array
    {
        if (empty($this->perfect_for)) {
            return [
                'Daily Morning & Evening Puja',
                'Meditation, Yoga & Stress Relief',
                'Purifying Home Energy & Aura',
            ];
        }

        if (is_array($this->perfect_for)) {
            return $this->perfect_for;
        }

        $decoded = json_decode($this->perfect_for, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        return array_values(array_filter(array_map('trim', explode("\n", $this->perfect_for))));
    }
}
