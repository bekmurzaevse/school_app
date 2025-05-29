<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class FaqController extends Controller
{

    #[OA\Get(
        path: '/api/v1/faqs',
        description: "All FAQs",
        tags: ["FAQ"],
        summary: "All FAQs",
    )]
    #[OA\Response(response: 200, description: 'Faq list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "FAQ not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/faqs/{id}', summary: "FAQ by id", tags: ["FAQ"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali FAQ aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'FAQ')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/faqs/create',
        description: "FAQ jaratiw",
        tags: ["FAQ"],
        summary: "FAQ jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "FAQ jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["question", "answer"],
            properties: [
                new OA\Property(
                    property: "question",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk question"),
                        new OA\Property(property: "uz", type: "string", example: "uz question"),
                        new OA\Property(property: "ru", type: "string", example: "ru question"),
                        new OA\Property(property: "en", type: "string", example: "en question"),
                    ]
                ),
                new OA\Property(
                    property: "answer",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk answer"),
                        new OA\Property(property: "uz", type: "string", example: "uz answer"),
                        new OA\Property(property: "ru", type: "string", example: "ru answer"),
                        new OA\Property(property: "en", type: "string", example: "en answer"),
                    ]
                ),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'FAQ jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "FAQ tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/faqs/update/{id}",
        summary: "FAQ di jan'alaw",
        tags: ["FAQ"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["question", "answer"],
                properties: [
                    new OA\Property(
                        property: "question",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new question"),
                            new OA\Property(property: "uz", type: "string", example: "uz new question"),
                            new OA\Property(property: "ru", type: "string", example: "ru new question"),
                            new OA\Property(property: "en", type: "string", example: "en new question"),
                        ]
                    ),
                    new OA\Property(
                        property: "answer",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new answer"),
                            new OA\Property(property: "uz", type: "string", example: "uz new answer"),
                            new OA\Property(property: "ru", type: "string", example: "ru new answer"),
                            new OA\Property(property: "en", type: "string", example: "en new answer"),
                        ]
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "FAQ jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "FAQ tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali FAQ jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/faqs/delete/{id}",
        summary: "FAQ ti o'shiriw",
        tags: ["FAQ"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "FAQ o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "FAQ tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
