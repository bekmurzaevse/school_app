<?php

namespace App\Actions\v1\Club;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Club\ClubResource;
use App\Models\Club;
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
        try {
            $key = 'clubs:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $club = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Club::with(['school', 'photo'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new ClubResource($club)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Club Not Found', 404);
        }
    }
}
