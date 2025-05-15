<?php

namespace App\Actions\v1\Employee;

use App\Dto\v1\Employee\CreateDto;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'full_name' => $dto->fullName,
            'phone' => $dto->phone,
            'photo_id' => $dto->photoId,
            'position_id' => $dto->positionId,
            'email' => $dto->email,
            'birth_date' => $dto->birthDate,
        ];

        Employee::create($data);

        return static::toResponse(
            message: 'Employee created'
        );
    }
}
