<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowtoregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('howtoregisters', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ip')->nullable();
                $table->unsignedInteger('user_id')->nullable()->index();
                $table->string('slug')->nullable();
                $table->integer('status')->nullable()->default('2');
                $table->string('image')->nullable()->default('https://www.kazoucoin.com/assets/img/photo.jpg');
                $table->string('title')->nullable();
                $table->string('icon')->nullable();
                $table->string('icon_number')->nullable();
                $table->string('color_name')->nullable();
                $table->longText('body')->nullable();
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
        Schema::dropIfExists('howtoregisters');
    }
}
