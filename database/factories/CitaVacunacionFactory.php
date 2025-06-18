<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CitaVacunacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\CitaVacunacion::class;

    public function definition()
    {
        $tipos_vacunas = ['Rabia', 'Parvovirus', 'Moquillo', 'Leptospirosis'];

        return [
            'id_animal' => \App\Models\Animal::factory(),
            'fecha_cita' => $this->faker->dateTimeBetween('now', '+1 year'),
            'tipo_vacuna' => $this->faker->randomElement($tipos_vacunas),
            'observaciones' => $this->faker->optional()->text(100),
        ];
    }
}
