<?php

namespace App\Actions\v1\User;

use App\Http\Resources\v1\User\UserResource;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ProfileAction
{
    use ResponseTrait;

    public function __invoke(): JsonResponse
    {
        return static::toResponse(
            message: 'User profile retrieved successfully',
            data: new UserResource(auth()->user()),
        );
    }
}
