<?php

namespace App\Actions\v1\Schools;

use App\Dto\v1\Schools\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\School\SchoolResource;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Schools\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto)
    {
        try {
            $school = School::findOrFail($id);
            $school->update([
                'name' => $dto->name ?? $school->name,
                'history' => $dto->history ?? $school->history,
                'phone' => $dto->phone ?? $school->phone,
                'email' => $dto->email ?? $school->email,
                'location' => $dto->location ?? $school->location,
                'description' => $dto->description ?? $school->description,
            ]);

            return static::toResponse(
                message: "Mektep jan'alandi!",
                data: new SchoolResource($school)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li mektep bazada tabilmadi!", 404);
        }
    }
}
