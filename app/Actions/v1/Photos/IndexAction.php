<?php

namespace App\Actions\v1\Photos;

use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $photos = Photo::where('album_id', 1)->get();

        return static::toResponse(
            message: "1 Mektep photo dizimi",
            data: $photos
        );
    }
}
