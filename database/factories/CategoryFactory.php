<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $array = array("Blocs tombola", "Papiers", "Ecriture et Correction", "Enveloppes et étiquettes", "Attaches et Fixations");
    $key = array_rand($array);
    return [
        'name'=> $array[$key],
        'description' => $faker->realText(100)
    ];
});
