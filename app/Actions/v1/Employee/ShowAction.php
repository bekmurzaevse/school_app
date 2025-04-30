<?php

namespace App\Actions\v1\Employee;

use App\Exceptions\ApiResponseException;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ShowAction
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
            $key = 'employees:show:' . app()->getLocale() . ':' . md5(request()->fullUrl());
            $employee = Cache::remember($key, now()->addDay(), function () use ($id) {
                return Employee::with(['position', 'photo'])->findOrFail($id);
            });

            return static::toResponse(
                message: 'Successfully received',
                data: $employee
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('Employee Not Found', 404);
        }
    }
}