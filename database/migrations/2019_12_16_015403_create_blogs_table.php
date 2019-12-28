<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(true);
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('color_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->unsignedBigInteger('occupation_id')->nullable()->index();
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
