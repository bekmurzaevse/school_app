<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ClubController extends Controller
{

    #[OA\Get(path: '/api/v1/clubs', tags: ["Club"], summary: "Retrieve all clubs")]
    #[OA\Response(response: 200, description: 'Clubs collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/clubs/{id}', tags: ["Club"], summary: "Club by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    #[OA\Response(response: 200, description: 'Club by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Club not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/clubs/create',
        tags: ["Club"],
        summary: "Create club",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Club creation data",
        content: new OA\JsonContent(
            required: ["name", "school_id", "text", "schedule", "photo_id"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "name kk"),
                        new OA\Property(property: "uz", type: "string", example: "name uz"),
                        new OA\Property(property: "ru", type: "string", example: "name ru"),
                        new OA\Property(property: "en", type: "string", example: "name en"),
                    ]
                ),
                new OA\Property(property: "school_id", type: "int", example: "1"),
                new OA\Property(
                    property: "text",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "text kk"),
                        new OA\Property(property: "uz", type: "string", example: "text uz"),
                        new OA\Property(property: "ru", type: "string", example: "text ru"),
                        new OA\Property(property: "en", type: "string", example: "text en"),
                    ]
                ),
                new OA\Property(
                    property: "schedule",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "schedule kk"),
                        new OA\Property(property: "uz", type: "string", example: "schedule uz"),
                        new OA\Property(property: "ru", type: "string", example: "schedule ru"),
                        new OA\Property(property: "en", type: "string", example: "schedule en"),
                    ]
                ),
                new OA\Property(property: "photo_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Club created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/clubs/update/{id}',
        tags: ["Club"],
        summary: "Create club",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Club update data",
        content: new OA\JsonContent(
            required: ["name", "school_id", "text", "schedule", "photo_id"],
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
                new OA\Property(property: "school_id", type: "int", example: "1"),
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
                new OA\Property(
                    property: "schedule",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "schedule kk update"),
                        new OA\Property(property: "uz", type: "string", example: "schedule uz update"),
                        new OA\Property(property: "ru", type: "string", example: "schedule ru update"),
                        new OA\Property(property: "en", type: "string", example: "schedule en update"),
                    ]
                ),
                new OA\Property(property: "photo_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Club updated successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/clubs/delete/{id}",
        summary: "Club delete",
        tags: ["Club"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Club deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Club not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    public function delete()
    {
        //
    }
}
