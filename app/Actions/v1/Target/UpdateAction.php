<?php

namespace App\Actions\v1\Target;

use App\Dto\v1\Target\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Target\TargetResource;
use App\Models\Target;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Target\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $target = Target::findOrFail($id);
            $target->update([
                'school_id' => $dto->schoolId,
                'name' => $dto->name,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Target updated!",
                data: new TargetResource($target)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Target not found!", 404);
        }
    }
}