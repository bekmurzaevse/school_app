<?php

namespace App\Actions\v1\SchoolHour;

use App\Http\Resources\v1\SchoolHour\SchoolHourCollection;
use App\Models\SchoolHour;
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
        $key = 'school-hours:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $schoolHour = Cache::remember($key, now()->addDay(), function () {
            return SchoolHour::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'SchoolHour list',
            data: new SchoolHourCollection($schoolHour)
        );
    }
}
