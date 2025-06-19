<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudAdopcionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\SolicitudAdopcion::class;

    public function definition()
    {
        $estados = ['pendiente', 'aprobada', 'rechazada'];

        return [
            'id_usuario' => $this->faker->numberBetween(1, 20),
            'id_animal' => $this->faker->numberBetween(1, 10),
            'fecha_solicitud' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'estado_solicitud' => $this->faker->randomElement($estados),
            'comentarios' => $this->faker->sentence,
            'fecha_aprobacion' => null,
        ];
    }
}
