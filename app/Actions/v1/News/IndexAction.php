<?php

namespace App\Actions\v1\News;

use App\Http\Resources\v1\News\NewsCollection;
use App\Models\News;
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
        $key = 'news:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $news = Cache::remember($key, now()->addDay(), function () {
            return News::with(['author', 'coverImage'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: [
                'items' => new NewsCollection($news),
                'pagination' => [
                    'current_page' => $news->currentPage(),
                    'per_page' => $news->perPage(),
                    'last_page' => $news->lastPage(),
                    'total' => $news->total(),
                ],
            ]
        );
    }
}