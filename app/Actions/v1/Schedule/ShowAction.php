<?php

namespace App\Actions\v1\Schedule;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Schedule\ScheduleResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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
            $key = 'schedules:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $schedule = Cache::remember($key, now()->addDay(), function () use ($id) {
                $school = School::first();
                return $school->schedules()->findOrFail($id);
            });

            if ($schedule->path && !Storage::disk('public')->exists($schedule->path)) {
                throw new ApiResponseException('Schedule Not Found', 404);
            }

            return static::toResponse(
                message: 'Successfully received',
                data: new ScheduleResource($schedule),
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Schedule tabilmadi', 404);
        }
    }
}