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
}
