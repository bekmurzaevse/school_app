<?php

namespace Tests\Feature;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RuleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_rules_can_get_all
     * @return void
     */
    public function test_rules_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/rules");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'title',
                            'text',
                            'school',
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
     * Summary of test_rule_can_show
     * @return void
     */
    public function test_rule_can_show(): void
    {
        $ruleId = Rule::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/rules/' . $ruleId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'text',
                    'school',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_rule_can_create
     * @return void
     */
    public function test_rule_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $data = [
            'title' => [
                'en' => 'title en rule test',
                'ru' => 'title ru rule test',
                'uz' => 'title uz rule test',
                'kk' => 'title kk rule test',
            ],
            'text' => [
                'en' => 'text en rule test',
                'ru' => 'text ru rule test',
                'uz' => 'text uz rule test',
                'kk' => 'text kk rule test',
            ],
        ];

        $response = $this->postJson('/api/v1/rules/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Rule created',
        ]);

        $this->assertDatabaseHas('rules', [
            'title->en' => 'title en rule test',
            'title->ru' => 'title ru rule test',
            'title->uz' => 'title uz rule test',
            'title->kk' => 'title kk rule test',
            'text->en' => 'text en rule test',
            'text->ru' => 'text ru rule test',
            'text->uz' => 'text uz rule test',
            'text->kk' => 'text kk rule test',
            'school_id' => 1,
        ]);
    }

    /**
     * Summary of test_rule_can_update
     * @return void
     */
    public function test_rule_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $ruleId = Rule::inRandomOrder()->first()->id;
        
        $data = [
            'title' => [
                'en' => 'updated title en rule test',
                'ru' => 'updated title ru rule test',
                'uz' => 'updated title uz rule test',
                'kk' => 'updated title kk rule test',
            ],
            'text' => [
                'en' => 'updated text en rule test',
                'ru' => 'updated text ru rule test',
                'uz' => 'updated text uz rule test',
                'kk' => 'updated text kk rule test',
            ],
        ];

        $response = $this->putJson('/api/v1/rules/update/' . $ruleId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'title',
                    'text',
                    'school',
                    'created_at',
                    'updated_at',
                ]
            ]);

        $this->assertDatabaseHas('rules', [
            'id' => $ruleId,
            'title->en' => 'updated title en rule test',
            'title->ru' => 'updated title ru rule test',
            'title->uz' => 'updated title uz rule test',
            'title->kk' => 'updated title kk rule test',
            'text->en' => 'updated text en rule test',
            'text->ru' => 'updated text ru rule test',
            'text->uz' => 'updated text uz rule test',
            'text->kk' => 'updated text kk rule test',
            'school_id' => 1,
        ]);
    }

    /**
     * Summary of test_rule_can_delete
     * @return void
     */
    public function test_rule_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $ruleId = Rule::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/rules/delete/' . $ruleId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Rule Deleted',
            ]);

        $this->assertSoftDeleted('rules', [
            'id' => $ruleId,
        ]);
    }
}
