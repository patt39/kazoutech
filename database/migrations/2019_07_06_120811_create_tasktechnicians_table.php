<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasktechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasktechnicians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable();
            $table->string('district')->nullable();
            $table->longText('task')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('technician_id')->nullable()->index();
            $table->foreign('technician_id')->references('id')->on('technicians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasktechnicians');
    }
}
