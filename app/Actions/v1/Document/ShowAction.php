<?php

namespace App\Actions\v1\Document;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Document\DocumentResource;
use App\Models\Attachment;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

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
            $key = 'document:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

            $doc = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Attachment::where('type', 'document')
                    ->where('id', $id)
                    ->firstOrFail();
            });

            if (!$doc || !Storage::disk('public')->exists($doc->path)) {
                throw new ApiResponseException('Document Not Found', 404);
            }

            return static::toResponse(
                message: 'Successfully received',
                data: new DocumentResource($doc)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Document Not Found', 404);
        }
    }
}