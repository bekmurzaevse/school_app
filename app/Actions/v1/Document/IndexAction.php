<?php

namespace App\Actions\v1\Document;

use App\Http\Resources\v1\Document\DocumentCollection;
use App\Models\School;
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
        $key = 'documents:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $docs = Cache::remember($key, now()->addDay(), function () {
            return School::firstOrFail()
                ->documents()
                ->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new DocumentCollection($docs),
        );
    }
}