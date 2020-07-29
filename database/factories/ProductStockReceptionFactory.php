<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductStockReception;
use Faker\Generator as Faker;

$factory->define(ProductStockReception::class, function (Faker $faker) {
    return [
        'product_quantity' => $faker->randomNumber(3),
        'stock_reception_id' => function () {
            return App\Models\StockReception::inRandomOrder()->first()->id;
        },
        'product_id' => function () {
            return App\Models\Product::inRandomOrder()->first()->id;
        },
    ];
});
