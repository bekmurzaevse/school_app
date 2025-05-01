<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::insert([
            [
                'name' => ([
                    'en' => 'Science Fair',
                    'ru' => 'Научная ярмарка',
                    'uz' => 'Fan ko‘rgazmasi',
                    'kk' => "Pa'n ko'rgizbesi",
                ]),
                'description' => ([
                    'en' => 'Annual school science fair',
                    'ru' => 'Ежегодная школьная научная ярмарка',
                    'uz' => 'Har yili o‘tkaziladigan maktab fan ko‘rgazmasi',
                    'kk' => "Ha'r jili o'tkiziletug'in pa'n ko'zgizbesi",
                ]),
                'school_id' => 1,
                'start_time' => now()->addDays(3),
                'location' => 'Main Hall',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => ([
                    'en' => 'Football Tournament',
                    'ru' => 'Футбольный турнир',
                    'uz' => 'Futbol turniri',
                    'kk' => 'Futbol jarisi',
                ]),
                'description' => ([
                    'en' => 'Inter-school football competition',
                    'ru' => 'Межшкольное футбольное соревнование',
                    'uz' => 'Maktablararo futbol musobaqasi',
                    'kk' => 'Mektepler ara futbol jarisi',
                ]),
                'school_id' => 1,
                'start_time' => now()->addDays(7),
                'location' => 'Football Field',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
