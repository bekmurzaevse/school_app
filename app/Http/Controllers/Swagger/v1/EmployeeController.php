<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class EmployeeController extends Controller
{
    #[OA\Get(path: '/api/v1/employees', tags: ["Employee"], summary: "Retrieve all employees", )]
    #[OA\Response(response: 200, description: 'Employees collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Employees not found')]
    public function index()
    {
        //      
    }

    #[OA\Get(path: '/api/v1/employees/{id}', tags: ["Employee"], summary: "Employee by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    #[OA\Response(response: 200, description: 'Employee by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Employee not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/employees/create',
        tags: ["Employee"],
        summary: "Create employee",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Employee creation data",
        content: new OA\JsonContent(
            required: ["full_name", "phone", "photo_id", "email", "position_id", "birth_date"],
            properties: [
                new OA\Property(
                    property: "full_name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "Anvar Qodirov"),
                        new OA\Property(property: "uz", type: "string", example: "Anvar Qodirov"),
                        new OA\Property(property: "ru", type: "string", example: "Анвар Кадыров"),
                        new OA\Property(property: "en", type: "string", example: "Anvar Qodirov"),
                    ]
                ),
                new OA\Property(property: "phone", type: "string", example: "+998911234511"),
                new OA\Property(property: "photo_id", type: "int", example: 1),
                new OA\Property(property: "email", type: "string", example: "anvarqodirov@gmail.com"),
                new OA\Property(property: "position_id", type: "int", example: 1),
                new OA\Property(property: "birth_date", type: "string", example: "1994-07-24"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Employee created successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/employees/update/{id}',
        tags: ["Employee"],
        summary: "Update employee",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Employee update data",
        content: new OA\JsonContent(
            required: ["full_name", "phone", "photo_id", "email", "position_id", "birth_date"],
            properties: [
                new OA\Property(
                    property: "full_name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "Anvar Qodirov"),
                        new OA\Property(property: "uz", type: "string", example: "Anvar Qodirov"),
                        new OA\Property(property: "ru", type: "string", example: "Анвар Кадыров"),
                        new OA\Property(property: "en", type: "string", example: "Anvar Qodirov"),
                    ]
                ),
                new OA\Property(property: "phone", type: "string", example: "+998911234511"),
                new OA\Property(property: "photo_id", type: "int", example: 1),
                new OA\Property(property: "email", type: "string", example: "anvarqodirov@gmail.com"),
                new OA\Property(property: "position_id", type: "int", example: 1),
                new OA\Property(property: "birth_date", type: "string", example: "1994-07-24"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Employee updated successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: 'Employee not found')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/employees/delete/{id}",
        summary: "Delete employee",
        tags: ["Employee"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Employee deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Employee not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    public function delete()
    {
        //
    }
}