<?php

use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('paises')->insert([
            [ 
                "pais" => "Mexico",
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ]
        ]);
    }
}
