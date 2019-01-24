<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGejalaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tanaman')->unsigned();
            $table->integer('daerah_gejala')->unsigned();
            $table->string('nama_gejala');
            $table->timestamps();
            $table->foreign('tanaman')->references('id')->on('tanaman');
            $table->foreign('daerah_gejala')->references('id')->on('daerahGejala');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala');
    }
}
