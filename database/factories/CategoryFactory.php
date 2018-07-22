<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['JAVA', 'JAVASCRIPT', 'DISEÑO', 'DESARROLLO WEB', 'MYSQL', 'NOSQL', 'DOCKER', 'PYTHON', 'PHP', 'NODEJS', 'ANGULAR', 'VUEJS', 'REACTJS', 'REDUX']),
        'description' => $faker->sentence
    ];
});
