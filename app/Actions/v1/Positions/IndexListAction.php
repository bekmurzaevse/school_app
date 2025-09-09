<?php

namespace App\Actions\v1\Positions;

use App\Http\Resources\v1\Position\PositionCollection;
use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexListAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'positions:list' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $positions = Cache::remember($key, now()->addDay(), function () {
            return Position::all()->map(function ($position) {
                return [
                    'id' => $position->id,
                    'name' => $position->getTranslation('name', app()->getLocale()),
                ];
            });
        });

        return static::toResponse(
            message: 'Position list all',
            data: $positions->toArray(),
        );
    }
}