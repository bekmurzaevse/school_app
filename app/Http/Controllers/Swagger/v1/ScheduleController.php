<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class ScheduleController extends Controller
{
    #[OA\Get(path: '/api/v1/schedules', tags: ["Schedule"], summary: "Retrieve all schedulesfor users")]
    #[OA\Response(response: 200, description: 'Schedules collection with pagination')]
    #[OA\Response(response: 404, description: "Schedules not found")]
    public function index()
    {
        // Method implementation
    }

    #[OA\Get(path: '/api/v1/schedules/all', tags: ["Schedule"], summary: "Retrieve all schedules for admin", security: [['sanctum' => []]])]
    #[OA\Response(response: 200, description: 'All Schedules collection with pagination')]
    #[OA\Response(response: 404, description: "Schedules not found")]
    public function indexAll()
    {
        // Method implementation
    }

    #[OA\Get(path: '/api/v1/schedules/{id}', tags: ["Schedule"], summary: "Schedule by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Schedule id", example: 1)]
    #[OA\Response(response: 200, description: 'Schedule by id')]
    #[OA\Response(response: 404, description: "Schedule not found")]
    public function show()
    {
        // Method implementation
    }

    #[OA\Post(path: '/api/v1/schedules/create', summary: "Create Schedule", tags: ["Schedule"], security: [['sanctum' => []]])]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["file_pdf"],
                properties: [
                    new OA\Property(property: "description", type: "string", example: "description kk"),
                    new OA\Property(property: "file_pdf", type: "string", format: "binary", description: "fayllardin' atlari klass nomeri ha'm klass ha'ribi boliwi sha'rt!! example(7A.pdf, 9G.pdf, ...)"),
                    new OA\Property(property: "file_xls", type: "string", format: "binary", description: "fayllardin' atlari klass nomeri ha'm klass ha'ribi boliwi sha'rt!! example(7A.xls, 9G.xls, ...)"),
                    new OA\Property(property: "file_csv", type: "string", format: "binary", description: "fayllardin' atlari klass nomeri ha'm klass ha'ribi boliwi sha'rt!! example(7A.csv, 9G.csv, ...)"),
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: "Schedule Created")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function create()
    {
        // Method implementation
    }

    #[OA\Post(path: '/api/v1/schedules/update/{id}', summary: "Schedule Update", tags: ["Schedule"], security: [['sanctum' => []]])]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: ["description", "file", "_method"],
                properties: [
                    new OA\Property(property: "description", type: "string", example: "description kk"),
                    new OA\Property(property: "file", type: "string", format: "binary", description: "fayllardin' atlari klass nomeri ha'm klass ha'ribi boliwi sha'rt!! example(7A.pdf, 9G.xls, ...)"),
                    new OA\Property(property: "_method", type: "string", enum: ["PUT"], example: "PUT", nullable: false),
                ]
            ),
        )
    )]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Schedule id", example: 1)]
    #[OA\Response(response: 200, description: "Schedule Updated")]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 422, description: "Validation Error")]
    #[OA\Response(response: 500, description: "Internal Server Error")]
    public function update()
    {
        // Method implementation
    }

    #[OA\Get(path: '/api/v1/schedules/download/{id}', tags: ["Schedule"], summary: "Schedule download by id")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Schedule id", example: 1)]
    #[OA\Response(response: 200, description: 'Schedule download by id')]
    #[OA\Response(response: 404, description: "Schedule not found")]
    public function download()
    {
        // Method implementation
    }

    #[OA\Delete(path: "/api/v1/schedules/delete/{id}", tags: ["Schedule"], summary: "Schedule delete", security: [["sanctum" => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Schedule id", example: 1)]
    #[OA\Response(response: 200, description: "Schedule attachment a'wmetli o'shirildi")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Schedule attachment tabilmadi")]
    public function delete()
    {
        // Method implementation
    }
}
