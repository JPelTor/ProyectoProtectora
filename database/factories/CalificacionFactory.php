<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Calificacion::class;

    public function definition()
    {
        return [
            'id_usuario' => $this->faker->numberBetween(1, 20),
            'id_animal' => null,
            'id_evento' => $this->faker->numberBetween(1, 10),
            'puntuacion' => $this->faker->numberBetween(1, 5),
            'comentario' => $this->faker->optional()->sentence(10),
            'fecha_calificacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
