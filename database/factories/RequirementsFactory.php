<?php

use Faker\Generator as Faker;

$factory->define(App\Requirements::class, function (Faker $faker) {
    return [
        'course_id' => $faker->App/Course::all()->random()->id,
        'requirements' => $faker->sentence
    ];
});
