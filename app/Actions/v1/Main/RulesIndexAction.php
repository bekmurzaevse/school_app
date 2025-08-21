<?php

namespace App\Actions\v1\Main;

use App\Http\Resources\v1\Main\RulesIndexResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class RulesIndexAction
{
    use ResponseTrait;



    public function __invoke(): JsonResponse
    {
        $school = School::firstOrFail();

        return static::toResponse(
                message: "Rules and Documents",
                data: new RulesIndexResource($school)
            );
        // try{
        //     $key = 'schools:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        //     $school = Cache::remember($key, now()->addDay(), function () use () {
        //         return School::firstOrFail();
        //     });
        //     dd("test");

        //     return static::toResponse(
        //         message: "School by id",
        //         data: new IndexResource($school)
        //     );
        // } catch(ModelNotFoundException $ex){
        //     throw new ApiResponseException("id li mektep tabilmadi", 404);
        // }
    }
}
