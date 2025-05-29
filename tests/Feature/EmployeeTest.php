<?php

namespace Tests\Feature;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * Summary of test_employee_can_get_all
     * @return void
     */
    public function test_employee_can_get_all(): void
    {
        $response = $this->getJson("/api/v1/employees");

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
                            'phone',
                            'photo',
                            'email',
                            'position',
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
     * Summary of test_employee_can_show
     * @return void
     */
    public function test_employee_can_show(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $albumId = Employee::inRandomOrder()->first()->id;

        $response = $this->getJson('/api/v1/employees/' . $albumId);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'full_name',
                    'phone',
                    'photo',
                    'email',
                    'position',
                    'birth_date',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_employee_can_create
     * @return void
     */
    public function test_employee_can_create(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $data = [
            'full_name' => [
                'en' => 'John Smith',
                'ru' => 'Джон Смит',
                'uz' => 'Djon Smit',
                'kk' => 'Djon Smit',
            ],
            'phone' => '+998911234512',
            'photo_id' => 1,
            'email' => 'johnsmith1@gmail.com',
            'position_id' => 1,
            'birth_date' => '1985-12-20'
        ];

        $response = $this->postJson('/api/v1/employees/create', $data);

        $response->assertStatus(200)->assertExactJson([
            'status' => 200,
            'message' => 'Employee created',
        ]);
    }

    /**
     * Summary of test_employee_can_update
     * @return void
     */
    public function test_employee_can_update(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $employeeId = Employee::inRandomOrder()->first()->id;

        $data = [
            'full_name' => [
                'en' => 'John Smith updated',
                'ru' => 'Джон Смит updated',
                'uz' => 'Djon Smit updated',
                'kk' => 'Djon Smit updated',
            ],
            'phone' => '+998911231111',
            'photo_id' => 2,
            'email' => 'johnsmit11hw@gmail.com',
            'position_id' => 1,
            'birth_date' => '1985-12-20'
        ];

        $response = $this->putJson('/api/v1/employees/update/' . $employeeId, $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'status',
                'message',
                'data' => [
                    'id',
                    'full_name',
                    'phone',
                    'photo',
                    'email',
                    'position',
                    'birth_date',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    /**
     * Summary of test_employee_can_delete
     * @return void
     */
    public function test_employee_can_delete(): void
    {
        $user = User::find(1)->first();
        $this->actingAs($user);

        $employeeId = Employee::inRandomOrder()->first()->id;

        $response = $this->deleteJson('/api/v1/employees/delete/' . $employeeId);

        $response
            ->assertStatus(200)
            ->assertExactJson([
                'status' => 200,
                'message' => 'Employee Deleted',
            ]);

        $this->assertSoftDeleted('employees', [
            'id' => $employeeId,
        ]);
    }
}
