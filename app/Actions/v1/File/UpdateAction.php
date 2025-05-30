<?php

namespace App\Actions\v1\File;

use App\Dto\v1\File\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\File\FileResource;
use App\Models\File;
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
     * @param \App\Dto\v1\File\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $file = File::findOrFail($id);

            $uploadedFile = $dto->file;
            $oldPath = $file->path;

            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }

            $originalName = $uploadedFile->getClientOriginalName();

            $newFileName = pathinfo($originalName, PATHINFO_FILENAME);

            $newFileName = $newFileName . '_' . Str::random(10) . '_' . now()->format('Y-m-d-H-i-s') . '.' . $uploadedFile->extension();

            $newPath = Storage::disk('public')->putFileAs('files', $uploadedFile, $newFileName);

            $file->update([
                'name' => $dto->name,
                'description' => $dto->description,
                'event_id' => $dto->eventId,
                'path' => $newPath,
            ]);

            return static::toResponse(
                message: 'File Updated',
                data: new FileResource($file)
            );

        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('File Not Found', 404);
        }
    }
}