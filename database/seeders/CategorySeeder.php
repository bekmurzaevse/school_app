<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => [
                'en' => 'Apple',
                'uz' => 'Olma',
                'ru' => 'Яблоко',
            ],
            'description' => [
                'en' => 'Fresh and delicious apples.',
                'uz' => 'Yangi va mazali olma.',
                'ru' => 'Свежие и вкусные яблоки.',
            ],
        ]);
    }
}
