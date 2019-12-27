<?php

/** @var Factory $factory */

use App\Model\admin\slide\slidehome;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

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

$factory->define(slidehome::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'description' => $faker->realText,
        'status' =>$faker->boolean,
        'photo' => $faker->imageUrl($width = 1800, $height = 900),
        'user_id' => user::inRandomOrder()->first()->id,
    ];
});
