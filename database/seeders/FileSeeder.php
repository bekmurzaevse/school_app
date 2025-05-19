<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            [
                'filename' => 'science_project_report.pdf',
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
                'content' => 'This is a sample content for the science project report.',
            ],
            [
                'filename' => 'football_tournament_results.pdf',
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
                'content' => 'Sample results of the football tournament.',
            ],
        ];

        foreach ($files as $file) {
            $path = 'uploads/' . $file['filename'];

            Storage::disk('public')->put($path, $file['content']);

            File::create([
                'name' => $file['name'],
                'description' => $file['description'],
                'event_id' => $file['event_id'],
                'path' => $path,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
