<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

use OpenApi\Attributes as OA;

class MainController extends Controller
{
    #[OA\Get(
        path: '/api/v1/',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
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

    #[OA\Get(
        path: '/api/v1/list',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
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
