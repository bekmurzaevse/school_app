<?php

namespace App\Actions\v1\Faq;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Faq\FaqResource;
use App\Models\Faq;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
{
    use ResponseTrait;

    public function __invoke(int $id): JsonResponse
    {
        try {
            $key = 'faqs:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $category = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Faq::findOrFail($id);
            });

            return static::toResponse(
                message: "$id - FAQ",
                data: new FaqResource($category)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - FAQ not found", 404);
        }
    }
}
