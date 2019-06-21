<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->default('0')->nullable();

            $table->unsignedInteger('sender_id')->nullable();
            $table->unsignedInteger('recipient_id')->nullable();
            $table->foreign('sender_id','sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipient_id','recipient')->references('id')->on('users')->onDelete('cascade');

            $table->string('ip')->nullable();
            $table->longText('message')->nullable();
            $table->longText('reply_message')->nullable();
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
        Schema::dropIfExists('mails');
    }
}
