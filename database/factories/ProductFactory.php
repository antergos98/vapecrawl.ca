<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(),
        'in_stock' => $faker->boolean,
        'image' => $faker->imageUrl(),
        'url' => $faker->url,
        'real_id' => $faker->randomNumber(),
        'vendor_id' => factory(Vendor::class),
    ];
});
