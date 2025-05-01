<?php

namespace App\Actions\V1\Category;

use App\Dto\Category\CategoryDto;
use App\Models\Category;

class UpdateCategoryAction
{
    public function __invoke(CategoryDto $dto, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update([
            'name' => $dto->name,
            'description' => $dto->description,
        ]);

        return response()->json(['category' => $category], 200);
    }
}