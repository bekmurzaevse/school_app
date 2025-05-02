<?php

namespace App\Actions\v1\Employee;

use App\Dto\v1\Employee\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\Employee\EmployeeResource;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto)
    {
        try {
            $employee = Employee::with(['position', 'photo'])->findOrFail($id);
            $employee->update([
                'full_name' => $dto->fullName,
                'phone' => $dto->phone,
                'photo_id' => $dto->photoId,
                'position_id' => $dto->positionId,
                'birth_date' => $dto->birthDate,
            ]);

            return static::toResponse(
                message: 'Employee Updated',
                data: new EmployeeResource($employee)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Employee Not Found', 404);
        }
    }

}
