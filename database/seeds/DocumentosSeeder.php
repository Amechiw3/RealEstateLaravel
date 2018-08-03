<?php

use Illuminate\Database\Seeder;

class DocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('documentos')->insert([
            [ 
                "documento" => "Clave Catastral",            
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ],
            [ 
                "documento" => "Predial",            
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ],
            [ 
                "documento" => "Escrituras",            
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ]
        ]);
    }
}
