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
            $table->Integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('photo')->default('default.jpeg');
            $table->string('pais',40);
            $table->string('estado',40);
            $table->string('ciudad',40);
            $table->string('bandornot',10);
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
