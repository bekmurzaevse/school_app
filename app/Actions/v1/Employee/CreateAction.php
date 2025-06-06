<?php

namespace App\Actions\v1\Employee;

use App\Dto\v1\Employee\CreateDto;
use App\Helpers\FileUploadHelper;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;

class CreateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Employee\CreateDto $dto
     * @return JsonResponse
     */
    public function __invoke(CreateDto $dto): JsonResponse
    {
        $data = [
            'full_name' => $dto->fullName,
            'phone' => $dto->phone,
            'position_id' => $dto->positionId,
            'email' => $dto->email,
            'birth_date' => $dto->birthDate,
            'description' => $dto->description ?? null,
        ];

        $employee = Employee::create($data);
        $photo = $dto->photo;
        $path = FileUploadHelper::file($photo, 'photos');

        $employee->photo()->create([
            'name' => $photo->getClientOriginalName(),
            'path' => $path,
            'type' => "photo",
            'size' => $photo->getSize(),
        ]);

        return static::toResponse(
            message: 'Employee created'
        );
    }
}
