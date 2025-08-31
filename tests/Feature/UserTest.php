<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_user_can_login
     * @return void
     */
    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'phone' => '998911233212',
            'password' => 'password'
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'access_token',
                    'refresh_token',
                    'at_expired_at',
                    'rf_expired_at',
                ]
            ]);

        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Summary of test_user_can_logout
     * @return void
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
        $token = $user->createToken('access-token')->plainTextToken;
        Sanctum::actingAs($user, ['*']);

        $response = $this->postJson('/api/v1/auth/logout', [],[
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
            ]);
    }

    /**
     * Summary of test_users_can_get_all
     * @return void
     */
    public function test_users_can_get_all(): void
    {
        $user = User::find(1)->first();

        $this->actingAs($user);

        $response = $this->getJson('/api/v1/users');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'items' => [
                        [
                            'id',
                            'full_name',
                            'description',
                            'phone',
                            // 'school' => [
                            //     'id',
                            //     'name',
                            //     'history',
                            //     'phone',
                            //     'location',
                            //     'description',
                            //     'created_at',
                            //     'updated_at',
                            // ],
                            'birth_date',
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
     * Summary of test_user_can_show
     * @return void
     */
    public function test_user_can_show(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
        $this->actingAs($user);

        $response = $this->getJson('/api/v1/users/' . $user->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'full_name',
                    'description',
                    'phone',
                    // 'school' => [
                    //     'id',
                    //     'name',
                    //     'history',
                    //     'phone',
                    //     'location',
                    //     'description',
                    //     'created_at',
                    //     'updated_at',
                    // ],
                    'birth_date',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_user_can_create
     * @return void
     */
    public function test_user_can_create(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
        $this->actingAs($user);

        $data = [
            'full_name' => [
                'en' => 'fullName en test',
                'ru' => 'fullName ru test',
                'uz' => 'fullName uz test',
                'kk' => 'fullName kk test',
            ],
            'username' => 'testuser',
            'phone' => '998911233213',
            'password' => 'password',
            'description' => [
                'en' => 'descrip en test',
                'ru' => 'descrip ru test',
                'uz' => 'descrip uz test',
                'kk' => 'descrip kk test',
            ],
            'birth_date' => '2000-01-01',
        ];
        $response = $this->postJson('/api/v1/users/create', $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('users', [
            'full_name->en' => 'fullName en test',
            'full_name->ru' => 'fullName ru test',
            'full_name->uz' => 'fullName uz test',
            'full_name->kk' => 'fullName kk test',
            'username' => 'testuser',
            'phone' => '998911233213',
            'description->en' => 'descrip en test',
            'description->ru' => 'descrip ru test',
            'description->uz' => 'descrip uz test',
            'description->kk' => 'descrip kk test',
            'birth_date' => '2000-01-01',
        ]);
    }

    /**
     * Summary of test_user_can_update
     * @return void
     */
    public function test_user_can_update(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
        $this->actingAs($user);

        $data = [
            'full_name' => [
                'en' => 'fullName en test',
                'ru' => 'fullName ru test',
                'uz' => 'fullName uz test',
                'kk' => 'fullName kk test',
            ],
            'username' => 'testuserl',
            'phone' => '998911113213',
            'password' => 'password',
            'school_id' => 1,
            'description' => [
                'en' => 'descip en test',
                'ru' => 'descip ru test',
                'uz' => 'descip uz test',
                'kk' => 'descip kk test',
            ],
            'birth_date' => '2000-01-01',
        ];
        $response = $this->putJson('/api/v1/users/update/' . $user->id, $data);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'full_name->en' => 'fullName en test',
            'full_name->ru' => 'fullName ru test',
            'full_name->uz' => 'fullName uz test',
            'full_name->kk' => 'fullName kk test',
            'username' => 'testuserl',
            'phone' => '998911113213',
            'description->en' => 'descip en test',
            'description->ru' => 'descip ru test',
            'description->uz' => 'descip uz test',
            'description->kk' => 'descip kk test',
            'birth_date' => '2000-01-01',
            'school_id' => 1,
        ]);
    }

    /**
     * Summary of test_user_can_delete
     * @return void
     */
    public function test_user_can_delete(): void
    {
        $user = User::factory()->create([
            'phone' => '998911233212',
            'password' => 'password',
        ]);

        $user->assignRole('admin');
        $this->actingAs($user);

        $response = $this->deleteJson('/api/v1/users/delete/' . $user->id);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
            ]);

        $this->assertSoftDeleted('users', [
            'id' => $user->id,
        ]);
    }
}
