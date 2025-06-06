<?php

namespace App\Dto\v1\Employee;

use App\Http\Requests\v1\Employee\CreateRequest;
use Illuminate\Http\UploadedFile;

readonly class CreateDto
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
     * @param \App\Http\Requests\v1\Employee\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            fullName: $request->get('full_name'),
            phone: $request->get('phone'),
            email: $request->get('email'),
            positionId: $request->get('position_id'),
            birthDate: $request->get('birth_date'),
            photo: $request->file('photo'),
            description: $request->get('description')
        );
    }
}
