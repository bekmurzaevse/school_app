<?php

namespace App\Actions\v1\SchoolHour;

use App\Dto\v1\SchoolHour\CreateDto;
use App\Models\School;
use App\Models\SchoolHour;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\SchoolHour\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => School::first()->id,
            'title' => $dto->title,
            'workday' => $dto->workday,
            'holiday' => $dto->holiday,
        ];

        SchoolHour::create($data);

        return static::toResponse(
            message: "SchoolHour created!"
        );
    }
}
