<?php

namespace App\Actions\v1\Schedule;

use App\Http\Resources\v1\Schedule\ScheduleCollection;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $key = 'schedules:' . app()->getLocale() . ':' . md5($request->fullUrl());

        $collection = Cache::remember($key, now()->addDay(), function () {
            $school = School::first();
            return $school->schedules()->get(); 
        });

        $page = $request->input('page', 1);
        $perPage = 10;
        $items = $collection->forPage($page, $perPage)->values();

        $paginator = new LengthAwarePaginator(
            $items,
            $collection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return static::toResponse(
            message: 'Sabaq kesteleri',
            data: new ScheduleCollection($paginator)
        );
    }
}
