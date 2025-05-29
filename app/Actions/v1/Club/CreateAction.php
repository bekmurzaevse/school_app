<?php

namespace App\Actions\v1\Club;

use App\Dto\v1\Club\CreateDto;
use App\Models\Club;
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
            'text' => $dto->text,
            'schedule' => $dto->schedule,
            'school_id' => School::first()->id,
            'photo_id' => $dto->photoId,
        ];

        Club::create($data);

        return static::toResponse(
            message: 'Club created'
        );
    }
}
