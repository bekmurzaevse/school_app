<?php

namespace App\Actions\v1\History;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\History\HistoryResource;
use App\Models\History;
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
            $key = 'histories:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $history = Cache::remember($key, now()->addDay(), function () use ($id) {
                return History::with('school')->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - History",
                data: new HistoryResource($history)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - History not found", 404);
        }
    }
}