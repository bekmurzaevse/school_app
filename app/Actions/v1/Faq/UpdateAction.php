<?php

namespace App\Actions\v1\Faq;

use App\Dto\v1\Faq\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Faq\FaqResource;
use App\Models\Faq;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Faq\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $faq = Faq::with('school')->findOrFail($id);
            $faq->update([
                'question' => $dto->question,
                'answer' => $dto->answer
            ]);

            return static::toResponse(
                message: "FAQ updated!",
                data: new FaqResource($faq)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$id - FAQ not found!", 404);
        }
    }
}
