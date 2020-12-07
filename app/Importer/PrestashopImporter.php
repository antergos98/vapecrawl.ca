<?php

namespace App\Importer;

use App\Helpers\PriceFormatter;
use App\Models\Product;
use App\Models\Vendor;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class PrestashopImporter implements ImporterInterface
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
        $url = $this->vendor->url . "new-products";
        $crawler = $this->client->request('GET', $url);

        // Get total of products
        $totalProducts = $crawler->filter("form.showall input[name='n']")->attr('value');
        $crawler = $this->client->request('GET', $url . "?n={$totalProducts}");

        $crawler->filter('ul.product_list li')->each(function (Crawler $crawler) {
            $name = $crawler->filter('a.product-name')->text();
            $product_url = $crawler->filter('a.product-name')->attr('href');

            $price = $crawler->filter('.product-price')->text();
            $image = $crawler->filter('.product_img_link img')->attr('src');
            $inStock = $crawler->filter('.availability span')->text() === "In Stock";

            $this->products[] = [
                'name' => $name,
                'price' => $this->priceFormatter->format($price),
                'image' => $image,
                'in_stock' => $inStock,
                'url' => $product_url,
                'vendor_id' => $this->vendor->id
            ];
        });

        Product::insert($this->products);
        $this->products = [];
    }
}
