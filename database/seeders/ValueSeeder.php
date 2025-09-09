<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use App\Models\School;
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
            'school_id' => School::first()->id,
            'text' => [
                'en' => '1 text en',
                'ru' => '1 text ru',
                'uz' => '1 text uz',
                'kk' => '1 text kk',
            ],
        ]);

        $val1->photo()->create([
            'name' => 'value1',
            'path' => 'photos/value1.jpeg',
            'type' => "photo",
            'size' => 1000,
        ]);

        $val2 = Value::create([
            'name' => [
                'en' => '2 name en',
                'ru' => '2 name ru',
                'uz' => '2 name uz',
                'kk' => '2 name kk',
            ],
            'school_id' => School::first()->id,
            'text' => [
                'en' => '2 text en',
                'ru' => '2 text ru',
                'uz' => '2 text uz',
                'kk' => '2 text kk',
            ],
        ]);

        $val2->photo()->create([
            'name' => 'value2',
            'path' => 'photos/value2.jpeg',
            'type' => "photo",
            'size' => 1000,
        ]);
    }
}
