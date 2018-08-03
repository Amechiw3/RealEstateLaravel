<?php

use Illuminate\Database\Seeder;

class TipoPropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipospropiedades')->insert([
            [
                'nombre' => 'Casa',
                'descripcion' => '', 
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ],
            [
                'nombre' => 'Departamento',
                'descripcion' => '', 
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ],
            [
                'nombre' => 'Terreno',
                'descripcion' => '', 
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ]
        ]);
    }
}
