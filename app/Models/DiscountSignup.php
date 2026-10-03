<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscountSignup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'product_interest',
        'ordering_blocker',
        'discovery_source',
        'product_priority',
        'generated_coupon_code',
        'coupon_id',
        'coupon_status',
        'ip_address',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship with Coupon model.
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    /**
     * Scope for issued coupons.
     */
    public function scopeIssued($query)
    {
        return $query->where('coupon_status', 'issued');
    }

    /**
     * Scope for used coupons.
     */
    public function scopeUsed($query)
    {
        return $query->where('coupon_status', 'used');
    }
}
