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
    #[OA\Response(response: 404, description: "Not Found")]
    public function index()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/main/rules',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "Rules Page",
        tags: ["Home"],
        summary: "Rules Page",
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Not Found")]
    public function rules()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/main/faqs',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "FAQs Page",
        tags: ["Home"],
        summary: "FAQs Page",
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Not Found")]
    public function faqs()
    {
        //
    }

    #[OA\Get(
        path: '/api/v1/main/about',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "About Page",
        tags: ["Home"],
        summary: "About Page",
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Not Found")]
    public function about()
    {
        //
    }


    #[OA\Get(
        path: '/api/v1/main/education',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "Education Page",
        tags: ["Home"],
        summary: "Education Page",
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Not Found")]
    public function education()
    {
        //
    }


    #[OA\Get(
        path: '/api/v1/main/schedule',
        parameters: [new OA\Parameter(ref: "#/components/parameters/Accept-Language")],
        description: "Schedule Page",
        tags: ["Home"],
        summary: "Schedule Page",
    )]
    #[OA\Response(response: 200, description: 'OK')]
    #[OA\Response(response: 401, description: 'Not allowed')]
    #[OA\Response(response: 404, description: "Not Found")]
    public function schedules()
    {
        //
    }
}
