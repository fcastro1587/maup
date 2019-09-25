<?php

use Faker\Generator as Faker;

$factory->define(App\Airline::class, function (Faker $faker) {
    return [
        'code_iata'     => $faker->text(10),
        'airline'       => $faker->text(100),
        'img_airline'   => $faker->text(),
    ];
});
