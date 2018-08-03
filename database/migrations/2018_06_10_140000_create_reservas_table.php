<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('reservaid');
            
            $table->integer('propiedadid')->unsigned();
            $table->foreign('propiedadid')->references('propiedadid')->on('propiedades')->onDelete('cascade');
            
            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('tiporeserva');
            $table->date('check_in');
            $table->date('check_out');
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
        Schema::dropIfExists('reservas');
    }
}
