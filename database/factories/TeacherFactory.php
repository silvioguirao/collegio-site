<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'formation' => $this->faker->randomElement(['Licenciatura em Matemática','Mestrado em Letras','Licenciatura em História']),
            'area' => $this->faker->randomElement(['Matemática','Português','Ciências']),
            'photo' => null,
            'bio' => $this->faker->paragraph,
            'social' => ['twitter'=>null,'facebook'=>null],
        ];
    }
}
