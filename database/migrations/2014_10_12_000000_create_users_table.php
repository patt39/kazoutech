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
            $table->string('email')->nullable();
            $table->string('sex')->default('Male');
            $table->string('color_name')->nullable()->default('success');
            $table->string('my_status')->nullable()->default('0');
            $table->boolean('charbonneur')->nullable()->default(false);
            $table->boolean('technician')->nullable()->default(false);
            $table->string('avatar')->nullable()->default('https://www.kazoucoin.com/assets/img/default-avatar.png');
            $table->string('avatarcover')->nullable()->default('https://www.kazoucoin.com/assets/img/photo.jpg');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('country_id')->nullable()->index();
            $table->unsignedBigInteger('occupation_id')->nullable()->index();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
