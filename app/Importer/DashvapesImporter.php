<?php

namespace App\Importer;

use App\Helpers\PriceFormatter;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Http;

class DashvapesImporter implements ImporterInterface
{
    private Vendor $vendor;
    private PriceFormatter $priceFormatter;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $this->priceFormatter = new PriceFormatter;
    }

    public function import(): void
    {
        $products = Http::get('https://dashvapes.com/tools/search.php?key=' . config('vendors.dashvapes.key'))->json();

        $data = collect($products)
            ->map(function ($product) {
                return [
                    'name' => $product['name'] . ' - ' . $product['brand'],
                    'price' => $this->priceFormatter->format($product['price']),
                    'image' => $product['image'],
                    'in_stock' => $product['availability'] === "In Stock",
                    'url' => $product['url'],
                    'vendor_id' => $this->vendor->id
                ];
            });

        $data->chunk(100)->each(fn($products) => Product::insert($products->all()));
    }
}
