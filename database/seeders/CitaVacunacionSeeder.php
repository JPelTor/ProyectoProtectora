<?php

namespace Database\Seeders;

use App\Models\CitaVacunacion;
use Illuminate\Database\Seeder;

class CitaVacunacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CitaVacunacion::factory()->count(25)->create();
    }
}
