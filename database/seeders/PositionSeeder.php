<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\School;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'name' => [
                'en' => "Director",
                'uz' => "Raxbar",
                'ru' => "Директор",
                'kk' => "Basliq",
            ],
            'school_id' => School::first()->id,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
        Position::create([
            'name' => [
                'en' => "Deputy Director",
                'uz' => "Директор ўринбосари",
                'ru' => "Заместитель директора",
                'kk' => "Zam direktor",
            ],
            'school_id' => School::first()->id,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
        Position::create([
            'name' => [
                'en' => "Teacher",
                'uz' => "Muallim",
                'ru' => "учитель",
                'kk' => "Mug'allim",
            ],
            'school_id' => School::first()->id,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
    }
}
