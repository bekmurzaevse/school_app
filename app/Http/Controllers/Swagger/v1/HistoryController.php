<?php

namespace App\Http\Controllers\Swagger\v1;
use OpenApi\Attributes as OA;

use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    #[OA\Get(
        path: '/api/v1/histories',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "All histories",
        tags: ["History"],
        summary: "All histories",
    )]
    #[OA\Response(response: 200, description: 'History list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/histories/{id}', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], summary: "History by id", tags: ["History"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "ID arqali history aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'History')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/histories/create',
        summary: 'History jaratiw',
        description: "History jaratiw ushin",
        tags: ['History'],
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "History jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["year", "text"],
            properties: [
                new OA\Property(property: "year", type: "integer", example: 2024),
                new OA\Property(
                    property: "text",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk history text"),
                        new OA\Property(property: "uz", type: "string", example: "uz history text"),
                        new OA\Property(property: "ru", type: "string", example: "ru history text"),
                        new OA\Property(property: "en", type: "string", example: "en history text"),
                    ]
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'History created!')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/histories/update/{id}",
        summary: "History jan'alaw",
        tags: ["History"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["year", "text"],
                properties: [
                    new OA\Property(property: "year", type: "integer", example: 2025),
                    new OA\Property(
                        property: "text",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk updated text"),
                            new OA\Property(property: "uz", type: "string", example: "uz updated text"),
                            new OA\Property(property: "ru", type: "string", example: "ru updated text"),
                            new OA\Property(property: "en", type: "string", example: "en updated text"),
                        ]
                    ),
                ]
            )
        )
    )]
    #[OA\Response(response: 200, description: "History updated!")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "History not found!")]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "ID arqali history jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/histories/delete/{id}",
        summary: "History o'shiriw",
        tags: ["History"],
        security: [["sanctum" => []]],
        parameters: [
            new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))
        ],
    )]
    #[OA\Response(response: 200, description: "History deleted!")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "History not found!")]

    public function delete()
    {
        //
    }
}
