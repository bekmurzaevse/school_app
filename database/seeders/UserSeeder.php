<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $school = School::inRandomOrder()->first();

        $user = User::create([
            'full_name' => [
                'uz' => 'Alijon',
                'ru' => 'Алиджон',
                'en' => 'Alijon',
                'kk' => 'Әліжон',
            ],
            'username' => 'admin',
            'password' => 'password',
            'description' => [
                'uz' => 'Bu foydalanuvchi test maqsadida yaratildi.',
                'ru' => 'Этот пользователь создан для теста.',
                'en' => 'This user is created for testing.',
                'kk' => 'Бұл қолданушы тест үшін жасалды.',
            ],
            'phone' => '998901234567',
            'school_id' => $school->id,
            'birth_date' => '2010-01-01',
        ]);
        $user->assignRole('admin');

        $admins = User::factory()->count(2)->create();
        foreach ($admins as $admin) {
            $admin->assignRole('admin');
        }

        $users = User::factory()->count(8)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
