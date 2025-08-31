<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    /**
     * Summary of test_schedule_can_get_all_for_users
     * @return void
     */
    public function test_schedule_can_get_all_for_users(): void
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

    /**
     * Summary of test_schedule_can_get_all_for_admins
     * @return void
     */
    public function test_schedule_can_get_all_for_admins(): void
    {
        $response = $this->getJson('/api/v1/schedules/all');

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

    /**
     * Summary of test_schedule_can_show
     * @return void
     */
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

    /**
     * Summary of test_schedule_can_create
     * @return void
     */
    public function test_schedule_can_create(): void
    {
        $file = UploadedFile::fake()->create('2A.pdf', 1000, 'application/pdf');

        $data = [
            'description' => "Mekteptin' sabaq kestesi",
            'file_pdf' => $file
        ];

        $response = $this->postJson('/api/v1/schedules/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Schedules successfully created',
        ]);

        $this->assertDatabaseHas('attachments', [
            'name' => $file->getClientOriginalName(),
            'type' => 'schedule',
            'description' => $data['description'],
        ]);
    }

    /**
     * Summary of test_schedule_can_update
     * @return void
     */
    public function test_schedule_can_update(): void
    {
        $school = School::first();
        $schedule = $school->schedules()->inRandomOrder()->first();

        $file = UploadedFile::fake()->create('update.pdf', 1024, 'application/pdf');

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

            if (Storage::disk('public')->exists($schedule->path)) {
                Storage::disk('public')->delete($schedule->path);
            }

        $this->assertDatabaseHas('attachments', [
            'id' => $schedule->id,
            'type' => 'schedule',
            'size' => $file->getSize(),
            'attachable_type' => School::class,
            'attachable_id' => $school->id,
        ]);
    }

    /**
     * Summary of test_schedule_can_download
     * @return void
     */
    public function test_schedule_can_download()
    {
        $school = School::first();
        $scheduleId = $school->schedules()->first()->id;

        $response = $this->get("/api/v1/schedules/download/" . $scheduleId);

        $response->assertStatus(200);
    }

    /**
     * Summary of test_schedule_can_delete
     * @return void
     */
    public function test_schedule_can_delete(): void
    {
        $school = School::first();
        $schedule = $school->schedules()->first();

        if (Storage::disk('public')->exists($schedule->path)) {
            Storage::disk('public')->delete($schedule->path);
        }

        $response = $this->deleteJson('/api/v1/schedules/delete/' . $schedule->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

    }
}
