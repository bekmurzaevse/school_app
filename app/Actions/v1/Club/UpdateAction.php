<?php

namespace App\Actions\v1\Club;

use App\Dto\v1\Club\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Club\ClubResource;
use App\Models\Club;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $club = Club::with(['school', 'photo'])->findOrFail($id);
            $club->update([
                'name' => $dto->name,
                'text' => $dto->text,
                'schedule' => $dto->schedule,
                'photo_id' => $dto->photoId,
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
