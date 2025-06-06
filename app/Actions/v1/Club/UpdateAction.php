<?php

namespace App\Actions\v1\Club;

use App\Dto\v1\Club\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\Club\ClubResource;
use App\Models\Club;
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
     * @param \App\Dto\v1\Club\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $club = Club::with(['school', 'photo'])->findOrFail($id);
            $club->update([
                'name' => $dto->name,
                'text' => $dto->text,
                'schedule' => $dto->schedule,
            ]);

            if (Storage::disk('public')->exists($club->photo->path)) {
                Storage::disk('public')->delete($club->photo->path);
            }

            $path = FileUploadHelper::file($dto->photo, 'photos');

            $club->photo()->update([
                'name' => $dto->photo->getClientOriginalName(),
                'path' => $path,
                'type' => "photo",
                'size' => $dto->photo->getSize(),
            ]);

            return static::toResponse(
                message: 'Club Updated',
                data: new ClubResource($club)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Club Not Found', 404);
        }
    }

}
