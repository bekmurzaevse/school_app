<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ValueController extends Controller
{

    #[OA\Get(path: '/api/v1/values', tags: ["Value"], summary: "Retrieve all values")]
    #[OA\Response(response: 200, description: 'Value collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/values/{id}', tags: ["Value"], summary: "Value by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    #[OA\Response(response: 200, description: 'Value by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Value not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/values/create',
        tags: ["Value"],
        summary: "Create value",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Value creation data",
        content: new OA\JsonContent(
            required: ["name", "text", "photo_id"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "name kk create"),
                        new OA\Property(property: "uz", type: "string", example: "name uz create"),
                        new OA\Property(property: "ru", type: "string", example: "name ru create"),
                        new OA\Property(property: "en", type: "string", example: "name en create"),
                    ]
                ),
                new OA\Property(
                    property: "text",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "text kk create"),
                        new OA\Property(property: "uz", type: "string", example: "text uz create"),
                        new OA\Property(property: "ru", type: "string", example: "text ru create"),
                        new OA\Property(property: "en", type: "string", example: "text en create"),
                    ]
                ),
                new OA\Property(property: "photo_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Value created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/values/update/{id}',
        tags: ["Value"],
        summary: "Update value",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Value update data",
        content: new OA\JsonContent(
            required: ["name", "text", "photo_id"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "name kk update"),
                        new OA\Property(property: "uz", type: "string", example: "name uz update"),
                        new OA\Property(property: "ru", type: "string", example: "name ru update"),
                        new OA\Property(property: "en", type: "string", example: "name en update"),
                    ]
                ),
                new OA\Property(
                    property: "text",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "text kk update"),
                        new OA\Property(property: "uz", type: "string", example: "text uz update"),
                        new OA\Property(property: "ru", type: "string", example: "text ru update"),
                        new OA\Property(property: "en", type: "string", example: "text en update"),
                    ]
                ),
                new OA\Property(property: "photo_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Value created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/values/delete/{id}",
        summary: "Value delete",
        tags: ["Value"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Value deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Value not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    public function delete()
    {
        //
    }
}
