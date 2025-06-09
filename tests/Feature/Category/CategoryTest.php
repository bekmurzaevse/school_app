<?php

namespace Tests\Feature\Category;

use App\Models\Category;
use App\Models\School;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    // use RefreshDatabase;

    // /**
    //  * Summary of setUp
    //  * @return void
    //  */
    // public function setUp(): void
    // {
    //     parent::setUp();
    //     $this->seed();
    // }

    // /**
    //  * Summary of test_category_index
    //  * @return void
    //  */
    // public function test_category_can_get_all(): void
    // {
    //     Category::factory()->count(5)->create();

    //     $response = $this->getJson('api/v1/categories');

    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'status',
    //             'message',
    //             'data' => [
    //                 'items',
    //                 'pagination' => [
    //                     'current_page',
    //                     'per_page',
    //                     'last_page',
    //                     'total',
    //                 ]
    //             ]
    //         ]);
    // }

    // /**
    //  * Summary of test_category_show
    //  * @return void
    //  */
    // public function test_category_show()
    // {
    //     $this->seed(CategorySeeder::class);

    //     $response = $this->getJson('api/v1/categories/1');

    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'status',
    //             'message',
    //             'data' => [
    //                 'id',
    //                 'name',
    //                 'description'
    //             ]
    //         ]);
    // }

    // /**
    //  * Summary of test_category_create
    //  * @return void
    //  */
    // public function test_category_can_create()
    // {
    //     $this->seed();

    //     $user = User::find(1)->first();
    //     $this->actingAs($user);

    //     $data = [
    //         'name' => [
    //             'en' => 'Library test',
    //             'ru' => 'Библиотека test',
    //             'uz' => 'Kutubxona test',
    //             'kk' => 'Kitapxana test',
    //         ],
    //         'description' => [
    //             'en' => 'Electronic and traditional library services, list of available books.',
    //             'ru' => 'Электронные и традиционные библиотечные услуги, список доступных книг.',
    //             'uz' => "Elektron va an'anaviy kutubxona xizmatlari, mavjud kitoblar ro‘yxati.",
    //             'kk' => "Elektron ha'm kıtapxana xizmeti, bar bolg'an kıtaplar dizimi.",
    //         ],
    //     ];

    //     $response = $this->postJson('api/v1/categories/create', $data);

    //     $response
    //         ->assertStatus(200)
    //         ->assertJsonStructure([
    //             'status',
    //             'message',
    //         ])
    //         ->assertJson(['message' => "Kategoriya jaratildi!"]);
    // }

    // /**
    //  * Summary of test_category_update
    //  * @return void
    //  */
    // public function test_category_can_update()
    // {
    //     $this->seed();

    //     $user = User::find(1)->first();
    //     $this->actingAs($user);

    //     $category = Category::inRandomOrder()->first();

    //     $updatedData = [
    //         'name' => [
    //             'en' => 'New Library',
    //             'ru' => 'Новая библиотека',
    //             'uz' => 'Yangi kutubxona',
    //             'kk' => 'Jana kıtapxana',
    //         ],
    //         'description' => [
    //             'en' => 'Updated description.',
    //             'ru' => 'Обновленное описание.',
    //             'uz' => 'Yangilangan tavsif.',
    //             'kk' => 'Jañartılğan tusindirme.',
    //         ],
    //     ];

    //     $response = $this->putJson("api/v1/categories/update/{$category->id}", $updatedData);

    //     $response
    //         ->assertStatus(200)
    //         ->assertJson([
    //             'message' => 'Kategoriya jan\'alandi!',
    //             'status' => true,
    //         ]);
    // }

    // /**
    //  * Summary of test_category_delete
    //  * @return void
    //  */
    // public function test_category_can_delete()
    // {

    //     $user = User::find(1)->first();
    //     $this->actingAs($user);

    //     $category = Category::has('documents')->inRandomOrder()->first();

    //     if ($category && $category->documents()->exists()) {
    //         $category->documents()->delete();
    //     }

    //     $response = $this->deleteJson("api/v1/categories/delete/" . $category->id);

    //     $response
    //         ->assertStatus(200)
    //         ->assertJson([
    //             'message' => "{$category->id} - id li kategoriya o'shirildi!",
    //             'status' => true,
    //         ]);
    // }

}
