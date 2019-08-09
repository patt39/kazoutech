<?php

use Illuminate\Database\Seeder;

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
           'name' => 'Abong-Mbang',
           'name' => 'Akonolinga',
           'name' => 'Bafang',
           'name' => 'Bafia',
           'name' => 'Bali',
           'name' => 'Bamenda',
           'name' => 'Bafoussam',
           'name' => 'Baganté',
           'name' => 'Batibo',
           'name' => 'Banyo',
           'name' => 'Batouri',
           'name' => 'Bélabo',
           'name' => 'Bertoua',
           'name' => 'Blangoua',
           'name' => 'Boyo',
           'name' => 'Buea',
           'name' => 'Douala',
           'name' => 'Dschang',
           'name' => 'Ebolowa',
           'name' => 'Edea',
           'name' => 'Eseka',
           'name' => 'Figuil',
           'name' => 'Fontem',
           'name' => 'Foumban',
           'name' => 'Foumbot',
           'name' => 'Fundong',
           'name' => 'Garoua',
           'name' => 'Garoua-boulai',
           'name' => 'Gazawa',
           'name' => 'Guider',
           'name' => 'Guidiguis',
           'name' => 'Kaéle',
           'name' => 'Kekem',
           'name' => 'Kousseri',
           'name' => 'Koutaba',
           'name' => 'Kribi',
           'name' => 'Kumba',
           'name' => 'Kumbo',
           'name' => 'Limbé',
           'name' => 'Loum',
           'name' => 'Magda',
           'name' => 'Makenene',
           'name' => 'Maga',
           'name' => 'Mamfe',
           'name' => 'Manjo',
           'name' => 'Mbalmayo',
           'name' => 'MBandjock',
           'name' => 'Mbanga',
           'name' => 'Meiganga',
           'name' => 'Mbouda',
           'name' => 'Melong',
           'name' => 'Mokolo',
           'name' => 'Mora',
           'name' => 'Muyuka',
           'name' => 'Nanga-Eboko',
           'name' => 'Ndop',
           'name' => 'Ngaoundal',
           'name' => 'Ngaoundére',
           'name' => 'Nkambe',
           'name' => 'Nkongsamba',
           'name' => 'Nkoteng',
           'name' => 'Obala',
           'name' => 'Pitoa',
           'name' => 'Sangmelima',
           'name' => 'Tibati',
           'name' => 'Tcholiré',
           'name' => 'Tiko',
           'name' => 'Tombel',
           'name' => 'Tonga',
           'name' => 'Touboro',
           'name' => 'Wum',
           'name' => 'Yabassi',
           'name' => 'Yagoua',
           'name' => 'Yaounde',
           'name' => 'Yokadouma',
       );
       DB::table('cities') -> insert($cities);
    }
}
