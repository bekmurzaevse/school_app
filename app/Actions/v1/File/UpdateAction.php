<?php

namespace App\Actions\v1\File;

use App\Dto\v1\File\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\File;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $file = File::findOrFail($id);
            $file->update([
                'name' => $dto->name,
                'description' => $dto->description,
                'event_id' => $dto->eventId,
                'path' => $dto->path,
            ]);

            return static::toResponse(
                message: "$id - id li fayl jan'alandi",
                data: $file
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li fayl tabilmadi", 404);
        }
    }
}