<?php

namespace App\Actions\v1\Category;

use App\Exceptions\ApiResponseException;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return static::toResponse(
                message: "$id - id li kategoriya o'shirildi!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li kategoriya tabilmadi!", 404);
        }
    }
}