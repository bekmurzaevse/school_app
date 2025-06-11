<?php

namespace App\Dto\v1\User;

use App\Http\Requests\v1\User\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $fullName,
        public string $username,
        public string $password,
        public ?array $description,
        public string $phone,
        public string $birthDate,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\User\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            fullName: $request->get('full_name'),
            username: $request->get('username'),
            password: $request->get('password'),
            description: $request->get('description'),
            phone: $request->get('phone'),
            birthDate: $request->get('birth_date'),
        );
    }
}
