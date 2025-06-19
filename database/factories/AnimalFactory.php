<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Animal::class;

    public function definition()
    {
        $sexos = ['M', 'F'];
        $estados = ['disponible', 'adoptado', 'en_proceso'];

        return [
            'nombre' => $this->faker->firstName,
            'tipo' => 'Perro',
            'edad' => $this->faker->numberBetween(1, 15),
            'sexo' => $this->faker->randomElement($sexos),
            'descripcion' => $this->faker->text(200),
            'estado_adopcion' => $this->faker->randomElement($estados),
            'foto' => 'image1.jpeg',
            'fecha_ingreso' => $this->faker->dateTimeBetween('-2 years', 'now'),
            'id_adoptante' => null, 
            
        ];
    }
}
