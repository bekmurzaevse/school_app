<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Target::create([
            'name' => [
                'en' => 'Sustainability',
                'uz' => 'Barqarorlik',
                'ru' => 'Устойчивость',
                'kk' => 'Turaqlılıq'
            ],
            'description' => [
                'en' => 'Our goal is to reduce waste and promote green energy.',
                'uz' => 'Bizning maqsad chiqindilarni kamaytirish va yashil energiyani targ‘ib qilish.',
                'ru' => 'Наша цель — сократить отходы и продвигать зеленую энергию.'
            ],
            'school_id' => School::inRandomOrder()->first()->id,
        ]);

        Target::create([
            'name' => [
                'en' => 'Education',
                'uz' => 'Ta\'lim',
                'ru' => 'Образование',
                'kk' => 'Bilimlendiriw'
            ],
            'description' => [
                'en' => 'We focus on accessible education for all.',
                'uz' => 'Biz hammaga ochiq ta\'limga e’tibor qaratamiz.',
                'ru' => 'Мы сосредотачиваемся на доступном образовании для всех.',
                'kk' => 'Biz ha\'mmemiz ashiq bilimlendiriwge itibar qaratamiz.',
            ],
            'school_id' => School::inRandomOrder()->first()->id,
        ]);
    }
}
