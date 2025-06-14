<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Schedule\CreateAction;
use App\Actions\v1\Schedule\DeleteAction;
use App\Actions\v1\Schedule\DownloadAction;
use App\Actions\v1\Schedule\IndexAction;
use App\Actions\v1\Schedule\IndexAllAction;
use App\Actions\v1\Schedule\ShowAction;
use App\Actions\v1\Schedule\UpdateAction;
use App\Dto\v1\Schedule\CreateDto;
use App\Dto\v1\Schedule\DownloadDto;
use App\Dto\v1\Schedule\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Schedule\CreateRequest;
use App\Http\Requests\v1\Schedule\DownloadRequest;
use App\Http\Requests\v1\Schedule\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ScheduleController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Schedule\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Schedule\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Schedule\CreateRequest $request
     * @param \App\Actions\v1\Schedule\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }
    
    /**
     * Summary of download
     * @param int $id
     * @param \App\Http\Requests\v1\Schedule\DownloadRequest $request
     * @param \App\Actions\v1\Schedule\DownloadAction $action
     * @return StreamedResponse
     */
    public function download(int $id, DownloadRequest $request, DownloadAction $action):  StreamedResponse
    {
        return $action($id, DownloadDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Schedule\UpdateRequest $request
     * @param \App\Actions\v1\Schedule\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Schedule\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of indexAll
     * @param \App\Actions\v1\Schedule\IndexAllAction $action
     * @return JsonResponse
     */
    public function indexAll(IndexAllAction $action): JsonResponse
    {
        return $action();
    }
}
