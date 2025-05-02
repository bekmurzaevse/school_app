<?php

namespace App\Actions\v1\Photos;

use App\Dto\v1\Photos\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\Photo;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {

            $photo = Photo::findOrFail($id);
            Storage::disk('public')->delete($photo->path);

            $file = $dto->photo;
            $originalFilename = $file->getClientOriginalName();
            $fileName = preg_replace('/\.[^.]+$/', '', $originalFilename);
            $fileName = $fileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H:i:s') . '.' . $file->extension();
            $path = 'photos';
            $savedPath = Storage::disk('public')->putFileAs($path, $file, $fileName);

            $photo->update([
                'title' => $dto->title,
                'path' => $savedPath,
                'school_id' => $dto->albumId,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Photo jan'alandi!",
                data: $photo
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li photo bazada tabilmadi!", 404);
        }
    }
}
