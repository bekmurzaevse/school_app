<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Soxta rasm URL manzili
        $fakeImageUrl = 'https://picsum.photos/800/600';

        // Tasodifiy fayl nomini yaratish
        $fakeFileName = $faker->word . Str::random(4) . '.jpg';

        // Rasmni yuklash (faylni URL orqali yuklash)
        $imageContents = file_get_contents($fakeImageUrl);
        $destinationPath = 'photos/' . $fakeFileName;

        // Faylni saqlash
        Storage::disk('public')->put($destinationPath, $imageContents);

        Photo::create([
            'title' => "title",
            'path' => $destinationPath,
            // 'album_id' => Album::inRandomOrder()->id,
            'album_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],

        ]);

        // Soxta rasm URL manzili
        $fakeImageUrl = 'https://picsum.photos/800/600';

        // Tasodifiy fayl nomini yaratish
        $fakeFileName = $faker->word . Str::random(4) . '.jpg';

        // Rasmni yuklash (faylni URL orqali yuklash)
        $imageContents = file_get_contents($fakeImageUrl);
        $destinationPath = 'photos/' . $fakeFileName;

        // Faylni saqlash
        Storage::disk('public')->put($destinationPath, $imageContents);

        Photo::create([
            'title' => "title",
            'path' => $destinationPath,
            // 'album_id' => Album::inRandomOrder()->id,
            'album_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],

        ]);

        // Soxta rasm URL manzili
        $fakeImageUrl = 'https://picsum.photos/800/600';

        // Tasodifiy fayl nomini yaratish
        $fakeFileName = $faker->word . Str::random(4) . '.jpg';

        // Rasmni yuklash (faylni URL orqali yuklash)
        $imageContents = file_get_contents($fakeImageUrl);
        $destinationPath = 'photos/' . $fakeFileName;

        // Faylni saqlash
        Storage::disk('public')->put($destinationPath, $imageContents);

        Photo::create([
            'title' => "title",
            'path' => $destinationPath,
            // 'album_id' => Album::inRandomOrder()->id,
            'album_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
    }
}
