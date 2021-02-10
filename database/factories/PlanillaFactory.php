<?php

use Faker\Generator as Faker;

$factory->define(SIS\Planilla::class, function (Faker $faker) {
    return [
        'nroplanilla' => $faker->randomDigitNotNull,
        'modalidad_id' => rand(1,2),
        'gestion' => 2019,
        'mes' => $faker->monthName,
        'user_id' => 1,
    ];
});
