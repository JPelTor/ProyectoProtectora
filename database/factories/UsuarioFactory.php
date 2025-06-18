<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = \App\Models\Usuario::class;

    public function definition()
    {
        $tipos = ['adoptante', 'voluntario', 'administrador'];

        return [
            'nombre' => $this->faker->name,
            'correo_electronico' => $this->faker->unique()->safeEmail,
            'contrasena' => Hash::make('password'), 
            'tipo_usuario' => $this->faker->randomElement($tipos),
            'telefono' => $this->faker->phoneNumber,
            'direccion' => $this->faker->address,
            'fecha_registro' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
