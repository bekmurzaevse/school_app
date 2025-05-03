<?php

namespace App\Actions\v1\Photos;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Photo\PhotoResource;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
            $key = 'photos:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $photo = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Photo::with('album')->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - id li lawazim",
                data: new PhotoResource($photo)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li photo tabilmadi", 404);
        }
    }
}
