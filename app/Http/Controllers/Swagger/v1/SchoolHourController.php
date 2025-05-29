<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class SchoolHourController extends Controller
{

    #[OA\Get(
        path: '/api/v1/school-hours',
        description: "All School Hours",
        tags: ["SchoolHour"],
        summary: "All School hours",
    )]
    #[OA\Response(response: 200, description: 'SchoolHour list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "SchoolHour not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/school-hours/{id}', summary: "SchoolHour by id", tags: ["SchoolHour"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali SchoolHour aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'SchoolHour')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/school-hours/create',
        description: "SchoolHour jaratiw",
        tags: ["SchoolHour"],
        summary: "SchoolHour jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "SchoolHour jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "workday", "holiday"],
            properties: [
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
                    property: "workday",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk workday"),
                        new OA\Property(property: "uz", type: "string", example: "uz workday"),
                        new OA\Property(property: "ru", type: "string", example: "ru workday"),
                        new OA\Property(property: "en", type: "string", example: "en workday"),
                    ]
                ),
                new OA\Property(
                    property: "holiday",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk holiday"),
                        new OA\Property(property: "uz", type: "string", example: "uz holiday"),
                        new OA\Property(property: "ru", type: "string", example: "ru holiday"),
                        new OA\Property(property: "en", type: "string", example: "en holiday"),
                    ]
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'SchoolHour jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "SchoolHour tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/school-hours/update/{id}",
        summary: "SchoolHour di jan'alaw",
        tags: ["SchoolHour"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "workday", "holiday"],
                properties: [
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
                        property: "workday",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new workday"),
                            new OA\Property(property: "uz", type: "string", example: "uz new workday"),
                            new OA\Property(property: "ru", type: "string", example: "ru new workday"),
                            new OA\Property(property: "en", type: "string", example: "en new workday"),
                        ]
                    ),
                    new OA\Property(
                        property: "holiday",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new holiday"),
                            new OA\Property(property: "uz", type: "string", example: "uz new holiday"),
                            new OA\Property(property: "ru", type: "string", example: "ru new holiday"),
                            new OA\Property(property: "en", type: "string", example: "en new holiday"),
                        ]
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "SchoolHour jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "SchoolHour tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali SchoolHour di jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/school-hours/delete/{id}",
        summary: "SchoolHour di o'shiriw",
        tags: ["SchoolHour"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", example: 1, required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "SchoolHour o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "SchoolHour tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
