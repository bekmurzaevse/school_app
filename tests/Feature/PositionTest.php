<?php

namespace Tests\Feature;

use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PositionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_position_can_get_all
     * @return void
     */
    public function test_position_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/positions");

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
                                 'description',
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
     * Summary of test_position_can_create
     * @return void
     */
    public function test_position_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $nameKk = 'position kk ' . Str::random(4);
        $nameUz = 'position uz ' . Str::random(4);
        $nameRu = 'position ru ' . Str::random(4);
        $nameEn = 'position en ' . Str::random(4);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $data = [
            'name' => [
                'kk' => $nameKk,
                'uz' => $nameUz,
                'ru' => $nameRu,
                'en' => $nameEn,
            ],
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->postJson("/api/v1/positions/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('positions', [
            'name->kk' => $nameKk,
            'name->uz' => $nameUz,
            'name->ru' => $nameRu,
            'name->en' => $nameEn,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }


    /**
     * Summary of test_position_can_update
     * @return void
     */
    public function test_position_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $nameKk = 'position kk ' . Str::random(4);
        $nameUz = 'position uz ' . Str::random(4);
        $nameRu = 'position ru ' . Str::random(4);
        $nameEn = 'position en ' . Str::random(4);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $position = Position::inRandomOrder()->first();
        $data = [
            'name' => [
                'kk' => $nameKk,
                'uz' => $nameUz,
                'ru' => $nameRu,
                'en' => $nameEn,
            ],
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->putJson("/api/v1/positions/update/" . $position->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('positions', [
            'name->kk' => $nameKk,
            'name->uz' => $nameUz,
            'name->ru' => $nameRu,
            'name->en' => $nameEn,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }

    /**
     * Summary of test_position_can_delete
     * @return void
     */
    public function test_position_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $position = Position::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/positions/delete/" . $position->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('positions', [
            'id' => $position->id,
        ]);
    }

    /**
     * Summary of test_show_position
     * @return void
     */
    public function test_show_position(): void
    {
        $user = User::first();
        $this->actingAs($user);

        $position = Position::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/positions/' . $position->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

}
