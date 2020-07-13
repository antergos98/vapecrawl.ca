<?php

namespace App\Importer;

use App\Product;
use App\Vendor;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

class CanvapeImporter implements ImporterInterface
{
    private Vendor $vendor;
    private Client $client;
    private array $products = [];

    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
        $this->client = new Client();
    }

    public function import(): void
    {
        $page = 1;

        while (true) {
            $crawler = $this->client->request('GET', "https://www.canvape.com/productslist.asp?page=$page&show=60");

            if ($crawler->filter('.v-product-grid .v-product')->count() === 0) {
                break;
            }

            $crawler->filter('.v-product-grid .v-product')->each(function (Crawler $node) {
                $price = $node->filter('.product_productprice b')->text();
                $price = explode('$', $price);
                $price = (float)$price[1];
                $price = $price * 100;

                $this->products[] = [
                    'name' => $node->filter('.v-product__title')->text(),
                    'price' => $price,
                    'image' => "https://canvape.com" . $node->filter('.v-product__img img')->attr('src'),
                    'in_stock' => true,
                    'url' => $node->filter('.v-product__img')->attr('href'),
                    'real_id' => 1,
                    'vendor_id' => $this->vendor->id
                ];
            });

            $page++;
        }

        Product::insert($this->products);
    }
}
