<?php

namespace App\Actions\V1\Category;

use App\Models\Category;

class DeleteCategoryAction
{
    public function __invoke($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}