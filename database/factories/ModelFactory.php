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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => strtoupper($faker->unique()->word),

    ];
});
$factory->define(App\Page::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'alias' => $faker->unique()->slug,
        'text' => $faker->paragraph(rand(5, 15)),
        'images' => $faker->imageUrl($width = 200, $height = 200),
        'is_main' => false,

    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'article' => $faker->unique()->swiftBicNumber, //RZTIAT22263
        'name' => str_replace('.', '', $faker->sentence(rand(1, 3))),
        'images' => $faker->imageUrl($width = 200, $height = 200),
        'category_id' => null,
        'price' => $faker->numberBetween($min = 800, $max = 2000),

    ];
});