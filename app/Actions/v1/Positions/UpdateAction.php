<?php

namespace App\Actions\v1\Positions;

use App\Dto\v1\Positions\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Position\PositionResource;
use App\Models\Position;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Positions\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $position = Position::with('school')->findOrFail($id);
            $position->update([
                'name' => $dto->name,
                'school_id' => $dto->schoolId,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Lawazim jan'alandi!",
                data: new PositionResource($position)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li lawazim bazada tabilmadi!", 404);
        }
    }
}
