<?php

namespace App\Actions\v1\Schools;

use App\Dto\v1\Schools\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto)
    {
        try {
            $school = School::findOrFail($id);
            $school->update([
                'name' => $dto->name ?? $school->name,
                'history' => $dto->history ?? $school->history,
                'phone' => $dto->phone ?? $school->phone,
                'location' => $dto->location ?? $school->location,
                'description' => $dto->description ?? $school->description,
            ]);

            return static::toResponse(
                message: "Mektep jan'alandi!",
                data: $school
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li mektep bazada tabilmadi!", 404);
        }
    }

}
