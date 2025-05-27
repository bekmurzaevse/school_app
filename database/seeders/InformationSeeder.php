<?php

namespace Database\Seeders;

use App\Models\Information;
use App\Models\School;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::create([
            'title' => [
                "kk" => "Oqiwshilar",
                "uz" => "O'quvchilar",
                "ru" => "Ученики",
                "en" => "Pupils",
            ],
            'count' => rand(250, 1200),
            'school_id' => School::inRandomOrder()->first()->id,
            'description' => [
                "kk" => "KK description",
                "uz" => "UZ description",
                "ru" => "RU description",
                "en" => "EN description",
            ],
        ]);
        Information::create([
            'title' => [
                "kk" => "Oqitiwshilar",
                "uz" => "O'qituvchilar",
                "ru" => "Учителя",
                "en" => "teachers",
            ],
            'count' => rand(250, 1200),
            'school_id' => School::inRandomOrder()->first()->id,
            'description' => [
                "kk" => "KK description",
                "uz" => "UZ description",
                "ru" => "RU description",
                "en" => "EN description",
            ],
        ]);
        Information::create([
            'title' => [
                "kk" => "Klasslar",
                "uz" => "Sinflar",
                "ru" => "Классы",
                "en" => "Classes",
            ],
            'count' => rand(250, 1200),
            'school_id' => School::inRandomOrder()->first()->id,
            'description' => [
                "kk" => "KK description",
                "uz" => "UZ description",
                "ru" => "RU description",
                "en" => "EN description",
            ],
        ]);
    }
}
