<?php

namespace App\Actions\v1\Main;

use App\Http\Resources\v1\Main\EmployeeBirthDateResource;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ListAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $key = 'employees:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $employees = Cache::remember($key, now()->addDay(), function () {
            return Employee::paginate(10);
        });

        return static::toResponse(
            message: "list",
            data: EmployeeBirthDateResource::collection($employees),
        );
    }

}
