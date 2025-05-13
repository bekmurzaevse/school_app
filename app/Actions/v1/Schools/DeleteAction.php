<?php

namespace App\Actions\v1\Schools;

use App\Exceptions\ApiResponseException;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
        try {
            $school = School::findOrFail($id);
            $school->delete();

            return static::toResponse(
                message: "$id - id li Mektep o'shirildi!",
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li mektep bazada tabilmadi!", 404);
        }
    }
}
