<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        File::insert([
            [
                'name' => [
                    'en' => 'Science Project Report',
                    'ru' => 'Отчет о научном проекте',
                    'uz' => 'Fan loyihasi hisobot',
                    'kk' => "Pa'n joybarı esabatı",
                ],
                'description' => [
                    'en' => 'Report for the science project of the school science fair',
                    'ru' => 'Отчет о научном проекте для школьной научной ярмарки',
                    'uz' => 'Maktab fan ko‘rgazmasi uchun fan loyihasi hisobot',
                    'kk' => "Mektep pa'n ko'rgizbesi ushın pa'n joybarı esabatı",
                ],
                'event_id' => 1, 
                'path' => 'uploads/science_project_report.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => [
                    'en' => 'Football Tournament Results',
                    'ru' => 'Результаты футбольного турнира',
                    'uz' => 'Futbol turniri natijalari',
                    'kk' => "Futbol jarisi na'tiyjeleri",
                ],
                'description' => [
                    'en' => 'Results of the inter-school football competition',
                    'ru' => 'Результаты межшкольного футбольного соревнования',
                    'uz' => 'Maktablararo futbol musobaqasi natijalari',
                    'kk' => "Mektepler ara futbol jarısı na'tiyjeleri",
                ],
                'event_id' => 2, 
                'path' => 'uploads/football_tournament_results.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
