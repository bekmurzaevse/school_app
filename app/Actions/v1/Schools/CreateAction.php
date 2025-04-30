<?php

namespace App\Actions\v1\Schools;

use App\Dto\v1\Schools\CreateDto;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'history' => $dto->history,
            'phone' => $dto->phone,
            'location' => $dto->location,
            'description' => $dto->description,
        ];

        School::create($data);

        return static::toResponse(
            message: "School created"
        );
    }
}
