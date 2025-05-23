<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => [
                'kk' => 'KK ' . fake()->name(),
                'uz' => 'UZ ' . fake()->name(),
                'ru' => 'RU ' . fake()->name(),
                'en' => 'EN ' . fake()->name(),
            ],
            'school_id' => School::inRandomOrder()->first(),
            'description' => [
                'kk' => 'KK ' . fake()->text(),
                'uz' => 'UZ ' . fake()->text(),
                'ru' => 'RU ' . fake()->text(),
                'en' => 'EN ' . fake()->text(),
            ],
        ];
    }
}
