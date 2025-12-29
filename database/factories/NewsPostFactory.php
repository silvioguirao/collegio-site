<?php

namespace Database\Factories;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsPostFactory extends Factory
{
    protected $model = NewsPost::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title.'-'.Str::random(4)),
            'excerpt' => $this->faker->sentence(12),
            'body' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name,
            'tags' => implode(',', $this->faker->words(3)),
            'published_at' => now()->subDays($this->faker->numberBetween(0,30)),
            'is_published' => true,
        ];
    }
}
