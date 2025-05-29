<?php

namespace Tests\Feature;

use App\Models\Value;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ValueTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_values_can_get_all
     * @return void
     */
    public function test_values_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/values");

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
                            'text',
                            'school_id',
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
     * Summary of test_value_can_show
     * @return void
     */
    public function test_value_can_show(): void
    {
        $valueId = Value::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/values/' . $valueId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'text',
                    'school_id',
                    'photo_id',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_value_can_create
     * @return void
     */
    public function test_value_can_create(): void
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
            'photo_id' => 1,
        ];

        $response = $this->postJson('/api/v1/values/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Value created',
        ]);

        $this->assertDatabaseHas('values', [
            'name->en' => 'name en rule test',
            'name->kk' => 'name kk rule test',
            'name->ru' => 'name ru rule test',
            'name->uz' => 'name uz rule test',
            'school_id' => 1,
            'photo_id' => 1,
            'text->en' => 'text en rule test',
            'text->kk' => 'text kk rule test',
            'text->ru' => 'text ru rule test',
            'text->uz' => 'text uz rule test',
        ]);
    }

    /**
     * Summary of test_value_can_update
     * @return void
     */
    public function test_value_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $valueId = Value::inRandomOrder()->first()->id;

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
            'photo_id' => 1,
        ];

        $response = $this->putJson('/api/v1/values/update/' . $valueId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'text',
                    'school_id',
                    'photo_id',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('values', [
            'id' => $valueId,
            'name->en' => 'updated name en rule test',
            'name->kk' => 'updated name kk rule test',
            'name->ru' => 'updated name ru rule test',
            'name->uz' => 'updated name uz rule test',
            'school_id' => 1,
            'photo_id' => 1,
            'text->en' => 'updated text en rule test',
            'text->kk' => 'updated text kk rule test',
            'text->ru' => 'updated text ru rule test',
            'text->uz' => 'updated text uz rule test',
        ]);
    }

    /**
     * Summary of test_value_can_delete
     * @return void
     */
    public function test_value_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $valueId = Value::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/values/delete/' . $valueId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Value Deleted',
            ]);

        $this->assertSoftDeleted('values', [
            'id' => $valueId,
        ]);
    }
}
