<?php

namespace Database\Factories;

use App\Model\admin\faqoccupation;
use App\Model\admin\occupation;
use App\Model\user\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;



class FaqoccupationFactory extends Factory {

    protected $model = faqoccupation::class;
     
    public function definition() {

        return [
            'title' => $faker->sentence(7),
            'body' => $faker->realText(rand(400, 1000)),
            'status' =>$faker->boolean,
            'occupation_id' => occupation::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
