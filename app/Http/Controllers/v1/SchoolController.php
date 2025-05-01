<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Schools\CreateAction;
use App\Actions\v1\Schools\DeleteAction;
use App\Actions\v1\Schools\IndexAction;
use App\Actions\v1\Schools\ShowAction;
use App\Actions\v1\Schools\UpdateAction;
use App\Dto\v1\Schools\CreateDto;
use App\Dto\v1\Schools\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\School\CreateRequest;
use App\Http\Requests\v1\School\UpdateRequest;
use Illuminate\Http\JsonResponse;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\School\CreateRequest $request
     * @param \App\Actions\v1\Schools\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
