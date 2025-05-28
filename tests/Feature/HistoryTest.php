<?php

namespace Tests\Feature;

use App\Models\History;
use App\Models\School;
use App\Models\Target;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HistoryTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_history_can_get_all
     * @return void
     */
    public function test_history_can_get_all(): void
    {
        $response = $this->getJson('api/v1/histories');

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
     * Summary of test_history_can_show
     * @return void
     */
    public function test_history_can_show(): void
    {
        $history = History::inRandomOrder()->first();

        $response = $this->getJson("/api/v1/histories/{$history->id}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
                'data'
            ]);
    }

    /**
     * Summary of test_history_can_create
     * @return void
     */
    public function test_history_can_create(): void
    {
        $user = User::find(1)->first();

        $this->actingAs($user);

        $data = [
            'year' => 2025,
            'text' => [
                'en' => 'Plan for 2025',
                'ru' => 'План на 2025',
                'uz' => '2025 yil uchun reja',
                'kk' => '2025 jilga reje',
            ],
        ];

        $response = $this->postJson('/api/v1/histories/create', $data);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'History created!',
            ]);
    }

    /**
     * Summary of test_history_can_update
     * @return void
     */
    public function test_history_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $history = History::inRandomOrder()->first();

        $updatedData = [
            'year' => 2026,
            'text' => [
                'en' => 'Updated plan',
                'ru' => 'Обновлённый план',
                'uz' => 'Yangilangan reja',
                'kk' => 'Janalangan reje',
            ],
        ];

        $response = $this->putJson("/api/v1/histories/update/{$history->id}", $updatedData);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => 'History updated!',
            ]);
    }

    /**
     * Summary of test_history_can_delete
     * @return void
     */
    public function test_history_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $history = History::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/histories/delete/{$history->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => true,
                'message' => "{$history->id} - History deleted!",
            ]);
    }
}