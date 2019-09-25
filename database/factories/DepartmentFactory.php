<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
      'code'           => rand(1,20),
      'name'           => $faker->text(100),
      'initial_range'  => rand(50,100),
      'final_range'    => rand(101,200),
    ];
});
