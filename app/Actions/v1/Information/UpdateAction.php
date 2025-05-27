<?php

namespace App\Actions\v1\Information;

use App\Dto\v1\Information\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Information\InformationResource;
use App\Models\Information;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Information\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $information = Information::with('school')->findOrFail($id);
            $information->update([
                'school_id' => $dto->schoolId,
                'title' => $dto->title,
                'count' => $dto->count,
                'description' => $dto->description
            ]);

            return static::toResponse(
                message: "Information updated!",
                data: new InformationResource($information)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Information not found!", 404);
        }
    }
}
