<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition(): array
    {
        return [
            'arquivo' => 'uploads/imagens/' . $this->faker->image('public/storage/uploads/imagens', 640, 480, null, false),
            'descricao' => $this->faker->sentence(3),
            'pagina_id' => Page::factory(),
        ];
    }
}
