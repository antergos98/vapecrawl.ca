<?php

namespace App\Importer;

use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Http;

class DashvapesImporter implements ImporterInterface
{
    private Vendor $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function import(): void
    {
        $products = Http::get('https://dashvapes.com/tools/search.php?key=' . config('vendors.dashvapes.key'))->json();

        $data = collect($products)
            ->map(function ($product) {
                return [
                    'name' => $product['name'] . ' - ' . $product['brand'],
                    'price' => (int)((float)$product['price'] * 100),
                    'image' => $product['image'],
                    'in_stock' => $product['availability'] === "In Stock",
                    'url' => $product['url'],
                    'vendor_id' => $this->vendor->id
                ];
            });

        $data->chunk(100)->each(fn($products) => Product::insert($products->all()));
    }
}
