<?php

namespace App\Actions\v1\History;

use App\Dto\v1\History\CreateDto;
use App\Models\History;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'year' => $dto->year,
            'school_id' => School::first()->id,
            'text' => $dto->text,
        ];

        History::create($data);

        return static::toResponse(
            message: "History created!"
        );
    }
}