<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ClubController extends Controller
{

    #[OA\Get(path: '/api/v1/clubs', tags: ["Club"], summary: "Retrieve all clubs")]
    #[OA\Response(response: 200, description: 'Clubs collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/clubs/{id}', tags: ["Club"], summary: "Club by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    #[OA\Response(response: 200, description: 'Club by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Club not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/clubs/create',
        tags: ["Club"],
        summary: "Create club",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "name[uz]", "name[ru]", "name[kk]", "name[en]",
                    "text[uz]", "text[ru]", "text[kk]", "text[en]",
                    "schedule[uz]", "schedule[ru]", "schedule[kk]", "schedule[en]",
                    "photo"
                ],
                properties: [
                    new OA\Property(property: "name[kk]", type: "string", example: "name kk"),
                    new OA\Property(property: "name[uz]", type: "string", example: "name uz"),
                    new OA\Property(property: "name[ru]", type: "string", example: "name ru"),
                    new OA\Property(property: "name[en]", type: "string", example: "name en"),
                    new OA\Property(property: "text[kk]", type: "string", example: "text kk"),
                    new OA\Property(property: "text[uz]", type: "string", example: "text uz"),
                    new OA\Property(property: "text[ru]", type: "string", example: "text ru"),
                    new OA\Property(property: "text[en]", type: "string", example: "text en"),
                    new OA\Property(property: "schedule[kk]", type: "string", example: "schedule[kk] kk"),
                    new OA\Property(property: "schedule[uz]", type: "string", example: "schedule[uz] kk"),
                    new OA\Property(property: "schedule[ru]", type: "string", example: "schedule[ru] kk"),
                    new OA\Property(property: "schedule[en]", type: "string", example: "schedule[en] kk"),

                    new OA\Property(
                        property: "photo",
                        type: "string",
                        format: "binary"
                    )
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Club created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    public function create()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/clubs/update/{id}',
        tags: ["Club"],
        summary: "Create club",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "name[kk]", "name[uz]", "name[ru]", "name[en]",
                    "text[kk]", "text[uz]", "text[ru]", "text[en]",
                    "schedule[kk]", "schedule[uz]", "schedule[ru]", "schedule[en]",
                    "photo"
                ],
                properties: [
                    new OA\Property(property: "name[kk]", type: "string", example: "name kk new"),
                    new OA\Property(property: "name[uz]", type: "string", example: "name uz new"),
                    new OA\Property(property: "name[ru]", type: "string", example: "name ru new"),
                    new OA\Property(property: "name[en]", type: "string", example: "name en new"),
                    new OA\Property(property: "text[kk]", type: "string", example: "text kk new"),
                    new OA\Property(property: "text[uz]", type: "string", example: "text uz new"),
                    new OA\Property(property: "text[ru]", type: "string", example: "text ru new"),
                    new OA\Property(property: "text[en]", type: "string", example: "text en new"),
                    new OA\Property(property: "schedule[kk]", type: "string", example: "schedule[kk] kk new"),
                    new OA\Property(property: "schedule[uz]", type: "string", example: "schedule[uz] kk new"),
                    new OA\Property(property: "schedule[ru]", type: "string", example: "schedule[ru] kk new"),
                    new OA\Property(property: "schedule[en]", type: "string", example: "schedule[en] kk new"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),

                    new OA\Property(
                        property: "photo",
                        type: "string",
                        format: "binary"
                    )
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Club updated successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/clubs/delete/{id}",
        summary: "Club delete",
        tags: ["Club"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Club deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Club not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Club id", example: 1)]
    public function delete()
    {
        //
    }
}
