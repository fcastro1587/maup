<?php

use Faker\Generator as Faker;

$factory->define(App\Multimedia::class, function (Faker $faker) {
    return [
        'name'          => $faker->text(100),
        'title'         => $faker->text(100),
        'country'       => $faker->text(100),
        'city'          => $faker->text(100),
        'description'   => $faker->text(100),
        'size'          => $faker->text(100),
        'type'          => rand(0,1),
        'url'           => $faker->text(100),
        'video_type'    => rand(0, 1),
    ];
});
