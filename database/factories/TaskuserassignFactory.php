<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\admin\annonce;
use App\Model\admin\taskuserassign;
use App\Model\user\User;
use Faker\Generator as Faker;

$factory->define(taskuserassign::class, function (Faker $faker) {
    $title  = $faker->realText(rand(40,60));
    return [
        'title' => $title,
        'status' => $faker->boolean,
        'slug' => str_slug($title),
        'periode' => $faker->randomDigitNot(5),
        'description' => $faker->realText(rand(50, 1000)),
        'annonce_id' => annonce::inRandomOrder()->first()->id,
        'user_id' => user::inRandomOrder()->first()->id,
        'member_id' => user::inRandomOrder()->first()->id
    ];
});
