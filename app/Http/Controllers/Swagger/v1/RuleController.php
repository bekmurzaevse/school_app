<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class RuleController extends Controller
{

    #[OA\Get(path: '/api/v1/rules', tags: ["Rule"], summary: "Retrieve all rules")]
    #[OA\Response(response: 200, description: 'Rule collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/rules/{id}', tags: ["Rule"], summary: "Rule by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Rule id", example: 1)]
    #[OA\Response(response: 200, description: 'Rule by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Rule not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/rules/create',
        tags: ["Rule"],
        summary: "Create rule",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Rule creation data",
        content: new OA\JsonContent(
            required: ["title", "text", "school_id"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "title kk create"),
                        new OA\Property(property: "uz", type: "string", example: "title uz create"),
                        new OA\Property(property: "ru", type: "string", example: "title ru create"),
                        new OA\Property(property: "en", type: "string", example: "title en create"),
                    ]
                ),
                new OA\Property(
                    property: "text",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "text kk create"),
                        new OA\Property(property: "uz", type: "string", example: "text uz create"),
                        new OA\Property(property: "ru", type: "string", example: "text ru create"),
                        new OA\Property(property: "en", type: "string", example: "text en create"),
                    ]
                ),
                new OA\Property(property: "school_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Rule created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/rules/update/{id}',
        tags: ["Rule"],
        summary: "Create rule",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Rule update data",
        content: new OA\JsonContent(
            required: ["title", "text", "school_id"],
            properties: [
                new OA\Property(
                    property: "title",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "title kk update"),
                        new OA\Property(property: "uz", type: "string", example: "title uz update"),
                        new OA\Property(property: "ru", type: "string", example: "title ru update"),
                        new OA\Property(property: "en", type: "string", example: "title en update"),
                    ]
                ),
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
                new OA\Property(property: "school_id", type: "int", example: "1"),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'Rule updated successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Rule id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/rules/delete/{id}",
        summary: "Rule delete",
        tags: ["Rule"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Rule deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Rule not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Rule id", example: 1)]
    public function delete()
    {
        //
    }
}
