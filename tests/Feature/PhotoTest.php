<?php

namespace Tests\Feature;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PhotoTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    /**
     * Summary of test_photo_can_get_all
     * @return void
     */
    public function test_photo_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/photos");

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
                                 'path',
                                 'album',
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
     * Summary of test_photo_can_create
     * @return void
     */
    public function test_photo_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $title = 'title ' . Str::random(4);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $album = Album::inRandomOrder()->first();

        $fileName = 'photo' . Str::random(6) . '_' . now()->format('Y-m-d-H-i-s') . '.jpg';
        $file = UploadedFile::fake()->image($fileName);

        $path = $file->store('photos', 'public');
        $expectedPath = 'photos/' . $path;

        $data = [
            'photos' => [
                $file,
            ],
            'title' => $title,
            'path' => $expectedPath,
            'album_id' => $album->id,
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->postJson("/api/v1/photos/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $photo = Photo::latest()->first();

        Storage::disk('public')->assertExists($photo->path);

        $this->assertDatabaseHas('photos', [
            'title' => $title,
            'album_id' => $album->id,
        ]);
    }


    /**
     * Summary of test_photo_can_update
     * @return void
     */
    public function test_photo_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $photo = Photo::factory()->create();

        Storage::delete($photo->path);

        $title = 'title ' . Str::random(6);

        $descriptionKk = 'description kk';
        $descriptionUz = 'description uz';
        $descriptionRu = 'description ru';
        $descriptionEn = 'description en';

        $album = Album::inRandomOrder()->first();
        // $album = Album::factory()->create();

        $fileName = 'photo' . Str::random(6) . '_' . now()->format('Y-m-d-H-i-s') . '.jpg';
        $file = UploadedFile::fake()->image($fileName);

        $path = $file->store('photos', 'public');
        $expectedPath = 'photos/' . $path;

        $data = [
            'photo' => $file,
            'title' => $title,
            'album_id' => $album->id,
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->postJson("/api/v1/photos/update/" . $photo->id, $data);

         $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

            $this->assertDatabaseHas('photos', [
                'id' => $photo->id,
                'album_id' => $album->id,
            ]);
    }


    /**
     * Summary of test_photo_can_delete
     * @return void
     */
    public function test_photo_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $photo = Photo::factory()->create();

        $response = $this->deleteJson("/api/v1/photos/delete/" . $photo->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseMissing('albums', [
            'id' => $photo->id,
        ]);
    }


    /**
     * Summary of test_show_photo
     * @return void
     */
    public function test_show_photo(): void
    {
        $photo = Photo::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/photos/' . $photo->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }
}
