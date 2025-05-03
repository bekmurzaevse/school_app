<?php

namespace App\Actions\v1\Photos;

use App\Http\Resources\v1\Photo\PhotoCollection;
use App\Models\Photo;
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
        $key = 'photos:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $photos = Cache::remember($key, now()->addDay(), function () {
            return Photo::with('album')->paginate(10);
        });

        return static::toResponse(
            message: 'Photolar dizimi',
            data: [
                'items' => new PhotoCollection($photos),
                'pagination' => [
                    'current_page' => $photos->currentPage(),
                    'per_page' => $photos->perPage(),
                    'last_page' => $photos->lastPage(),
                    'total' => $photos->total(),
                ],
            ]
        );
    }
}
