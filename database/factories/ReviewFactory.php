<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'film_id' => $faker->App/Film::all()->random()->id,
        'rating' => $faker->randomFloat(2, 1, 5) // 2 decimales min 1 max 5
    ];
});
