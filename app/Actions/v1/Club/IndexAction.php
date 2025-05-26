<?php

namespace App\Actions\v1\Club;

use App\Http\Resources\v1\Club\ClubCollection;
use App\Models\Club;
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
        $key = 'clubs:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $clubs = Cache::remember($key, now()->addDay(), function () {
            return Club::with(['school', 'photo'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new ClubCollection($clubs)
        );
    }
}