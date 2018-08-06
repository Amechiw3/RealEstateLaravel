<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedades', function (Blueprint $table) {
            $table->increments('propiedadid');

            $table->integer('tipocontrato')->unsigned();
            $table->foreign('tipocontrato')->references('tipocontratoid')->on('tiposcontratos')->onDelete('cascade');
            
            $table->integer('tipopropiedad')->unsigned();
            $table->foreign('tipopropiedad')->references('tipopropiedadid')->on('tipospropiedades')->onDelete('cascade');
            
            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('users')->onDelete('cascade');
            
            $table->date('propiedadfecha');
            
            $table->integer('pais')->unsigned();
            $table->foreign('pais')->references('paisid')->on('paises')->onDelete('cascade');
    
            $table->integer('estado')->unsigned();
            $table->foreign('estado')->references('estadoid')->on('estados')->onDelete('cascade');

            $table->integer('ciudad')->unsigned();
            $table->foreign('ciudad')->references('ciudadid')->on('ciudades')->onDelete('cascade');

            $table->integer('codigopostal');            
            $table->string('colonia');            
            $table->string('calle');
            $table->double('latitude');
            $table->double('longitude');
            $table->integer('numerohab');
            $table->double('area');
            $table->double('precio');
            $table->string('imagen')->default('default.png');
            $table->string('informacionadic')->nullable();

            $table->timestamps();
        });
        //1	1	1	1900-01-01	1	26	1919	83106	Villa Sonora	Suaqui Grande	29.141655873408304	-110.9667803538153	3	120	9000000	default.jpg	123	2018-07-19 23:11:11	2018-07-19 23:11:11
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propiedades');
    }
}
