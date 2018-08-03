<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('estados')->insert([
            [ "pais" => "1",  "estado" => "Aguascalientes", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Baja California", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Baja California Sur", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Campeche", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Coahuila de Zaragoza", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Colima", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Chiapas", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Chihuahua", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Distrito Federal", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Durango", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Guanajuato", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Guerrero", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Hidalgo", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Jalisco", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "México", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Michoacán de Ocampo", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Morelos", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Nayarit", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Nuevo León", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Oaxaca", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Puebla", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Querétaro", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Quintana Roo", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "San Luis Potosí", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Sinaloa", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Sonora", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Tabasco", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Tamaulipas", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Tlaxcala", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Veracruz de Ignacio de la Llave", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Yucatán", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ],
            [ "pais" => "1",  "estado" => "Zacatecas", "created_at" => date("Y-m-d H:m:s"), "updated_at" => date("Y-m-d H:m:s") ]            
        ]);
    }
}
