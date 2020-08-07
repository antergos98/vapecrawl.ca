<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Vendor;
use Faker\Generator as Faker;

$factory->define(App\Coupon::class, function (Faker $faker) {
    return [
        'code' => $faker->name,
        'description' => $faker->text,
        'vendor_id' => factory(Vendor::class),
    ];
});
