<?php

namespace App\Actions\v1\Event;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Event\EventResource;
use App\Models\Event;
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
            $key = 'events:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $event = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Event::with(['school', 'files'])->findOrFail($id);
            });

            return static::toResponse(
                message: "Ta'dbir haqqinda mag'liwmatlar alindi",
                data: new EventResource($event)
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("Ta'dbir tabilmadi", 404);
        }
    }
}