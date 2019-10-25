<?php

use App\Model\admin\color;
use App\Model\admin\occupation;
use App\Model\admin\partial\diploma;
use App\Model\user\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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
            'email' => "temgoua2012@gmail.com",
            "password" => bcrypt('0000000'),
            'created_at' => Carbon\Carbon::now(),
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
        $god->syncRoles('super-admin');

        $pat = User::create([
            'username' =>'patrick96',
            'name' =>'Darry',
            'my_status' =>'active',
            'email' => "darrytafeng@gmail.com",
            "password" => bcrypt('0000000'),
            'created_at' => Carbon\Carbon::now(),
            'email_verified_at' => Carbon\Carbon::now(),
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
            'email' => "nzeukangrandrin@gmail.com",
            "password" => bcrypt('123456789'),
            'created_at' => Carbon\Carbon::now(),
            'email_verified_at' => Carbon\Carbon::now(),
        ]);
        $admin_user->syncRoles('admin');

        factory(User::class, 2000)->create();

        // Output
        $this->command->info('Test utenti added.');
    }

    public function addInfoDatable()
    {
       color::create(['name' =>'danger', 'user_id' =>'1',]);
       occupation::create(['name' =>'Plombier', 'user_id' =>'1',]);
       diploma::create(['name' =>'Baccalereat', 'user_id' =>'1',]);

    }

}
