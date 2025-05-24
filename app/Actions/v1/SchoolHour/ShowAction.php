<?php

namespace App\Actions\v1\SchoolHour;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\SchoolHour\SchoolHourResource;
use App\Models\SchoolHour;
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
            $key = 'school-hours:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $schoolHour = Cache::remember($key, now()->addDay(), function () use ($id) {
                return SchoolHour::findOrFail($id);
            });

            return static::toResponse(
                message: "$id - SchoolHour",
                data: new SchoolHourResource($schoolHour)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - SchoolHour not found", 404);
        }
    }
}
