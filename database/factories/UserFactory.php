<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => [
                'uz' => $this->faker->firstName,
                'ru' => $this->faker->firstName,
                'en' => $this->faker->firstName,
                'kk' => $this->faker->firstName,
            ],
            'username' => $this->faker->unique()->userName,
            'password' => 'password', 
            'description' => [
                'uz' => $this->faker->sentence,
                'ru' => $this->faker->sentence,
                'en' => $this->faker->sentence,
                'kk' => $this->faker->sentence,
            ],
            'phone' => $this->faker->phoneNumber,
            'school_id' => School::inRandomOrder()->first()->id, 
            'birth_date' => $this->faker->date('Y-m-d', '2010-01-01'),
        ];
    }
}
