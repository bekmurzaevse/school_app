<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\Target;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TargetTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed(); 
    }

    /**
     * Summary of test_target_can_get_all
     * @return void
     */
    public function test_target_can_get_all(): void
    {

        $response = $this->getJson('api/v1/targets');

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
     * Summary of test_target_can_show
     * @return void
     */
    public function test_target_can_show()
    {
        $target = Target::inRandomOrder()->first();

        $response = $this->getJson("/api/v1/targets/{$target->id}");

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

    /**
     * Summary of test_target_can_create
     * @return void
     */
    public function test_target_can_create()
    {

        $user = User::find(1)->first();

        $this->actingAs($user);

        $data = [
            'name' => [
                'en' => 'Yearly Target',
                'ru' => 'Годовая цель',
                'uz' => 'Yillik maqsad',
                'kk' => 'Jilliq maqset',
            ],
            'description' => [
                'en' => 'Plan for 2025',
                'ru' => 'План на 2025 год',
                'uz' => '2025 yil uchun reja',
                'kk' => '2025 jilga reje',
            ],
        ];

        $response = $this->postJson('api/v1/targets/create', $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ])
            ->assertJson(['message' => 'Target created!']);
    }

    /**
     * Summary of test_target_can_update
     * @return void
     */
    public function test_target_can_update()
    {

        $user = User::find(1)->first();
        $this->actingAs($user);

        $target = Target::inRandomOrder()->first();

        $updatedData = [
            'name' => [
                'en' => 'Updated Target',
                'ru' => 'Обновлённая цель',
                'uz' => 'Yangilangan maqsad',
                'kk' => 'Janalangan maqset',
            ],
            'description' => [
                'en' => 'Updated plan',
                'ru' => 'Обновлённый план',
                'uz' => 'Yangilangan reja',
                'kk' => 'Janalangan maqset',
            ],
        ];

        $response = $this->putJson("api/v1/targets/update/{$target->id}", $updatedData);

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Target updated!',
                'status' => true,
            ]);
    }

    /**
     * Summary of test_target_can_delete
     * @return void
     */
    public function test_target_can_delete()
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $target = Target::inRandomOrder()->first();

        $response = $this->deleteJson("api/v1/targets/delete/{$target->id}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => "{$target->id} - Target deleted!",
                'status' => true,
            ]);
    }
}