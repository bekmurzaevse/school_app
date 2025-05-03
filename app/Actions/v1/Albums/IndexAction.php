<?php

namespace App\Actions\v1\Albums;

use App\Http\Resources\v1\Album\AlbumCollection;
use App\Models\Album;
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
        $key = 'albums:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $albums = Cache::remember($key, now()->addDay(), function () {
            return Album::with('school')->paginate(10);
        });

        return static::toResponse(
            message: 'Albomlar dizimi',
            data: [
                'items' => new AlbumCollection($albums),
                'pagination' => [
                    'current_page' => $albums->currentPage(),
                    'per_page' => $albums->perPage(),
                    'last_page' => $albums->lastPage(),
                    'total' => $albums->total(),
                ],
            ]
        );
    }
}
