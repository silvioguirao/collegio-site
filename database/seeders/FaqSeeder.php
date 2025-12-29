<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FaqItem;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        FaqItem::create(['question'=>'Como matricular meu filho?','answer'=>'Verifique a página de matrículas com documentos necessários.','category'=>'Matrículas','order'=>1]);
        FaqItem::create(['question'=>'Quais são os turnos?','answer'=>'Manhã e tarde.','category'=>'Geral','order'=>2]);
    }
}
