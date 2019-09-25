<?php

use Faker\Generator as Faker;

$factory->define(App\Tour::class, function (Faker $faker) {
    return [
        'department'            => $faker->text(11),
        'title'                 => $faker->text(100),
        'especial_itinerary'    => $faker->text(200),
    ];
});
