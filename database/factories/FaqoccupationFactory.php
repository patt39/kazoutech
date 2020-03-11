<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\admin\faqoccupation;
use App\Model\admin\occupation;
use App\Model\user\User;
use Faker\Generator as Faker;

$factory->define(faqoccupation::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(7),
        'body' => $faker->realText(rand(400, 1000)),
        'status' =>$faker->boolean,
        'occupation_id' => occupation::inRandomOrder()->first()->id,
        'user_id' => user::inRandomOrder()->first()->id,
    ];
});
