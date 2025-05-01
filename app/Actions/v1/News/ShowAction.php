<?php

namespace App\Actions\v1\News;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\News\NewsResource;
use App\Models\News;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'news:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $news = Cache::remember($key, now()->addDay(), function () use ($id) {
                return News::with(['author', 'coverImage'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: new NewsResource($news)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('News Not Found', 404);
        }
    }
}