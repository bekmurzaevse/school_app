<?php

namespace App\Actions\v1\User;

use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;


class LogoutAction
{
    use ResponseTrait;

    /**
     * Summary of __invoke
     * @return JsonResponse|mixed
     */
    public function __invoke(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();
        auth()->user()->tokens()->where('name', 'refresh token')->delete();

        return response()->json([
            'message' => "You're logout",
        ]);
    }
}
