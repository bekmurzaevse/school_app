<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Value\CreateAction;
use App\Actions\v1\Value\DeleteAction;
use App\Actions\v1\Value\IndexAction;
use App\Actions\v1\Value\ShowAction;
use App\Actions\v1\Value\UpdateAction;
use App\Dto\v1\Value\CreateDto;
use App\Dto\v1\Value\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Value\CreateRequest;
use App\Http\Requests\v1\Value\UpdateRequest;
use Illuminate\Http\JsonResponse;

class ValueController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Value\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Value\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Value\CreateRequest $request
     * @param \App\Actions\v1\Value\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Value\UpdateRequest $request
     * @param \App\Actions\v1\Value\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Value\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
