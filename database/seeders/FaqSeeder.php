<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\School;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'school_id' => School::inRandomOrder()->first()->id,
            'question' => [
                'en' => 'How do I enroll my child?',
                'uz' => 'Farzandimni qanday ro‘yxatdan o‘tkazaman?',
                'ru' => 'Как записать моего ребенка?',
                'kk' => 'Perzentimdi qalay dizimnen otkeremen?'
            ],
            'answer' => [
                'en' => 'You can enroll online or by visiting our school.',
                'uz' => 'Siz onlayn yoki maktabimizga tashrif buyurib ro‘yxatdan o‘tkazishingiz mumkin.',
                'ru' => 'Вы можете записаться онлайн или прийти в нашу школу.',
                'kk' => 'Siz onlayn yaki mektebimizge kelip dizimnen o\'tiwin\'iz mu\'mkin.'
            ],
        ]);

        Faq::create([
            'school_id' => School::inRandomOrder()->first()->id,
            'question' => [
                'en' => 'What documents are required?',
                'uz' => 'Qanday hujjatlar kerak?',
                'ru' => 'Какие документы нужны?',
                'kk' => 'Qanday hu\'jjetler kerek?'
            ],
            'answer' => [
                'en' => 'Birth certificate and previous school report.',
                'uz' => 'Tug‘ilganlik guvohnomasi va avvalgi maktabdan ma’lumotnoma.',
                'ru' => 'Свидетельство о рождении и справка из предыдущей школы.',
                'kk' => 'Tuwılganlik gúwalıǵı hám aldınǵı mektepden málimleme.'
            ],
        ]);
    }
}
