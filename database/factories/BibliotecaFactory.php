<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Biblioteca;
use Faker\Generator as Faker;

$factory->define(Biblioteca::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name
    ];
});
