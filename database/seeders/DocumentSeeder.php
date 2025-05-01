<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::insert([
            [
                'name' => ([
                    'en' => 'School Annual Report',
                    'ru' => 'Ежегодный отчет школы',
                    'uz' => 'Maktabning yillik hisobot',
                    'kk' => "Mekteptin' jıllıq esabatı",
                ]),
                'description' => ([
                    'en' => 'Annual report detailing the school achievements and activities.',
                    'ru' => 'Ежегодный отчет, в котором подробно описаны достижения и мероприятия школы.',
                    'uz' => 'Maktabning yillik hisobotida maktabning yutuqlari va faoliyati haqida ma\'lumot berilgan.',
                    'kk' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
                ]),
                'school_id' => 1, 
                'category_id' => 1, 
                'path' => 'uploads/school_annual_report.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ([
                    'en' => 'Curriculum Document',
                    'ru' => 'Учебная программа',
                    'uz' => 'O‘quv dasturi',
                    'kk' => "Oqıtıw joybarı",
                ]),
                'description' => ([
                    'en' => 'Document containing the school curriculum for the academic year.',
                    'ru' => 'Документ, содержащий учебную программу школы на учебный год.',
                    'uz' => 'Maktab o‘quv dasturi bo‘yicha hujjat.',
                    'kk' => "Mektep oqıtıw rejesi boyınsha hu'jjet",
                ]),
                'school_id' => 1, 
                'category_id' => 2, 
                'path' => 'uploads/curriculum_document.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
