<?php

namespace App\Actions\v1\User;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\User\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try{
            $key = 'users:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $user = Cache::remember($key, now()->addDay(), function () use ($id) {
                return User::findOrFail($id);
            });
            
            return static::toResponse(
                message: "User by id",
                data: new UserResource($user)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li user tabilmadi", 404);
        }
    }
}
