<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class PositionController extends Controller
{
    // TODO Mektep id
    #[OA\Get(
        path: '/api/v1/positions',
        description: "Ha'mme lawazimlar",
        tags: ["Position"],
        summary: "Ha'mme lawazimlar",
    )]
    #[OA\Response(response: 200, description: 'Lawazimlar dizimi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Lawazim tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/positions/create',
        description: "Lawazim jaratiw",
        tags: ["Position"],
        summary: "Lawazim jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Lawazim jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["name", "school_id"],
            properties: [
                new OA\Property(property: "school_id", type: "int", example: 1),
                new OA\Property(
                    property: "name",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk name"),
                        new OA\Property(property: "uz", type: "string", example: "uz name"),
                        new OA\Property(property: "ru", type: "string", example: "ru name"),
                        new OA\Property(property: "en", type: "string", example: "en name"),
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
    #[OA\Response(response: 200, description: 'Lawazim jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Lawazim tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/positions/{id}',
        summary: "id boyinsha lawazimdi aliw",
        tags: ["Position"],
        security: [['sanctum' => []]]
        )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali lawazimdi aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Lawazim')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/positions/update/{id}",
        summary: "Lawazim di jan'alaw",
        tags: ["Position"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "school_id"],
                properties: [
                    new OA\Property(property: "school_id", type: "int", example: 1),
                    new OA\Property(
                        property: "name",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new name"),
                            new OA\Property(property: "uz", type: "string", example: "uz new name"),
                            new OA\Property(property: "ru", type: "string", example: "ru new name"),
                            new OA\Property(property: "en", type: "string", example: "en new name"),
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
            new OA\Response(response: 200, description: "Lawazim jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Lawazim tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Lawazim di jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/positions/delete/{id}",
        summary: "Lawazim di o'shiriw",
        tags: ["Position"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Lawazim o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Lawazim tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }

}
