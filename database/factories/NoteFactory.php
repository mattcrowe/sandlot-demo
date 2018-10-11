<?php

use Faker\Generator as Faker;
use App\Http\Middleware\SetGuidCookie;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Note::class, function (Faker $faker) {
    return [
        'color' => array_random(array_keys(config('colors'))),
        'title' => $faker->words(rand(1, 3), true),
        'body' => $faker->words(rand(5, 25), true),
    ];
});
