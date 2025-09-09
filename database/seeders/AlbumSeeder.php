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
        $album1 = Album::create([
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
        $album1->photos()->create([
            'name' => 'album1',
            'path' => 'photos/album1.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);
        $album1->photos()->create([
            'name' => 'album1',
            'path' => 'photos/album2.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $album2 = Album::create([
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

        $album2->photos()->create([
            'name' => 'album2',
            'path' => 'photos/album3.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);
        $album2->photos()->create([
            'name' => 'album2',
            'path' => 'photos/album4.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $album3 = Album::create([
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

        $album3->photos()->create([
            'name' => 'album3',
            'path' => 'photos/album5.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);
        $album3->photos()->create([
            'name' => 'album3',
            'path' => 'photos/album6.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);
    }
}
