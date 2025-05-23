<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class TagController extends Controller
{
    #[OA\Get(path: '/api/v1/tags', tags: ["Tag"], summary: "Retrieve all tags", security: [['sanctum' => []]])]
    #[OA\Response(response: 200, description: 'Tag collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Tag not found')]
    public function index()
    {
        //      
    }

    #[OA\Get(path: '/api/v1/tags/{id}', tags: ["Tag"], summary: "Tag by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Tag id", example: 1)]
    #[OA\Response(response: 200, description: 'Tag by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Tag not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/tags/create',
        tags: ["Tag"],
        summary: "Create tag",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Tag creation data",
        content: new OA\JsonContent(
            required: ["name", "description"],
            properties: [
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
        ),
    )]
    #[OA\Response(response: 200, description: 'Tag created successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }


    #[OA\Put(
        path: '/api/v1/tags/update/{id}',
        tags: ["Tag"],
        summary: "Update tag",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Tag update data",
        content: new OA\JsonContent(
            required: ["name", "description"],
            properties: [
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
        ),
    )]
    #[OA\Response(response: 200, description: 'Tag updated successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: 'Tag not found')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Tag id", example: 1)]
    public function update()
    {
        //
    }


    #[OA\Delete(
        path: "/api/v1/tags/delete/{id}",
        summary: "Delete tag",
        tags: ["Tag"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Tag deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Tag not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Tag id", example: 1)]
    public function delete()
    {
        //
    }
}