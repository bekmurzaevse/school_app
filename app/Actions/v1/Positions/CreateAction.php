<?php

namespace App\Actions\v1\Positions;

use App\Dto\v1\Positions\CreateDto;
use App\Models\Position;
use App\Models\School;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Positions\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'school_id' => School::first()->id,
            'name' => $dto->name,
            'description' => $dto->description
        ];
        Position::create($data);

        return static::toResponse(
            message: "Lawazim jaratildi!"
        );
    }
}
