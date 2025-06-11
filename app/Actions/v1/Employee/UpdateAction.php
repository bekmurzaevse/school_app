<?php

namespace App\Actions\v1\Employee;

use App\Dto\v1\Employee\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Helpers\FileUploadHelper;
use App\Http\Resources\v1\Employee\EmployeeResource;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UpdateAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @param \App\Dto\v1\Employee\UpdateDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $employee = Employee::with(['position', 'photo'])->findOrFail($id);
            $employee->update([
                'full_name' => $dto->fullName,
                'phone' => $dto->phone,
                'position_id' => $dto->positionId,
                'birth_date' => $dto->birthDate,
            ]);

            if (Storage::disk('public')->exists($employee->photo->path)) {
                Storage::disk('public')->delete($employee->photo->path);
            }

            $path = FileUploadHelper::file($dto->photo, 'photos');

            $employee->photo()->update([
                'name' => $dto->photo->getClientOriginalName(),
                'path' => $path,
                'type' => "photo",
                'size' => $dto->photo->getSize(),
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
