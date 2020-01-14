<?php

use App\Model\admin\categoryfaq;
use App\Model\admin\color;
use App\Model\admin\faq;
use App\Model\admin\occupation;
use App\Model\admin\partial\diploma;
use App\Model\admin\slide\slidehome;
use App\Model\user\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;
class CompileTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addDefaultUtenti();
        $this->addInfoDatable();


        if (config('app.env') !== 'production') {
            $this->addTestUtenti();
        }
    }

    private function addDefaultUtenti()
    {
        // Truncate table
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $god = User::create([
            'username' =>'bokino12',
            'name' =>'Boclair Temgoua',
            'my_status' =>'active',
            'city_id' => 5,
            'email' => "temgoua2012@gmail.com",
            'occupation_id' => 1,
            "password" => bcrypt('0000000'),
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
        $god->syncRoles('super-admin');

        $pat = User::create([
            'username' =>'patrick96',
            'name' =>'Darry',
            'my_status' =>'active',
            'city_id' => 5,
            'email' => "darrytafeng@gmail.com",
            'occupation_id' => 1,
            "password" => bcrypt('0000000'),
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
        $pat->syncRoles('super-admin');
    }

    private function addTestUtenti()
    {
        // Seeds
        $admin_user = User::create([
            'username' =>'randrino17',
            'name' =>'Nzeukang',
            'my_status' =>'active',
            'city_id' => 5,
            'email' => "nzeukangrandrin@gmail.com",
            'occupation_id' => 1,
            "password" => bcrypt('123456789'),
            'created_at' => now(),
            'email_verified_at' => now(),
        ]);
        $admin_user->syncRoles('super-admin');


        factory(categoryfaq::class, 1)->create();
        factory(faq::class, 2)->create();
        factory(slidehome::class, 3)->create();


        // Output
        $this->command->info('Test data added.');
    }

    public function addInfoDatable()
    {
        DB::table('colors')->delete();
        $colors = array(
            array('name' => 'success', 'slug' => 'success', 'user_id' => '1'),
            array('name' => 'danger', 'slug' => 'danger', 'user_id' => '2'),
            array('name' => 'info', 'slug' => 'info', 'user_id' => '1'),
            array('name' => 'primary', 'slug' => 'primary', 'user_id' => '1'),
        );
        DB::table('colors')->insert($colors);

        diploma::create(['name' =>'Baccalereat', 'user_id' =>'1',]);

    }

}
