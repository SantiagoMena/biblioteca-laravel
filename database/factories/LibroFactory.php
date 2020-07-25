<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Libro;
use Faker\Generator as Faker;

$factory->define(Libro::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'biblioteca_id' => factory(App\Biblioteca::class)
    ];
});
