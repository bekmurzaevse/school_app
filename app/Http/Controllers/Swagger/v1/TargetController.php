<?php

namespace App\Http\Controllers\Swagger\v1;
use OpenApi\Attributes as OA;

use App\Http\Controllers\Controller;

class TargetController extends Controller
{
    #[OA\Get(
        path: '/api/v1/targets',
        summary: 'Target dizimi',
        description: 'Barliq targetlerdi betlerge bo\'lingen halda qaytaradi',
        tags: ['Target']
    )]
    #[OA\Response(
        response: 200,
        description: 'Target list',
        content: new OA\JsonContent(
            type: 'object',
            properties: [
                new OA\Property(property: 'message', type: 'string', example: 'Target dizimi'),
                new OA\Property(property: 'data', type: 'array', items: new OA\Items(
                    type: 'object',
                    properties: [
                        new OA\Property(property: 'id', type: 'integer', example: 1),
                        new OA\Property(property: 'name', type: 'string', example: 'Kitaplar'),
                        new OA\Property(property: 'slug', type: 'string', example: 'kitaplar'),
                        new OA\Property(property: 'created_at', type: 'string', format: 'date-time'),
                        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time'),
                    ]
                )),
                new OA\Property(property: 'meta', type: 'object', properties: [
                    new OA\Property(property: 'current_page', type: 'integer', example: 1),
                    new OA\Property(property: 'last_page', type: 'integer', example: 5),
                    new OA\Property(property: 'per_page', type: 'integer', example: 10),
                    new OA\Property(property: 'total', type: 'integer', example: 50),
                ])
            ]
        )
    )]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: 'Target tabilmadi')]
    public function index() 
    {
        //
    }


    #[OA\Post(
        path: '/api/v1/targets/create',
        summary: 'Target jaratiw',
        description: 'Jan\'a target jaratiw',
        tags: ['Target'],
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: 'Target jaratiw ushin mag\'liwmatlar',
        content: new OA\JsonContent(
            required: ['school_id', 'name', 'description'],
            properties: [
                new OA\Property(property: 'school_id', type: 'integer', example: 1),
                new OA\Property(
                    property: 'name',
                    type: 'object',
                    required: ['kk', 'uz', 'ru', 'en'],
                    properties: [
                        new OA\Property(property: 'kk', type: 'string', example: 'kk name'),
                        new OA\Property(property: 'uz', type: 'string', example: 'uz name'),
                        new OA\Property(property: 'ru', type: 'string', example: 'ru name'),
                        new OA\Property(property: 'en', type: 'string', example: 'en name'),
                    ]
                ),
                new OA\Property(
                    property: 'description',
                    type: 'object',
                    required: ['kk', 'uz', 'ru', 'en'],
                    properties: [
                        new OA\Property(property: 'kk', type: 'string', example: 'kk description'),
                        new OA\Property(property: 'uz', type: 'string', example: 'uz description'),
                        new OA\Property(property: 'ru', type: 'string', example: 'ru description'),
                        new OA\Property(property: 'en', type: 'string', example: 'en description'),
                    ]
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Target jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 422, description: 'Validatsiya qa\'tesi')]
    public function create()
    {
        // ...
    }
    

    #[OA\Get(
        path: '/api/v1/targets/{id}',
        summary: 'ID bo‘yinsha target aliw',
        description: 'Berilgan ID ga mas target mag\'liwmatlarin aliw',
        tags: ['Target'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Target ID si',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
    )]
    #[OA\Response(response:200, description: "Target")]
    #[OA\Response(response:404, description: "Target Not Found")]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/targets/update/{id}",
        summary: "Targetdi jan'alaw",
        tags: ["Target"],
        description: "Berilgen ID boyinsha targetdi jan'alaw",
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            description: "Targetdi jan'alaw ushin mag'liwmatlar",
            content: new OA\JsonContent(
                required: ["name", "school_id", "description"],
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
            new OA\Response(response: 200, description: "Target jan'alandi"),
            new OA\Response(response: 401, description: "Ruqsat joq"),
            new OA\Response(response: 404, description: "Target tabilmadi"),
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "ID arqali target jan'alaw",
        example: 1
    )]
    public function update()
    {
        //
    }
    

    #[OA\Delete(
        path: '/api/v1/targets/delete/{id}',
        summary: 'Targetdi o\'shiriw',
        description: 'Berilgan ID boyinsha targetdi o\'shiriw',
        tags: ['Target'],
        security: [['sanctum' => []]],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Target ID si',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
        responses: [
            new OA\Response(response: 200, description: 'Target deleted!'),
            new OA\Response(response: 401, description: 'Ruqsat joq'),
            new OA\Response(response: 404, description: 'Target not found'),
        ]
    )]
    public function delete()
    {
        //
    }
}