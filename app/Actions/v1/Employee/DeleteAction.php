<?php

namespace App\Actions\v1\Employee;

use App\Exceptions\ApiResponseException;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class DeleteAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param int $id
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        try {
            $school = Employee::findOrFail($id);
            $school->delete();

            return static::toResponse(
                message: 'Employee Deleted',
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Employee Not Found', 404);
        }
    }
}