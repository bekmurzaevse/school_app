<?php

namespace App\Actions\v1\Positions;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Position\PositionResource;
use App\Models\Position;
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
            $key = 'positions:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $position = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Position::with('school')->findOrFail($id);
            });

            return static::toResponse(
                message: "$id - id li lawazim",
                data: new PositionResource($position)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li lawazim tabilmadi", 404);
        }
    }
}
