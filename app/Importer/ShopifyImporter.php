<?php

namespace App\Importer;

use App\Product;
use App\Vendor;
use Illuminate\Support\Facades\Http;

class ShopifyImporter implements ImporterInterface
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
            $apiUrl = $this->vendor->url . 'products.json?page=' . $page . '&limit=100';
            $results = Http::get($apiUrl)->json();

            if (count($results['products']) === 0) {
                break;
            }

            foreach ($results['products'] as $result) {
                $normalized = $this->getNormalizedResult($result);
                if ($normalized['price'] && $normalized['image']) {
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
            'name' => $result['title'],
            'price' => isset($result['variants'][0]['price']) ? (int)((float)$result['variants'][0]['price'] * 100) : 0,
            'image' => $result['images'][0]['src'] ?? null,
            'in_stock' => $result['variants'][0]['available'] ?? false,
            'url' => $this->vendor->url . 'products/' . $result['handle'],
            'real_id' => (int)$result['id'],
            'vendor_id' => $this->vendor->id
        ];
    }
}
