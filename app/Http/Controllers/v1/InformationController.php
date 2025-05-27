<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Information\CreateAction;
use App\Actions\v1\Information\DeleteAction;
use App\Actions\v1\Information\IndexAction;
use App\Actions\v1\Information\ShowAction;
use App\Actions\v1\Information\UpdateAction;
use App\Dto\v1\Information\CreateDto;
use App\Dto\v1\Information\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Information\CreateRequest;
use App\Http\Requests\v1\Information\UpdateRequest;
use Illuminate\Http\JsonResponse;

class InformationController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\Information\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Information\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Information\CreateRequest $request
     * @param \App\Actions\v1\Information\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Information\UpdateRequest $request
     * @param \App\Actions\v1\Information\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Information\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

}
