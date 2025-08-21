<?php

namespace Database\Seeders;

use App\Models\School;
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

        // School::create([
        //     'name' => [
        //         'en' => "Nukus City Secondary School No. 20",
        //         'uz' => "Nukus shahri 20-sonli o‘rta maktabi",
        //         'ru' => "Средняя школа No 20 города Нукус",
        //         'kk' => "No'ki qalasi 20 - sanli orta mektebi",
        //     ],
        //     'history' => [
        //         'en' => "History",
        //         'uz' => "Tarix",
        //         'ru' => "История",
        //         'kk' => "Tariyx",
        //     ],
        //     'phone' => "456789123",
        //     'location' => "location address",
        //     'description' => [
        //         'en' => "Description EN",
        //         'uz' => "Description UZ",
        //         'ru' => "Description RU",
        //         'kk' => "Description KK",
        //     ],
        // ]);

        // School::create([
        //     'name' => [
        //         'en' => "Nukus City Secondary School No. 1",
        //         'uz' => "Nukus shahri 1-sonli o‘rta maktabi",
        //         'ru' => "Средняя школа No 1 города Нукус",
        //         'kk' => "No'ki qalasi 1 - sanli orta mektebi",
        //     ],
        //     'history' => [
        //         'en' => "History",
        //         'uz' => "Tarix",
        //         'ru' => "История",
        //         'kk' => "Tariyx",
        //     ],
        //     'phone' => "987654321",
        //     'location' => "location address",
        //     'description' => [
        //         'en' => "Description EN",
        //         'uz' => "Description UZ",
        //         'ru' => "Description RU",
        //         'kk' => "Description KK",
        //     ],
        // ]);

    }
}
