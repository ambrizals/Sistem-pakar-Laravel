<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGejalaPenyakit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gejala')->unsigned();
            $table->integer('penyakit')->unsigned();
            $table->timestamps();
            $table->foreign('gejala')->references('id')->on('gejala');
            $table->foreign('penyakit')->references('id')->on('penyakit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gejala_penyakit');
    }
}
