<?php

namespace App\Actions\v1\Main;

use App\Dto\v1\Main\AddDto;
use App\Exceptions\ApiResponseException;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class AddAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @param \App\Dto\v1\Main\AddDto $dto
     * @throws \App\Exceptions\ApiResponseException
     * @return JsonResponse
     */
    public function __invoke(AddDto $dto): JsonResponse
    {
        try {
            $key = 'congratulation:employee:' . $dto->employeeId . ':' . md5(request()->fullUrl());
            $employee = Cache::remember($key, now()->addDay(), function () use ($dto) {
                return Employee::findOrFail($dto->employeeId);
            });

            return static::toResponse(
                message: $dto->text,
                data: $employee
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException("$dto->employeeId - id li employee tabilmadi!", 404);
        }
    }
}
