<?php

namespace App\Http\Controllers;

use App\Actions\v1\Main\AddAction;
use App\Actions\v1\Main\IndexAction;
use App\Actions\v1\Main\ListAction;
use App\Dto\v1\Main\AddDto;
use App\Http\Requests\v1\Main\AddRequest;
use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    /**
     * Summary of index
     * @param \App\Actions\v1\Main\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of congratulation
     * @param \App\Http\Requests\v1\Main\AddRequest $request
     * @param \App\Actions\v1\Main\AddAction $action
     * @return JsonResponse
     */
    public function congratulation(AddRequest $request, AddAction $action): JsonResponse
    {
        return $action(AddDto::from($request));
    }

    /**
     * Summary of list
     * @param \App\Actions\v1\Main\ListAction $action
     * @return JsonResponse
     */
    public function list(ListAction $action): JsonResponse
    {
        return $action();
    }
}
