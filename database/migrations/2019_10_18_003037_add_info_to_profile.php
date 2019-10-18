<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function (Blueprint $table) {
            //si le status es true il est en line false il est offline
            $table->boolean('status_online')->default(true)->after('last_name');
            // il met son profile en prive ou en public
            $table->boolean('status_profile')->default(true)->after('sex');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function (Blueprint $table) {
            Schema::dropIfExists('profiles');
        });
    }
}
