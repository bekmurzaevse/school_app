<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

use OpenApi\Attributes as OA;

class MainController extends Controller
{
    #[OA\Get(
        path: '/api/v1/',
        description: "Home page",
        tags: ["Home"],
        summary: "Home page",
    )]
    #[OA\Response(response: 200, description: 'Bas bet')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "tabilmadi")]
    public function index()
    {
        //
    }

    #[OA\Post(
        path: '/api/v1/congratulation',
        description: "Individual qutliqlaw jaratiw",
        tags: ["Home"],
        summary: "Individual qutliqlaw jaratiw",
        security: [['sanctum' => []]]
    )]
    #[OA\RequestBody(
        required: true,
        description: "Individual qutliqlaw jaratiw ushin mag'liwmatlar",
        content: new OA\JsonContent(
            required: ["text", "employee_id"],
            properties: [
                new OA\Property(property: "employee_id", type: "int", example: 1),
                new OA\Property(property: "text", type: "string", example: "Qutliqlaw"),
            ]
        )
    )]
    #[OA\Response(response: 200, description: 'Individual qutliqlaw jaratildi')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Tabilmadi")]
    public function congratulation()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/list',
        description: "Employee list with birth date",
        tags: ["Home"],
        summary: "Employee list with birth date",
        security: [['sanctum' => []]]
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "tabilmadi")]
    public function list()
    {
        //
    }
}
