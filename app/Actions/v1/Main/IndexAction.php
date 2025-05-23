<?php 

namespace App\Actions\v1\Main;

use App\Models\Employee;
use App\Traits\ResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class IndexAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        $today = Carbon::now();
        $users = Employee::whereMonth('birth_date', $today->month)
             ->whereDay('birth_date', $today->day)
             ->get();
        return static::toResponse(
            message: empty($users) ? "Tuwilg'an ku'n iyelerin bu'gingi tuwilg'an ku'nleri menen qutliqlaymiz!!!" : "Bu'gin tuwilg'an ku'nler joq!",
            data: $users ?? null,
        );
    }
}