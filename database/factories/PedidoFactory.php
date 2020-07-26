<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pedido;
use Faker\Generator as Faker;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
        'estado' => 'Regresado',
        'usuario_id' => factory(App\Usuario::class),
        'libro_id' => factory(App\Libro::class)
    ];
});

$factory->state(App\Pedido::class, 'Regresado', [
    'estado' => 'Regresado',
]);

$factory->state(App\Pedido::class, 'Prestado', [
    'estado' => 'Prestado'
]);