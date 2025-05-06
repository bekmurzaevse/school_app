<?php

namespace App\Actions\v1\File;

use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\File\FileResource;
use App\Models\File;
use App\Traits\ResponseTrait;
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
        $key = 'files:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());

        $file = Cache::remember($key, now()->addDay(), function () use ($id) {
            return File::with(['event'])->find($id);
        });

        if (!$file || !Storage::disk('public')->exists($file->path)) {
            throw new ApiResponseException('File Not Found', 404);
        }

        return static::toResponse(
            message: 'Successfully received',
            data: new FileResource($file)
        );
    }
}