<?php

use Faker\Generator as Faker;

$factory->define(App\Film::class, function (Faker $faker) {

    $name = $faker->sentence(3);

    return [
        'category_id' => \App\Category::all()->random()->id,
        'name' => $name,
        'slug' => str_slug($name, '-'), 
        'launch_date' => \Faker\Provider\DateTime::dateTime($max = 'now'),
        'description' => $faker->paragraph,
        'picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/films', 600, 350, 'business', false),
        'subscription' => $faker->randomElement([\App\Film::SUBSCRIPTION, \App\Film::NO_SUBSCRIPTION]),
        'sale_price' => $faker->numberBetween(12, 15),
        'rent_price' => $faker->numberBetween(2,4)
    ];
});
