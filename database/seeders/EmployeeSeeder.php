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

        $photo = UploadedFile::fake()->image('employee1.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $employee1->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
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

        $photo = UploadedFile::fake()->image('employee2.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $employee2->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
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

        $photo = UploadedFile::fake()->image('employee3.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $employee3->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
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

        $photo = UploadedFile::fake()->image('employee4.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $employee4->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
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

        $photo = UploadedFile::fake()->image('employee5.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $employee5->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);
    }
}
