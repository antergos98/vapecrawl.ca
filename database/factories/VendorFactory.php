<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vendor;
use Faker\Generator as Faker;

$factory->define(Vendor::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    return [
        'name' => $name,
        'url' => $faker->unique()->url,
        'slug' => Str::slug($name)
    ];
});
