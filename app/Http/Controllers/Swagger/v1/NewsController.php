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
        description: "News creation data",
        content: new OA\JsonContent(
            required: ["title", "author_id", "short_content", "content"],
            properties: [
                new OA\Property(property: "author_id", type: "int", example: 1),
                new OA\Property(property: "cover_image", type: "int", example: 1),
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
                    property: "short_content",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk short_content"),
                        new OA\Property(property: "uz", type: "string", example: "uz short_content"),
                        new OA\Property(property: "ru", type: "string", example: "ru short_content"),
                        new OA\Property(property: "en", type: "string", example: "en short_content"),
                    ]
                ),
                new OA\Property(
                    property: "content",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk content"),
                        new OA\Property(property: "uz", type: "string", example: "uz content"),
                        new OA\Property(property: "ru", type: "string", example: "ru content"),
                        new OA\Property(property: "en", type: "string", example: "en content"),
                    ]
                ),
                new OA\Property(property: "tags[]", type: "array", items: new OA\Items(type: "integer"), example: []),
            ]
        ),
    )]
    #[OA\Response(response: 200, description: 'News created successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: '/api/v1/news/update/{id}',
        tags: ["News"],
        summary: "Update news",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "News update data",
        content: new OA\JsonContent(
            required: ["title", "author_id", "short_content", "content"],
            properties: [
                new OA\Property(property: "author_id", type: "int", example: 1),
                new OA\Property(property: "cover_image", type: "int", example: 1),
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
                    property: "short_content",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk short_content"),
                        new OA\Property(property: "uz", type: "string", example: "uz short_content"),
                        new OA\Property(property: "ru", type: "string", example: "ru short_content"),
                        new OA\Property(property: "en", type: "string", example: "en short_content"),
                    ]
                ),
                new OA\Property(
                    property: "content",
                    type: "object",
                    required: ["kk", "uz", "ru", "en"],
                    properties: [
                        new OA\Property(property: "kk", type: "string", example: "kk content"),
                        new OA\Property(property: "uz", type: "string", example: "uz content"),
                        new OA\Property(property: "ru", type: "string", example: "ru content"),
                        new OA\Property(property: "en", type: "string", example: "en content"),
                    ]
                ),
                new OA\Property(property: "tags[]", type: "array", items: new OA\Items(type: "integer"), example: []),
            ]
        ),
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