<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numeroControl' => $this->faker->unique()->randomNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'contraseña' => bcrypt('password'),
            'instituto_id' => $this->faker->numberBetween(1, 2),
            'carrera_id' => $this->faker->numberBetween(1, 6),
            'semestre_id' => $this->faker->numberBetween(1, 10),
            'edad' => $this->faker->numberBetween(18, 30),
            'sexo' => $this->faker->randomElement(['0', '1']),
            'id_certificado' => null,
            'confirmacion' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
