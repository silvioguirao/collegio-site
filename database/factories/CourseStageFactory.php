<?php

namespace Database\Factories;

use App\Models\CourseStage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseStageFactory extends Factory
{
    protected $model = CourseStage::class;

    public function definition(): array
    {
        $name = $this->faker->randomElement(['Fundamental I','Fundamental II','Ensino Médio','Pré-Vestibular']);
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'years' => $this->faker->randomElement(['1º ao 5º ano','6º ao 9º ano','1ª à 3ª série','Pré-vestibular']),
            'description' => $this->faker->sentence(12),
            'differentials' => $this->faker->sentence(10),
        ];
    }
}
