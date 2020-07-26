<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "name" => $faker->sentence(3),
        "description" => $faker->realText(100),
        "unit_price" => $faker->randomFloat(2,1,250),
        "unit_weight" => $faker->randomNumber(2),
        "stock_quantity" => $faker->randomNumber(3),
        'category_id' => function () {
            return App\Models\Category::inRandomOrder()->first()->id;
        },
        'supplier_id' => function () {
            return App\Models\Supplier::inRandomOrder()->first()->id;
        },
    ];
});
