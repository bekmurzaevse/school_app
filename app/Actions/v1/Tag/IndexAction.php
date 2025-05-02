<?php

namespace App\Actions\v1\Tag;

use App\Http\Resources\v1\Tag\TagCollection;
use App\Models\Tag;
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
        $key = 'tag:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $tag = Cache::remember($key, now()->addDay(), function () {
            return Tag::paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: [
                'items' => new TagCollection($tag),
                'pagination' => [
                    'current_page' => $tag->currentPage(),
                    'per_page' => $tag->perPage(),
                    'last_page' => $tag->lastPage(),
                    'total' => $tag->total(),
                ],
            ]
        );
    }
}