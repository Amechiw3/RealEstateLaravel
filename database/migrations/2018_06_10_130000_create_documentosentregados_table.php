<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosentregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentosentregados', function (Blueprint $table) {
            $table->increments('documentoentregadoid');
            $table->integer('documento')->unsigned();
            $table->foreign('documento')->references('documentoid')->on('documentos')->onDelete('cascade');
            $table->integer('propiedad')->unsigned();
            $table->foreign('propiedad')->references('propiedadid')->on('propiedades')->onDelete('cascade');
            $table->string('ruta');
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
        Schema::dropIfExists('documentosentregados');
    }
}
