<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SchoolSeeder::class,
            // EventSeeder::class,
            // FileSeeder::class,
            // CategorySeeder::class,
            DocumentSeeder::class,
            PositionSeeder::class,
            AlbumSeeder::class,
            // PhotoSeeder::class,
            EmployeeSeeder::class,
            UserPermissionSeeder::class,
            UserSeeder::class,
            // TagSeeder::class,
            NewsSeeder::class,
            // NewsTagSeeder::class,
            ClubSeeder::class,
            RuleSeeder::class,
            ValueSeeder::class,
            HistorySeeder::class,
            TargetSeeder::class,
            FaqSeeder::class,
            SchoolHourSeeder::class,
            InformationSeeder::class,
            VacancySeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
