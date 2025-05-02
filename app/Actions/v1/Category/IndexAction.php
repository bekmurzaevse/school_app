<?php

namespace App\Actions\v1\Category;

use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        $categories = Category::all();

        return static::toResponse(
            message: "Kategoriyalar dizimi",
            data: $categories
        );
    }
}