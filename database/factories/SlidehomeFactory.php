<?php

namespace Database\Factories;

use App\Model\admin\slide\slidehome;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


Class SlidehomeFactory {

    protected $model = slidehome::class;

    public function definition() {

        return [
            'title' => $faker->sentence(10),
            'description' => $faker->realText,
            'status' =>$faker->boolean,
            'photo' => $faker->imageUrl($width = 1800, $height = 900),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

