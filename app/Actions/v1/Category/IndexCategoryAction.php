<?php

namespace App\Actions\V1\Category;

use App\Models\Category;

class IndexCategoryAction
{
    public function __invoke()
    {
        $categories = Category::all();

        return response()->json([
            'data' => $categories
        ], 200);
    }
}