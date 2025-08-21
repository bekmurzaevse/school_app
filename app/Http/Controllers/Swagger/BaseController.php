<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

use OpenApi\Attributes as OA;

#[
    OA\Info(version: "1.0.0", description: "School App Project Documentation", title: "School App Documentation"),
    OA\PathItem(path: "/v1"),
    OA\Server(url: 'http://localhost:8000/api', description: "local server"),
    OA\SecurityScheme(securityScheme: 'sanctum', type: "apiKey", name: "Authorization", in: "header", description: "Token kiritishda 'Bearer {token}' formatidan foydalaning"),
    OA\Components(
    parameters: [
        new OA\Parameter(
            parameter: "Accept-Language",
            name: "Accept-Language",
            in: "header",
            required: true,
            description: "Set the language for the response (uz, en, ru)",
            schema: new OA\Schema(
                type: "string",
                enum: ["uz", "en", "ru", "kk"],
                example: "ru"
            )
        )
    ]
)
]
class BaseController extends Controller
{

}
