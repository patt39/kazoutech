<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToSlidehomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slidehomes', function (Blueprint $table) {
            $table->string('redirect_link')->nullable()->after('description');
            $table->string('color_link')->default('primary')->after('description');
            $table->string('text_link')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slidehomes', function (Blueprint $table) {
            //
        });
    }
}
