<?php

namespace App\Actions\v1\Schools;

use App\Http\Resources\v1\School\SchoolCollection;
use App\Models\School;
use App\Traits\ResponseTrait;
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
        $schools = School::all();

        $key = 'schools:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $schools = Cache::remember($key, now()->addDay(), function () {
            return School::paginate(10);
        });

        return static::toResponse(
            message: 'School list',
            data: new SchoolCollection($schools)
        );
    }
}
