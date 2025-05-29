<?php

namespace Tests\Feature;

use App\Models\Club;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
                            'school_id',
                            'text',
                            'schedule',
                            'photo_id',
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
                    'school_id',
                    'text',
                    'schedule',
                    'photo_id',
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
            'photo_id' => 1,
        ];

        $response = $this->postJson('/api/v1/clubs/create', $data);

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
            'photo_id' => 1,
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

        $clubId = Club::inRandomOrder()->first()->id;

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
            'photo_id' => 1,
        ];

        $response = $this->putJson('/api/v1/clubs/update/' . $clubId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'school_id',
                    'text',
                    'schedule',
                    'photo_id',
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
            'photo_id' => 1,
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

        $clubId = Club::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/clubs/delete/' . $clubId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Club Deleted',
            ]);

        $this->assertSoftDeleted('clubs', [
            'id' => $clubId,
        ]);
    }
}
