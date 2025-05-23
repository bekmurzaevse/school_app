<?php

namespace Database\Seeders;

use App\Models\SchoolHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SchoolHour::create([
            'school_id' => 1,
            'title' => [
                'kk' => 'kk title',
                'uz' => 'uz title',
                'ru' => 'ru title',
                'en' => 'en title',
            ],
            'workday' => [
                'kk' => 'kk workday',
                'uz' => 'uz workday',
                'ru' => 'ru workday',
                'en' => 'en workday',
            ],
            'holiday' => [
                'kk' => 'kk holiday',
                'uz' => 'uz holiday',
                'ru' => 'ru holiday',
                'en' => 'en holiday',
            ],
        ]);
        SchoolHour::create([
            'school_id' => 1,
            'title' => [
                'kk' => 'kk title 2',
                'uz' => 'uz title 2',
                'ru' => 'ru title 2',
                'en' => 'en title 2',
            ],
            'workday' => [
                'kk' => 'kk workday 2',
                'uz' => 'uz workday 2',
                'ru' => 'ru workday 2',
                'en' => 'en workday 2',
            ],
            'holiday' => [
                'kk' => 'kk holiday 2',
                'uz' => 'uz holiday 2',
                'ru' => 'ru holiday 2',
                'en' => 'en holiday 2',
            ],
        ]);
    }
}
