<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\Faq\CreateAction;
use App\Actions\v1\Faq\DeleteAction;
use App\Actions\v1\Faq\IndexAction;
use App\Actions\v1\Faq\ShowAction;
use App\Actions\v1\Faq\UpdateAction;
use App\Dto\v1\Faq\CreateDto;
use App\Dto\v1\Faq\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\Faq\CreateRequest;
use App\Http\Requests\v1\Faq\UpdateRequest;
use Illuminate\Http\JsonResponse;

class FaqController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Faq\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\Faq\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\Faq\CreateRequest $request
     * @param \App\Actions\v1\Faq\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\Faq\UpdateRequest $request
     * @param \App\Actions\v1\Faq\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\Faq\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }
}
