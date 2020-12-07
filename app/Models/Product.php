<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    public $timestamps = false;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
