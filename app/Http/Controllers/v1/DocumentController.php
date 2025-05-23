<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Document\DeleteAction;
use App\Actions\v1\Document\DownloadAction;
use App\Actions\v1\Document\IndexAction;
use App\Actions\v1\Document\ShowAction;
use App\Actions\v1\Document\UpdateAction;
use App\Actions\v1\Document\UploadAction;
use App\Dto\v1\Document\UpdateDto;
use App\Dto\v1\Document\UploadDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Document\UpdateRequest;
use App\Http\Requests\v1\Document\UploadRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Document\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Document\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of upload
     * @param \App\Actions\v1\Document\UploadAction $action
     * @param \App\Http\Requests\v1\Document\UploadRequest $request
     * @return JsonResponse
     */
    public function upload(UploadAction $action, UploadRequest $request): JsonResponse
    {
        return $action(UploadDto::from($request));
    }

    /**
     * Summary of download
     * @param int $id
     * @param \App\Actions\v1\Document\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadAction $action): StreamedResponse
    {
        return $action($id);

    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Document\UpdateRequest $request
     * @param \App\Actions\v1\Document\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Document\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
