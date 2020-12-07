<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(),
        'in_stock' => $faker->boolean,
        'image' => $faker->imageUrl(),
        'url' => $faker->url,
        'vendor_id' => factory(Vendor::class),
    ];
});
