<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFutureventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futurevents', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('artistprofile_id')->unsigned();
            $table->foreign('artistprofile_id')->references('id')->on('artistprofiles');
            $table->string('place',100);
            $table->text('address');
            $table->date('date');
            $table->string('hora',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('futurevents');
    }
}
