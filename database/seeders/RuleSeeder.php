<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rule::create([
            'title' => [
                'en' => '1 title en',
                'ru' => '1 title ru',
                'uz' => '1 title uz',
                'kk' => '1 title kk',
            ],
            'school_id' => 1,
            'text' => [
                'en' => '1 text en',
                'ru' => '1 text ru',
                'uz' => '1 text uz',
                'kk' => '1 text kk',
            ],
        ]);

        Rule::create([
            'title' => [
                'en' => '2 title en',
                'ru' => '2 title ru',
                'uz' => '2 title uz',
                'kk' => '2 title kk',
            ],
            'school_id' => 1,
            'text' => [
                'en' => '2 text en',
                'ru' => '2 text ru',
                'uz' => '2 text uz',
                'kk' => '2 text kk',
            ],
        ]);
    }
}