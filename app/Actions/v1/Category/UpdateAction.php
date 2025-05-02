<?php

namespace App\Actions\v1\Category;

use App\Dto\v1\Category\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\Category;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $category = Category::findOrFail($id);
            $category->update([
                'name' => $dto->name,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Kategoriya jan'alandi!",
                data: $category
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li kategoriya tabilmadi!", 404);
        }
    }
}