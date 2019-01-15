<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyakit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tanaman')->unsigned();
            $table->string('nama_penyakit');
            $table->text('kulturteknis');
            $table->text('fisikmekanis');
            $table->text('kimiawi');
            $table->text('hayati');
            $table->timestamps();
            $table->foreign('tanaman')->references('id')->on('penyakit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyakit');
    }
}
