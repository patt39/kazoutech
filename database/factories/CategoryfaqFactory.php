<?php

use App\Model\admin\categoryfaq;
use App\Model\admin\color;
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

$factory->define(categoryfaq::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->userName,
        'status' => $faker->boolean,
        'color_name' => function () {
            return color::inRandomOrder()->first()->slug;
        },
        'user_id' => function () {
            return user::inRandomOrder()->first()->id;
        }
    ];
});
