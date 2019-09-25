<?php

use Faker\Generator as Faker;

$factory->define(App\Currency::class, function (Faker $faker) {
    return [
        'currency_travels' => $faker->text(10),
        'description'      => $faker->text(255),
    ];
});
