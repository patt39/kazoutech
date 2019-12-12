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
        $description = "Votre ordinateur marche au ralenti, impossible de connecter votre imprimante ou d’installer votre box tout seul ? Inutile de démonter votre système ou de l’emmener en magasin ! Grâce à Youpijob, vous serez mis en relation avec des particuliers spécialisés en informatique et dont l’expérience est confirmée par les clients précédents. Ces techniciens sauront solutionner vos problèmes informatiques dans les meilleurs délais. Vous pourrez ainsi bénéficier de la réparation d'ordinateur ou de cours d'informatique à domicile de qualité par des experts.";
        $occupations = [
            [ $name  => 'Electricité', 'slug' =>str_slug('Electricité'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Méccanique', 'slug' =>str_slug('Méccanique'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Soudure', 'slug' =>str_slug('Soudure'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Maçonnerie', 'slug' =>str_slug('Maçonnerie'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Menuiserie', 'slug' =>str_slug('Menuiserie'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Charpenterie', 'slug' =>str_slug('Charpenterie'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Menagerie', 'slug' => str_slug('Menagerie'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Démenagement', 'slug' =>str_slug('Démenagement'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
            [ $name  => 'Location Multiple', 'slug' =>str_slug('Location Multiple'), 'description' =>$description,'photo' => $faker->imageUrl($width = 1000, $height = 900), 'user_id' => user::inRandomOrder()->first()->id],
        ];
        foreach($occupations as $item)
            occupation::create($item);


        factory(category_occupation::class, 100)->create();
    }
}
