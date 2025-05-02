<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'full_name' => [
                'en' => 'John Smith',
                'ru' => 'Джон Смит',
                'uz' => 'Djon Smit',
                'kk' => 'Djon Smit',
            ],
            'phone' => '+998911234567',
            'photo_id' => 1,
            'email' => 'johnsmith@gmail.com',
            'position_id' => 1,
            'birth_date' => '1985-12-20'
        ]);
    
        Employee::create([
            'full_name' => [
                'en' => 'Michael Brown',
                'ru' => 'Майкл Браун',
                'uz' => 'Maykl Braun',
                'kk' => 'Maykl Braun',
            ],
            'phone' => '+998911234568',
            'photo_id' => 2,
            'email' => 'michaelbrown@gmail.com',
            'position_id' => 2,
            'birth_date' => '1992-08-27'
        ]);

        Employee::create([
            'full_name' => [
                'en' => 'Alexey Kuznetsov',
                'ru' => 'Алексей Кузнецов',
                'uz' => 'Aleksey Kuznetsov',
                'kk' => 'Aleksey Kuznetsov',
            ],
            'phone' => '+998911234561',
            'photo_id' => 3,
            'email' => 'alexeykuznetsov@gmail.com',
            'position_id' => 3,
            'birth_date' => '1994-12-31'
        ]);

        Employee::create([
            'full_name' => [
                'en' => 'Javlon Karimov',
                'ru' => 'Джавлон Каримов',
                'uz' => 'Javlon Karimov',
                'kk' => 'Javlon Karimov',
            ],
            'phone' => '+998911234569',
            'photo_id' => 3,
            'email' => 'javlonлarimov@gmail.com',
            'position_id' => 3,
            'birth_date' => '1997-06-12'
        ]);

        Employee::create([
            'full_name' => [
                'en' => 'Erzhan Nurbekov',
                'ru' => 'Ержан Нурбеков',
                'uz' => 'Erjan Nurbekov',
                'kk' => 'Erjan Nurbekov',
            ],
            'phone' => '+998911234562',
            'photo_id' => 2,
            'email' => 'erjannurbekov@gmail.com',
            'position_id' => 2,
            'birth_date' => '1993-08-03'
        ]);
    }
}
