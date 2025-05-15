<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = UploadedFile::fake()->create('school_3O.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName);
        
        Document::create([
            'name' => [
                'en' => 'School Annual Report',
                'ru' => 'Ежегодный отчет школы',
                'uz' => 'Maktabning yillik hisobot',
                'kk' => "Mekteptin' jıllıq esabatı",
            ],
            'description' => [
                'en' => 'Annual report detailing the school achievements and activities.',
                'ru' => 'Ежегодный отчет, в котором подробно описаны достижения и мероприятия школы.',
                'uz' => 'Maktabning yillik hisobotida maktabning yutuqlari va faoliyati haqida ma\'lumot berilgan.',
                'kk' => "Mekteptin' jıllıq esabatında mekteptin' jetiskenlikleri ha'm iskerligi haqqında mag'lıwmat berilgen",
            ],
            'school_id' => 1, 
            'category_id' => 1, 
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $file = UploadedFile::fake()->create('school_31.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('documents', $file, $fileName);
        
        Document::create([
            'name' => [
                'en' => 'Curriculum Document',
                'ru' => 'Учебная программа',
                'uz' => 'O‘quv dasturi',
                'kk' => "Oqıtıw joybarı",
            ],
            'description' => [
                'en' => 'Document containing the school curriculum for the academic year.',
                'ru' => 'Документ, содержащий учебную программу школы на учебный год.',
                'uz' => 'Maktab o‘quv dasturi bo‘yicha hujjat.',
                'kk' => "Mektep oqıtıw rejesi boyınsha hu'jjet",
            ],
            'school_id' => 1, 
            'category_id' => 2, 
            'path' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
