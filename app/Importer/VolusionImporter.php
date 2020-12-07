<?php

namespace App\Importer;

use App\Helpers\PriceFormatter;
use App\Models\Product;
use App\Models\Vendor;
use Goutte\Client;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class VolusionImporter implements ImporterInterface
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
        $page = 1;

        while (true) {
            $url = $this->vendor->url . "pindex.asp?Page=$page";
            $crawler = $this->client->request('GET', $url);

            if ($crawler->filter('#content_area table')->eq(2)->filter('tr')->count() <= 0) {
                break;
            }

            $crawler->filter('#content_area table')->eq(2)->filter('tr')->each(function (Crawler $crawler) {
                $product_url = $crawler->filter('td')->eq(2)->filter('a')->attr('href');

                $page = $this->client->request('GET', $product_url);

                if ($this->client->getResponse()->getStatusCode() !== 404) {
                    $name = $page->filter("span[itemprop='name']")->text();
                    $price = $page->filter("span[itemprop='price']")->count() ? $page->filter("span[itemprop='price']")->attr('content') : 0;

                    $image = $page->filter('img#product_photo')->count() ? $page->filter('img#product_photo')->attr('src') : null;

                    if (!Str::of($image)->lower()->contains($this->vendor->url) && !Str::of($image)->startsWith('//')) {
                        $image = $this->vendor->url . $image;
                    }

                    $meta = $page->filter("meta[itemprop='availability']");
                    $in_stock = $this->isAvailable($meta);

                    $this->products[] = [
                        'name' => $name,
                        'price' => $this->priceFormatter->format($price),
                        'image' => $image,
                        'in_stock' => $in_stock,
                        'url' => $product_url,
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
