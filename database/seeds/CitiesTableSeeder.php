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
           array('photo' => $photo ,'name' => 'Abong-Mbang'),
           array('photo' => $photo ,'name' => 'Akonolinga'),
           array('photo' => $photo ,'name' => 'Bafang'),
           array('photo' => $photo ,'name' => 'Bafia'),
           array('photo' => $photo ,'name' => 'Bali'),
           array('photo' => $photo ,'name' => 'Bamenda'),
           array('photo' => $photo ,'name' => 'Bafoussam'),
           array('photo' => $photo ,'name' => 'Baganté'),
           array('photo' => $photo ,'name' => 'Batibo'),
           array('photo' => $photo ,'name' => 'Banyo'),
           array('photo' => $photo ,'name' => 'Batouri'),
           array('photo' => $photo ,'name' => 'Bélabo'),
           array('photo' => $photo ,'name' => 'Bertoua'),
           array('photo' => $photo ,'name' => 'Blangoua'),
           array('photo' => $photo ,'name' => 'Boyo'),
           array('photo' => $photo ,'name' => 'Buea'),
           array('photo' => $photo ,'name' => 'Douala'),
           array('photo' => $photo ,'name' => 'Dschang'),
           array('photo' => $photo ,'name' => 'Ebolowa'),
           array('photo' => $photo ,'name' => 'Edea'),
           array('photo' => $photo ,'name' => 'Eseka'),
           array('photo' => $photo ,'name' => 'Figuil'),
           array('photo' => $photo ,'name' => 'Fontem'),
           array('photo' => $photo ,'name' => 'Foumban'),
           array('photo' => $photo ,'name' => 'Foumbot'),
           array('photo' => $photo ,'name' => 'Fundong'),
           array('photo' => $photo ,'name' => 'Garoua'),
           array('photo' => $photo ,'name' => 'Garoua-boulai'),
           array('photo' => $photo ,'name' => 'Gazawa'),
           array('photo' => $photo ,'name' => 'Guider'),
           array('photo' => $photo ,'name' => 'Guidiguis'),
           array('photo' => $photo ,'name' => 'Kaéle'),
           array('photo' => $photo ,'name' => 'Kekem'),
           array('photo' => $photo ,'name' => 'Kousseri'),
           array('photo' => $photo ,'name' => 'Koutaba'),
           array('photo' => $photo ,'name' => 'Kribi'),
           array('photo' => $photo ,'name' => 'Kumba'),
           array('photo' => $photo ,'name' => 'Kumbo'),
           array('photo' => $photo ,'name' => 'Limbé'),
           array('photo' => $photo ,'name' => 'Loum'),
           array('photo' => $photo ,'name' => 'Magda'),
           array('photo' => $photo ,'name' => 'Makenene'),
           array('photo' => $photo ,'name' => 'Maga'),
           array('photo' => $photo ,'name' => 'Mamfe'),
           array('photo' => $photo ,'name' => 'Manjo'),
           array('photo' => $photo ,'name' => 'Mbalmayo'),
           array('photo' => $photo ,'name' => 'MBandjock'),
           array('photo' => $photo ,'name' => 'Mbanga'),
           array('photo' => $photo ,'name' => 'Meiganga'),
           array('photo' => $photo ,'name' => 'Mbouda'),
           array('photo' => $photo ,'name' => 'Melong'),
           array('photo' => $photo ,'name' => 'Mokolo'),
           array('photo' => $photo ,'name' => 'Mora'),
           array('photo' => $photo ,'name' => 'Muyuka'),
           array('photo' => $photo ,'name' => 'Nanga-Eboko'),
           array('photo' => $photo ,'name' => 'Ndop'),
           array('photo' => $photo ,'name' => 'Ngaoundal'),
           array('photo' => $photo ,'name' => 'Ngaoundére'),
           array('photo' => $photo ,'name' => 'Nkambe'),
           array('photo' => $photo ,'name' => 'Nkongsamba'),
           array('photo' => $photo ,'name' => 'Nkoteng'),
           array('photo' => $photo ,'name' => 'Obala'),
           array('photo' => $photo ,'name' => 'Pitoa'),
           array('photo' => $photo ,'name' => 'Sangmelima'),
           array('photo' => $photo ,'name' => 'Tibati'),
           array('photo' => $photo ,'name' => 'Tcholiré'),
           array('photo' => $photo ,'name' => 'Tiko'),
           array('photo' => $photo ,'name' => 'Tombel'),
           array('photo' => $photo ,'name' => 'Tonga'),
           array('photo' => $photo ,'name' => 'Touboro'),
           array('photo' => $photo ,'name' => 'Wum'),
           array('photo' => $photo ,'name' => 'Yabassi'),
           array('photo' => $photo ,'name' => 'Yagoua'),
           array('photo' => $photo ,'name' => 'Yaounde'),
           array('photo' => $photo ,'name' => 'Yokadouma'),
       );
       DB::table('cities') -> insert($cities);
    }
}
