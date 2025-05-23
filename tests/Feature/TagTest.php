<?php

namespace Tests\Feature;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
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
     * Summary of test_tag_can_get_all
     * @return void
     */
    public function test_tag_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/tags");

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
                            'description',
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
     * Summary of test_tag_can_show
     * @return void
     */
    public function test_tag_can_show(): void
    {
        $tagId = Tag::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/tags/' . $tagId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_tag_can_create
     * @return void
     */
    public function test_tag_can_create(): void
    {
        $data = [
            'name' => [
                'en' => 'Climate Change',
                'ru' => 'Изменение климата',
                'uz' => 'Iqlim o\'zgarishi',
                'kk' => 'Íqlım ózgeriwi',
            ],
            'description' => [
                'en' => 'News and analysis about the impacts and studies of climate change.',
                'ru' => 'Новости и аналитика о воздействии и исследованиях изменения климата.',
                'uz' => 'Iqlim o\'zgarishining ta\'siri va tadqiqotlari haqida yangiliklar va tahlillar.',
                'kk' => 'Íqlım ózgeriwiniń tásiri hám izertlewleri haqqında jańalıqlar hám analizler.',
            ],
        ];

        $response = $this->postJson('/api/v1/tags/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Tag created',
        ]);
    }

    /**
     * Summary of test_tag_can_update
     * @return void
     */
    public function test_tag_can_update(): void
    {
        $tagId = Tag::inRandomOrder()->first()->id;

        $data = [
            'name' => [
                'en' => 'Russian Science',
                'ru' => 'Российская наука',
                'uz' => 'Rossiya fani',
                'kk' => 'Rossiya páni',
            ],
            'description' => [
                'en' => 'Updates and discoveries from the Russian scientific community.',
                'ru' => 'Новости и открытия от российского научного сообщества.',
                'uz' => 'Rossiya ilmiy hamjamiyatidan yangiliklar va kashfiyotlar.',
                'kk' => 'Rossiya ilimiy jámiyetshiliginen jańalıqlar hám jańa ashılıwlar.',
            ],
        ];

        $response = $this->putJson('/api/v1/tags/update/' . $tagId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'name',
                    'description',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_tag_can_delete
     * @return void
     */
    public function test_tag_can_delete(): void
    {
        $tagId = Tag::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/tags/delete/' . $tagId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Tag Deleted',
            ]);
    }
}
