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
            'id_usuario' => \App\Models\Usuario::factory(),
            'id_animal' => null,
            'id_evento' => null,
            'puntuacion' => $this->faker->numberBetween(1, 5),
            'comentario' => $this->faker->optional()->sentence(10),
            'fecha_calificacion' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
