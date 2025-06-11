<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\SchoolHour\CreateAction;
use App\Actions\v1\SchoolHour\DeleteAction;
use App\Actions\v1\SchoolHour\IndexAction;
use App\Actions\v1\SchoolHour\ShowAction;
use App\Actions\v1\SchoolHour\UpdateAction;
use App\Dto\v1\SchoolHour\CreateDto;
use App\Dto\v1\SchoolHour\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\SchoolHour\CreateRequest;
use App\Http\Requests\v1\SchoolHour\UpdateRequest;
use Illuminate\Http\JsonResponse;

class SchoolHourController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\SchoolHour\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\SchoolHour\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\SchoolHour\CreateRequest $request
     * @param \App\Actions\v1\SchoolHour\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\SchoolHour\UpdateRequest $request
     * @param \App\Actions\v1\SchoolHour\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\SchoolHour\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
