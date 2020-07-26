<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockReception;
use Faker\Generator as Faker;

$factory->define(StockReception::class, function (Faker $faker) {
    return [
        "reception_number" =>$faker->stateAbbr.$faker->year().$faker->month().$faker->dayOfMonth()."-".$faker->randomNumber(3),
        "reception_date" => $faker->dateTime(),
        'store_id' => function () {
            return App\Models\Store::inRandomOrder()->first()->id;
        },
        'supplier_id' => function () {
            return App\Models\Supplier::inRandomOrder()->first()->id;
        },
    ];
});
