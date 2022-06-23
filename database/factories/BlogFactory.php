<?php

use App\Model\admin\blog;
use App\Model\admin\color;
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

$factory->define(blog::class, function (Faker $faker) {
    $title  = $faker->realText(rand(10,30));

    return [
        'title' => $title,
        'status' => $faker->boolean,
        'slug' => str_slug($title),
        'color_id' => color::inRandomOrder()->first()->id,
        'photo' => $faker->imageUrl($width = 1000, $height = 900),
        'body' => $faker->realText(rand(10000, 40000)),
        'occupation_id' => occupation::inRandomOrder()->first()->id,
        'user_id' => user::inRandomOrder()->first()->id,
    ];
});
