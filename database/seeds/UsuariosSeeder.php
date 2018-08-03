<?php

use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'Martin',
                'usuario' => 'Amechiw3',
                'email' => 'martinfierro97@hotmail.com',
                'password' => bcrypt('123456'),
                'tipousuario' => 1,
                'appaterno' => 'Fierro',
                'apmaterno' => 'Robles',
                'telefono' => '6623378649',
                'estado' => true,
                "created_at" => date("Y-m-d H:m:s"),
                "updated_at" => date("Y-m-d H:m:s")
            ]
        ]);
    }
}
