<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class SchoolController extends Controller
{

    #[OA\Get(
        path: '/api/v1/schools',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "All schools",
        tags: ["School"],
        summary: "All schools",
        security: [['sanctum' => []]]
    )]
    #[OA\Response(response: 200, description: 'Mektepler dizimi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Mekep tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/schools/create',
        description: "Mektep jaratiw",
        tags: ["School"],
        summary: "Mektep jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Mektep jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["name", "history", "location", "phone"],
            properties: [
                new OA\Property(property: "phone", type: "string", example: "998971234567"),
                new OA\Property(property: "location", type: "string", example: "Mektep adresi"),
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
                    property: "history",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk history"),
                        new OA\Property(property: "uz", type: "string", example: "uz history"),
                        new OA\Property(property: "ru", type: "string", example: "ru history"),
                        new OA\Property(property: "en", type: "string", example: "en history"),
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
    #[OA\Response(response: 200, description: 'Mektep jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Mektep tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Get(path: '/api/v1/schools/{id}', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], summary: "School by id", tags: ["School"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Mktep ti aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Mektep')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/schools/update/{id}",
        summary: "Mektep ti jan'alaw",
        tags: ["School"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "history", "phone", "location"],
                properties: [
                    new OA\Property(property: "phone", type: "string", example: "998991234567"),
                    new OA\Property(property: "location", type: "string", example: "Mektep jan'a adresi"),
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
                        property: "history",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new history"),
                            new OA\Property(property: "uz", type: "string", example: "uz new history"),
                            new OA\Property(property: "ru", type: "string", example: "ru new history"),
                            new OA\Property(property: "en", type: "string", example: "en new history"),
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
            new OA\Response(response: 200, description: "Mektep jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Mektep tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Mektep ti jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/schools/delete/{id}",
        summary: "Mektep ti o'shiriw",
        tags: ["School"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Mektep o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Mektep tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
