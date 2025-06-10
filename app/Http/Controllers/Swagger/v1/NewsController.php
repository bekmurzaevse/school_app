<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class NewsController extends Controller
{
    #[OA\Get(path: '/api/v1/news', tags: ["News"], summary: "Retrieve all news", )]
    #[OA\Parameter(name: "page", in: "query", required: false, description: "Page", schema: new OA\Schema(type: "string"))]
    #[OA\Parameter(name: "per_page", in: "query", required: false, description: "Per page", schema: new OA\Schema(type: "string"))]
    #[OA\Parameter(
        name: "sort_by",
        in: "query",
        required: false,
        description: "Sort by",
        schema: new OA\Schema(
            type: "string",
            enum: ["id", "created_at", "updated_at"],
        )
    )]
    #[OA\Parameter(
        name: "sort_order",
        in: "query",
        required: false,
        description: "Sort order",
        schema: new OA\Schema(
            type: "string",
            enum: ["asc", "desc"],
        )
    )]
    #[OA\Parameter(name: "from_date", in: "query", required: false, description: "From date y-m-d", schema: new OA\Schema(type: "string", format: "date-time"))]
    #[OA\Parameter(name: "to_date", in: "query", required: false, description: "To date y-m-d", schema: new OA\Schema(type: "string", format: "date-time"))]
    #[OA\Parameter(name: "tags[]", in: "query", required: false, description: "Tags", schema: new OA\Schema(
        type: "array",
        items: new OA\Items(type: "integer"),
    ))]
    #[OA\Parameter(name: "search", in: "query", required: false, description: "Search", schema: new OA\Schema(type: "string", example: "Angliya"))]
    #[OA\Response(response: 200, description: 'News collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'News not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/news/{id}', tags: ["News"], summary: "News by id")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "News id", example: 1)]
    #[OA\Response(response: 200, description: 'News by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "News not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/news/create',
        tags: ["News"],
        summary: "Create news",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "title[uz]", "title[ru]", "title[kk]", "title[en]",
                    "short_content[uz]", "short_content[ru]", "short_content[kk]", "short_content[en]",
                    "content[uz]", "content[ru]", "content[kk]", "content[en]",
                    "cover_image", "tags"
                ],
                properties: [
                    new OA\Property(property: "title[kk]", type: "string", example: "title kk"),
                    new OA\Property(property: "title[uz]", type: "string", example: "title uz"),
                    new OA\Property(property: "title[ru]", type: "string", example: "title ru"),
                    new OA\Property(property: "title[en]", type: "string", example: "title en"),
                    new OA\Property(property: "short_content[kk]", type: "string", example: "short_content kk"),
                    new OA\Property(property: "short_content[uz]", type: "string", example: "short_content uz"),
                    new OA\Property(property: "short_content[ru]", type: "string", example: "short_content ru"),
                    new OA\Property(property: "short_content[en]", type: "string", example: "short_content en"),
                    new OA\Property(property: "content[kk]", type: "string", example: "content[kk] kk"),
                    new OA\Property(property: "content[uz]", type: "string", example: "content[uz] kk"),
                    new OA\Property(property: "content[ru]", type: "string", example: "content[ru] kk"),
                    new OA\Property(property: "content[en]", type: "string", example: "content[en] kk"),
                    new OA\Property(
                        property: "tags",
                        type: "array",
                        items: new OA\Items(type: "integer"),
                        description: "Tags id lar array ko'rinishida bo'lishi kerak",
                    ),
                    new OA\Property(
                        property: "cover_image",
                        type: "string",
                        format: "binary"
                    )
                ]
            )
        )
    )]
    #[OA\Response(response: 200, description: 'News created successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/news/update/{id}',
        tags: ["News"],
        summary: "Update news",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "title[uz]", "title[ru]", "title[kk]", "title[en]",
                    "short_content[uz]", "short_content[ru]", "short_content[kk]", "short_content[en]",
                    "content[uz]", "content[ru]", "content[kk]", "content[en]",
                    "cover_image", "tags"
                ],
                properties: [
                    new OA\Property(property: "title[kk]", type: "string", example: "title kk"),
                    new OA\Property(property: "title[uz]", type: "string", example: "title uz"),
                    new OA\Property(property: "title[ru]", type: "string", example: "title ru"),
                    new OA\Property(property: "title[en]", type: "string", example: "title en"),
                    new OA\Property(property: "short_content[kk]", type: "string", example: "short_content kk"),
                    new OA\Property(property: "short_content[uz]", type: "string", example: "short_content uz"),
                    new OA\Property(property: "short_content[ru]", type: "string", example: "short_content ru"),
                    new OA\Property(property: "short_content[en]", type: "string", example: "short_content en"),
                    new OA\Property(property: "content[kk]", type: "string", example: "content[kk] kk"),
                    new OA\Property(property: "content[uz]", type: "string", example: "content[uz] kk"),
                    new OA\Property(property: "content[ru]", type: "string", example: "content[ru] kk"),
                    new OA\Property(property: "content[en]", type: "string", example: "content[en] kk"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),
                    new OA\Property(
                        property: "tags",
                        type: "array",
                        items: new OA\Items(type: "integer"),
                        description: "Tags id lar array ko'rinishida bo'lishi kerak",
                    ),
                    new OA\Property(
                        property: "cover_image",
                        type: "string",
                        format: "binary"
                    )
                ]
            )
        )
    )]
    #[OA\Response(response: 200, description: 'News updated successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "News not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, example: 1, description: "News id")]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/news/delete/{id}",
        summary: "Delete news",
        tags: ["News"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "News deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "News not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "News id", example: 1)]
    public function delete()
    {
        //
    }
}
