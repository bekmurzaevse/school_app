<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\News\CreateAction;
use App\Actions\v1\News\DeleteAction;
use App\Actions\v1\News\IndexAction;
use App\Actions\v1\News\ShowAction;
use App\Actions\v1\News\UpdateAction;
use App\Dto\v1\News\CreateDto;
use App\Dto\v1\News\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\News\CreateRequest;
use App\Http\Requests\v1\News\UpdateRequest;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\News\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\News\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\News\CreateRequest $request
     * @param \App\Actions\v1\News\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param \App\Http\Requests\v1\News\UpdateRequest $request
     * @param \App\Actions\v1\News\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\News\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
