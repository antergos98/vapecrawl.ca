<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Vendor(['name' => 'DashVapes', 'url' => 'https://www.dashvapes.com/', 'class_name' => 'DashvapesImporter']))->save();
        (new Vendor(['name' => 'E-Cigarettes.ca', 'url' => 'https://ecigarettes.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Flavorific Shop', 'url' => 'https://www.flavorificshop.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Evaperated', 'url' => 'https://www.evaperated.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'eMixologies', 'url' => 'https://www.emixologies.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Warped Vapors', 'url' => 'https://warpedvapors.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Bargain E-Juice', 'url' => 'https://bargainejuice.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'The Vape Company', 'url' => 'https://thevapecompany.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Liberty Vape', 'url' => 'https://www.libertyvape.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Saga Vape', 'url' => 'https://sagavape.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Dragon Vape', 'url' => 'https://dragonvape.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'SaddlehorseBlues', 'url' => 'https://www.saddlehorseblues.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'qp Design', 'url' => 'https://qpdesign.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'NYX ECIGS', 'url' => 'https://fr.nyxecigs.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Gas City Vapes', 'url' => 'https://gascityvapes.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Cool Vape', 'url' => 'https://coolvape.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Fat Panda', 'url' => 'https://fatpanda.ca/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'River City Vapes', 'url' => 'https://www.rivercityvapes.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'True North Vapor', 'url' => 'https://www.truenorthvapor.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'The Village Vaporette', 'url' => 'https://www.thevillagevaporette.com/', 'class_name' => 'ShopifyImporter']))->save();
        (new Vendor(['name' => 'Canvape', 'url' => 'https://www.canvape.com/', 'class_name' => 'VolusionImporter']))->save();
        (new Vendor(['name' => 'Digital Imports Inc.', 'url' => 'https://www.digitalimports.ca/', 'class_name' => 'VolusionImporter']))->save();
    }
}
