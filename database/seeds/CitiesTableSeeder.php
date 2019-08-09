<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

       $cities = array(
           array('name' => 'Abong-Mbang'),
           array('name' => 'Akonolinga'),
           array('name' => 'Bafang'),
           array('name' => 'Bafia'),
           array('name' => 'Bali'),
           array('name' => 'Bamenda'),
           array('name' => 'Bafoussam'),
           array('name' => 'Baganté'),
           array('name' => 'Batibo'),
           array('name' => 'Banyo'),
           array('name' => 'Batouri'),
           array('name' => 'Bélabo'),
           array('name' => 'Bertoua'),
           array('name' => 'Blangoua'),
           array('name' => 'Boyo'),
           array('name' => 'Buea'),
           array('name' => 'Douala'),
           array('name' => 'Dschang'),
           array('name' => 'Ebolowa'),
           array('name' => 'Edea'),
           array('name' => 'Eseka'),
           array('name' => 'Figuil'),
           array('name' => 'Fontem'),
           array('name' => 'Foumban'),
           array('name' => 'Foumbot'),
           array('name' => 'Fundong'),
           array('name' => 'Garoua'),
           array('name' => 'Garoua-boulai'),
           array('name' => 'Gazawa'),
           array('name' => 'Guider'),
           array('name' => 'Guidiguis'),
           array('name' => 'Kaéle'),
           array('name' => 'Kekem'),
           array('name' => 'Kousseri'),
           array('name' => 'Koutaba'),
           array('name' => 'Kribi'),
           array('name' => 'Kumba'),
           array('name' => 'Kumbo'),
           array('name' => 'Limbé'),
           array('name' => 'Loum'),
           array('name' => 'Magda'),
           array('name' => 'Makenene'),
           array('name' => 'Maga'),
           array('name' => 'Mamfe'),
           array('name' => 'Manjo'),
           array('name' => 'Mbalmayo'),
           array('name' => 'MBandjock'),
           array('name' => 'Mbanga'),
           array('name' => 'Meiganga'),
           array('name' => 'Mbouda'),
           array('name' => 'Melong'),
           array('name' => 'Mokolo'),
           array('name' => 'Mora'),
           array('name' => 'Muyuka'),
           array('name' => 'Nanga-Eboko'),
           array('name' => 'Ndop'),
           array('name' => 'Ngaoundal'),
           array('name' => 'Ngaoundére'),
           array('name' => 'Nkambe'),
           array('name' => 'Nkongsamba'),
           array('name' => 'Nkoteng'),
           array('name' => 'Obala'),
           array('name' => 'Pitoa'),
           array('name' => 'Sangmelima'),
           array('name' => 'Tibati'),
           array('name' => 'Tcholiré'),
           array('name' => 'Tiko'),
           array('name' => 'Tombel'),
           array('name' => 'Tonga'),
           array('name' => 'Touboro'),
           array('name' => 'Wum'),
           array('name' => 'Yabassi'),
           array('name' => 'Yagoua'),
           array('name' => 'Yaounde'),
           array('name' => 'Yokadouma'),
       );
       DB::table('cities') -> insert($cities);
    }
}
