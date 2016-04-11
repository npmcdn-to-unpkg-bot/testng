<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Author::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'link' => $faker->url,
    ];
});

$factory->define(App\Continuation::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5),
        'link' => $faker->url,
        'size' => $faker->randomFloat(2,0.1,10000),
        'time' => $faker->time($format = 'H:i', $max = 'now'),
        'author_id' => \App\Author::Random()->first()->id,
        'genre_id' => \App\Genre::Random()->first()->id,

    ];
});
