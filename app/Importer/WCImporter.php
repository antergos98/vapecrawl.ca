<?php

namespace App\Importer;

use App\Product;
use App\Vendor;
use Illuminate\Support\Facades\Http;

class WCImporter implements ImporterInterface
{
    private Vendor $vendor;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function import(): void
    {
        $page = 1;
        $products = [];

        while (true) {
            $apiUrl = $this->vendor->url . "wp-json/wc/store/products?per_page=100&page={$page}";
            $results = Http::get($apiUrl)->json();

            if (count($results) === 0) {
                break;
            }

            foreach ($results as $result) {
                $normalized = $this->getNormalizedResult($result);
                if (($normalized['price'] !== "0" && $normalized['price'] !== "") && $normalized['image']) {
                    $products[] = $normalized;
                }
            }

            $page++;
        }

        collect($products)->chunk(100)->each(fn($products) => Product::insert($products->all()));
    }

    protected function getNormalizedResult(array $result): array
    {
        return [
            'name' => $result['name'],
            'price' => is_float($result['prices']['sale_price']) ? (int) ((float)$result['prices']['sale_price'] * 100) : $result['prices']['sale_price'],
            'image' => $result['images'][0]['src'] ?? null,
            'in_stock' => $result['is_in_stock'],
            'url' => $result['permalink'],
            'vendor_id' => $this->vendor->id
        ];
    }
}
