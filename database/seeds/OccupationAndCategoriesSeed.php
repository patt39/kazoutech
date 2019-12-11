<?php

use App\Model\admin\category_occupation;
use App\Model\admin\occupation;
use App\Model\user\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OccupationAndCategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addInfoDatable();
    }


    public function addInfoDatable()
    {
        $faker = Faker::create();
        $name = 'name';
        $occupations = [
            [ $name  => 'Electricité', 'slug' =>str_slug('Electricité'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Méccanique', 'slug' =>str_slug('Méccanique'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Soudure', 'slug' =>str_slug('Soudure'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Maçonnerie', 'slug' =>str_slug('Maçonnerie'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Menuiserie', 'slug' =>str_slug('Menuiserie'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Charpenterie', 'slug' =>str_slug('Charpenterie'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Menagerie', 'slug' => str_slug('Menagerie'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Démenagement', 'slug' =>str_slug('Démenagement'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Location Multiple', 'slug' =>str_slug('Location Multiple'), 'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
        ];
        foreach($occupations as $item)
            occupation::create($item);



        $category_occupations = [
            [ 'name'  => 'Installation de prises electriques', 'slug' => str_slug('Installation de prises electriques'),'occupation_id' => 1],
        ];
        foreach($category_occupations as $item)
           category_occupation::create($item);
    }
}
