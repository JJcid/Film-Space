<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {

    $name = $faker->name;

    return [
        'type' => \App\Transaction_type::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
        'film_id' => \App\Film::all()->random()->id,
        'amount' => $faker->numberBetween(2,15)
    ];
});
