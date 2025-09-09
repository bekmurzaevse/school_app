<?php

namespace Database\Seeders;

use App\Helpers\FileUploadHelper;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Http\UploadedFile;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee1 = Employee::create([
            'full_name' => [
                'en' => 'John Smith',
                'ru' => 'Джон Смит',
                'uz' => 'Djon Smit',
                'kk' => 'Djon Smit',
            ],
            'phone' => '+998911234567',
            'email' => 'johnsmith@gmail.com',
            'position_id' => 1,
            'birth_date' => '1985-12-20',
            'description' => [
                'en' => 'en test description',
                'ru' => 'ru test description',
                'uz' => 'uz test description',
                'kk' => 'kk test description',
            ],
        ]);

        $employee1->photo()->create([
            'name' => 'employee1',
            'path' => 'photos/employee1.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $employee2 = Employee::create([
            'full_name' => [
                'en' => 'Michael Brown',
                'ru' => 'Майкл Браун',
                'uz' => 'Maykl Braun',
                'kk' => 'Maykl Braun',
            ],
            'phone' => '+998911234568',
            'email' => 'michaelbrown@gmail.com',
            'position_id' => 1,
            'birth_date' => '1992-08-27',
            'description' => [
                'en' => 'en test description',
                'ru' => 'ru test description',
                'uz' => 'uz test description',
                'kk' => 'kk test description',
            ],
        ]);

        $employee2->photo()->create([
            'name' => 'employee2',
            'path' => 'photos/employee2.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $employee3 = Employee::create([
            'full_name' => [
                'en' => 'Alexey Kuznetsov',
                'ru' => 'Алексей Кузнецов',
                'uz' => 'Aleksey Kuznetsov',
                'kk' => 'Aleksey Kuznetsov',
            ],
            'phone' => '+998911234561',
            'email' => 'alexeykuznetsov@gmail.com',
            'position_id' => 1,
            'birth_date' => '1994-12-31',
            'description' => [
                'en' => 'en test description',
                'ru' => 'ru test description',
                'uz' => 'uz test description',
                'kk' => 'kk test description',
            ],
        ]);

        $employee3->photo()->create([
            'name' => 'employee3',
            'path' => 'photos/employee3.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $employee4 = Employee::create([
            'full_name' => [
                'en' => 'Javlon Karimov',
                'ru' => 'Джавлон Каримов',
                'uz' => 'Javlon Karimov',
                'kk' => 'Javlon Karimov',
            ],
            'phone' => '+998911234569',
            'email' => 'javlonлarimov@gmail.com',
            'position_id' => 3,
            'birth_date' => '1997-06-12',
            'description' => [
                'en' => 'en test description',
                'ru' => 'ru test description',
                'uz' => 'uz test description',
                'kk' => 'kk test description',
            ],
        ]);

        $employee4->photo()->create([
            'name' => 'employee4',
            'path' => 'photos/employee4.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);

        $employee5 = Employee::create([
            'full_name' => [
                'en' => 'Erzhan Nurbekov',
                'ru' => 'Ержан Нурбеков',
                'uz' => 'Erjan Nurbekov',
                'kk' => 'Erjan Nurbekov',
            ],
            'phone' => '+998911234562',
            'email' => 'erjannurbekov@gmail.com',
            'position_id' => 2,
            'birth_date' => '1993-08-03',
            'description' => [
                'en' => 'en test description',
                'ru' => 'ru test description',
                'uz' => 'uz test description',
                'kk' => 'kk test description',
            ],
        ]);

        $employee5->photo()->create([
            'name' => 'employee5',
            'path' => 'photos/employee5.jpeg',
            'type' => "photo",
            'size' => 1024,
        ]);
    }
}
