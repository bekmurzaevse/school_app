<?php

namespace App\Actions\v1\SchoolHour;

use App\Dto\v1\SchoolHour\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\SchoolHour\SchoolHourResource;
use App\Models\SchoolHour;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\SchoolHour\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $schoolHour = SchoolHour::findOrFail($id);
            $schoolHour->update([
                'school_id' => $dto->schoolId,
                'title' => $dto->title,
                'workday' => $dto->workday,
                'holiday' => $dto->holiday
            ]);

            return static::toResponse(
                message: "SchoolHour updated!",
                data: new SchoolHourResource($schoolHour)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - SchoolHour not found!", 404);
        }
    }
}
