<?php

namespace App\Actions\v1\Main;

use App\Http\Resources\v1\Main\ScheduleResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ScheduleAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'schedule:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $about = Cache::remember($key, now()->addDay(), function () {
            return School::with(['schedules'])->first();
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new ScheduleResource($about)
        );
    }
}