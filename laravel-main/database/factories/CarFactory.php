<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'name' => $faker -> word,
        'model' => $faker -> word,
        'kw' => $faker -> randomFloat(2, 30, 500)
    ];
});
