<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;

    protected $guarded = [];
    public $timestamps = false;
    public const POPULAR_KEYWORDS = ['juice', 'liquid', 'ml', 'rda', 'rta', 'tank', 'pod', 'squonk', 'drip', 'mod', 'box', 'watt', 'coil', 'kit', 'aegis', 'voopoo', 'smok', 'sigelei 100w plus', 'caliburn', 'lemon drop', 'jam monster', 'aegis', 'salt'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
