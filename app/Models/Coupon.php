<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $dates = [
        'expires_at'
    ];

    public function scopeNotExpired($query)
    {
        return $query->where('expires_at', '>', now())->orWhereNull('expires_at');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
