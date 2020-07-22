<?php

namespace App\Importer;

use App\Product;
use App\Vendor;
use Goutte\Client;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class VolusionImporter implements ImporterInterface
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
            $url = $this->vendor->url . "productslist.asp?show=60&page=$page";
            $crawler = $this->client->request('GET', $url);

            if ($crawler->filter('.v-product-grid')->count() <= 0) {
                break;
            }

            $crawler->filter('.v-product-grid .v-product')->each(function(Crawler $crawler) {
                $link = $crawler->filter('.v-product__title')->attr('href');
                $page = $this->client->request('GET', $link);
                if ($this->client->getResponse()->getStatusCode() !== 404) {
                    $name = $page->filter("span[itemprop='name']")->text();
                    $price = $page->filter("span[itemprop='price']")->attr('content');
                    $price = (float)$price;
                    $price = $price * 100;

                    $image = $page->filter('img#product_photo')->attr('src');

                    if (! Str::of($image)->lower()->contains($this->vendor->url)) {
                        $image = $this->vendor->url . $image;
                    }

                    $meta = $page->filter("meta[itemprop='availability']");
                    $in_stock = $this->isAvailable($meta);

                    $this->products[] = [
                        'name' => $name,
                        'price' => $price,
                        'image' => $image,
                        'in_stock' => $in_stock,
                        'url' => $link,
                        'real_id' => 1,
                        'vendor_id' => $this->vendor->id
                    ];

                    $this->client->back();
                }
            });

            $page++;
            Product::insert($this->products);
            $this->products = [];
        }

    }

    private function isAvailable(Crawler $meta): bool
    {
        if ($meta->count() > 0 && $meta->attr('content') === "InStock") {
            return true;
        }

        return false;
    }
}
