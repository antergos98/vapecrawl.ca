<?php

namespace App\Importer;

use App\Helpers\PriceFormatter;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Support\Facades\Http;

class ShopifyImporter implements ImporterInterface
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
            'price' => $this->priceFormatter->format($result['variants'][0]['price']),
            'image' => $result['images'][0]['src'] ?? null,
            'in_stock' => $result['variants'][0]['available'] ?? false,
            'url' => $this->vendor->url . 'products/' . $result['handle'],
            'vendor_id' => $this->vendor->id
        ];
    }
}
