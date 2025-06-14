<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ScheduleSeeder extends Seeder
{

    /**
     * Summary of run
     * @return void
     */
    public function run(): void
    {
        $school = School::first();
        $file = UploadedFile::fake()->create('schedule_week1.pdf', 1024, 'application/pdf');

        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H-i-s') . '.' . $file->extension();

        $path = $file->storeAs('schedules', $fileName, 'public');

        $school->schedules()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => 'schedule',
            'size' => $file->getSize(),
            'description' => "Sabaq kestesi - 1-ha'pte",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
