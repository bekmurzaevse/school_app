<?php

namespace App\Dto\v1\Employee;

use App\Http\Requests\v1\Employee\UpdateRequest;
use Illuminate\Http\UploadedFile;

readonly class UpdateDto
{
    public function __construct(
        public array $fullName,
        public string $phone,
        public string $email,
        public int $positionId,
        public string $birthDate,
        public UploadedFile $photo,
        public ?array $description,
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
            photo: $request->file('photo'),
            email: $request->get('email'),
            positionId: $request->get('position_id'),
            birthDate: $request->get('birth_date'),
            description: $request->get('description'),
        );
    }
}
