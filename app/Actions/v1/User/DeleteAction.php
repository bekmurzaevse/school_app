<?php

namespace App\Actions\v1\User;

use App\Exceptions\ApiResponseException;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        if (app()->environment('local') && $id === 1) {
            throw new ApiResponseException('This user cannot be deleted in local environment.', 403);
        }

        try {
            $user = User::findOrFail($id);
            $user->delete();

            return static::toResponse(
                message: "$id - id li user o'shirildi!",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li user bazada tabilmadi!", 404);
        }
    }
}
