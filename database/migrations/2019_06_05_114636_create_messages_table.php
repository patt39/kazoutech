<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('object')->nullable();
            $table->string('slug')->nullable();
            $table->string('ip')->nullable();
            $table->longText('message')->nullable();
            $table->longText('reply_message')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->unsignedInteger('from_id')->nullable();
            $table->unsignedInteger('to_id')->nullable();
            $table->foreign('from_id','from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_id','to')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->dateTime('read_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
