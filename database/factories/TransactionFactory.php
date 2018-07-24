<?php

use Faker\Generator as Faker;

$factory->define(App\Transaction::class, function (Faker $faker) {
    return [
        'type' => \App\TransactionType::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
        'film_id' => \App\Film::all()->random()->id,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'slug' => str_slug($name . ' ' . $last_name, '-'),
        'picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/users', 200, 200, 'people', false)
    ];
});
