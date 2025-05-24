<?php

namespace App\Actions\v1\Target;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Target\TargetResource;
use App\Models\Target;
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
        try {
            $key = 'targets:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $target = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Target::findOrFail($id);
            });

            return static::toResponse(
                message: "$id - Target",
                data: new TargetResource($target)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Target not found", 404);
        }
    }
}