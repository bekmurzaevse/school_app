<?php

namespace App\Actions\v1\Target;

use App\Dto\v1\Target\CreateDto;
use App\Models\Target;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction 
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => $dto->schoolId,
            'name' => $dto->name,
            'description' => $dto->description,
        ];

        Target::create($data);

        return static::toResponse(
            message: "Target created!"
        );
    }
}