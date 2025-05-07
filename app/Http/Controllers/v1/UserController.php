<?php

namespace App\Http\Controllers\v1;

use App\Actions\v1\User\LoginAction;
use App\Actions\v1\User\LogoutAction;
use App\Actions\v1\User\ProfileAction;
use App\Dto\v1\User\LoginDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\v1\User\LoginRequest;
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
     * Summary of profile
     * @param \App\Actions\v1\User\ProfileAction $action
     * @return JsonResponse
     */
    public function profile(ProfileAction $action): JsonResponse
    {
        return $action();
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
    
//TODO: Implement other methods like updateProfile, deleteAccount, etc.
    //Admin - CRUD for User
}