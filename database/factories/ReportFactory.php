<?php

use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween(1,20),
        'equipment_id' => $faker->numberBetween(1,20),
        'descripcion' => $faker->paragraph,
        'certificado' => $faker->name,
        'calibro' => $faker->name,
        'verificacion' => $faker->name,
        'temperature' => $faker->randomDigit,
        'cumple' => 1,
        'pressure' => $faker->randomDigit,
        'humidity' => $faker->randomDigit,
        'observer' => $faker->firstNameMale,
        'hour' => $faker->time($format = 'H:i:s', $max = 'now'),
        'sisolev' => $faker->randomDigit,
        'specifications' => $faker->paragraph,
        'observation' => $faker->paragraph,
        'measurements' => '{"xaj":["1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048","1048"],"xbj":["1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232","1232"],"xaj2":["1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005","1005"],"xbj2":["1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188","1188"]}',
        'date' => date('Y-m-d H:i:s')
    ];
});