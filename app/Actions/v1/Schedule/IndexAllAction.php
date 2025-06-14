<?php

namespace App\Actions\v1\Schedule;

use App\Http\Resources\v1\Schedule\ScheduleCollection;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAllAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'schedules:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $schedules = Cache::remember($key, now()->addDay(), function () {
            $school = School::first();
            return $school->schedules()->paginate(10);
        });

        return static::toResponse(
            message: 'Sabaq kesteleri',
            data: new ScheduleCollection($schedules)
        );
    }
}
