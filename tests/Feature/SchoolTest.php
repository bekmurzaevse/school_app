<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_school_can_create
     * @return void
     */
    public function test_school_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $phone = fake()->numerify('############');
        $location = fake()->text();
        $data = [
            'name' => [
                'kk' => 'mektep kk',
                'uz' => 'mektep uz',
                'ru' => 'mektep ru',
                'en' => 'mektep en',
            ],
            'history' => [
                'kk' => 'history kk',
                'uz' => 'history uz',
                'ru' => 'history ru',
                'en' => 'history en',
            ],
            'phone' => $phone,
            'location' => $location,
            'description' => [
                'kk' => 'description kk',
                'uz' => 'description uz',
                'ru' => 'description ru',
                'en' => 'description en',
            ],
        ];

        $response = $this->postJson("/api/v1/schools/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ])
            ->assertJson(['message' => 'School created']);

        $this->assertDatabaseHas('schools', [
            'name->kk' => 'mektep kk',
            'name->uz' => 'mektep uz',
            'name->ru' => 'mektep ru',
            'name->en' => 'mektep en',
            'history->kk' => 'history kk',
            'history->uz' => 'history uz',
            'history->ru' => 'history ru',
            'history->en' => 'history en',
            'phone' => $phone,
            'location' => $location,
            'description->kk' => 'description kk',
            'description->uz' => 'description uz',
            'description->ru' => 'description ru',
            'description->en' => 'description en',
        ]);
    }

    /**
     * Summary of test_school_can_get_all
     * @return void
     */
    public function test_school_can_get_all()
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $response = $this->getJson("/api/v1/schools");

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
                                 'history',
                                 'phone',
                                 'location',
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
     * Summary of test_school_can_update
     * @return void
     */
    public function test_school_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $school = School::inRandomOrder()->first();

        $name = fake()->name();

        $phone = fake()->numerify('############');
        $location = fake()->text();
        $nameKk = 'mektep kk' . Str::random();
        $nameUz = 'mektep uz' . Str::random();
        $nameRu = 'mektep ru' . Str::random();
        $nameEn = 'mektep en' . Str::random();

        $historyKk = 'history kk' . Str::random();
        $historyUz = 'history uz' . Str::random();
        $historyRu = 'history ru' . Str::random();
        $historyEn = 'history en' . Str::random();

        $descriptionKk = 'description kk' . Str::random();
        $descriptionUz = 'description uz' . Str::random();
        $descriptionRu = 'description ru' . Str::random();
        $descriptionEn = 'description en' . Str::random();

        $data = [
            'name' => [
                'kk' => $nameKk,
                'uz' => $nameUz,
                'ru' => $nameRu,
                'en' => $nameEn,
            ],
            'history' => [
                'kk' => $historyKk,
                'uz' => $historyUz,
                'ru' => $historyRu,
                'en' => $historyEn,
            ],
            'phone' => $phone,
            'location' => $location,
            'description' => [
                'kk' => $descriptionKk,
                'uz' => $descriptionUz,
                'ru' => $descriptionRu,
                'en' => $descriptionEn,
            ],
        ];

        $response = $this->putJson("/api/v1/schools/update/" . $school->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('schools', [
            'name->kk' => $nameKk,
            'name->uz' => $nameUz,
            'name->ru' => $nameRu,
            'name->en' => $nameEn,
        ]);
    }

    /**
     * Summary of test_school_can_delete
     * @return void
     */
    public function test_school_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $school = School::factory()->create();

        $response = $this->deleteJson("/api/v1/schools/delete/" . $school->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('schools', [
            'id' => $school->id,
        ]);
    }

     /**
      * Summary of test_show_school
      * @return void
      */
     public function test_show_school(): void
    {
        $school = School::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/schools/' . $school->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }
}
