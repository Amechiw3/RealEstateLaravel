<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosnegadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisosnegados', function (Blueprint $table) {
            $table->increments('permisonegadoid');
            $table->integer('permiso')->unsigned();
            $table->foreign('permiso')->references('permisoid')->on('permisos')->onDelete('cascade');
            $table->integer('tipousuario')->unsigned();
            $table->foreign('tipousuario')->references('tipousuarioid')->on('tiposusuarios')->onDelete('cascade');
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
        Schema::dropIfExists('permisosnegados');
    }
}
