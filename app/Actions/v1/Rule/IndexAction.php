<?php

namespace App\Actions\v1\Rule;

use App\Http\Resources\v1\Rule\RuleCollection;
use App\Models\Rule;
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
        $key = 'rules:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $rules = Cache::remember($key, now()->addDay(), function () {
            return Rule::with(['school'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new RuleCollection($rules)
        );
    }
}