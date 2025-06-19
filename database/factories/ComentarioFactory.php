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
            'id_usuario' => $this->faker->numberBetween(1, 20),
            'id_animal' => null,  
            'id_evento' => $this->faker->numberBetween(1, 10),  
            'id_noticia' => null, 
            'texto' => $this->faker->sentence(10),
            'fecha_comentario' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
