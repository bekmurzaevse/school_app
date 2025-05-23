<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class AlbumController extends Controller
{

    #[OA\Get(
        path: '/api/v1/albums',
        description: "All albums",
        tags: ["Album"],
        summary: "All albums",
    )]
    #[OA\Response(response: 200, description: 'Albomlar dizimi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Albom tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/albums/create',
        description: "Albom jaratiw",
        tags: ["Album"],
        summary: "Albom jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Albom jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "school_id"],
            properties: [
                new OA\Property(property: "school_id", type: "int", example: 1),
                new OA\Property(
                    property: "title",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk text"),
                        new OA\Property(property: "uz", type: "string", example: "uz text"),
                        new OA\Property(property: "ru", type: "string", example: "ru text"),
                        new OA\Property(property: "en", type: "string", example: "en text"),
                    ]
                ),
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
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Albom jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Albom tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Get(path: '/api/v1/albums/{id}', summary: "Album by id", tags: ["Album"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Albom aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Albom by slug')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/albums/update/{id}",
        summary: "Albom di jan'alaw",
        tags: ["Album"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "school_id", "description"],
                properties: [
                    new OA\Property(property: "school_id", type: "int", example: 1),
                    new OA\Property(
                        property: "title",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk text"),
                            new OA\Property(property: "uz", type: "string", example: "uz text"),
                            new OA\Property(property: "ru", type: "string", example: "ru text"),
                            new OA\Property(property: "en", type: "string", example: "en text"),
                        ]
                    ),
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
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Albom jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Albom tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Albom di jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/albums/delete/{id}",
        summary: "Albom di o'shiriw",
        tags: ["Album"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Albom o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Albom tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
