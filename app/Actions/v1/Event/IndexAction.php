<?php

namespace App\Actions\v1\Event;

use App\Models\Event;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;
    
    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $events = Event::where('school_id', 1)->get();

        return static::toResponse(
            message: "1-mektep ta'dbirleri dizimi",
            data: $events
        );
    }
}