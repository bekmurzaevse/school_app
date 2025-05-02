<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Document\UploadAction;
use App\Dto\v1\Document\UploadDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Document\UploadRequest;
use Illuminate\Http\JsonResponse;

class DocumentController extends Controller
{
    public function upload(UploadAction $action, UploadRequest $request): JsonResponse
    {
        return $action(UploadDto::from($request));
    }
    // public function index(IndexAction $action): JsonResponse
    // {
    //     return $action();
    // }

    // public function show(int $id, ShowAction $action): JsonResponse
    // {
    //     return $action($id);
    // }

    // public function create(CreateRequest $request, CreateAction $action): JsonResponse
    // {
    //     return $action(CreateDto::from($request));
    // }

    // public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    // {
    //     return $action($id, UpdateDto::from($request));
    // }

    // public function delete(int $id, DeleteAction $action): JsonResponse
    // {
    //     return $action($id);
    // }
}
