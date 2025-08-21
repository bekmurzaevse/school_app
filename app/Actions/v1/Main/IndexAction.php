<?php

namespace App\Actions\v1\Main;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Main\IndexResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try{
            $key = 'schools:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $school = Cache::remember($key, now()->addDay(), function () {
                return School::with('positions.employees')->firstOrFail();
            });

            return static::toResponse(
                message: "Home Page",
                data: new IndexResource($school)
            );
        } catch(ModelNotFoundException $ex){
            throw new ApiResponseException("Not Found", 404);
        }
    }
}
