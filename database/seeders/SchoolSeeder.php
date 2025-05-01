<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::create([
            'name' => [
                'en' => "Nukus City Secondary School No. 17",
                'uz' => "Nukus shahri 17-sonli o‘rta maktabi",
                'ru' => "Средняя школа No 17 города Нукус",
                'kk' => "No'ki qalasi 17 - sanli orta mektebi",
            ],
            'history' => [
                'en' => "History",
                'uz' => "Tarix",
                'ru' => "История",
                'kk' => "Tariyx",
            ],
            'phone' => "123456789",
            'location' => "location address",
            'description' => [
                'en' => "Description EN",
                'uz' => "Description UZ",
                'ru' => "Description RU",
                'kk' => "Description KK",
            ],
        ]);
    }
}
