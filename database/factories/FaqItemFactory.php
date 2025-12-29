<?php

namespace Database\Factories;

use App\Models\FaqItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqItemFactory extends Factory
{
    protected $model = FaqItem::class;

    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(6),
            'answer' => $this->faker->paragraph,
            'category' => $this->faker->randomElement(['Matrículas','Infraestrutura','Processos']),
            'order' => $this->faker->numberBetween(0,10),
        ];
    }
}
