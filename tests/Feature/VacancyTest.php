<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class VacancyTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_vacancy_can_get_all
     * @return void
     */
    public function test_vacancy_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/vacancies");

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
                                 'content',
                                //  'school',
                                 'salary',
                                 'active',
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
     * Summary of test_vacancy_can_create
     * @return void
     */
    public function test_vacancy_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $contentKk = 'content kk';
        $contentUz = 'content uz';
        $contentRu = 'content ru';
        $contentEn = 'content en';

        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'school_id' => School::first()->id,
            'salary' => rand(2000000, 5000000),
            'content' => [
                'kk' => $contentKk,
                'uz' => $contentUz,
                'ru' => $contentRu,
                'en' => $contentEn,
            ],
        ];

        $response = $this->postJson("/api/v1/vacancies/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('vacancies', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'content->kk' => $contentKk,
            'content->uz' => $contentUz,
            'content->ru' => $contentRu,
            'content->en' => $contentEn,
        ]);
    }

    /**
     * Summary of test_vacancy_can_update
     * @return void
     */
    public function test_vacancy_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $contentKk = 'content kk';
        $contentUz = 'content uz';
        $contentRu = 'content ru';
        $contentEn = 'content en';

        $vacancy = Vacancy::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'salary' => rand(2500000, 6000000),
            'content' => [
                'kk' => $contentKk,
                'uz' => $contentUz,
                'ru' => $contentRu,
                'en' => $contentEn,
            ],
        ];

        $response = $this->putJson("/api/v1/vacancies/update/" . $vacancy->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('vacancies', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'content->kk' => $contentKk,
            'content->uz' => $contentUz,
            'content->ru' => $contentRu,
            'content->en' => $contentEn,
        ]);
    }

    /**
     * Summary of test_vacancy_can_delete
     * @return void
     */
    public function test_vacancy_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $vacancy = Vacancy::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/vacancies/delete/" . $vacancy->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('vacancies', [
            'id' => $vacancy->id,
        ]);
    }

    /**
     * Summary of test_show_vacancy
     * @return void
     */
    public function test_show_vacancy(): void
    {
        $user = User::first();
        $this->actingAs($user);

        $vacancy = Vacancy::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/vacancies/' . $vacancy->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

}
