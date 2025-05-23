<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'kk' => 'KK ' . fake()->name(),
                'uz' => 'UZ ' . fake()->name(),
                'ru' => 'RU ' .  fake()->name(),
                'en' => 'EN' . fake()->name(),
            ],
            'history' => [
                'kk' => 'KK ' . fake()->text(),
                'uz' => 'UZ ' . fake()->text(),
                'ru' => 'RU ' .  fake()->text(),
                'en' => 'EN' . fake()->text(),
            ],
            'description' => [
                'kk' => 'KK ' . fake()->text(),
                'uz' => 'UZ ' . fake()->text(),
                'ru' => 'RU ' .  fake()->text(),
                'en' => 'EN' . fake()->text(),
            ],
            'phone' => fake()->phoneNumber,
            'location' => fake()->city(),
        ];
    }
}
