<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'url' => $faker->unique()->url,
        'class_name' => 'ShopifyImporter',
        'enabled' => true
    ];
});
