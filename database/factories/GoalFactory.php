<?php

use Faker\Generator as Faker;

$factory->define(App\Goal::class, function (Faker $faker) {
    return [
        'course_id' => \App\Courses::all()->random->id,
        'goal' => $faker->sentence
    ];
});
