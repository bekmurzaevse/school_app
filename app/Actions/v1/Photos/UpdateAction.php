<?php

namespace App\Actions\v1\Photos;

use App\Dto\v1\Photos\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Photo\PhotoResource;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Photos\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $photoModel = Photo::with('album')->findOrFail($id);

            Storage::disk('public')->delete($photoModel->path);

            $uploadedFile = $dto->photo;

            $originalFilename = $uploadedFile->getClientOriginalName();
            $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
            $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H-i-s') . '.' . $uploadedFile->extension();

            $savedPath = Storage::disk('public')->putFileAs('photos', $uploadedFile, $fileName);

            $photoModel->update([
                'title' => $dto->title,
                'path' => $savedPath,
                'school_id' => $dto->albumId,
                'description' => $dto->description,
            ]);

            return static::toResponse(
                message: "Photo jan'alandi!",
                data: new PhotoResource($photoModel)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li photo bazada tabilmadi!", 404);
        }
    }
}
