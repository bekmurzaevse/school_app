<?php

namespace App\Actions\v1\Information;

use App\Dto\v1\Information\CreateDto;
use App\Models\Information;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Information\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => School::first()->id,
            'count' => $dto->count,
            'title' => $dto->title,
            'description' => $dto->description ?? null,
        ];

        Information::create($data);

        return static::toResponse(
            message: "Information created!"
        );
    }
}
