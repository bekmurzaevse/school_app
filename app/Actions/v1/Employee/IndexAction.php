<?php

namespace App\Actions\v1\Employee;

use App\Http\Resources\v1\Employee\EmployeeCollection;
use App\Models\Employee;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAction
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
            return Employee::with(['position', 'photo'])->paginate(10);
        });

        return static::toResponse(
            message: 'Successfully received',
            data: [
                'items' => new EmployeeCollection($employees),
                'pagination' => [
                    'current_page' => $employees->currentPage(),
                    'per_page' => $employees->perPage(),
                    'last_page' => $employees->lastPage(),
                    'total' => $employees->total(),
                ],
            ]
        );
    }
}