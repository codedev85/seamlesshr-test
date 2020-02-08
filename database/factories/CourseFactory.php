<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'unit'=> $faker->numberBetween(1,5),
        'description' => $faker->paragraph,
    ];
});


