<?php

use Faker\Generator as Faker;

$factory->define(App\Equipment::class, function (Faker $faker) {
    return [
        'equipment' => $faker->name,
        'brand' => $faker->name,
        'model' => $faker->name,
        'no_serie' => $faker->randomDigit(6),
        'patern_reference' => $faker->name,
        'specification' => $faker->paragraph
    ];
});
