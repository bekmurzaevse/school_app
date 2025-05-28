<?php

namespace App\Actions\v1\Target;

use App\Dto\v1\Target\CreateDto;
use App\Models\School;
use App\Models\Target;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction 
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'school_id' => School::first()->id,
            'description' => $dto->description,
        ];

        Target::create($data);

        return static::toResponse(
            message: "Target created!"
        );
    }
}