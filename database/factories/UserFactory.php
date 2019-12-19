<?php

use App\Model\admin\occupation;
use App\Model\user\User;
use Faker\Generator as Faker;

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

//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'email_verified_at' => now(),
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        //'first_name' => $faker->firstName,
        'avatar' => $faker->imageUrl($width = 400, $height = 400),
        'avatarcover' => $faker->imageUrl,
        'occupation_id' => occupation::inRandomOrder()->first()->id,
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        //'phone' => $faker->unique()->numerify('+393#########'),
        'password' => bcrypt('0000000'),
    ];
});


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
