<?php

namespace App\Actions\v1\Rule;

use App\Exceptions\ApiResponseException;
use App\Models\Rule;
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
            $rule = Rule::findOrFail($id);
            $rule->delete();

            return static::toResponse(
                message: 'Rule Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Rule Not Found', 404);
        }
    }
}