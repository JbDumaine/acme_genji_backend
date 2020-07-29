<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Command;
use Faker\Generator as Faker;

$factory->define(Command::class, function (Faker $faker) {
    return [
        "command_number" => $faker->stateAbbr . $faker->year() . $faker->month() . $faker->dayOfMonth() . "-" . $faker->randomNumber(6),
        "delivery_date" =>$faker->dateTime(),
        'state_id' => function () {
            return App\Models\State::inRandomOrder()->first()->id;
        },
        'store_id' => function () {
            return App\Models\Store::inRandomOrder()->first()->id;
        },
    ];
});
