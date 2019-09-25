<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
    return [
        'code_iata'           => $faker->text(10),
        'name_country'        => $faker->text(100),
    ];
});
