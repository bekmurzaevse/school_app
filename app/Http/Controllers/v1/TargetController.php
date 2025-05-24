<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Target\CreateAction;
use App\Actions\v1\Target\DeleteAction;
use App\Actions\v1\Target\IndexAction;
use App\Actions\v1\Target\ShowAction;
use App\Actions\v1\Target\UpdateAction;
use App\Dto\v1\Target\CreateDto;
use App\Dto\v1\Target\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Target\CreateRequest;
use App\Http\Requests\v1\Target\UpdateRequest;
use Illuminate\Http\JsonResponse;

class TargetController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Target\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Target\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Target\CreateRequest $request
     * @param \App\Actions\v1\Target\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Target\UpdateRequest $request
     * @param \App\Actions\v1\Target\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Target\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}