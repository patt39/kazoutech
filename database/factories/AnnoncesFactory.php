<?php

use App\Model\admin\annonce;
use App\Model\admin\categoryoccupation;
use App\Model\admin\city;
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

$factory->define(annonce::class, function (Faker $faker) {
    $title  = $faker->realText(rand(40,60));

    return [
        'title' => $title,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'slug' => str_slug($title),
        'photo' => $faker->imageUrl($width = 1000, $height = 900),
        'price' => $faker->randomNumber(4),
        'description' => $faker->realText(rand(50, 1000)),
        'body' => $faker->realText(rand(50, 1000)),

        'categoryoccupation_id' => categoryoccupation::inRandomOrder()->first()->id,

        'city_id' => city::inRandomOrder()->first()->id,

        'occupation_id' => occupation::inRandomOrder()->first()->id,
        'user_id' => user::inRandomOrder()->first()->id,
    ];
});
