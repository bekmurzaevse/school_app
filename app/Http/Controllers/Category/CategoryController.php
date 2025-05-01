<?php

namespace App\Http\Controllers\Category;

use App\Actions\v1\Category\CreateCategoryAction;
use App\Actions\v1\Category\DeleteCategoryAction;
use App\Actions\v1\Category\IndexCategoryAction;
use App\Actions\v1\Category\ShowCategoryAction;
use App\Actions\v1\Category\UpdateCategoryAction;
use App\Dto\Category\CategoryDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(IndexCategoryAction $action)
    {
        return $action->__invoke();
    }
    
    public function store(CategoryRequest $request, CreateCategoryAction $action)
    {
        $dto = CategoryDto::fromRequest($request);
        
        return $action->__invoke($dto);
    }

    public function show($id, ShowCategoryAction $action)
    {
        return $action->__invoke($id);
    }

    public function update(CategoryRequest $request, $id, UpdateCategoryAction $action)
    {
        $dto = CategoryDto::fromRequest($request);

        return $action->__invoke($dto, $id);
    }

    public function destroy($id, DeleteCategoryAction $action)
    {
        return $action->__invoke($id);
    }
}
