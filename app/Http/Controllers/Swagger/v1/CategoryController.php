<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class CategoryController extends Controller
{
    #[OA\Get(
        path: '/api/v1/categories',
        summary: 'Kategoriyalar dizimi',
        description: 'Barliq kategoriyalardi betlerge bo\'lingen halda qaytaradi',
        tags: ['Category']
    )]
    #[OA\Response(
        response: 200,
        description: 'Kategoriyalar dizimi',
        content: new OA\JsonContent(
            type: 'object',
            properties: [
                new OA\Property(property: 'message', type: 'string', example: 'Kategoriyalar dizimi'),
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
    #[OA\Response(response: 404, description: 'Kategoriyalar tabilmadi')]
    public function index()
    {
        //
    }


    #[OA\Post(
        path: "/api/v1/categories/create",
        summary: "Kategoriya jaratiw",
        description: "Jan'a kategoriya jaratiw",
        tags: ["Category"],
        security: [["sanctum" => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Kategoriya mag'liwmatlari",
        content: new OA\JsonContent(
            required: ["name"],
            properties: [
                new OA\Property(
                    property: "name",
                    type: "object",
                    required: ["en", "uz", "ru", "kk"],
                    properties: [
                        new OA\Property(property: "en", type: "string", example: "Science"),
                        new OA\Property(property: "uz", type: "string", example: "Fan"),
                        new OA\Property(property: "ru", type: "string", example: "Наука"),
                        new OA\Property(property: "kk", type: "string", example: "Pa'n"),
                    ]
                ),
                new OA\Property(
                    property: "description",
                    type: "object",
                    required: [],
                    properties: [
                        new OA\Property(property: "en", type: "string", example: "Description in English"),
                        new OA\Property(property: "uz", type: "string", example: "O'zbekcha ta'rifi"),
                        new OA\Property(property: "ru", type: "string", example: "Описание"),
                        new OA\Property(property: "kk", type: "string", example: "Sipatlama"),
                    ]
                )
            ]
        )
    )]
    #[OA\Response(response: 200, description: "Kategoriya jaratildi")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 422, description: "Validatsiya qa'tesi")]
    public function create()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/categories/{id}',
        summary: 'ID bo‘yinsha kategoriya aliw',
        description: 'Berilgan ID ga mas kategoriya mag\'liwmatlarin aliw',
        tags: ['Category'],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Kategoriya ID si',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
    )]
    #[OA\Response(response:200, description: "Category by id")]
    #[OA\Response(response:404, description: "Category Not Found")]
    public function show()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/categories/update/{id}',
        summary: 'Kategoriya janalaw',
        description: 'Berilgan ID boyinsha kategoriyani janalaw',
        tags: ['Category'],
        security: [['sanctum' => []]],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Kategoriya ID si',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            description: 'Kategoriya janalaw ushin mag\'liwmatlar',
            content: new OA\JsonContent(
                required: ['name'],
                properties: [
                    new OA\Property(
                        property: 'name',
                        type: 'object',
                        required: ['kk', 'uz', 'ru', 'en'],
                        properties: [
                            new OA\Property(property: 'kk', type: 'string', example: 'kk text'),
                            new OA\Property(property: 'uz', type: 'string', example: 'uz text'),
                            new OA\Property(property: 'ru', type: 'string', example: 'ru text'),
                            new OA\Property(property: 'en', type: 'string', example: 'en text'),
                        ],
                    ),
                    new OA\Property(
                        property: 'description',
                        type: 'object',
                        nullable: true,
                        properties: [
                            new OA\Property(property: 'kk', type: 'string', example: 'kk description'),
                            new OA\Property(property: 'uz', type: 'string', example: 'uz description'),
                            new OA\Property(property: 'ru', type: 'string', example: 'ru description'),
                            new OA\Property(property: 'en', type: 'string', example: 'en description'),
                        ],
                    ),
                ],
            )
        ),
    )]
    #[OA\Response(response: 200, description: 'Kategoriya janalandi')]
    #[OA\Response(response: 401, description: 'Ruqsat joq')]
    #[OA\Response(response: 404, description: 'Kategoriya tabilmadi')]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: '/api/v1/categories/delete/{id}',
        summary: 'Kategoriyani o\'shiriw',
        description: 'Berilgan ID boyinsha kategoriyani o\'shiriw',
        tags: ['Category'],
        security: [['sanctum' => []]],
        parameters: [
            new OA\Parameter(
                name: 'id',
                in: 'path',
                required: true,
                description: 'Kategoriya ID si',
                schema: new OA\Schema(type: 'integer', example: 1)
            )
        ],
    )]
    #[OA\Response(response: 200, description: 'Kategoriya o\'shirildi')]
    #[OA\Response(response: 401, description: 'Ruqsat joq')]
    #[OA\Response(response: 404, description: 'Kategoriya tabilmadi')]
    public function delete()
    {
        //
    }
}
