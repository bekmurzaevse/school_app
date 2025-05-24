<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\History\CreateAction;
use App\Actions\v1\History\DeleteAction;
use App\Actions\v1\History\IndexAction;
use App\Actions\v1\History\ShowAction;
use App\Actions\v1\History\UpdateAction;
use App\Dto\v1\History\CreateDto;
use App\Dto\v1\History\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\History\CreateRequest;
use App\Http\Requests\v1\History\UpdateRequest;
use Illuminate\Http\JsonResponse;

class HistoryController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\History\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\History\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\History\CreateRequest $request
     * @param \App\Actions\v1\History\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\History\UpdateRequest $request
     * @param \App\Actions\v1\History\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\History\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}