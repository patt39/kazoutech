<?php

use App\Model\admin\categoryoccupation;
use App\Model\admin\occupation;
use App\Model\user\User;
use Faker\Generator as Faker;

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

$factory->define(categoryoccupation::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->userName,
        'status' => $faker->boolean,
        'description' => $faker->paragraph,
        'photo' => $faker->imageUrl($width = 1000, $height = 900),
        'occupation_id' => function () {
            return occupation::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return user::inRandomOrder()->first()->id;
        }
    ];
});
