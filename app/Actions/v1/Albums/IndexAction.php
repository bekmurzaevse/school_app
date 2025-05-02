<?php

namespace App\Actions\v1\Albums;

use App\Models\Album;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        $albums = Album::where('school_id', 1)->get();

        return static::toResponse(
            message: "1 Mektep albomlar dizimi",
            data: $albums
        );
    }
}
