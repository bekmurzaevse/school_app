<?php

namespace App\Dto\v1\Positions;

use App\Http\Requests\v1\Position\CreateRequest;

readonly class CreateDto
{
    public function __construct(
        public array $name,
        public ?array $description,
    ) {
    }

    /**
     * Summary of from
     * @param \App\Http\Requests\v1\Position\CreateRequest $request
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
