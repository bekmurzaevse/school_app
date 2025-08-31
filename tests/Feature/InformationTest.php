<?php

namespace Tests\Feature;

use App\Models\Information;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

class InformationTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_information_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/informations");

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
                                 'description',
                                 'count',
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

    public function test_information_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $descriptionKk = 'description kk' . Str::random(4);
        $descriptionUz = 'description uz' . Str::random(4);
        $descriptionRu = 'description ru' . Str::random(4);
        $descriptionEn = 'description en' . Str::random(4);

        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'count' => rand(50, 200),
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->postJson("/api/v1/informations/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('informations', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }

    public function test_information_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $descriptionKk = 'description kk' . Str::random(4);
        $descriptionUz = 'description uz' . Str::random(4);
        $descriptionRu = 'description ru' . Str::random(4);
        $descriptionEn = 'description en' . Str::random(4);

        $information = Information::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'count' => rand(20, 200),
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->putJson("/api/v1/informations/update/" . $information->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('informations', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }

    public function test_information_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $information = Information::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/informations/delete/" . $information->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('informations', [
            'id' => $information->id,
        ]);
    }
    public function test_show_information(): void
    {
        $information = Information::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/informations/' . $information->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }
}
