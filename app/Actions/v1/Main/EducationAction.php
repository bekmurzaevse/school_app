<?php

namespace App\Actions\v1\Main;

use App\Http\Resources\v1\Main\EducationResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class EducationAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'education:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $about = Cache::remember($key, now()->addDay(), function () {
            return School::with(['clubs', 'clubs.photo'])->first();
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new EducationResource($about)
        );
    }
}