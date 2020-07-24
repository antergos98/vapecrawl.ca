<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function scopeEnabled($query)
    {
        return $query->where('enabled', true);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
