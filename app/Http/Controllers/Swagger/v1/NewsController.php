<?php

namespace App\Http\Controllers\Swagger\v1;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;

class NewsController extends Controller
{
    #[OA\Get(path: '/api/v1/news', tags: ["News"], summary: "Retrieve all news", )]
    #[OA\Response(response: 200, description: 'Post collection with pagination')]
    #[OA\Response(response: 401, description: 'Unauthenticated')]
    public function index()
    {
        //      
    }

    public function show()
    {
        //
    }

    public function create()
    {
        //
    }

    public function update()
    {
        //
    }

    public function delete()
    {
        //
    }
}