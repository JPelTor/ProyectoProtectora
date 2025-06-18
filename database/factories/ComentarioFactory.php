<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Comentario::class;

    public function definition()
    {
        return [
            'id_usuario' => \App\Models\Usuario::factory(),
            'id_animal' => null,  // o \App\Models\Animal::factory() si quieres
            'id_evento' => null,  // o \App\Models\Evento::factory()
            'id_noticia' => null, // o \App\Models\Noticia::factory()
            'texto' => $this->faker->sentence(10),
            'fecha_comentario' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
