<?php

namespace App\Actions\v1\Positions;

use App\Http\Resources\v1\Position\PositionCollection;
use App\Models\Position;
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
        $key = 'positions:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $positions = Cache::remember($key, now()->addDay(), function () {
            return Position::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'Position list',
            data: [
                'items' => new PositionCollection($positions),
                'pagination' => [
                    'current_page' => $positions->currentPage(),
                    'per_page' => $positions->perPage(),
                    'last_page' => $positions->lastPage(),
                    'total' => $positions->total(),
                ],
            ]
        );
    }
}
