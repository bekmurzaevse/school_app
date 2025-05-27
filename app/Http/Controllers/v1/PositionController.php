<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Positions\CreateAction;
use App\Actions\v1\Positions\DeleteAction;
use App\Actions\v1\Positions\IndexAction;
use App\Actions\v1\Positions\ShowAction;
use App\Actions\v1\Positions\UpdateAction;
use App\Dto\v1\Positions\CreateDto;
use App\Dto\v1\Positions\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Position\CreateRequest;
use App\Http\Requests\v1\Position\UpdateRequest;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Positions\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }


    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Position\CreateRequest $request
     * @param \App\Actions\v1\Positions\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Positions\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Position\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\Positions\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Positions\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

}
