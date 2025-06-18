<?php

namespace Database\Seeders;

use App\Models\SolicitudAdopcion;
use Illuminate\Database\Seeder;

class SolicitudAdopcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SolicitudAdopcion::factory()->count(15)->create();
    }
}
