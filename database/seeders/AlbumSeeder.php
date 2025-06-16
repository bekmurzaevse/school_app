<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::create([
            'title' => [
                'en' => "Navruz",
                'uz' => "Navro'z",
                'ru' => "Навруз",
                'kk' => "Nawriz",
            ],
            'school_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);

        Album::create([
            'title' => [
                'en' => "First Call 2025",
                'uz' => "Birinchi qo‘ng‘iroq 2025",
                'ru' => "Первый звонок 2025",
                'kk' => "Birinshi qońıraw 2025",
            ],
            'school_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);

        Album::create([
            'title' => [
                'en' => "Last Bell",
                'uz' => "So'ngi qo'ng'iroq",
                'ru' => "Последний звонок",
                'kk' => "Son'g'i qon'iraw",
            ],
            'school_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
    }
}
