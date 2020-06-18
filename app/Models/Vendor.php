<?php

namespace App\Models;

use App\Traits\Clickable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class Vendor extends Model
{
    use Actionable, Clickable;

    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public function activeCoupons()
    {
        return $this->coupons()->notExpired();
    }
}
