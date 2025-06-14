<?php

namespace App\Actions\v1\Target;

use App\Exceptions\ApiResponseException;
use App\Models\Target;
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
        try {
            $target = Target::findOrFail($id);
            $target->delete();

            return static::toResponse(
                message: "$id - Target deleted!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Target not found", 404);
        }
    }
}