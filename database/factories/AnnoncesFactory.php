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
    $title  = $faker->realText(rand(10,30));

    return [
        'title' => $title,
        'slug' => str_slug($title),
        'price' => $faker->randomNumber(3),
        'description' => $faker->realText(rand(50, 1000)),

        'categoryoccupation_id' => categoryoccupation::inRandomOrder()->first()->id,

        'city_id' => city::inRandomOrder()->first()->id,

        'occupation_id' => occupation::inRandomOrder()->first()->id,
        'user_id' => user::inRandomOrder()->first()->id,
    ];
});
