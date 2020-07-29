<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        "address" => $faker->address,
        'city_id' => function () {
            return App\Models\City::inRandomOrder()->first()->id;
        }
    ];
});
