<?php

namespace App\Actions\v1\Event;

use App\Http\Resources\v1\Event\EventCollection;
use App\Models\Event;
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
        $key = 'events:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $events = Cache::remember($key, now()->addDay(), function () {
            return Event::where('school_id', 1)->paginate(10);
        });

        return static::toResponse(
            message: "1-mektep ta'dbirleri dizimi",
            data: new EventCollection($events)
        );
    }
}