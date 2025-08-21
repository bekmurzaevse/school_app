<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class UserController extends Controller
{

    #[OA\Post(
        path: '/api/v1/auth/login',
        tags: ["User"],
        summary: "Login user",
    )]
    #[OA\RequestBody(
        required: true,
        description: "User login data",
        content: new OA\JsonContent(
            required: ["phone", "password"],
            properties: [
                new OA\Property(property: "phone", type: "string", example: "998901234567"),
                new OA\Property(property: "password", type: "string", example: "password"),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'User logged in successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function login()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/auth/logout',
        tags: ["User"],
        summary: "Logout user",
        security: [['sanctum' => []]]
    )]
    #[OA\Response(response: 200, description: 'User logged out successfully')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function logout()
    {
        //
    }

    #[OA\Get(path: '/api/v1/users', tags: ["User"], summary: "Retrieve all users", security: [['sanctum' => []]])]
    #[OA\Response(response: 200, description: 'Users collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/users/{id}', tags: ["User"], summary: "User by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'User by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "User not found")]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/users/create', tags: ["User"], summary: "Create user", security: [['sanctum' => []]])]
    #[OA\RequestBody(
        required: true,
        description: "User creation data",
        content: new OA\JsonContent(
            required: ["full_name", "username", "password", "phone", "description", "school_id", "birth_date"],
            properties: [
                new OA\Property(
                    property: "full_name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk full_name"),
                        new OA\Property(property: "uz", type: "string", example: "uz full_name"),
                        new OA\Property(property: "ru", type: "string", example: "ru full_name"),
                        new OA\Property(property: "en", type: "string", example: "en full_name"),
                    ]
                ),
                new OA\Property(property: "username", type: "string", example: "johndoe"),
                new OA\Property(property: "password", type: "string", example: "12345678"),
                new OA\Property(property: "phone", type: "string", example: "998981600111"),
                new OA\Property(
                    property: "description",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk description"),
                        new OA\Property(property: "uz", type: "string", example: "uz description"),
                        new OA\Property(property: "ru", type: "string", example: "ru description"),
                        new OA\Property(property: "en", type: "string", example: "en description"),
                    ]
                ),
                new OA\Property(property: "birth_date", type: "string", example: "2025-05-07"),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'User created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function create()
    {
        //
    }

    #[OA\Put(path: '/api/v1/users/update/{id}', tags: ["User"], summary: "Update user", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "User id", example: 1)]
    #[OA\RequestBody(
        required: true,
        description: "User update data",
        content: new OA\JsonContent(
            required: ["full_name", "username", "phone", "description", "school_id", "birth_date"],
            properties: [
                new OA\Property(
                    property: "full_name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk full_name"),
                        new OA\Property(property: "uz", type: "string", example: "uz full_name"),
                        new OA\Property(property: "ru", type: "string", example: "ru full_name"),
                        new OA\Property(property: "en", type: "string", example: "en full_name"),
                    ]
                ),
                new OA\Property(property: "username", type: "string", example: "kellyfork"),
                new OA\Property(property: "password", type: "string", example: "12345678"),
                new OA\Property(property: "phone", type: "string", example: "998981601111"),
                new OA\Property(
                    property: "description",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk description"),
                        new OA\Property(property: "uz", type: "string", example: "uz description"),
                        new OA\Property(property: "ru", type: "string", example: "ru description"),
                        new OA\Property(property: "en", type: "string", example: "en description"),
                    ]
                ),
                new OA\Property(property: "school_id", type: "integer", example: 1),
                new OA\Property(property: "birth_date", type: "string", example: '2025-05-07'),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'User updated successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 404, description: "User not found")]
    #[OA\Response(response: 500, description: 'Internal server error')]
    public function update()
    {
        //
    }

    #[OA\Delete(path: '/api/v1/users/delete/{id}', tags: ["User"], summary: "Delete user", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "User id", example: 1)]
    #[OA\Response(response: 200, description: 'User deleted successfully')]
    #[OA\Response(response: 404, description: "User not found")]
    #[OA\Response(response: 500, description: 'Internal server error')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function delete()
    {
        //
    }
}
