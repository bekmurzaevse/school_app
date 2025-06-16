<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Vacancy;
use Illuminate\Database\Seeder;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacancy::create([
            'title' => [
                'kk' => "Informatik mu'g'allim",
                'uz' => "Преподаватель информатики",
                'ru' => "Informatik mu'g'allim",
                'en' => "teacher of informatics",
            ],
            'content' => [
                'kk' => "kk content",
                'uz' => "uz content",
                'ru' => "ru content",
                'en' => "en content",
            ],
            'school_id' => School::first()->id,
            'salary' => 1500000
        ]);
        Vacancy::create([
            'title' => [
                'kk' => "kk Buxgalter",
                'uz' => "uz Buxgalter",
                'ru' => "ru Buxgalter",
                'en' => "en Buxgalter",
            ],
            'content' => [
                'kk' => "kk content",
                'uz' => "uz content",
                'ru' => "ru content",
                'en' => "en content",
            ],
            'school_id' => School::first()->id,
            'salary' => 2300000
        ]);
    }
}
