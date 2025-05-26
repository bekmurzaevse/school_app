<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\SchoolHour;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;

class SchoolHourTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_school_hour_can_get_all
     * @return void
     */
    public function test_school_hour_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/school-hours");

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
                                 'workday',
                                 'holiday',
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
     * Summary of test_school_hour_can_create
     * @return void
     */
    public function test_school_hour_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $workdayKk = 'workday kk'  . Str::random(4);
        $workdayUz = 'workday uz'  . Str::random(4);
        $workdayRu = 'workday ru'  . Str::random(4);
        $workdayEn = 'workday en'  . Str::random(4);

        $holidayKk = 'holiday kk'  . Str::random(4);
        $holidayUz = 'holiday uz'  . Str::random(4);
        $holidayRu = 'holiday ru'  . Str::random(4);
        $holidayEn = 'holiday en'  . Str::random(4);

        $school = School::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'school_id' => $school->id,
            'workday' => [
                'kk' => $workdayKk,
                'uz' => $workdayUz,
                'ru' => $workdayRu,
                'en' => $workdayEn,
            ],
            'holiday' => [
                'kk' => $holidayKk,
                'uz' => $holidayUz,
                'ru' => $holidayRu,
                'en' => $holidayEn,
            ],
        ];

        $response = $this->postJson("/api/v1/school-hours/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('school_hours', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'school_id' => $school->id,
            'workday->kk' => $workdayKk,
            'workday->uz' => $workdayUz,
            'workday->ru' => $workdayRu,
            'workday->en' => $workdayEn,
            'holiday->kk' => $holidayKk,
            'holiday->uz' => $holidayUz,
            'holiday->ru' => $holidayRu,
            'holiday->en' => $holidayEn,
        ]);
    }

    /**
     * Summary of test_school_hour_can_update
     * @return void
     */
    public function test_school_hour_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $titleKk = 'title kk ' . Str::random(4);
        $titleUz = 'title uz ' . Str::random(4);
        $titleRu = 'title ru ' . Str::random(4);
        $titleEn = 'title en ' . Str::random(4);

        $workdayKk = 'workday kk' . Str::random(4);
        $workdayUz = 'workday uz' . Str::random(4);
        $workdayRu = 'workday ru' . Str::random(4);
        $workdayEn = 'workday en' . Str::random(4);

        $holidayKk = 'holiday kk' . Str::random(4);
        $holidayUz = 'holiday uz' . Str::random(4);
        $holidayRu = 'holiday ru' . Str::random(4);
        $holidayEn = 'holiday en' . Str::random(4);

        $school = School::inRandomOrder()->first();
        $schoolHour = SchoolHour::inRandomOrder()->first();
        $data = [
            'title' => [
                'kk' => $titleKk,
                'uz' => $titleUz,
                'ru' => $titleRu,
                'en' => $titleEn,
            ],
            'school_id' => $school->id,
            'workday' => [
                'kk' => $workdayKk,
                'uz' => $workdayUz,
                'ru' => $workdayRu,
                'en' => $workdayEn,
            ],
            'holiday' => [
                'kk' => $holidayKk,
                'uz' => $holidayUz,
                'ru' => $holidayRu,
                'en' => $holidayEn,
            ],
        ];

        $response = $this->putJson("/api/v1/school-hours/update/" . $schoolHour->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('school_hours', [
            'title->kk' => $titleKk,
            'title->uz' => $titleUz,
            'title->ru' => $titleRu,
            'title->en' => $titleEn,
            'school_id' => $school->id,
            'workday->kk' => $workdayKk,
            'workday->uz' => $workdayUz,
            'workday->ru' => $workdayRu,
            'workday->en' => $workdayEn,
            'holiday->kk' => $holidayKk,
            'holiday->uz' => $holidayUz,
            'holiday->ru' => $holidayRu,
            'holiday->en' => $holidayEn,
        ]);
    }

    /**
     * Summary of test_school_hour_can_delete
     * @return void
     */
    public function test_school_hour_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $schoolHour = SchoolHour::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/school-hours/delete/" . $schoolHour->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('school_hours', [
            'id' => $schoolHour->id,
        ]);
    }

    /**
     * Summary of test_show_school_hour
     * @return void
     */
    public function test_show_school_hour(): void
    {
        $schoolHour = SchoolHour::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/school-hours/' . $schoolHour->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }
}
