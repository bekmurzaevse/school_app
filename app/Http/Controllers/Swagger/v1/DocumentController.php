<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class DocumentController extends Controller
{

    #[OA\Get(path: '/api/v1/documents', tags: ["Document"], summary: "Retrieve all documents")]
    #[OA\Response(response: 200, description: 'Documents collection with pagination')]
    #[OA\Response(response: 404, description: "Documents not found")]
    public function index()
    {
        //      
    }

    #[OA\Get(path: '/api/v1/documents/show/{id}', tags: ["Document"], summary: "Document by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Document id", example: 1)]
    #[OA\Response(response: 200, description: 'Document by id')]
    #[OA\Response(response: 404, description: "Document not found")]
    public function show()
    {
        //
    }

    #[OA\Post(path: '/api/v1/documents/upload', summary: "Create Document", tags: ["Document"], security: [['sanctum' => []]])]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["name", "description", "file"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "name kk"),
                    new OA\Property(property: "description", type: "string", example: "description kk"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "Document Created")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function upload()
    {
        //
    }

    #[OA\Get(path: '/api/v1/documents/download/{id}', tags: ["Document"], summary: "Document download by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Document id", example: 1)]
    #[OA\Response(response: 200, description: 'Document file by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Document not found")]
    public function download()
    {
        //
    }

    #[OA\Post(path: '/api/v1/documents/update/{id}', summary: "Update Document", tags: ["Document"], security: [['sanctum' => []]])]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["name", "description", "file", "_method"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "name kk"),
                    new OA\Property(property: "description", type: "string", example: "description kk"),
                    new OA\Property(property: "file", type: "string", format: "binary"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),
                ]
            ),
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Document id", example: 1)]
    #[OA\Response(response: 200, description: "Document Updated")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function update()
    {
        //
    }

    #[OA\Delete(path: "/api/v1/documents/delete/{id}", summary: "Document delete", tags: ["Document"], security: [["sanctum" => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Document id", example: 1)]
    #[OA\Response(response: 200, description: "Document deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Document not found")]
    public function delete()
    {
        //
    }
}