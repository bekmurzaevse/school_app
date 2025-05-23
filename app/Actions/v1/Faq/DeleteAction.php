<?php

namespace App\Actions\v1\Faq;

use App\Exceptions\ApiResponseException;
use App\Models\Faq;
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
            $faq = Faq::findOrFail($id);
            $faq->delete();

            return static::toResponse(
                message: "$id - FAQ deleted!"
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - FAQ not found", 404);
        }
    }
}
