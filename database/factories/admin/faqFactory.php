<?php

namespace Database\Factories\admin;

use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

class faqFactory extends Factory {

    protected $model = faq::class;

    public function definition(){
        return [
            'title' => $faker->sentence(4),
            'ip' => $faker->ipv4,
            'body' => $faker->realText,
            'status' =>$faker->boolean,
            'categoryfaq_id' => categoryfaq::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

