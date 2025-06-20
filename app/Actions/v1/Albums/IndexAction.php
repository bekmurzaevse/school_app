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
            return Album::with(['school', 'photos'])->paginate(10);
        });

        return static::toResponse(
            message: 'Albomlar dizimi',
            data: new AlbumCollection($albums)
        );
    }
}
