<?php

namespace Database\Seeders;

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
        $this->call([
            UsuarioSeeder::class,
            AnimalSeeder::class,
            SolicitudAdopcionSeeder::class,
            CitaVacunacionSeeder::class,
            NoticiaSeeder::class,
            EventoSeeder::class,
            ComentarioSeeder::class,
            CalificacionSeeder::class,
        ]);
    }
}
