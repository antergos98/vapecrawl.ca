<?php

namespace App\Importer;

use App\Helpers\PriceFormatter;
use App\Models\Product;
use App\Models\Vendor;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class MJImporter implements ImporterInterface
{
    private Vendor $vendor;
    private Client $client;
    private array $products = [];
    private PriceFormatter $priceFormatter;

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $this->client = new Client();
        $this->priceFormatter = new PriceFormatter;
    }

    public function import(): void
    {
        $url = $this->vendor->url . "products";
        $crawler = $this->client->request('GET', $url);

        $crawler->filter('.catalog-item')->each(function (Crawler $crawler) {
            $name = $crawler->filter('.product-title')->text();
            $image = $crawler->filter('.product-gallery')->count()
                ? $crawler->filter('.product-gallery img')->attr('src')
                : null;
            $price = $crawler->filter('.product-price span')->text();
            $url = $crawler->filter('a.colorbox-node')->attr('href');

            $this->products[] = [
                'name' => $name,
                'image' => $image,
                'price' => $this->priceFormatter->format($price),
                'url' => "https://www.montgomeryjames.ca$url",
                'vendor_id' => $this->vendor->id,
                'in_stock' => true
            ];
        });

        Product::insert($this->products);
    }
}
