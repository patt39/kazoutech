<?php

namespace Database\Factories\admin;
use App\Model\admin\categoryfaq;
use App\Model\admin\color;
use App\Model\user\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class categoryfaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
      
     protected $model = categoryfaq::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->userName,
            'status' => $this->faker->boolean,
            'color_name' => function () {
                return color::inRandomOrder()->first()->slug;
            },
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;
            }
        ];
    }
}
