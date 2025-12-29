<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'date' => $this->faker->dateTimeBetween('now','+30 days'),
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
        ];
    }
}
