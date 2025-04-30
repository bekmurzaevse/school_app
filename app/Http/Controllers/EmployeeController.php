<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EmployeeController extends Controller
{
    public function index()
    {
        $key = 'employees:' . app()->getLocale() . ':' . md5(request()->fullUrl());
        $data = Cache::remember($key, now()->addDay(), function () {
            return Employee::with(['position', 'photo'])->get();
        });

        return response()->json([
            'message' => 'Successfully received',
            'data' => EmployeeResource::collection($data)
        ]);
    }
}
