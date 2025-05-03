<?php

namespace App\Actions\V1\Schools;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\School\SchoolResource;
use App\Models\School;
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
        try{
            $key = 'schools:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $school = Cache::remember($key, now()->addDay(), function () use ($id) {
                return School::findOrFail($id);
            });

            return static::toResponse(
                message: "School by id",
                data: new SchoolResource($school)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("$id - id li mektep tabilmadi", 404);
        }
    }
}
