<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Club\CreateAction;
use App\Actions\v1\Club\DeleteAction;
use App\Actions\v1\Club\IndexAction;
use App\Actions\v1\Club\ShowAction;
use App\Actions\v1\Club\UpdateAction;
use App\Dto\v1\Club\CreateDto;
use App\Dto\v1\Club\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Club\CreateRequest;
use App\Http\Requests\v1\Club\UpdateRequest;
use Illuminate\Http\JsonResponse;

class ClubController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Club\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Club\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Club\CreateRequest $request
     * @param \App\Actions\v1\Club\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Club\UpdateRequest $request
     * @param \App\Actions\v1\Club\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Club\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
