<?php

namespace App\Actions\v1\Information;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Information\InformationResource;
use App\Models\Information;
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
            $key = 'informations:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $information = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Information::with('school')->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - Information",
                data: new InformationResource($information)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Information not found", 404);
        }
    }
}
