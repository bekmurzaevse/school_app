<?php

namespace App\Actions\v1\History;

use App\Dto\v1\History\CreateDto;
use App\Models\History;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => $dto->schoolId,
            'year' => $dto->year,
            'text' => $dto->text,
        ];

        History::create($data);

        return static::toResponse(
            message: "History created!"
        );
    }
}