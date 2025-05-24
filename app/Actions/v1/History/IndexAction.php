<?php

namespace App\Actions\v1\History;

use App\Http\Resources\v1\History\HistoryCollection;
use App\Models\History;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'histories:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $histories = Cache::remember($key, now()->addDay(), function () {
            return History::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'History list',
            data: new HistoryCollection($histories)
        );
    }
}