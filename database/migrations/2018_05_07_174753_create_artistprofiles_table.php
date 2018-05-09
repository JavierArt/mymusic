<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('photo',10);
            $table->text('description');
            $table->string('musictype',50);
            $table->string('webpage',100);
            $table->string('contactemail',100);
            $table->string('artistname',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artistprofiles');
    }
}
