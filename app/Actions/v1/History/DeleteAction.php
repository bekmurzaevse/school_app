<?php

namespace App\Actions\v1\History;

use App\Exceptions\ApiResponseException;
use App\Models\History;
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
            $history = History::findOrFail($id);
            $history->delete();

            return static::toResponse(
                message: "$id - History deleted!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - History not found", 404);
        }
    }
}