<?php

namespace App\Actions\v1\Category;

use App\Dto\Category\CategoryDto;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CreateCategoryAction
{
    public function __invoke(CategoryDto $dto): JsonResponse
    {
        $category = Category::create([
            'name' => $dto->name,
            'description' => $dto->description,
        ]);

        return response()->json([
            'success' => true,
            'data' => $category,
            'message' => 'Category created successfully'
        ], 201);
    }
}