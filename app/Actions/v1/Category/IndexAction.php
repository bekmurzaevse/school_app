<?php

namespace App\Actions\v1\Category;

use App\Http\Resources\v1\Category\CategoryCollection;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'categories:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $categories = Cache::remember($key, now()->addDay(), function () {
            return Category::paginate(10);
        });

        return static::toResponse(
            message: "Kategoriyalar dizimi",
            data: new CategoryCollection($categories),
        );
    }
}