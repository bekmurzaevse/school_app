<?php

namespace App\Actions\v1\User;

use App\Dto\v1\User\CreateDto;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    public function __invoke(CreateDto $dto): JsonResponse
    {

        $data = [
            'full_name' => $dto->fullName,
            'username' => $dto->username,
            'password' => $dto->password,
            'phone' => $dto->phone,
            'description' => $dto->description,
            'school_id' => $dto->schoolId,
            'birth_date' => $dto->birthDate,
        ];

        $user = User::create($data);
        $user->assignRole('admin');

        return static::toResponse(
            message: "User created"
        );
    }
}
