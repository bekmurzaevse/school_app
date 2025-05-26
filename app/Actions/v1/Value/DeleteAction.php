<?php

namespace App\Actions\v1\Value;

use App\Exceptions\ApiResponseException;
use App\Models\Value;
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
            $rule = Value::findOrFail($id);
            $rule->delete();

            return static::toResponse(
                message: 'Value Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Value Not Found', 404);
        }
    }
}