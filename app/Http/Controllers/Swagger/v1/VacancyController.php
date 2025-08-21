<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class VacancyController extends Controller
{

    #[OA\Get(
        path: '/api/v1/vacancies',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "All Vacancies",
        tags: ["Vacancy"],
        summary: "All Vacancy",
    )]
    #[OA\Response(response: 200, description: 'Vacancy list')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Vacancy not found")]
    public function index()
    {
        //
    }

    #[OA\Get(path: '/api/v1/vacancies/{id}', parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")], summary: "Vacancy by id", tags: ["Vacancy"])]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Vakantsiya ni aliw",
        example: 1
    )]
    #[OA\Response(response: 200, description: 'Vacancy')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function show()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/vacancies/create',
        description: "Vacancy jaratiw",
        tags: ["Vacancy"],
        summary: "Vacancy jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Vacancy jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["title", "content", "salary"],
            properties: [
                new OA\Property(property: "salary", type: "int", example: 1200000),
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
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Vacancy jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Vacancy tabilmadi")]
    public function create()
    {
        //
    }

    #[OA\Put(
        path: "/api/v1/vacancies/update/{id}",
        summary: "Vacancy di jan'alaw",
        tags: ["Vacancy"],
        security: [["sanctum" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["title", "content", "salary"],
                properties: [
                    new OA\Property(property: "salary", type: "int", example: 1700000),
                    new OA\Property(
                        property: "title",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new title"),
                            new OA\Property(property: "uz", type: "string", example: "uz new title"),
                            new OA\Property(property: "ru", type: "string", example: "ru new title"),
                            new OA\Property(property: "en", type: "string", example: "en new title"),
                        ]
                    ),
                    new OA\Property(
                        property: "content",
                        type: "object",
                        required: ["kk", "uz", "ru", "en"],
                        properties: [
                            new OA\Property(property: "kk", type: "string", example: "kk new content"),
                            new OA\Property(property: "uz", type: "string", example: "uz new content"),
                            new OA\Property(property: "ru", type: "string", example: "ru new content"),
                            new OA\Property(property: "en", type: "string", example: "en new content"),
                        ]
                    ),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Vacancy jan'alandi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Vacancy tabilmadi")
        ]
    )]
    #[OA\Parameter(
        name: "id",
        in: "path",
        required: true,
        description: "id arqali Vacancy di jan'law",
        example: 1
    )]
    public function update()
    {
        //
    }

    #[OA\Delete(
        path: "/api/v1/vacancies/delete/{id}",
        summary: "Vacancy ti o'shiriw",
        tags: ["Vacancy"],
        security: [["sanctum" => []]],
        parameters: [new OA\Parameter(name: "id", in: "path", required: true, schema: new OA\Schema(type: "integer"))],
        responses: [
            new OA\Response(response: 200, description: "Vacancy o'shirildi"),
            new OA\Response(response: 401, description: "Not allowed"),
            new OA\Response(response: 404, description: "Vacancy tabilmadi"),
        ]
    )]
    public function delete()
    {
        //
    }
}
