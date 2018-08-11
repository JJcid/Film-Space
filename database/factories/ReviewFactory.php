<?php

use Faker\Generator as Faker;

$factory->define(App\Review::class, function (Faker $faker) {
    return [
        'film_id' => App\Film::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
        'rating' => $faker->numberBetween(1, 5) //min 1 max 5
    ];
});
