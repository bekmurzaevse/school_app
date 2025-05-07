<?php

namespace App\Dto\v1\User;

use App\Http\Requests\v1\User\LoginRequest;

readonly class LoginDto
{
    public function __construct(
        public string $phone,
        public string $password
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\User\LoginRequest $request
     * @return LoginDto
     */
    public static function from(LoginRequest $request): self
    {
        return new self(
            phone: $request->get('phone'),
            password: $request->get('password')
        );
    }
}