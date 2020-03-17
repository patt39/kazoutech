<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskuserassignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskuserassigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('periode')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('annonce_id')->nullable()->index();
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('member_id')->nullable()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('annonce_id')->references('id')->on('annonces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskuserassigns');
    }
}
