<?php

namespace App\Http\Controllers;

use App\Vendor;

class VendorsController
{
    public function __invoke()
    {
        return view('vendors', ['vendors' => Vendor::enabled()->select(['name', 'url'])->inRandomOrder()->get()]);
    }
}
