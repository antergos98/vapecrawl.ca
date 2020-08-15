<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $dates = [
        'expires_at'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
