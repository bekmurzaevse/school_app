<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\School;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        History::create([
            'year' => 2020,
            'text' => [
                'en' => 'Launched the first eco-friendly campaign.',
                'uz' => 'Birinchi ekologik tashabbus boshlangan yil.',
                'ru' => 'Запущена первая экологичная кампания.',
                'kk' => 'Birinshi ekologiyalıq baslama baslanǵan jıl.'
            ],
            'school_id' => School::first()->id,
        ]);
    }
}
