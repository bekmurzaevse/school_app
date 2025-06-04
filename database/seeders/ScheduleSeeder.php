<?php 

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\School;
use App\Models\Timetable;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $file = UploadedFile::fake()->create('timetable_week1.pdf', 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('timetables', $file, $fileName);

        //$school = School::first();

        Attachment::create([
            'name' => [
                'uz' => '1-hafta dars jadvali',
                'en' => 'Week 1 Timetable',
                'ru' => 'Расписание на 1 неделю',
                'kk' => '1-hapte sabaq kestesi',
            ],
            'description' => [
                'uz' => 'Bu faylda 1-hafta uchun dars jadvali keltirilgan.',
                'en' => 'This file contains the timetable for week 1.',
                'ru' => 'Этот файл содержит расписание на первую неделю.',
                'kk' => 'Bul faylda 1-hapte sabaq kestesi korsetilgen.',
            ],
            'path' => $path,
            //'timetableable_id' => $school->id,
            //'timetableable_type' => School::class,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}