<?php

namespace Database\Factories\slide;

use App\Model\admin\slide\slidehome;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;


Class slidehomeFactory extends Factory {

    protected $model = slidehome::class;

    public function definition() {

        return [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->realText,
            'status' => $this->faker->boolean,
            'photo' => $this->faker->imageUrl($width = 1800, $height = 900),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

