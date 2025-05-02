<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Photos\CreateAction;
use App\Actions\v1\Photos\DeleteAction;
use App\Actions\v1\Photos\IndexAction;
use App\Actions\v1\Photos\ShowAction;
use App\Actions\v1\Photos\UpdateAction;
use App\Dto\v1\Photos\CreateDto;
use App\Dto\v1\Photos\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Photo\CreateRequest;
use App\Http\Requests\v1\Photo\UpdateRequest;
use Illuminate\Http\JsonResponse;

class PhotoController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Photos\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Photo\CreateRequest $request
     * @param \App\Actions\v1\Photos\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Photos\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\Photo\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\Photos\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Photos\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
