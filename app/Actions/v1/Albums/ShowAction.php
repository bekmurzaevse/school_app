<?php

namespace App\Actions\v1\Albums;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Album\AlbumResource;
use App\Models\Album;
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
            $key = 'albums:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $album = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Album::with(['school', 'photos'])->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - id li albom",
                data: new AlbumResource($album)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li albom tabilmadi", 404);
        }
    }
}
