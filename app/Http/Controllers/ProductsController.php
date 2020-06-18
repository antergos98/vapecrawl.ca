<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController
{
    public function show(Product $product)
    {
        $product->vendor->incrementClickCount();
        return redirect($product->url . '?utm_source=vapecrawl.ca', 303);
    }
}
