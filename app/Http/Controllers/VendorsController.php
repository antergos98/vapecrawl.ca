<?php

namespace App\Http\Controllers;

use App\Models\Vendor;

class VendorsController
{
    public function show(Vendor $vendor)
    {
        $vendor->incrementClickCount();
        return redirect($vendor->url . '?utm_source=vapecrawl.ca', 303);
    }
}
