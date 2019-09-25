<?php

use Faker\Generator as Faker;

$factory->define(App\Travel::class, function (Faker $faker) {
  $title = $faker->sentence(4);
    return [
        'mt'             => rand(10000, 80000),
        'name'           => $title,
        'slug'           => str_slug($title),
        'department'     => $faker->text(10),
        'days'           => rand(7,9),
        'nights'         => rand(4,6),
        'price_from'     => rand(1000, 80000),
        'taxes'          => rand(300, 5000),
        'validity'       => $faker->date(),
        'departure_date' => $faker->text(20),
        'include'        => $faker->text(200),
        'not_include'    => $faker->text(200),
        'itinerary'      => $faker->text(500),
        'currency'       => $faker->text(10),
        'rooms_id'       => rand(1,9),
        'price_table'    => $faker->text(500),
        'hotels_table'   => $faker->text(500),
        'operator'       => $faker->text(20),
        'circuit'        => rand(0, 1),
        'status'         => rand(1,2),
    ];
});
