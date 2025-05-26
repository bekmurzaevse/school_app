<?php

namespace App\Actions\v1\Club;

use App\Dto\v1\Club\CreateDto;
use App\Models\Club;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'name' => $dto->name,
            'school_id' => $dto->schoolId,
            'text' => $dto->text,
            'schedule' => $dto->schedule,
            'photo_id' => $dto->photoId,
        ];

        Club::create($data);

        return static::toResponse(
            message: 'Club created'
        );
    }
}
