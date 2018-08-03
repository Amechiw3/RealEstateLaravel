<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
            PaisesSeeder::class,
            EstadosSeeder::class,
            CiudadesSeeder::class,
            TipoUsuariosSeeder::class,
            TipoPropiedadesSeeder::class,
            UsuariosSeeder::class,
            DocumentosSeeder::class
        ]);
    }
}
