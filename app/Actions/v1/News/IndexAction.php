<?php

namespace App\Actions\v1\News;

use App\Dto\v1\News\IndexDto;
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
    public function __invoke(IndexDto $indexDto): JsonResponse
    {
        $key = 'news:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $news = Cache::remember($key, now()->addDay(), function () use ($indexDto) {
            $items = News::query()->with(['author', 'coverImage']);

            if ($indexDto->search) {
                $items->where('title', 'like', '%' . $indexDto->search . '%')
                    ->orWhere('short_content', 'like', '%' . $indexDto->search . '%')
                    ->orWhere('content', 'like', '%' . $indexDto->search . '%');
            }

            if ($indexDto->fromDate) {
                $items->whereDate('created_at', '>=', $indexDto->fromDate);
            }
            if ($indexDto->toDate) {
                $items->whereDate('created_at', '<=', $indexDto->toDate);
            }

            if ($indexDto->tags) {
                $tags = $indexDto->tags;
                $items->whereHas('tags', function ($query) use ($tags) {
                    $query->whereIn('tags.id', $tags);
                });
            }

            if ($indexDto->sortBy && $indexDto->sortOrder) {
                $items->orderBy($indexDto->sortBy, $indexDto->sortOrder);
            } else {
                $items->latest();
            }

            return $items->paginate(perPage: $indexDto->perPage ?? 15, page: $indexDto->page ?? 1);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new NewsCollection($news)
        );
    }
}