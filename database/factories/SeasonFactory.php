<?php

use Faker\Generator as Faker;

$factory->define(App\Season::class, function (Faker $faker) {
    return [
        'code_season'  => $faker->string(20),
        'name'         => $faker->string(50),
    ];
});
