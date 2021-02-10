<?php

use Faker\Generator as Faker;

$factory->define(SIS\Papeleta::class, function (Faker $faker) {
    return [
        'planilla_id' => rand(1,12),
        'funcionario_id' => rand(1,50),
        'modalidad_id' => rand(1,2),
        'dias_trabajados' => $faker->numberBetween(1,30),
        'item' => $faker->numberBetween(1,500),
        'cargo' => $faker->jobTitle,
        'cuentabancaria' => $faker->creditCardNumber,
        'haberbasico' => $faker->randomFloat(),
        'antiguedad' => $faker->randomFloat(),
        'subsidios' => $faker->randomFloat(),
        'otrosingresos' => $faker->randomFloat(),
        'totalingresos' => $faker->randomFloat(),
        'iva' => $faker->randomFloat(),
        'afp' => $faker->randomFloat(),
        'fondossolidarioasegurado' => $faker->randomFloat(),
        'memomulta' => $faker->randomFloat(),
        'descuentosindicato' => $faker->randomFloat(),
        'retjudicial' => $faker->randomFloat(),
        'otrosdescuentos' => $faker->randomFloat(),
        'totaldescuento' => $faker->randomFloat(),
        'liquidopagable' => $faker->randomFloat(),
    ];
});
