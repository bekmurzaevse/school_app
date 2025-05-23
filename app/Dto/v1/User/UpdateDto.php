<?php

namespace App\Dto\v1\User;

use App\Http\Requests\v1\User\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $fullName,
        public string $username,
        public string $password,
        public ?array $description,
        public string $phone,
        public int $schoolId,
        public string $birthDate,
    ) {
    }

    public static function from(UpdateRequest $request): self
    {
        return new self(
            fullName: $request->get('full_name'),
            username: $request->get('username'),
            password: $request->get('password'),
            description: $request->get('description'),
            phone: $request->get('phone'),
            schoolId: $request->get('school_id'),
            birthDate: $request->get('birth_date'),
        );
    }
}
