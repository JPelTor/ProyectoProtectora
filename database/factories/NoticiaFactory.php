<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Noticia::class;

    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'lugar' => $this->faker->city,
            'titular' => $this->faker->sentence(6),
            'asunto' => $this->faker->sentence(3),
            'contenido_resumido' => $this->faker->text(100),
            'contenido_completo' => $this->faker->paragraphs(3, true),
            'imagen' => $this->faker->optional()->imageUrl(640, 480, 'animals', true),
        ];
    }
}
