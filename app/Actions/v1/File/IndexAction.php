<?php

namespace App\Actions\v1\File;

use App\Models\File;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        $files = File::with('event')->get();

        return static::toResponse(
            message: "Barliq fayllar dizimi",
            data: $files
        );
    }
}