<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TipoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tiposusuarios')->insert([
            [
                'tipousuario' => 'Administrador',
                'descripcion' => 'Acceso Total', 
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ],
            [
                'tipousuario' => 'Usuario',
                'descripcion' => 'Acceso Visual',
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ]
        ]);
    }
}
