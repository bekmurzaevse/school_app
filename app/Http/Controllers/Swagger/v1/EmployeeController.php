<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class EmployeeController extends Controller
{
    #[OA\Get(path: '/api/v1/employees', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], tags: ["Employee"], summary: "Retrieve all employees", )]
    #[OA\Response(response: 200, description: 'Employees collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: 'Employees not found')]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/employees/{id}', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], tags: ["Employee"], summary: "Employee by id", security: [['sanctum' => []]])]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    #[OA\Response(response: 200, description: 'Employee by id')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    #[OA\Response(response: 404, description: "Employee not found")]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/employees/create',
        tags: ["Employee"],
        summary: "Create employee",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "full_name[uz]",
                    "full_name[ru]",
                    "full_name[kk]",
                    "full_name[en]",
                    "phone"
                ],
                properties: [
                    new OA\Property(property: "full_name[kk]", type: "string", example: "full_name kk"),
                    new OA\Property(property: "full_name[uz]", type: "string", example: "full_name uz"),
                    new OA\Property(property: "full_name[ru]", type: "string", example: "full_name ru"),
                    new OA\Property(property: "full_name[en]", type: "string", example: "full_name en"),
                    new OA\Property(property: "phone", type: "string", example: "998971234567"),
                    new OA\Property(property: "email", type: "string", example: "bill@gmail.com"),
                    new OA\Property(property: "position_id", type: "integer", example: 1),
                    new OA\Property(property: "birth_date", type: "string", example: "1994-01-01"),
                    new OA\Property(property: "description[kk]", type: "string", example: "description kk"),
                    new OA\Property(property: "description[uz]", type: "string", example: "description uz"),
                    new OA\Property(property: "description[ru]", type: "string", example: "description ru"),
                    new OA\Property(property: "description[en]", type: "string", example: "description en"),

                    new OA\Property(
                        property: "photo",
                        type: "string",
                        format: "binary"
                    )
                ]
            ),
        )
    )]
    #[OA\Response(response: 200, description: 'Employee created successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    public function create()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/employees/update/{id}',
        tags: ["Employee"],
        summary: "Update employee",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\MediaType(
            mediaType: "multipart/form-data",
            schema: new OA\Schema(
                required: [
                    "full_name[uz]",
                    "full_name[ru]",
                    "full_name[kk]",
                    "full_name[en]",
                    "phone"
                ],
                properties: [
                    new OA\Property(property: "full_name[kk]", type: "string", example: "full_name kk"),
                    new OA\Property(property: "full_name[uz]", type: "string", example: "full_name uz"),
                    new OA\Property(property: "full_name[ru]", type: "string", example: "full_name ru"),
                    new OA\Property(property: "full_name[en]", type: "string", example: "full_name en"),
                    new OA\Property(property: "phone", type: "string", example: "998971234567"),
                    new OA\Property(property: "email", type: "string", example: "bill@gmail.com"),
                    new OA\Property(property: "position_id", type: "integer", example: 1),
                    new OA\Property(property: "birth_date", type: "string", example: "1994-01-01"),
                    new OA\Property(property: "description[kk]", type: "string", example: "description kk"),
                    new OA\Property(property: "description[uz]", type: "string", example: "description uz"),
                    new OA\Property(property: "description[ru]", type: "string", example: "description ru"),
                    new OA\Property(property: "description[en]", type: "string", example: "description en"),
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
    #[OA\Response(response: 200, description: 'Employee updated successfully')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: 'Employee not found')]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/employees/delete/{id}",
        summary: "Delete employee",
        tags: ["Employee"],
        security: [["sanctum" => []]],
    )]
    #[OA\Response(response: 200, description: "Employee deleted successfully")]
    #[OA\Response(response: 401, description: "Not allowed")]
    #[OA\Response(response: 404, description: "Employee not found")]
    #[OA\Parameter(name: "id", in: "path", required: true, description: "Employee id", example: 1)]
    public function delete()
    {
        //
    }
}
