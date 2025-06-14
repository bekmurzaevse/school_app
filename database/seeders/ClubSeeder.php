<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use Illuminate\Database\Seeder;
use App\Models\Club;
use Illuminate\Http\UploadedFile;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $club1 = Club::create([
            'name' => [
                'en' => '1 name en',
                'ru' => '1 name ru',
                'uz' => '1 name uz',
                'kk' => '1 name kk',
            ],
            'school_id' => 1,
            'text' => [
                'en' => '1 text en',
                'ru' => '1 text ru',
                'uz' => '1 text uz',
                'kk' => '1 text kk',
            ],
            'schedule' => [
                'en' => '1 schedule en',
                'ru' => '1 schedule ru',
                'uz' => '1 schedule uz',
                'kk' => '1 schedule kk',
            ],
        ]);

        $photo = UploadedFile::fake()->image('test.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $club1->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $club2 = Club::create([
            'name' => [
                'en' => '2 name en',
                'ru' => '2 name ru',
                'uz' => '2 name uz',
                'kk' => '2 name kk',
            ],
            'school_id' => 1,
            'text' => [
                'en' => '2 text en',
                'ru' => '2 text ru',
                'uz' => '2 text uz',
                'kk' => '2 text kk',
            ],
            'schedule' => [
                'en' => '2 schedule en',
                'ru' => '2 schedule ru',
                'uz' => '2 schedule uz',
                'kk' => '2 schedule kk',
            ],
        ]);

        $photo = UploadedFile::fake()->image('test2.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $club2->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);
    }
}
