<?php

namespace Database\Factories\admin;

use App\Model\admin\blog;
use App\Model\admin\color;
use App\Model\admin\occupation;
use App\Model\user\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class blogFactory extends Factory {

       protected $model = blog::class;

       public function definition() {
        $title  = $faker->realText(rand(10,30));

        return [
            'title' => $title,
            'status' => $faker->boolean,
            'slug' => str_slug($title),
            'color_id' => color::inRandomOrder()->first()->id,
            'photo' => $faker->imageUrl($width = 1000, $height = 900),
            'body' => $faker->realText(rand(10000, 40000)),
            'occupation_id' => occupation::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}