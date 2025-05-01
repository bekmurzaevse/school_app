<?php

namespace App\Actions\v1\Positions;

use App\Dto\v1\Positions\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $position = Position::findOrFail($id);
            $position->update([
                'name' => $dto->name,
                'school_id' => $dto->schoolId,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Lawazim jan'alandi!",
                data: $position
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li lawazim bazada tabilmadi!", 404);
        }
    }
}
