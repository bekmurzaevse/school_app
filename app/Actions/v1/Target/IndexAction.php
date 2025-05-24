<?php

namespace App\Actions\v1\Target;

use App\Http\Resources\v1\Target\TargetCollection;
use App\Models\Target;
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
        $key = 'targets:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $targets = Cache::remember($key, now()->addDay(), function () {
            return Target::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'Target list',
            data: new TargetCollection($targets)
        );
    }
}