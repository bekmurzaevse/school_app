<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use Illuminate\Database\Seeder;
use App\Models\Value;
use Illuminate\Http\UploadedFile;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $val1 = Value::create([
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
        ]);

        $photo = UploadedFile::fake()->image('value1.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $val1->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $val2 = Value::create([
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
        ]);

        $photo = UploadedFile::fake()->image('value2.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $val2->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);
    }
}
