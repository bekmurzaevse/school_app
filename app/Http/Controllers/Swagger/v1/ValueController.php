<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ValueController extends Controller
{

    #[OA\Get(path: '/api/v1/values', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], tags: ["Value"], summary: "Retrieve all values")]
    #[OA\Response(response: 200, description: 'Value collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/values/{id}', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], tags: ["Value"], summary: "Value by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    #[OA\Response(response: 200, description: 'Value by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Value not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/values/create',
        tags: ["Value"],
        summary: "Create value",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "name[uz]",
                    "name[ru]",
                    "name[kk]",
                    "name[en]",
                    "text[uz]",
                    "text[ru]",
                    "text[kk]",
                    "text[en]",
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

                    new OA\Property(
                        property: "photo",
                        type: "string",
                        format: "binary"
                    )
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Value created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    public function create()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/values/update/{id}',
        tags: ["Value"],
        summary: "Update value",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "name[uz]",
                    "name[ru]",
                    "name[kk]",
                    "name[en]",
                    "text[uz]",
                    "text[ru]",
                    "text[kk]",
                    "text[en]",
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
    #[OA\Response(response: 200, description: 'Value created successfully')]
    #[OA\Response(response: 422, description: 'Validation error')]
    #[OA\Response(response: 500, description: 'Server error')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/values/delete/{id}",
        summary: "Value delete",
        tags: ["Value"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Value deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Value not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Value id", example: 1)]
    public function delete()
    {
        //
    }
}
