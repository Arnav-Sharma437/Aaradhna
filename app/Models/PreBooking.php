<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'name',
        'phone',
        'email',
        'city',
        'pack_preference',
        'notes',
        'status',
    ];
}
