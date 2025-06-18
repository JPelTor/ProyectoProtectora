<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Evento::class;

    public function definition()
    {
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        $end = $this->faker->dateTimeBetween($start, '+1 month');

        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph,
            'fecha_inicio' => $start,
            'fecha_fin' => $end,
            'lugar' => $this->faker->city,
            'imagen' => $this->faker->optional()->imageUrl(640, 480, 'events', true),
        ];
    }
}
