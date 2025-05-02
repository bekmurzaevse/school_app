<?php

namespace App\Dto\v1\Employee;

use App\Http\Requests\v1\Employee\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $fullName,
        public string $phone,
        public int $photoId,
        public string $email,
        public int $positionId,
        public string $birthDate,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Employee\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            fullName: $request->get('full_name'),
            phone: $request->get('phone'),
            photoId: $request->get('photo_id'),
            email: $request->get('email'),
            positionId: $request->get('position_id'),
            birthDate: $request->get('birth_date')
        );
    }
}
