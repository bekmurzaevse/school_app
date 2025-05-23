<?php

namespace App\Actions\v1\Faq;

use App\Dto\v1\Faq\CreateDto;
use App\Models\Faq;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Faq\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => $dto->schoolId,
            'question' => $dto->question,
            'answer' => $dto->answer,
        ];

        Faq::create($data);

        return static::toResponse(
            message: "FAQ created!"
        );
    }
}
