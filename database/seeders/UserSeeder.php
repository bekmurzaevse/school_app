<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
