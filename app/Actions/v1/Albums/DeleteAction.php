<?php

namespace App\Actions\v1\Albums;

use App\Exceptions\ApiResponseException;
use App\Models\Album;
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
            $album = Album::findOrFail($id);
            foreach ($album->photos as $photo) {
                if (Storage::disk('public')->exists($photo->path)) {
                    Storage::disk('public')->delete($photo->path);
                }
            }
            $album->photos()->delete();
            $album->delete();

            return static::toResponse(
                message: "$id - id li albom o'shirildi!",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li albom bazada tabilmadi!", 404);
        }
    }
}
