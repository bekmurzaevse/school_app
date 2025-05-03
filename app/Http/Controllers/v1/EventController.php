<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Event\CreateAction;
use App\Actions\v1\Event\DeleteAction;
use App\Actions\v1\Event\IndexAction;
use App\Actions\v1\Event\ShowAction;
use App\Actions\v1\Event\UpdateAction;
use App\Dto\v1\Event\CreateDto;
use App\Dto\v1\Event\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Event\CreateRequest;
use App\Http\Requests\v1\Event\UpdateRequest;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Event\ShowAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Event\CreateRequest $request
     * @param \App\Actions\v1\Event\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Event\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Event\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\Event\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Event\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}