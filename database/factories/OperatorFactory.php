<?php

use Faker\Generator as Faker;

$factory->define(App\Operator::class, function (Faker $faker) {
    return [
      'code'            => $faker->text(20),
      'code_department' => $faker->text(100),
      'name'            => $faker->text(100),
    ];
});
