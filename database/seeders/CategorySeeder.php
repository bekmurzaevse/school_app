<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'name' => ([
                    'en' => 'Library',
                    'ru' => 'Библиотека',
                    'uz' => 'Kutubxona',
                    'kk' => 'Kitapxana',
                ]),
                'description' => ([
                    'en' => 'Electronic and traditional library services, list of available books.',
                    'ru' => 'Электронные и традиционные библиотечные услуги, список доступных книг.',
                    'uz' => "Elektron va an'anaviy kutubxona xizmatlari, mavjud kitoblar ro‘yxati.",
                    'kk' => "Elektron ha'm kıtapxana xizmeti, bar bolg'an kıtaplar dizimi.",
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ([
                    'en' => 'Achievements',
                    'ru' => 'Достижения',
                    'uz' => 'Yutuqlar',
                    'kk' => 'Jetiskenlikler',
                ]),
                'description' => ([
                    'en' => 'The successes and awards achieved by our students and school.',
                    'ru' => 'Успехи и награды, достигнутые нашими учениками и школой.',
                    'uz' => "O‘quvchilar va maktabimiz erishgan muvaffaqiyat va mukofotlar.",
                    'kk' => "Oqıwshılar ha'm mektebimiz erisken jetiskenlikler ha'm sıylıqlar ",
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ([
                    'en' => 'Sports',
                    'ru' => 'Спорт',
                    'uz' => 'Sport',
                    'kk' => 'Sport',
                ]),
                'description' => ([
                    'en' => 'All school sports activities',
                    'ru' => 'Все школьные спортивные мероприятия',
                    'uz' => 'Barcha maktab sport faoliyatlari',
                    'kk' => "Mektepdegi barliq sport tu'rleri",
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
