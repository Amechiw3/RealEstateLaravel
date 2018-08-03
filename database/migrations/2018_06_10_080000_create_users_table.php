<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            
            $table->string('usuario')->unique();
            
            $table->string('email')->unique();
            $table->string('password');

            $table->integer('tipousuario')->unsigned();
            $table->foreign('tipousuario')->references('tipousuarioid')->on('tiposusuarios')->onDelete('cascade');
            
            $table->string('imagen')->default('default.svg');
            $table->string('appaterno');
            $table->string('apmaterno');
            $table->string('telefono');
            $table->boolean('estado');
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
