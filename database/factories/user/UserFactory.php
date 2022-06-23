<?php

namespace Database\Factories\user;

use App\Model\admin\city;
use App\Model\admin\color;
use App\Model\admin\occupation;
use App\Model\user\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


class UserFactory extends Factory{
    
    protected $model = User::class;

    public function definition(){
        return [
            'username' => $this->faker->unique()->userName,
            //'first_name' => $faker->firstName,
            'avatar' => $this->faker->imageUrl($width = 400, $height = 400),
            'avatarcover' => $this->faker->imageUrl,
            'occupation_id' => occupation::inRandomOrder()->first()->id,
            'name' => $this->faker->firstName,
            'charbonneur' => $this->faker->boolean,
            'status_profile_verify' => $this->faker->boolean,
            'email' => $this->faker->unique()->safeEmail,
            'color_name' => color::inRandomOrder()->first()->name,
            'city_id' => city::inRandomOrder()->first()->id,
            //'phone' => $faker->unique()->numerify('+393#########'),
            'password' => bcrypt('0000000'),
        ];
    }
}


//$factory->define(\App\Model\user\message::class, function (Faker $faker) {
//
//    do{
//     $from = rand(1,10);
//     $to = rand(1,10);
//    }while ($from === $to);
//
//    return[
//        'from_id' =>$from,
//        'to_id' =>$to,
//        'message' =>$faker->sentence
//    ];
//});
