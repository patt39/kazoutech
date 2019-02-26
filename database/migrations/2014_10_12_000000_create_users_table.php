<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('last_name')->nullable();
            $table->string('edited_by')->nullable();
            $table->string('first_name')->nullable();
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->string('provider')->unique()->nullable();
            $table->string('avatar')->nullable()->default('https://s3.eu-west-3.amazonaws.com/mes-avatar/face.jpg');;
            $table->string('avatarcover')->nullable()->default('https://s3.eu-west-3.amazonaws.com/mes-avatar/image.jpg');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
