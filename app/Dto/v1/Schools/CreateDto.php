<?php

namespace App\Dto\v1\Schools;

use App\Http\Requests\v1\School\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public array $history,
        public string $phone,
        public string $location,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\School\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            history: $request->get('history'),
            phone: $request->get('phone'),
            location: $request->get('location'),
            description: $request->get('description'),
        );
    }
}
