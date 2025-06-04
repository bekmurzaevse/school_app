<?php

namespace App\Actions\v1\Vacancy;

use App\Dto\v1\Vacancy\CreateDto;
use App\Models\School;
use App\Models\Vacancy;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Vacancy\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'title' => $dto->title,
            'school_id' => School::first()->id,
            'content' => $dto->content,
            'salary' => $dto->salary,
        ];

        Vacancy::create($data);

        return static::toResponse(
            message: "Vacancy created!"
        );
    }
}
