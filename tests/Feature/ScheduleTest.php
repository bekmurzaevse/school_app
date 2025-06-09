<?php

namespace Tests\Feature;

use App\Models\Attachment;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();

        $user = User::find(1)->first();
        $this->actingAs($user);
    }

    public function test_schedule_can_get_all(): void
    {
        
        $response = $this->getJson('/api/v1/schedules');

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
                    ],
                ],
            ]);
    }

    public function test_schedule_can_show(): void
    {
        $schedule = Attachment::where('type', '=', 'schedule')->inRandomOrder()->first();

        $response = $this->getJson('/api/v1/schedules/' . $schedule->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'path',
                    'type',
                    'size',
                    'description',
                    'created_at',
                    'download_url',
                ]
            ]);
    }


    public function test_schedule_can_download()
    {

        $scheduleId = Attachment::where('type', 'schedule')->inRandomOrder()->first()->id;

        $response = $this->get("/api/v1/schedules/download/" . $scheduleId);

        $response->assertStatus(200);
    }

    public function test_schedule_can_delete(): void
    {

        $schedule = Attachment::where('type', 'schedule')->first();

        $response = $this->deleteJson('/api/v1/schedules/delete/' . $schedule->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

    }
}