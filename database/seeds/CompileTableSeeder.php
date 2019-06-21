<?php

use Illuminate\Database\Seeder;

class CompileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           // Admin Test Randrin
        for ($i = 0; $i < 1; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'username' =>'randrino1'.$i,
                'name' =>'Nzeukang',
                'my_status' =>'active',
                'email' => "nzeukangrandrin@gmail.com",
                "password" => bcrypt('123456789'),
                'created_at' => Carbon\Carbon::now(),
                'email_verified_at' => Carbon\Carbon::now(),

            ]);
        }

        for ($i = 0; $i < 1; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'username' =>'bokino12',
                'name' =>'Boclair Temgoua',
                'my_status' =>'active',
                'email' => "temgoua2012@gmail.com",
                "password" => bcrypt('0000000'),
                'created_at' => Carbon\Carbon::now(),
                'email_verified_at' => Carbon\Carbon::now(),

            ]);
        }
        for ($i = 0; $i < 1; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'username' =>'bokino10',
                'name' =>'Mitofo Gogo',
                'my_status' =>'active',
                'email' => "temgoua2010@gmail.com",
                "password" => bcrypt('0000000'),
                'created_at' => Carbon\Carbon::now(),
                'email_verified_at' => Carbon\Carbon::now(),

            ]);
        }

        for ($i = 3; $i < 10; $i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'username' =>'bokino1'.$i,
                'name' =>'Temgoua'.$i,
                'email' => "temgoua201$i@yahoo.fr",
                "password" => bcrypt('0000000'),
                'created_at' => Carbon\Carbon::now(),

            ]);
        }





        // $this->call(UsersTableSeeder::class);

    }
}
