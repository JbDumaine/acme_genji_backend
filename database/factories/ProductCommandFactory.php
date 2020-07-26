<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductCommand;
use Faker\Generator as Faker;

$factory->define(ProductCommand::class, function (Faker $faker) {
    return [
        'product_quantity' => $faker->randomNumber(3),
        'product_id' => function () {
            return App\Models\Product::inRandomOrder()->first()->id;
        },
        'command_id' => function () {
            return App\Models\Command::inRandomOrder()->first()->id;
        },
    ];
});
