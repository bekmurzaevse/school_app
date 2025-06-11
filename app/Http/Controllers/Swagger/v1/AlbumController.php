<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class AlbumController extends Controller
{

    #[OA\Get(
        path: '/api/v1/albums',
        description: "All albums",
        tags: ["Album"],
        summary: "All albums",
    )]
    #[OA\Response(response: 200, description: 'Albomlar dizimi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Albom tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/albums/create',
        description: "Albom jaratiw",
        tags: ["Album"],
        summary: "Albom jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "title[uz]", "title[ru]", "title[kk]", "title[en]", "photos[]"
                ],
                properties: [
                    new OA\Property(property: "title[kk]", type: "string", example: "title kk"),
                    new OA\Property(property: "title[uz]", type: "string", example: "title uz"),
                    new OA\Property(property: "title[ru]", type: "string", example: "title ru"),
                    new OA\Property(property: "title[en]", type: "string", example: "title en"),
                    new OA\Property(property: "description[kk]", type: "string", example: "description kk"),
                    new OA\Property(property: "description[uz]", type: "string", example: "description uz"),
                    new OA\Property(property: "description[ru]", type: "string", example: "description ru"),
                    new OA\Property(property: "description[en]", type: "string", example: "description en"),

                    new OA\Property(
                        property: "photos[]",
                        type: "array",
                        items: new OA\Items(type: "string", format:"binary"),
                    ),

                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Albom jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Albom tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Get(path: '/api/v1/albums/{id}', summary: "Album by id", tags: ["Album"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Albom aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Albom by slug')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/albums/update/{id}',
        tags: ["Album"],
        summary: "Update album",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "title[uz]", "title[ru]", "title[kk]", "title[en]", "photos[]"],
                properties: [
                    new OA\Property(property: "title[kk]", type: "string", example: "title kk"),
                    new OA\Property(property: "title[uz]", type: "string", example: "title uz"),
                    new OA\Property(property: "title[ru]", type: "string", example: "title ru"),
                    new OA\Property(property: "title[en]", type: "string", example: "title en"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),

                    new OA\Property(
                        property: "photos[]",
                        type: "array",
                        items: new OA\Items(type: "string", format:"binary"),
                    )
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Album updated successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: 'Album not found')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Album id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/albums/delete/{id}",
        summary: "Albom di o'shiriw",
        tags: ["Album"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Albom o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Albom tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
