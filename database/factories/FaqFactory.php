<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
use App\Model\user\User;
use Faker\Generator as Faker;
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

$factory->define(faq::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'ip' => $faker->ipv4,
        'body' => $faker->realText,
        'status' =>$faker->boolean,
        'categoryfaq_id' => function () {
            return categoryfaq::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return user::inRandomOrder()->first()->id;
        }
    ];
});
