<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {

    $name = $faker->sentence;

    return [
        'category_id' => \App\Category::all()->random->id,
        'name' => $name,
        'slug' => str_slug($name, '-'), 
        'launch_date' => \Faker\Provider\DateTime::date($format = 'Y-m-d', $max = 'now'),
        'description' => $faker->paragraph,
        'picture' => \Faker\Provider\Image::image(storage_path() . '/app/public/courses', 600, 350, 'business', false),
        'suscription' => $faker->random([\App\Film::SUBSCRITION, \App\Film::NO_SUBSCRIPTION]),
        'sale_price' => numberBetween(12, 15),
        'rent_price' => numberBetween(2,4)
    ];
});
