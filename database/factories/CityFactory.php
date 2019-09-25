<?php

use Faker\Generator as Faker;

$factory->define(App\City::class, function (Faker $faker) {
    return [
        'name'                => $faker->text(100),
        'country_code_iata'   => $faker->text(50),
        'longitude'           => $faker->text(100),
        'latitude'            => $faker->text(100),
    ];
});
