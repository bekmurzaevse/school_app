<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\File\CreateAction;
use App\Actions\v1\File\DeleteAction;
use App\Actions\v1\File\IndexAction;
use App\Actions\v1\File\ShowAction;
use App\Actions\v1\File\UpdateAction;
use App\Actions\v1\File\UploadAction;
use App\Dto\v1\File\CreateDto;
use App\Dto\v1\File\UpdateDto;
use App\Dto\v1\File\UploadDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\File\CreateRequest;
use App\Http\Requests\v1\File\UpdateRequest;
use App\Http\Requests\v1\File\UploadRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rules\In;

class FileController extends Controller
{

    /**
     * Summary of index
     * @param \App\Actions\v1\File\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\File\CreateRequest $request
     * @param \App\Actions\v1\File\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of upload
     * @param \App\Http\Requests\v1\File\UploadRequest $request
     * @param \App\Actions\v1\File\UploadAction $action
     * @return JsonResponse
     */
    public function upload(UploadRequest $request, UploadAction $action): JsonResponse
    {
        return $action(UploadDto::from($request));
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\File\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\File\UpdateRequest $request
     * @param int $id
     * @param \App\Actions\v1\File\UpdateAction $action
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\File\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}