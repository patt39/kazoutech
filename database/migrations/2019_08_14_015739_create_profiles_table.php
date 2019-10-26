<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ip')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('work')->nullable();
            $table->string('age')->nullable();
            $table->string('phone')->nullable();
              //si le status es true il est en line false il est offline
            $table->boolean('status_online')->default(true);
              // il met son profile en prive ou en public
            $table->boolean('status_profile')->default(true);
            $table->longText('body')->nullable();
            $table->string('address')->nullable();
            $table->string('color_style')->nullable();
            $table->timestamps();

            $table->unsignedInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
