<?php

namespace App\Actions\v1\Value;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Value\ValueResource;
use App\Models\Value;
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
            $key = 'values:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $value = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Value::with(['school', 'photo'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new ValueResource($value)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Value Not Found', 404);
        }
    }
}