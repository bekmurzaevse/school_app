<?php

namespace App\Actions\v1\Category;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Category\CategoryResource;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'category:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $category = Cache::remember($key, now()->addDay(), function () use ($id) {

                return Category::findOrFail($id);
            });

            return static::toResponse(
                message: "$id - id li kategoriya",
                data: new CategoryResource($category)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li kategoriya topilmadi", 404);
        }
    }

}