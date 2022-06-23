<?php

namespace Database\Factories\admin;

use App\Model\admin\categoryfaq;
use App\Model\admin\faq;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class faqFactory extends Factory {


    protected $model = faq::class;

    public function definition(){
        return [
            'title' => $this->faker->sentence(4),
            'ip' => $this->faker->ipv4,
            'body' => $this->faker->realText,
            'status' =>$this->faker->boolean,
            'categoryfaq_id' => categoryfaq::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}

