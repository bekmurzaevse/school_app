<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = "school" . Str::random(4) . ".jpg";
        $file = UploadedFile::fake()->create($name, 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('photos', $file, $fileName);

        Photo::create([
            'title' => "title",
            'path' => $path,
            // 'album_id' => Album::inRandomOrder()->id,
            'album_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],

        ]);

        $name = "school" . Str::random(4) . ".jpg";
        $file = UploadedFile::fake()->create($name, 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('photos', $file, $fileName);

        Photo::create([
            'title' => "title",
            'path' => $path,
            // 'album_id' => Album::inRandomOrder()->id,
            'album_id' => 1,
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],

        ]);

        $name = "school" . Str::random(4) . ".jpg";
        $file = UploadedFile::fake()->create($name, 1024, 'application/pdf');
        $originalFilename = $file->getClientOriginalName();
        $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
        $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
        $path = Storage::disk('public')->putFileAs('photos', $file, $fileName);

        Photo::create([
            'title' => "title",
            'path' => $path,
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
