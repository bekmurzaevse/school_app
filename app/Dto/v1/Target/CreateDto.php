<?php

namespace App\Dto\v1\Target;

use App\Http\Requests\v1\Target\CreateRequest;

readonly class CreateDto 
{
    public function __construct(
        public array $name,
        public array $description,
    ) {}

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Target\CreateRequest $request
     * @return CreateDto
     */
    public static function from(CreateRequest $request): self
    {
        return new self(
            name: $request->get('name'),
            description: $request->get('description'),
        );
    }
}