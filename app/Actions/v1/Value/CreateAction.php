<?php

namespace App\Actions\v1\Value;

use App\Dto\v1\Value\CreateDto;
use App\Models\Value;
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
            'photo_id' => $dto->photoId,
            'text' => $dto->text,
        ];

        Value::create($data);

        return static::toResponse(
            message: 'Value created'
        );
    }
}
