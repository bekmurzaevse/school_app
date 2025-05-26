<?php

namespace App\Actions\v1\Value;

use App\Http\Resources\v1\Value\ValueCollection;
use App\Models\Value;
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
        $key = 'values:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $values = Cache::remember($key, now()->addDay(), function () {
            return Value::with(['school', 'photo'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new ValueCollection($values)
        );
    }
}