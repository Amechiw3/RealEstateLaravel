<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesresumenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedadesresumenes', function (Blueprint $table) {
            $table->increments('propiedadresumenid');
            
            $table->integer('propiedadid')->unsigned();
            $table->foreign('propiedadid')->references('propiedadid')->on('propiedades')->onDelete('cascade');
            
            $table->integer('reservaid')->unsigned();
            $table->foreign('reservaid')->references('reservaid')->on('reservas')->onDelete('cascade');
            
            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('comentario');
            $table->string('clasificacion');
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
        Schema::dropIfExists('propiedadesresumenes');
    }
}
