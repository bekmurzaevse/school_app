<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Rule\CreateAction;
use App\Actions\v1\Rule\DeleteAction;
use App\Actions\v1\Rule\IndexAction;
use App\Actions\v1\Rule\ShowAction;
use App\Actions\v1\Rule\UpdateAction;
use App\Dto\v1\Rule\CreateDto;
use App\Dto\v1\Rule\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Rule\CreateRequest;
use App\Http\Requests\v1\Rule\UpdateRequest;
use Illuminate\Http\JsonResponse;

class RuleController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Rule\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Rule\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Rule\CreateRequest $request
     * @param \App\Actions\v1\Rule\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Rule\UpdateRequest $request
     * @param \App\Actions\v1\Rule\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Rule\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
