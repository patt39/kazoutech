<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviscontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deviscontacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('slug')->nullable();
            $table->string('ip')->nullable();
            $table->longText('message')->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('confirm_send');
            $table->timestamps();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('occupation_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deviscontacts');
    }
}
