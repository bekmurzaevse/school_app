<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Albums\CreateAction;
use App\Actions\v1\Albums\DeleteAction;
use App\Actions\v1\Albums\IndexAction;
use App\Actions\v1\Albums\ShowAction;
use App\Actions\v1\Albums\UpdateAction;
use App\Dto\v1\Albums\CreateDto;
use App\Dto\v1\Albums\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Album\CreateRequest;
use App\Http\Requests\v1\Album\UpdateRequest;
use Illuminate\Http\JsonResponse;

class AlbumController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Albums\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Album\CreateRequest $request
     * @param \App\Actions\v1\Albums\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Albums\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Album\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\Albums\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Albums\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
