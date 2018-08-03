<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesimagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedadesimagenes', function (Blueprint $table) {
            $table->increments('propiedadimagenid');
            $table->integer('propiedadid')->unsigned();
            $table->foreign('propiedadid')->references('propiedadid')->on('propiedades')->onDelete('cascade');

            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('users')->onDelete('cascade');
            $table->string('imagen');
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
        Schema::dropIfExists('propiedadesimagenes');
    }
}
