<?php

use Faker\Generator as Faker;

$factory->define(SIS\Funcionario::class, function (Faker $faker) {
    return [
        'carnet' => $faker->unique()->ean8,
        'exp' => $faker->stateAbbr,
        'nombre' => $faker->name,
        'fecha_ingreso' => $faker->date,
    ];
});
