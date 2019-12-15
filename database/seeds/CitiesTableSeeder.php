<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('cities') -> delete();
        $faker = Faker::create();
        $photo = $faker->imageUrl($width = 1000, $height = 900);
       $cities = array(
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Abong-Mbang'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Akonolinga'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Bafang'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Bafia'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Bali'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Bamenda'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Bafoussam'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Baganté'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Batibo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Banyo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Batouri'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Bélabo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Bertoua'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Blangoua'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Boyo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Buea'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Douala'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Dschang'),
           array('photo' => $photo , 'status' => true, 'city_vip' => false, 'name' => 'Ebolowa'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Edea'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Eseka'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Figuil'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Fontem'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Foumban'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Foumbot'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Fundong'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Garoua'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Garoua-boulai'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Gazawa'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Guider'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Guidiguis'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Kaéle'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Kekem'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Kousseri'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Koutaba'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Kribi'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Kumba'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Kumbo'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Limbé'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Loum'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Magda'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Makenene'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Maga'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mamfe'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Manjo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mbalmayo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'MBandjock'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mbanga'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Meiganga'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mbouda'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Melong'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mokolo'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Mora'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Muyuka'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Nanga-Eboko'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Ndop'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Ngaoundal'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Ngaoundére'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Nkambe'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Nkongsamba'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Nkoteng'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Obala'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Pitoa'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Sangmelima'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Tibati'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Tcholiré'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Tiko'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Tombel'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Tonga'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Touboro'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Wum'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Yabassi'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Yagoua'),
           array('photo' => $photo , 'status' => true, 'city_vip' => true, 'name' => 'Yaounde'),
           array('photo' => $photo , 'status' => $faker->boolean, 'city_vip' => false, 'name' => 'Yokadouma'),
       );
       DB::table('cities') -> insert($cities);
    }
}
