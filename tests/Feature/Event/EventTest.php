<?php

namespace Tests\Feature\Event;

use App\Models\Event;
use App\Models\User;
use Database\Seeders\EventSeeder;
use Database\Seeders\SchoolSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Summary of test_event_index
     * @return void
     */
    public function test_event_can_get_all(): void
    {
        $response = $this->getJson('api/v1/events');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items',
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total',
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_show_event
     * @return void
     */
    public function test_event_show(): void
    {
        $this->seed(SchoolSeeder::class);
        $this->seed(EventSeeder::class);

        $event = Event::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/events/' . $event->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'location',
                    'start_time',
                    'school',
                    'files',
                    'previous_event',
                    'next_event',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    /**
     * Summary of test_event_created
     * @return void
     */
    public function test_event_can_created(): void
    {
        $this->seed();

        $user = User::find(1)->first();
        $this->actingAs($user);

        $data = [
            'name' => [
                'uz' => 'Test tadbir',
                'ru' => 'Тестовое событие',
                'en' => 'Test Event',
                'kk' => 'Test bayram',
            ],
            'description' => [
                'uz' => 'Bu test tadbiri',
                'ru' => 'Это тестовое событие',
                'en' => 'This is a test event',
                'kk' => 'Bul test bayram',
            ],
            'start_time' => now()->addDays(3)->toDateTimeString(),
            'location' => 'Main Hall',
        ];

        $response = $this->postJson('/api/v1/events/create', $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ])
            ->assertJson([
                'message' => "Ta'dbir a'wmetli jaratildi!",
            ]);
    }

    /**
     * Summary of test_event_updated
     * @return void
     */
    public function test_event_can_updated(): void
    {
        $this->seed();

        $user = User::find(1)->first();
        $this->actingAs($user);

        $event = Event::inRandomOrder()->first();

        $updateData = [
            'name' => [
                'uz' => 'Yangilangan tadbir',
                'ru' => 'Обновлённое событие',
                'en' => 'Updated Event',
                'kk' => 'Jańalangan okiǵa',
            ],
            'description' => [
                'uz' => 'Bu yangilangan tadbir',
                'ru' => 'Это обновлённое событие',
                'en' => 'This is an updated event',
                'kk' => 'Bul jańalangan bayram',
            ],
            'start_time' => now()->addDays(5)->toDateTimeString(),
            'location' => 'Updated Location',
        ];

        $response = $this->putJson('/api/v1/events/update/' . $event->id, $updateData);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ])
            ->assertJson([
                'message' => "Ta'dbir a'wmetli jan'alandi!",
                'data' => [
                    'location' => 'Updated Location',
                ]
            ]);
    }

    /**
     * Summary of test_event_deleted
     * @return void
     */
    public function test_event_can_deleted(): void
{
    $this->seed();

    $user = User::find(1)->first();
    $this->actingAs($user);

    $event = Event::has('files')->inRandomOrder()->first();

    if ($event && $event->files()->exists()) {
        $event->files()->delete();
    }

    $response = $this->deleteJson('/api/v1/events/delete/' . $event->id);

    $response
        ->assertStatus(200)
        ->assertJsonStructure([
            'status',
            'message',
        ])
        ->assertJson([
            'message' => "{$event->id} - id li tadbir o‘shirildi!",
        ]);
}

}
