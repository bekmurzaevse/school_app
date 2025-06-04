<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\User\CreateAction;
use App\Actions\v1\User\DeleteAction;
use App\Actions\v1\User\IndexAction;
use App\Actions\v1\User\LoginAction;
use App\Actions\v1\User\LogoutAction;
use App\Actions\v1\User\ProfileAction;
use App\Actions\v1\User\ShowAction;
use App\Actions\v1\User\UpdateAction;
use App\Dto\v1\User\CreateDto;
use App\Dto\v1\User\LoginDto;
use App\Dto\v1\User\UpdateDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\User\CreateRequest;
use App\Http\Requests\v1\User\LoginRequest;
use App\Http\Requests\v1\User\UpdateRequest;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Summary of login
     * @param \App\Http\Requests\v1\User\LoginRequest $request
     * @param \App\Actions\v1\User\LoginAction $action
     * @return JsonResponse
     */
    public function login(LoginRequest $request, LoginAction $action): JsonResponse
    {
        return $action(LoginDto::from($request));
    }

    /**
     * Summary of logout
     * @param \App\Actions\v1\User\LogoutAction $action
     * @return JsonResponse
     */
    public function logout(LogoutAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of index
     * @param \App\Actions\v1\User\IndexAction $action
     * @return JsonResponse
     */
    public function index(IndexAction $action): JsonResponse
    {
        return $action();
    }

    /**
     * Summary of show
     * @param int $id
     * @param \App\Actions\v1\User\ShowAction $action
     * @return JsonResponse
     */
    public function show(int $id, ShowAction $action): JsonResponse
    {
        return $action($id);
    }

    /**
     * Summary of create
     * @param \App\Http\Requests\v1\User\CreateRequest $request
     * @param \App\Actions\v1\User\CreateAction $action
     * @return JsonResponse
     */
    public function create(CreateRequest $request, CreateAction $action): JsonResponse
    {
        return $action(CreateDto::from($request));
    }

    /**
     * Summary of update
     * @param int $id
     * @param \App\Http\Requests\v1\User\UpdateRequest $request
     * @param \App\Actions\v1\User\UpdateAction $action
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request, UpdateAction $action): JsonResponse
    {
        return $action($id, UpdateDto::from($request));
    }

    /**
     * Summary of delete
     * @param int $id
     * @param \App\Actions\v1\User\DeleteAction $action
     * @return JsonResponse
     */
    public function delete(int $id, DeleteAction $action): JsonResponse
    {
        return $action($id);
    }

}
