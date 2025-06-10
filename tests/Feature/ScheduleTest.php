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
        $school = School::first();
        $schedule = $school->schedules()->inRandomOrder()->first();

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

    public function test_schedule_can_create(): void
    {

        $file = UploadedFile::fake()->create('schedule.pdf', 1000, 'application/pdf');

        $data = [
            'description' => "Mekteptin' sabaq kestesi",
            'file' => $file
        ];

        $response = $this->postJson('/api/v1/schedules/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Schedule created',
        ]);

        $this->assertDatabaseHas('attachments', [
            'name' => $file->getClientOriginalName(),
            'type' => 'schedule',
            'description' => $data['description'],
        ]);
    }

    public function test_schedule_can_update(): void
    {
        $school = School::first();
        $schedule = $school->schedules()->first();

        $file = UploadedFile::fake()->create('schedule_update.pdf', 1024, 'application/pdf');

        $data = [
            'file' => $file,
            'description' => "Mekteptin' sabaq kestesi - updated",
        ];

        $response = $this->putJson('/api/v1/schedules/update/' . $schedule->id, $data);

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
                ]
            ]);

        $this->assertDatabaseHas('attachments', [
            'id' => $schedule->id,
            'type' => 'schedule',
            'size' => $file->getSize(),
            'attachable_type' => School::class,
            'attachable_id' => $school->id,
            'description' => "Mekteptin' sabaq kestesi - updated",
        ]);
    }

    public function test_schedule_can_download()
    {

        $school = School::first();
        $scheduleId = $school->schedules()->first()->id;

        $response = $this->get("/api/v1/schedules/download/" . $scheduleId);

        $response->assertStatus(200);
    }

    public function test_schedule_can_delete(): void
    {
        $school = School::first();
        $scheduleId = $school->schedules()->first()->id;

        $response = $this->deleteJson('/api/v1/schedules/delete/' . $scheduleId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

    }
}