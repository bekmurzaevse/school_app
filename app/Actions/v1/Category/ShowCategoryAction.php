<?php

namespace App\Actions\V1\Category;

use App\Models\Category;

class ShowCategoryAction
{
    public function __invoke($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json(['category' => $category], 200);
    }
}