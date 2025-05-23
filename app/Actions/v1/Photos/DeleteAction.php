<?php

namespace App\Actions\v1\Photos;

use App\Exceptions\ApiResponseException;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class DeleteAction
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
            $photo = Photo::findOrFail($id);
            Storage::disk('public')->delete($photo->path);
            $photo->delete();

            return static::toResponse(
                message: "$id - id li photo o'shirildi!",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li photo bazada tabilmadi!", 404);
        }
    }
}
