<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        'departament_code'        => $faker->text(10),
        'name'                    => $faker->text(100),
        'img_name'                => $faker->text(100),
    ];
});
