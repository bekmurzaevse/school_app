<?php

namespace App\Actions\v1\File;

use App\Http\Resources\v1\File\FileCollection;
use App\Models\File;
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
        $key = 'files:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $file = Cache::remember($key, now()->addDay(), function () {
            return File::with(['event'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: new FileCollection($file),
        );
    }
}