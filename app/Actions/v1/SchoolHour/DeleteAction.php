<?php

namespace App\Actions\v1\SchoolHour;

use App\Exceptions\ApiResponseException;
use App\Models\SchoolHour;
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
            $schoolHour = SchoolHour::findOrFail($id);
            $schoolHour->delete();

            return static::toResponse(
                message: "$id - SchoolHour deleted!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - SchoolHour not found", 404);
        }
    }
}
