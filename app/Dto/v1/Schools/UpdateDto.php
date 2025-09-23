<?php

namespace App\Dto\v1\Schools;

use App\Http\Requests\v1\School\UpdateRequest;

readonly class UpdateDto
{
    public function __construct(
        public array $name,
        public array $history,
        public string $phone,
        public string $email,
        public string $location,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\School\UpdateRequest $request
     * @return UpdateDto
     */
    public static function from(UpdateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            history: $request->get('history'),
            phone: $request->get('phone'),
            email: $request->get('email'),
            location: $request->get('location'),
            description: $request->get('description'),
        );
    }
}
