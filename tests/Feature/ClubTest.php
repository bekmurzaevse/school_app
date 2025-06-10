<?php

namespace Tests\Feature;

use App\Helpers\FileUploadHelper;
use App\Models\Club;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClubTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_clubs_can_get_all
     * @return void
     */
    public function test_clubs_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/clubs");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'name',
                            'school',
                            'text',
                            'schedule',
                            'photo',
                            'created_at',
                            'updated_at',
                        ]
                    ],
                    'pagination' => [
                        'current_page',
                        'per_page',
                        'last_page',
                        'total'
                    ]
                ]
            ]);
    }

    /**
     * Summary of test_club_can_show
     * @return void
     */
    public function test_club_can_show(): void
    {
        $clubId = Club::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/clubs/' . $clubId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'school',
                    'text',
                    'schedule',
                    'photo',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_club_can_create
     * @return void
     */
    public function test_club_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $photo = UploadedFile::fake()->image('club.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $data = [
            'name' => [
                'en' => 'name en rule test',
                'ru' => 'name ru rule test',
                'uz' => 'name uz rule test',
                'kk' => 'name kk rule test',
            ],
            'text' => [
                'en' => 'text en rule test',
                'ru' => 'text ru rule test',
                'uz' => 'text uz rule test',
                'kk' => 'text kk rule test',
            ],
            'schedule' => [
                'en' => 'schedule en rule test',
                'ru' => 'schedule ru rule test',
                'uz' => 'schedule uz rule test',
                'kk' => 'schedule kk rule test',
            ],
            'photo' => $photo,
        ];

        $response = $this->postJson('/api/v1/clubs/create', $data);

        $club = Club::latest()->first();
        $club->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Club created',
        ]);

        $this->assertDatabaseHas('clubs', [
            'name->en' => 'name en rule test',
            'name->ru' => 'name ru rule test',
            'name->uz' => 'name uz rule test',
            'name->kk' => 'name kk rule test',
            'school_id' => 1,
            'text->en' => 'text en rule test',
            'text->ru' => 'text ru rule test',
            'text->uz' => 'text uz rule test',
            'text->kk' => 'text kk rule test',
            'schedule->en' => 'schedule en rule test',
            'schedule->ru' => 'schedule ru rule test',
            'schedule->uz' => 'schedule uz rule test',
            'schedule->kk' => 'schedule kk rule test',
        ]);
    }

    /**
     * Summary of test_club_can_update
     * @return void
     */
    public function test_club_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $club = Club::inRandomOrder()->first();

        $photo = UploadedFile::fake()->image('club.jpg');
        $path = FileUploadHelper::file($photo, 'photos');

        $data = [
            'name' => [
                'en' => 'updated name en rule test',
                'ru' => 'updated name ru rule test',
                'uz' => 'updated name uz rule test',
                'kk' => 'updated name kk rule test',
            ],
            'text' => [
                'en' => 'updated text en rule test',
                'ru' => 'updated text ru rule test',
                'uz' => 'updated text uz rule test',
                'kk' => 'updated text kk rule test',
            ],
            'schedule' => [
                'en' => 'updated schedule en rule test',
                'ru' => 'updated schedule ru rule test',
                'uz' => 'updated schedule uz rule test',
                'kk' => 'updated schedule kk rule test',
            ],
            'photo' => $photo,
        ];

        if (Storage::disk('public')->exists($club->photo->path)) {
            Storage::disk('public')->delete($club->photo->path);
        }

        $response = $this->putJson('/api/v1/clubs/update/' . $club->id, $data);

        $club->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'school',
                    'text',
                    'schedule',
                    'photo',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('clubs', [
            'name->en' => 'updated name en rule test',
            'name->ru' => 'updated name ru rule test',
            'name->uz' => 'updated name uz rule test',
            'name->kk' => 'updated name kk rule test',
            'school_id' => 1,
            'text->en' => 'updated text en rule test',
            'text->ru' => 'updated text ru rule test',
            'text->uz' => 'updated text uz rule test',
            'text->kk' => 'updated text kk rule test',
            'schedule->en' => 'updated schedule en rule test',
            'schedule->ru' => 'updated schedule ru rule test',
            'schedule->uz' => 'updated schedule uz rule test',
            'schedule->kk' => 'updated schedule kk rule test',
        ]);
    }

    /**
     * Summary of test_club_can_delete
     * @return void
     */
    public function test_club_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $club = Club::inRandomOrder()->first();

        if (Storage::disk('public')->exists($club->photo->path)) {
            Storage::disk('public')->delete($club->photo->path);
        }

        $club->photo()->delete();

        $response = $this->deleteJson('/api/v1/clubs/delete/' . $club->id);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Club Deleted',
            ]);

        $this->assertSoftDeleted('clubs', [
            'id' => $club->id,
        ]);
    }
}
