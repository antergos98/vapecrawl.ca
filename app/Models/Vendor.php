<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;

class Vendor extends Model
{
    use Actionable;

    protected $fillable = ['name', 'url', 'class_name'];

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
        return $this->hasMany(Coupon::class)->notExpired();
    }
}
