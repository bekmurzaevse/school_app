<?php

namespace App\Actions\v1\Albums;

use App\Dto\v1\Albums\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\Album\AlbumResource;
use App\Models\Album;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Albums\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $album = Album::with(['school', 'photos'])->findOrFail($id);
            $album->update([
                'title' => $dto->title,
                'description' => $dto->description
            ]);

            if ($dto->photos) {
                $existingPhotoNames = $album->photos->pluck('name')->toArray();

                foreach ($dto->photos as $photo) {
                    $originalName = $photo->getClientOriginalName();

                    if (in_array($originalName, $existingPhotoNames)) {
                        continue;
                    }

                    $path = FileUploadHelper::file($photo, 'photos');

                    $album->photos()->create([
                        'name' => $originalName,
                        'path' => $path,
                        'type' => 'photo',
                        'size' => $photo->getSize(),
                    ]);
                }
            }

            return static::toResponse(
                message: "ALbom jan'alandi!",
                data: new AlbumResource($album)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li albom bazada tabilmadi!", 404);
        }
    }
}
