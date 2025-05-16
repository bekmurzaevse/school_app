<?php

namespace Tests\Feature;

use App\Models\Album;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_album_can_get_all
     * @return void
     */
    public function test_album_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/albums");

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
     * Summary of test_album_can_create
     * @return void
     */
    public function test_album_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'position kk ' . Str::random(4);
        $titleUz = 'position uz ' . Str::random(4);
        $titleRu = 'position ru ' . Str::random(4);
        $titleEn = 'position en ' . Str::random(4);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $school = School::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'school_id' => $school->id,
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->postJson("/api/v1/albums/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('albums', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'school_id' => $school->id,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }


    /**
     * Summary of test_album_can_update
     * @return void
     */
    public function test_album_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'position kk ' . Str::random(4);
        $titleUz = 'position uz ' . Str::random(4);
        $titleRu = 'position ru ' . Str::random(4);
        $titleEn = 'position en ' . Str::random(4);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $school = School::inRandomOrder()->first();
        $album = Album::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'school_id' => $school->id,
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->putJson("/api/v1/albums/update/" . $album->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('albums', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'school_id' => $school->id,
            'description->kk' => $descriptionKk,
            'description->uz' => $descriptionUz,
            'description->ru' => $descriptionRu,
            'description->en' => $descriptionEn,
        ]);
    }


    /**
     * Summary of test_album_can_delete
     * @return void
     */
    public function test_album_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $album = Album::factory()->create();

        $response = $this->deleteJson("/api/v1/albums/delete/" . $album->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseMissing('albums', [
            'id' => $album->id,
        ]);
    }


    /**
     * Summary of test_show_album
     * @return void
     */
    public function test_show_album(): void
    {
        $album = Album::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/albums/' . $album->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }
}
