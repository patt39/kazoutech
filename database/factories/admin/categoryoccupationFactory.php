<?php

namespace Database\Factories\admin;

use App\Model\admin\categoryoccupation;
use App\Model\admin\color;
use App\Model\admin\occupation;
use App\Model\user\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;



class categoryoccupationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Model\admin\categoryoccupation::class;

    public function definition()
    {
        $name = $this->faker->unique()->userName;
        return [
        'name' => $name,
        'slug' => str_slug($name),
        'status' => $this->faker->boolean,
        'description' => $this->faker->paragraph,
        'photo' => $this->faker->imageUrl($width = 1000, $height = 900),
        'color_id' => color::inRandomOrder()->first()->id,
        'occupation_id' => function () {
            return occupation::inRandomOrder()->first()->id;
        },
        'user_id' => function () {
            return User::inRandomOrder()->first()->id;
        }
        ];
    }
}

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(categoryoccupation::class, function (Faker $faker) {
//     return [
//         'name' => $name,
//         'slug' => str_slug($name),
//         'status' => $faker->boolean,
//         'description' => $faker->paragraph,
//         'photo' => $faker->imageUrl($width = 1000, $height = 900),
//         'color_id' => color::inRandomOrder()->first()->id,
//         'occupation_id' => function () {
//             return occupation::inRandomOrder()->first()->id;
//         },
//         'user_id' => function () {
//             return user::inRandomOrder()->first()->id;
//         }
//     ];
// });
