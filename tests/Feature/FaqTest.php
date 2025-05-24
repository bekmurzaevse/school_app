<?php

namespace Tests\Feature;

use App\Models\Faq;
use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class FaqTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_faq_can_get_all
     * @return void
     */
    public function test_faq_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/faqs");

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                     'status',
                     'message',
                     'data' => [
                         'items' => [
                             [
                                 'id',
                                 'school',
                                 'question',
                                 'answer',
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
     * Summary of test_faq_can_create
     * @return void
     */
    public function test_faq_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $questionKk = 'question kk ' . Str::random(4);
        $questionUz = 'question uz ' . Str::random(4);
        $questionRu = 'question ru ' . Str::random(4);
        $questionEn = 'question en ' . Str::random(4);

        $answerKk = 'answer kk' . Str::random(4);
        $answerUz = 'answer uz' . Str::random(4);
        $answerRu = 'answer ru' . Str::random(4);
        $answerEn = 'answer en' . Str::random(4);

        $school = School::inRandomOrder()->first();
        $data = [
            'question' => [
                'kk' => $questionKk,
                'uz' => $questionUz,
                'ru' => $questionRu,
                'en' => $questionEn,
            ],
            'school_id' => $school->id,
            'answer' => [
                'kk' => $answerKk,
                'uz' => $answerUz,
                'ru' => $answerRu,
                'en' => $answerEn,
            ],
        ];

        $response = $this->postJson("/api/v1/faqs/create", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('faqs', [
            'question->kk' => $questionKk,
            'question->uz' => $questionUz,
            'question->ru' => $questionRu,
            'question->en' => $questionEn,
            'school_id' => $school->id,
            'answer->kk' => $answerKk,
            'answer->uz' => $answerUz,
            'answer->ru' => $answerRu,
            'answer->en' => $answerEn,
        ]);
    }

    /**
     * Summary of test_faq_can_update
     * @return void
     */
    public function test_faq_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $questionKk = 'question kk ' . Str::random(4);
        $questionUz = 'question uz ' . Str::random(4);
        $questionRu = 'question ru ' . Str::random(4);
        $questionEn = 'question en ' . Str::random(4);

        $answerKk = 'answer kk' . Str::random(4);
        $answerUz = 'answer uz' . Str::random(4);
        $answerRu = 'answer ru' . Str::random(4);
        $answerEn = 'answer en' . Str::random(4);

        $school = School::inRandomOrder()->first();
        $faq = Faq::inRandomOrder()->first();
        $data = [
            'question' => [
                'kk' => $questionKk,
                'uz' => $questionUz,
                'ru' => $questionRu,
                'en' => $questionEn,
            ],
            'school_id' => $school->id,
            'answer' => [
                'kk' => $answerKk,
                'uz' => $answerUz,
                'ru' => $answerRu,
                'en' => $answerEn,
            ],
        ];

        $response = $this->putJson("/api/v1/faqs/update/" . $faq->id, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('faqs', [
            'question->kk' => $questionKk,
            'question->uz' => $questionUz,
            'question->ru' => $questionRu,
            'question->en' => $questionEn,
            'school_id' => $school->id,
            'answer->kk' => $answerKk,
            'answer->uz' => $answerUz,
            'answer->ru' => $answerRu,
            'answer->en' => $answerEn,
        ]);
    }

    /**
     * Summary of test_faq_can_delete
     * @return void
     */
    public function test_faq_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $faq = Faq::inRandomOrder()->first();

        $response = $this->deleteJson("/api/v1/faqs/delete/" . $faq->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseMissing('faqs', [
            'id' => $faq->id,
        ]);
    }

    /**
     * Summary of test_show_faq
     * @return void
     */
    public function test_show_faq(): void
    {
        $faq = Faq::inRandomOrder()->first();

        $response = $this->getJson('/api/v1/faqs/' . $faq->id);

        $response
            ->assertOk()
            ->assertJsonStructure([
                'status',
                'message',
            ]);
    }

}
