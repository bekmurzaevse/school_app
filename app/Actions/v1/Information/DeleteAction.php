<?php

namespace App\Actions\v1\Information;

use App\Exceptions\ApiResponseException;
use App\Models\Information;
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
            $information = Information::findOrFail($id);
            $information->delete();

            return static::toResponse(
                message: "$id - Information deleted!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - Information not found", 404);
        }
    }
}
