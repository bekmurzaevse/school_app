<?php

namespace App\Actions\v1\File;

use App\Exceptions\ApiResponseException;
use App\Models\File;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class ShowAction
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
            $file = File::findOrFail($id);

            return static::toResponse(
                message: "$id - id li fayl",
                data: $file
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - id li fayl tabilmadi", 404);
        }
    }
}