<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class InformationController extends Controller
{

    #[OA\Get(
        path: '/api/v1/informations',
        description: "All informations",
        tags: ["Information"],
        summary: "All informations",
    )]
    #[OA\Response(response: 200, description: 'Information list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Information not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/informations/{id}', summary: "Information by id", tags: ["Information"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali information aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Information')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/informations/create',
        description: "Information jaratiw",
        tags: ["Information"],
        summary: "Information jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Information jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "count", "description"],
            properties: [
                new OA\Property(property: "count", type: "int", example: 1),
                new OA\Property(
                    property: "title",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk title"),
                        new OA\Property(property: "uz", type: "string", example: "uz title"),
                        new OA\Property(property: "ru", type: "string", example: "ru title"),
                        new OA\Property(property: "en", type: "string", example: "en title"),
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
    #[OA\Response(response: 200, description: 'Information jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Information tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/informations/update/{id}",
        summary: "Information di jan'alaw",
        tags: ["Information"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "count", "description"],
                properties: [
                    new OA\Property(property: "count", type: "int", example: 1),
                    new OA\Property(
                        property: "title",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new title"),
                            new OA\Property(property: "uz", type: "string", example: "uz new title"),
                            new OA\Property(property: "ru", type: "string", example: "ru new title"),
                            new OA\Property(property: "en", type: "string", example: "en new title"),
                        ]
                    ),
                    new OA\Property(
                        property: "description",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new description"),
                            new OA\Property(property: "uz", type: "string", example: "uz new description"),
                            new OA\Property(property: "ru", type: "string", example: "ru new description"),
                            new OA\Property(property: "en", type: "string", example: "en new description"),
                        ]
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Information jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Information tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Information di jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/informations/delete/{id}",
        summary: "Information ti o'shiriw",
        tags: ["Information"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, example: 1, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Information o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Information tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }

}
