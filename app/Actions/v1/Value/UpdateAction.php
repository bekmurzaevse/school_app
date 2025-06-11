<?php

namespace App\Actions\v1\Value;

use App\Dto\v1\Value\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\Value\ValueResource;
use App\Models\Value;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Value\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $value = Value::with(['school', 'photo'])->findOrFail($id);
            $value->update([
                'name' => $dto->name,
                'text' => $dto->text,
            ]);

            if (Storage::disk('public')->exists($value->photo->path)) {
                Storage::disk('public')->delete($value->photo->path);
            }

            $path = FileUploadHelper::file($dto->photo, 'photos');

            $value->photo()->update([
                'name' => $dto->photo->getClientOriginalName(),
                'path' => $path,
                'type' => "photo",
                'size' => $dto->photo->getSize(),
            ]);

            return static::toResponse(
                message: 'Value Updated',
                data: new ValueResource($value)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Value Not Found', 404);
        }
    }
}
