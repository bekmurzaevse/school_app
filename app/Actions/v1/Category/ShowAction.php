<?php

namespace App\Actions\V1\Category;

use App\Exceptions\ApiResponseException;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);

            return static::toResponse(
                message: "$id - id li kategoriya",
                data: $category
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li kategoriya tabilmadi", 404);
        }
    }
}