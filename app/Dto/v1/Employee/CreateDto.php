<?php

namespace App\Dto\v1\Employee;

use App\Http\Requests\v1\Employee\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $fullName,
        public string $phone,
        public string $password,
        public int $photoId,
        public string $email,
        public int $positionId,
        public string $birthDate,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Employee\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            fullName: $request->get('full_name'),
            phone: $request->get('phone'),
            password: $request->get('password'),
            photoId: $request->get('photo_id'),
            email: $request->get('email'),
            positionId: $request->get('position_id'),
            birthDate: $request->get('birth_date')
        );
    }
}
