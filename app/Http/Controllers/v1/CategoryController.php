<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Category\CreateAction;
use App\Actions\v1\Category\DeleteAction;
use App\Actions\v1\Category\IndexAction;
use App\Actions\v1\Category\ShowAction;
use App\Actions\v1\Category\UpdateAction;
use App\Dto\v1\Category\CreateDto;
use App\Dto\v1\Category\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Category\CreateRequest;
use App\Http\Requests\v1\Category\UpdateRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Category\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Category\CreateRequest $request
     * @param \App\Actions\v1\Category\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Category\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Category\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\Category\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Category\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}