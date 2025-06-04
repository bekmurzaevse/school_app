<?php

namespace App\Actions\v1\User;

use App\Dto\v1\User\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\User\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\User\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'full_name' => $dto->fullName,
                'username' => $dto->username,
                'password' => $dto->password,
                'description' => $dto->description,
                'phone' => $dto->phone,
                'school_id' => $dto->schoolId,
                'birth_date' => $dto->birthDate,
            ]);

            return static::toResponse(
                message: "User jan'alandi!",
                data: new UserResource($user)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li user bazada tabilmadi!", 404);
        }
    }
}
