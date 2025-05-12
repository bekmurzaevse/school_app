<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Employee\AddAction;
use App\Actions\v1\Employee\DeleteAction;
use App\Actions\v1\Employee\IndexAction;
use App\Actions\v1\Employee\ShowAction;
use App\Actions\v1\Employee\CreateAction;
use App\Actions\v1\Employee\UpdateAction;
use App\Dto\v1\Employee\AddDto;
use App\Dto\v1\Employee\CreateDto;
use App\Dto\v1\Employee\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Employee\AddRequest;
use App\Http\Requests\v1\Employee\CreateRequest;
use App\Http\Requests\v1\Employee\UpdateRequest;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Employee\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Employee\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Employee\CreateRequest $request
     * @param \App\Actions\v1\Employee\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Employee\UpdateRequest $request
     * @param \App\Actions\v1\Employee\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Employee\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

    public function congratulation(AddRequest $request, AddAction $action)
    {
        return $action(AddDto::from($request));
    }

}
