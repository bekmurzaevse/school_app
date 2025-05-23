<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class PhotoController extends Controller
{

    #[OA\Get(
        path: '/api/v1/photos',
        description: "All photos",
        tags: ["Photo"],
        summary: "All photos",
    )]
    #[OA\Response(response: 200, description: 'Foto lar dizimi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Foto tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/photos/create',
        description: "Foto jaratiw",
        tags: ["Photo"],
        summary: "Foto jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Foto jaratiw ushin mag'liwmatlar",
        content:
        new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["title", "description", "photos[]"],
                properties: [
                    new OA\Property(property: "title", type: "string", example: "photo title"),
                    new OA\Property(property: "album_id", type: "int", example: 1),
                    new OA\Property(property: "description", type: "string"),
                    new OA\Property(property: "photos[]", type: "array", maxItems: 10, items: new OA\Items(type: "string", format: "binary")),

                 new OA\Property(
                    property: "description[kk]",
                    type: "string",
                    description: "description kk"
                ),
                new OA\Property(
                    property: "description[uz]",
                    type: "string",
                    // nullable: true,
                    description: "description uz"
                ),
                new OA\Property(
                    property: "description[ru]",
                    type: "string",
                    // nullable: true,
                    description: "description ru"
                ),
                new OA\Property(
                    property: "description[en]",
                    type: "string",
                    // nullable: true,
                    description: "description en"
                ),
                ]
            ),
            encoding: [
                "photos[]" => [
                    "style" => "form",
                    "explode" => true
                ],
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Foto jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Foto tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Get(path: '/api/v1/photos/{id}', summary: "Photo by id", tags: ["Photo"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali foto ni aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Photo by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/photos/update/{id}',
        description: "Foto jan'alaw",
        tags: ["Photo"],
        summary: "Foto jan'alaw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Foto jan'alaw ushin mag'liwmatlar",
        content:
        new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["title", "description", "photo"],
                properties: [
                    new OA\Property(property: "title", type: "string", example: "photo title"),
                    new OA\Property(property: "album_id", type: "int", example: 1),
                    new OA\Property(property: "description", type: "string"),
                    new OA\Property(
                        property: "photo",
                        type: "string",
                        format: "binary"
                    ),
                    new OA\Property(
                        property: "description[kk]",
                        type: "string",
                        description: "description kk"
                    ),
                    new OA\Property(
                        property: "description[uz]",
                        type: "string",
                        description: "description uz"
                    ),
                    new OA\Property(
                        property: "description[ru]",
                        type: "string",
                        description: "description ru"
                    ),
                    new OA\Property(
                        property: "description[en]",
                        type: "string",
                        description: "description en"
                    ),
                ]
            ),
        )
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali foto ni jan'alaw",
        example: 1
    )]
    #[OA\Response(response: 200, description: "Foto jan'alandi")]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Foto tabilmadi")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/photos/delete/{id}",
        summary: "Foto ni o'shiriw",
        tags: ["Photo"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Foto o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Foto tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
