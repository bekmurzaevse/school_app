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
        Event::create(
            [
                'name' => [
                    'en' => 'Science Fair',
                    'ru' => 'Научная ярмарка',
                    'uz' => 'Fan ko‘rgazmasi',
                    'kk' => "Pa'n ko'rgizbesi",
                ],
                'description' => [
                    'en' => 'Annual school science fair',
                    'ru' => 'Ежегодная школьная научная ярмарка',
                    'uz' => 'Har yili o‘tkaziladigan maktab fan ko‘rgazmasi',
                    'kk' => "Ha'r jili o'tkiziletug'in pa'n ko'zgizbesi",
                ],
                'school_id' => 1,
                'start_time' => now()->addDays(3),
                'location' => 'Main Hall',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        Event::create([
            'name' => [
                'en' => 'Football Tournament',
                'ru' => 'Футбольный турнир',
                'uz' => 'Futbol turniri',
                'kk' => 'Futbol jarisi',
            ],
            'description' => [
                'en' => 'Inter-school football competition',
                'ru' => 'Межшкольное футбольное соревнование',
                'uz' => 'Maktablararo futbol musobaqasi',
                'kk' => 'Mektepler ara futbol jarisi',
            ],
            'school_id' => 1,
            'start_time' => now()->addDays(7),
            'location' => 'Football Field',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Event::create([
            'name' => [
                'en' => 'New Year Celebration',
                'ru' => 'Празднование Нового года',
                'uz' => 'Yangi yil bayrami',
                'kk' => "Jan'a jıl bayramı",
            ],
            'description' => [
                'en' => 'Information about the New Year celebration event',
                'ru' => 'Информация о праздновании Нового года',
                'uz' => 'Yangi yil bayrami tadbiri haqida maʼlumotlar',
                'kk' => "Jan'a jıl bayramı haqqında mag'lıwmatlar",
            ],
            'school_id' => 1,
            'start_time' => now()->addDays(30),
            'location' => 'Mektep zalı',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Event::create([
            'name' => [
                'en' => 'Event Navruz',
                'ru' => 'Праздник Навруз',
                'uz' => 'Navroz bayrami',
                'kk' => 'Nawriz bayrami',
            ],
            'description' => [
                'en' => 'Information about the Navruz holiday event',
                'ru' => 'Межшкольное футбольное соревнование',
                'uz' => 'Navroz bayrami tadbiri haqida malumotlar',
                'kk' => 'Nawriz bayrami haqqinda magliwmatlar',
            ],
            'school_id' => 1,
            'start_time' => now()->addDays(7),
            'location' => 'Mektep maydanshasi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
