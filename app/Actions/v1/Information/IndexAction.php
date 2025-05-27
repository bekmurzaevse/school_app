<?php

namespace App\Actions\v1\Information;

use App\Http\Resources\v1\Information\InformationCollection;
use App\Models\Information;
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
        $key = 'informations:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $informations = Cache::remember($key, now()->addDay(), function () {
            return Information::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'Information list',
            data: new InformationCollection($informations)
        );
    }
}
